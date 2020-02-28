<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AccountStatementRequest;
use App\Models\Account;
use App\Models\Master;
use App\Models\MasterDetail;
use Auth;
use DB;
class AccountStatementController extends Controller
{
     function __construct()
    {
         $this->middleware('role_or_permission:Account Statement', ['only' => ['create','index','store']]);
         
    }
    public function index(){
    	$accounts=Account::get();


    	return view('admin.account.AccountStatement.create',compact('accounts'));
    }

    public function store(AccountStatementRequest $request){
        // dd($request->all());
        

        $checque=\App\Models\Checque::with('detail')->where('checque_no',$request->checque_id)->first();

        if(!($checque)){
            Session::flash('error_message', __('Record Not found'));
            return redirect()->back();
        }
        DB::beginTransaction();

        $detail=MasterDetail::find($checque->detail->id);
        // dd((int)($detail->amount));
        $new_posting_date = date("Y-m-d", strtotime($detail->posting_date));
        
        if($detail){
            
            \App\Models\Checque::with('detail')->where('checque_no',$request->checque_id)->update(['status'=>2,'updated_by'=>Auth::user()->id]);
            $master=Master::where('account_id',$detail->to_account_id)->orderBy('id','DESC')->first();
            $masterBalance=isset($master->balance)?$master->balance:0;
        	$fromAccount=Master::create([
                'account_id'=>$detail->to_account_id,
                'transaction_type'=>$detail->transaction_type,
                'amount_type'=> 'DB',
                'detail_id'=>$detail->id,
                'a_debit'=>$detail->amount,
                'balance'=>  $masterBalance+ $detail->amount ,      
                'description'=>$detail->description,
                'created_by'=>Auth::id(),
                'updated_by'=>Auth::id(),
                'posting_date'=>$new_posting_date,

            ]);
            // dd($fromAccount);
            if($fromAccount){
                $master=Master::where('account_id',$detail->from_account_id)->orderBy('id','DESC')->first();
                $masterBalance=isset($master->balance)?$master->balance:0;
                $toAccount=Master::create([
                    'created_by'=>Auth::id(),
                    'updated_by'=>Auth::id(),
                    'account_id'=>$detail->from_account_id,
                    'a_credit'=>$detail->amount,
                    'balance'=>  $masterBalance- $detail->amount,
                    'description'=>$detail->description,
                    'detail_id'=>$detail->id,
                    'amount_type'=> 'CR',
                    'transaction_type'=> $detail->transaction_type,
                    'posting_date'=>$new_posting_date,
                     
                ]);
                if($toAccount){
                    $fff=account_minus($detail->from_account_id,$detail->amount);
                    account_update($detail->to_account_id,$detail->amount);
                    DB::commit();
                    Session::flash('success_message', __('Record inserted Successfully'));

                }else{
                     DB::rollBack();
                    Session::flash('error_message', __('Record Not Insert'));


                }

            }else{
                DB::rollBack();
                Session::flash('error_message', __('Record Not Insert'));
            }

        }else{
          DB::rollBack();
          Session::flash('error_message', __('Record Not Insert'));
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Http\Requests\CashTransferRequest;
use App\Models\Master;
use App\Models\MasterDetail;
use App\Models\Checque;
use Auth;
use Session;
use DB;
class CashPaymentController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Cash Payment', ['only' => ['create','index','store']]);
         
    }
    public function index(){
    	return view('admin.account.cashpayment.create');
    }

    public function store(CashTransferRequest $request){
        
            // dd($request->all());

        $new_posting_date = date("Y-m-d", strtotime($request->posting_date));

        $adminAccount=Account::where('user_id',Auth::user()->id)->first();

        if(!$adminAccount){
        	$adminAccount=Account::create(['name'=>Auth::user()->name, 'user_id'=>Auth::user()->id, 'type'=>'admin']);
        }

 
        if($request->cash_type=='Checque'){
            $checques=Checque::where('id',$request->cheque)->where('status',0)->first();
            if(!$checques){
                Session::flash('error_message', __('Record Not Insert'));
                return redirect()->back();
            }
         

            $detail=MasterDetail::create([
                'from_account_id'=> $checques->account_id,
                'to_account_id'=>$request->account_id,
                'transaction_type'=>'CP',
                'cheque'=>$checques->checque_no,
                'amount_type'=>$request->cash_type,
                'cheque_date'=>date('Y-m-d',strtotime($request->cheque_date)),
                'posting_date'=>date('Y-m-d',strtotime($request->posting_date)),
                'amount'=>$request->amount,
                'description'=>$request->description,
                'created_by'=>Auth::id(),
                'last_updated_by'=>Auth::id(),
                'bank'=>$checques->bank_id,

            ]);
            // dd($detail);
            if($detail){
               
                if(Checque::where('id',$request->cheque)->update(['status'=>1,'updated_by'=>Auth::user()->id])){
                    Session::flash('success_message', __('Record inserted Successfully'));
                }else{
                    Session::flash('error_message', __('Record Not Insert'));
                }

            }else{
                    Session::flash('error_message', __('Record Not Insert'));
                }

            return redirect()->back();
        }




        DB::beginTransaction();


        $detail=MasterDetail::create([
        	'from_account_id'=> $adminAccount->id,
        	'to_account_id'=>$request->account_id,
        	'transaction_type'=>'CR',
        	'amount'=>$request->amount,
        	'description'=>$request->description,
        	'created_by'=>Auth::id(),
            'last_updated_by'=>Auth::id(),

        ]);

        if($detail){

        	$fromAccount=Master::create([
                'account_id'=>$request->account_id,
                'transaction_type'=>'CP',
                'amount_type'=> 'DB',
                'detail_id'=>$detail->id,
                'a_debit'=>$request->amount,
                'description'=>$request->description,
                'created_by'=>Auth::id(),
                'last_updated_by'=>Auth::id(),

            ]);
            if($fromAccount){
                $toAccount=Master::create([
                    'created_by'=>Auth::id(),
                    'last_updated_by'=>Auth::id(),
                    'account_id'=>$adminAccount->id,
                     'a_credit'=>$request->amount,
                    
                    'detail_id'=>$detail->id,
                    'amount_type'=> 'CR',
                    'transaction_type'=> 'CP',
                    'posting_date'=>$new_posting_date,
                    'created_by'=>Auth::id(),
                	'last_updated_by'=>Auth::id(),
                ]);
                if($toAccount){
                    $fff=account_minus($request->account_id,$request->amount);
                    account_update($adminAccount->id,$request->amount);
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

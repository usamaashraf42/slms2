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
class CashReceiptController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Cash Receipt', ['only' => ['create','index','store']]);
         
    }
    public function index(){
    	$accounts=Account::get();

    	return view('admin.account.cashreceipt.create',compact('accounts'));
    }

    public function store(CashTransferRequest $request){
        // dd($request->all());
        $new_posting_date = date("Y-m-d", strtotime($request->posting_date));

        $adminAccount=Account::where('user_id',Auth::user()->id)->first();

        if(!$adminAccount){
            $adminAccount=Account::create(['name'=>Auth::user()->name, 'user_id'=>Auth::user()->id, 'type'=>'admin']);
        }

        $checques=Checque::where('id',$request->cheque)->where('status',0)->first();
        if($request->cash_type=='Checque' && !empty($checques)){
           
            if(!$checques){
                Session::flash('error_message', __('Record Not Insert'));
                return redirect()->back();
            }
         

            $detail=MasterDetail::create([
                'from_account_id'=>  $request->account_id,
                'to_account_id'=>$checques->account_id,
                'transaction_type'=>'CR',
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

        if($request->cash_type=='Checque' && empty($checques)){
            $accounts=Account::where('user_id',Auth::user()->id)->first();
            if(!$accounts){
                $accounts=Account::create(['user_id',Auth::user()->id,'name'=>Auth::user()->name,'type'=>'admin']);
            }
            $detail=MasterDetail::create([
                'from_account_id'=>  $request->account_id,
                'to_account_id'=>$accounts->account_id,
                'transaction_type'=>'CR',
                'cheque'=>$request->checque_no,
                'amount_type'=>$request->cash_type,
                'cheque_date'=>date('Y-m-d',strtotime($request->cheque_date)),
                'posting_date'=>date('Y-m-d',strtotime($request->posting_date)),
                'amount'=>$request->amount,
                'description'=>$request->description,
                'created_by'=>Auth::id(),
                'last_updated_by'=>Auth::id(),
                'bank'=>$request->bank_id,

            ]);
            // dd($detail);
            if($detail){
               
                    Session::flash('success_message', __('Record inserted Successfully'));
                

            }else{
                    Session::flash('error_message', __('Record Not Insert'));
                }

            return redirect()->back();
        }

        DB::beginTransaction();

        $detail=MasterDetail::create([
        	'from_account_id'=>$request->account_id,
        	'to_account_id'=>$adminAccount->id,
        	'transaction_type'=>'CR',
        	'amount'=>$request->amount,
        	'description'=>$request->description,
        	'created_by'=>Auth::id(),
            'last_updated_by'=>Auth::id(),


            // 'cheque'=>$checques->checque_no,
            // 'amount_type'=>$request->cash_type,
            // 'cheque_date'=>date('Y-m-d',strtotime($request->cheque_date)),
            // 'posting_date'=>date('Y-m-d',strtotime($request->posting_date)),
            // 'bank'=>$checques->bank_id,

        ]);

        if($detail){
            $master=Master::where('account_id',$request->account_id)->orderBy('id','DESC')->first();
            $masterBalance=isset($master->balance)?$master->balance:0;
        	$fromAccount=Master::create([
                'account_id'=>$request->account_id,
                'transaction_type'=>'CR',
                'amount_type'=> 'CR',
                'detail_id'=>$detail->id,
                'a_credit'=>$request->amount,
                'balance'=>  $masterBalance- $detail->amount , 
                'description'=>$request->description,
                'created_by'=>Auth::id(),
                'updated_by'=>Auth::id(),

            ]);
            if($fromAccount){
                $master=Master::where('account_id',$adminAccount->id)->orderBy('id','DESC')->first();
                $masterBalance=isset($master->balance)?$master->balance:0;
                $toAccount=Master::create([
                    'created_by'=>Auth::id(),
                    'updated_by'=>Auth::id(),
                    'account_id'=>$adminAccount->id,
                    'balance'=>  $masterBalance+ $detail->amount , 
                    'a_debit'=>$request->amount,
                    'detail_id'=>$detail->id,
                    'amount_type'=> 'DB',
                    'transaction_type'=> 'CR',
                    'posting_date'=>$new_posting_date,
                      'created_by'=>Auth::id(),
                    'updated_by'=>Auth::id(),
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

<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankDepositController extends Controller
{

    function __construct()
    {
         $this->middleware('role_or_permission:Bank Deposit', ['only' => ['create','index','store']]);
         
    }

    public function index(){
    	return view('admin.account.bankdeposit.create');
    }

    public function store(CashTransferRequest $request){
        $new_posting_date = date("Y-m-d", strtotime($request->posting_date));

        $adminAccount=Account::where('branch_id',Auth::id())->first();

        if(!$adminAccount){
        	$adminAccount=Account::create(['name'=>Auth::user()->name, 'branch_id'=>Auth::user()->id, 'type'=>'admin']);
        }

        DB::beginTransaction();

        $detail=MasterDetail::create([
        	'from_account_id'=>$request->account_id,
        	'to_account_id'=>$adminAccount->id,
        	'transaction_type'=>'BD',
        	'amount'=>$request->amount,
        	'description'=>$request->description,
        	'created_by'=>Auth::id(),
            'last_updated_by'=>Auth::id(),

        ]);

        if($detail){

        	$fromAccount=Master::create([
                'account_id'=>$request->account_id,
                'transaction_type'=>'BD',
                'amount_type'=> 'CR',
                'detail_id'=>$detail->id,
                'a_credit'=>$request->amount,
                'description'=>$request->description,
                'created_by'=>Auth::id(),
                'last_updated_by'=>Auth::id(),

            ]);
            if($fromAccount){
                $toAccount=Master::create([
                    'created_by'=>Auth::id(),
                    'last_updated_by'=>Auth::id(),
                    'account_id'=>$adminAccount->id,
                    'a_debit'=>$request->amount,
                    'detail_id'=>$detail->id,
                    'amount_type'=> 'DB',
                    'transaction_type'=> 'BD',
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

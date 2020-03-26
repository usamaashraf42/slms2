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
        

        $accounts=Master::where('account_id',$request->account_id)->get();
        $ledger=Master::where('account_id',$request->account_id)->orderBy('id','DESC')->first();

        if(!count($accounts)){
            Session::flash('error_message', __('Record Not found'));
            return redirect()->back();
        }
// dd($accounts);
        return view('admin.account.AccountStatement.index',compact('accounts','ledger'));
       
    }
}

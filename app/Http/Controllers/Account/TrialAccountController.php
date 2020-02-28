<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Models\Master;
use App\Models\AccountCategory;
class TrialAccountController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Ledger', ['only' => ['index','create','store']]);
       
         
    }
    public function index(){
    	$accounts=AccountCategory::with('childrens','accounts')->where('parent_id',null)->get();
    	// dd($accounts);
    	return view('admin.account.trial_balance.index',compact('accounts'));
    }
}

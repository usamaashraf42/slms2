<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Master;
use App\Models\MasterDetail;

class LedgerController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Ledger', ['only' => ['index','create','store']]);
       
         
    }
    public function index(){
    	$master= Master::orderBy('id',"DESC")->with('account')->limit(5)->get();
    	// dd($master);
    	return view('admin.account.ledger.create');
    }

     public function create(){
    	return view('admin.account.ledger.create');
    }

     public function store(Request $request){
        
        $master=Master::where('account_id',$request->account_id)->get();
        if(!count($master)){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
        }

    	return view('admin.account.ledger.index',compact('master'));
    }
}

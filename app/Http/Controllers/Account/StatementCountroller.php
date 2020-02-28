<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
use App\Models\FeePost;
use Auth;
class StatementCountroller extends Controller
{
    //
    function __construct()
    {
         $this->middleware('role_or_permission:statement', ['only' => ['index','create','store','studentStatement']]);
       
         
    }

    public function index(){
    	return view('admin.account.statement.create');
    }

    public function store(Request $request){
        $feePost=FeePost::orWhere('std_id',$request->ly_no)->orWhere('id',$request->ly_no)->first();

        // if(!($feePost)){
        //     session()->flash('error_message', __('Record not found'));
        //     return redirect()->back();
        // }
       
        $ly_no=Student::where('id',$request->ly_no);
        if($feePost){
            $ly_no->orWhere('id',$feePost->std_id);
        }
        
        if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }

        $ly=$ly_no->first();
        if(!($ly)){
            session()->flash('error_message', __('Student is not your branch'));
            return redirect()->back();
        }

        $student=Account::where('std_id',$ly->id)->first();

        $account=Master::where('account_id',$student->id)->orderBy('id','ASC')->with('account.student')->get();

        if(!count($account)){
            session()->flash('error_message', __('Failed! Record not found'));
            return redirect()->back();
        }
        return view('admin.account.statement.index',compact('account'));
    	
    }


    public function studentStatement($id){
    	$account=Account::orWhere('std_id',$id)->with('ledger')->first();
    	// dd($account);
    
    	if(($account)){
    		return view('admin.account.statement.index',compact('account'));
          
    	}
    	  session()->flash('error_message', __('Failed! Record not found'));
        	return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FranchiseApplicant;
use Auth;
use App\Models\School;

class FranchiseApplicantController extends Controller
{
	function __construct()
    {
         $this->middleware('role_or_permission:Franchise Applicant', ['only' => ['create','index','store']]);
         
    }
    public function index(){
        $schools=School::get();
    	$record=FranchiseApplicant::orderBy('id','DESC');
    	if(Auth::user()->school_id){
    		$record->where('school_id',Auth::user()->school_id);
    	}
    	$records=$record->get();
    	return view('admin.account.franchise.index',compact('records','schools'));
    }


    public function show($id){
        // dd($id);

        $schools=School::get();
        $record=FranchiseApplicant::orderBy('id','DESC')->where('school_id',$id);
        
        $records=$record->get();
        return view('admin.account.franchise.index',compact('records','schools'));
    }
}

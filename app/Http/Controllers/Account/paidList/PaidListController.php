<?php

namespace App\Http\Controllers\Account\paidList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Auth;
class PaidListController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Paid List', ['only' => ['create','index','store']]);
         
    }

    public function create(){
        $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
        return view('admin.account.paidList.create',compact('branches'));
    }

    public function store(Request $request){


        $month=$request->month;
        $year=$request->year;
        $records=Branch::with('student.feePost');

        if(isset($request->branch_id) && !empty($request->branch_id) && ($request->branch_id)>0){
            $records->where('id',$request->branch_id);
        }
        $record=$records->get();

        // dd($record);
        
        return view('admin.account.paidList.index',compact('record','month','year'));
    }

    
   
}

<?php

namespace App\Http\Controllers\admins\Student\feeChallen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Course;
use Auth;
use PDF;

class OutstandingFeeChallanController extends Controller
{
    public function index(){
        $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
        $classes=Course::get();

        return view('admin.student.outstanding-fee-challan.create',compact('branches','classes'));
    }

    public function store(Request $request){
        $currenMonth=date('m');
        if(substr($currenMonth, 0, 1)=='0'){
            $currenMonth=substr($currenMonth, 1, 2);
        }
        $month=$currenMonth;

        $year=date('Y');

        $branch_id=$request->branch_id;
        $class_id=$request->class_id;
        $ly_no=$request->ly_no;

      $records=Branch::with('student','student.feePost')->where('id',$request->branch_id);



         if(Auth::user()->branch_id){
              $records->where('id',Auth::user()->branch_id);
        }

        $record=$records->first();
        // dd($record);
         if(!($record)){
          return redirect()->back();
        }
      return view('admin.student.outstanding-fee-challan.print',compact('record','month','year','branch_id','class_id','ly_no'));
    }
}

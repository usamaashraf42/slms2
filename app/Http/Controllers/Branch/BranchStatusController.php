<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentFeeStructure;
use Auth;
use DB;
class BranchStatusController extends Controller
{
    public function index(){
    	$fees=Branch::where('isFranchise',1)->with('student.studentFee');
    	$fees->whereHas('student', function ($query2) {
            $query2->select(DB::raw('count(students.id)'));

	            // $query2->whereHas('studentFee', function ($query3) {
	            //     $query3->groupBy('studentFee')->select(DB::raw('sum(annual_fee) as total_annual_Fee'));
	            // } 
        	// );
        });
        if(Auth::user()->branch_id){
            $fees->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $fees->where('school_id',Auth::user()->school_id);
        }
        $records = $fees->get();

        $franchise=Branch::where('isFranchise',null)->with('student.studentFee');
        $franchise->whereHas('student', function ($query2) {
            $query2->select(DB::raw('count(students.id)'));

                // $query2->whereHas('studentFee', function ($query3) {
                //     $query3->groupBy('studentFee')->select(DB::raw('sum(annual_fee) as total_annual_Fee'));
                // } 
            // );
        });
        if(Auth::user()->branch_id){
            $franchise->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $franchise->where('school_id',Auth::user()->school_id);
        }

        $franchisees = $franchise->get();
        return view('admin.branch.branchStatus.index', compact('records','franchisees'));
    }
}

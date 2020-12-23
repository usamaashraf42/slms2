<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentTransfer;
use App\Models\FeeCorrection;
use App\Models\StudentLeft;
use App\Models\AdmissionQuery;

use Auth;
class DashboardController extends Controller
{
	public function index(){
		$students=Student::where('status',1);
		if(Auth::user()->branch_id){
			$students->where('branch_id', Auth::user()->branch_id);
		}
		$student=$students->get();

		$branch_id=Auth::user()->branch_id;
		$records=FeeCorrection::where('correction_approv',0)->with('student');

		$records->whereHas('student', function($query) use ($branch_id){
			if(Auth::user()->branch_id){
				$query->where('branch_id',$branch_id);
			}
		});
		$correction=$records->count();
		// dd($correction);

		$transfer=StudentTransfer::orderBy('id','Desc')->where('status',0);
		// if(Auth::user()->branch_id){
		// 	$transfer->where('to_branch_id',Auth::user()->branch_id);
		// }
		$transfers=$transfer->count();

		$stdLeft=StudentLeft::where('status',0)->with('student');

		if(Auth::user()->branch_id){
			$stdLeft->where('branch_id',Auth::user()->branch_id);
		}
		$lefts=$stdLeft->count();

		$initalAdmissionQuery=AdmissionQuery::count();

		return view('admin.dashboard',compact('student','correction','transfers','lefts','initalAdmissionQuery'));
	}
	public function datesheet(){
	    return view('admin.date_sheet');
    }
}

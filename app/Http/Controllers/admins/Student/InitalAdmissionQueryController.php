<?php

namespace App\Http\Controllers\admins\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionQuery;
use Auth;
class InitalAdmissionQueryController extends Controller
{
    public function index(){
    	$datas=AdmissionQuery::orderBy('id','DESC');


    	if(Auth::user()->branch_id){
			$datas->where('branch_id',Auth::user()->branch_id);
		}

		$data=$datas->get();

    	return View('admin.student.InitalAdmission.index',compact('data'));
    }
}

<?php

namespace App\Http\Controllers\Account\Blis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Http\Requests\RegisterationRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\AcademicSession;
use App\Models\StudentCategory;
use App\Models\BranchCourse;
use App\Models\StudentFeeStructure;
use App\Models\UpdateStudentFeeStructure;
use App\Models\Student;
use App\Models\Account;
use App\Models\StudentParent;
use App\Models\Branch;
use \Carbon\Carbon;
use App\Models\FeePost;
use App\Models\Master;

use DOMPDF;

use DB;
use Auth;
class BlisFeeChallanController extends Controller
{
	public function index(){
		$branchs=Branch::get();
		return view('admin.account.blis.feechallan.index',compact('branchs'));
	}


	public function store(Request $request){

		$data=Student::where('status',1);

		if($request->branch_id>0){
			$data->where('branch_id',$request->branch_id);
		}

		if($request->class_id){
			$data->where('course_id',$request->class_id);
		}

		if($request->ly_no){
			$data->where('id',$request->ly_no);
		}

		$records=$data->get();

		if(!count($records)){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}

		$records=['records'=>$records];

      // dd($records);

		view()->share('employee',$records);



		 $pdf = DOMPDF::setOptions([
    	 	'isHtml5ParserEnabled' => true, 
    	 	'isRemoteEnabled' => true,
    	 	'isJavascriptEnabled'=>true,
    	 	'debugCss'=>true,
    	 	'logOutputFile' => storage_path('logs/log.html'),
	        'tempDir' => storage_path('logs/'),
    	 	'isPhpEnabled'=>true])->loadView('admin.account.blis.feechallan.challan',$records);
	      $pdf->setPaper('A4', 'landscape');

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ]
            ])
        );  

		return $pdf->stream('BLIS-fee-challan.pdf');

		// $pdf = DOMPDF::loadView('admin.account.blis.feechallan.challan', $records);

  //     // download PDF file with download method

		// $pdf=DOMPDF::setOptions([
		// 	'logOutputFile' => storage_path('logs/log.htm'),
		// 	'tempDir' => storage_path('logs/')
		// ])->loadView('admin.account.blis.feechallan.challan', $records);
		// $pdf->setPaper('A4', 'landscape');
		// return $pdf->stream('BLIS-fee-challan.pdf');


	}
}

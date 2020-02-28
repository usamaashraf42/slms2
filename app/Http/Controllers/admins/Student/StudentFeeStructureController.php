<?php

namespace App\Http\Controllers\admins\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\StudentFeeStructure;
use Session;
use Auth;
class StudentFeeStructureController extends Controller
{

	function __construct()
    {
         $this->middleware('role_or_permission:Student Fee Structure', ['only' => ['index','store']]);
        
         
    }
    public function create(){
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
    	return view('admin.student.feeStructure.create',compact('branches'));
    }

    public function store(Request $request){
    	
    	$student=Student::where('status',1)->where('is_active',1)->orderBy('course_id','ASC')->with('studentFee')->has('studentFee');
    	if($request->branch_id){
			$student->where('branch_id',$request->branch_id);
    	}
    	$students=$student->get();
		$finalData=array();
    	foreach ($students as $stds) {
    		$bala=$stds->studentFee;
			$temarray=array();

			if($bala){
				$data= new \stdClass();

				$factir=0;
				$factir+=$bala->m1;
				$factir+=$bala->m2;
				$factir+=$bala->m3;
				$factir+=$bala->m4;
				$factir+=$bala->m5;
				$factir+=$bala->m6;
				$factir+=$bala->m7;
				$factir+=$bala->m8;
				$factir+=$bala->m9;
				$factir+=$bala->m10;
				$factir+=$bala->m11;
				$factir+=$bala->m12;



				$data->std_id=$stds->id;
				$data->std_name=$stds->s_name;
				$data->class=isset($stds->course->course_name)?$stds->course->course_name:'';
				$data->branch=isset($stds->branch->branch_name)?$stds->branch->branch_name:'';
				$data->annual_fee=$bala->annual_fee;
				$data->scholarship_of=$bala->scholarship_of;
				$data->Net_AnnualFee=$bala->Net_AnnualFee;
				
				$data->m1=$bala->m1;
				$data->m2=$bala->m2;
				$data->m3=$bala->m3;
				$data->m4=$bala->m4;
				$data->m5=$bala->m5;
				$data->m6=$bala->m6;
				$data->m7=$bala->m7;
				$data->m8=$bala->m8;
				$data->m9=$bala->m9;
				$data->m10=$bala->m10;
				$data->m11=$bala->m11;
				$data->m12=$bala->m12;
				$data->total=$factir;


				if($request->type){
					if($factir!=12){
						$finalData[]=$data;
					}
				}else{
					$finalData[]=$data;
				}
				


				
				
			}
    	}
    	if(count($finalData)){
			Session::flash('success_message', __('Record found Successfully'));
			 
    	}else{
    		Session::flash('error_message', __('Record Not Found'));
    	}

    	return view('admin.student.feeStructure.index',compact('finalData'));

    }


    public function studentFeeStrutureChange(Request $request){
    	// return $request->all();
    	$record=StudentFeeStructure::where('std_id',$request->std_id)->first();
    	if(!$record){
    		return response()->json(['status'=>0,'message'=>'record not found']);
    	}

		$effected=StudentFeeStructure::where('std_id',$request->std_id)->update([
			'std_id'=>$request->std_id,
			'm1'=>$request->m1,
			'm2'=>$request->m2,
			'm3'=>$request->m3,
			'm4'=>$request->m4,
			'm5'=>$request->m5,
			'm6'=>$request->m6,
			'm7'=>$request->m7,
			'm8'=>$request->m8,
			'm9'=>$request->m9,
			'm10'=>$request->m10,
			'm12'=>$request->m12,
			'm11'=>$request->m11,
		]);
		if($effected){
			return response()->json(['status'=>1,'message'=>'Record update Successfully']);
		}else{
			return response()->json(['status'=>0,'message'=>'Failed to update record']);
		}
    }
}

<?php

namespace App\Http\Controllers\admins\Student\admissionPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionPackageRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\AdmissionPackage;
use Auth;
use Session;
class AdmissionPackageController extends Controller
{

	function __construct()
    {
         // $this->middleware('role_or_permission:Outstanding', ['only' => ['create','index','store']]);

    }

    public function index(){

        $branch=AdmissionPackage::where('status',1)->orderBy('branch_id','ASC');
        if(Auth::user()->branch_id){
            $branch->where('branch_id',Auth::user()->branch_id);
        }
        $records=$branch->get();

        return view('admin.branch.admissionPackage.index',compact('records'));
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
    $courses=Course::where('parentId','>',0)->get();
    return view('admin.branch.admissionPackage.create',compact('branches','courses'));
}

public function store(AdmissionPackageRequest $request){

    for($i=0; $i<count($request->class_ids); $i++){

        if(isset($request->class_ids[$i])){

            $package=AdmissionPackage::where('branch_id',$request->branch_id)->where('course_id',$request->class_ids[$i])->first();
            if($package){
                AdmissionPackage::where('branch_id',$request->branch_id)->where('course_id',$request->class_ids[$i])->update([
                   'updated_by'=>Auth::user()->id,
                   'status'=>0
               ]);
            }

            $effected=AdmissionPackage::create([
                'branch_id'=>$request->branch_id,
                'package_name'=>$request->package_name,
                'course_id'=>$request->class_ids[$i],
                'registration_Fee'=>$request->registerations[$i],
                'admission_Fee'=>$request->admissions[$i],
                'security_Refundable'=>$request->security[$i],
                'annual_fee'=>$request->annualFee[$i],
                'scholarship'=>$request->schFee[$i],
                'annually'=>$request->netAnnualFee[$i],
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id
                
            ]);
        }


    }
    if (isset($effected)) {
     Session::flash('success_message', __('Record inserted Successfully'));
 } else {

   Session::flash('error_message', __('Record Not Insert'));
}
return redirect()->route('admission-package.index');
}


public function edit($id){
    $packages=AdmissionPackage::where('branch_id',$id)->get();


    if(!count($packages)){
        Session::flash('error_message', __('Record Not Insert'));
        return redirect()->route('admission-package.create');
    }

   $courses=Course::where('parentId',null)->get();
    $branch_id=$id;
     return view('admin.branch.admissionPackage.edit',compact('branches','courses','packages','branch_id'));
    // dd($package);
}


}

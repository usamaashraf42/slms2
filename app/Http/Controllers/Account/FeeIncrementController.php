<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeIncrementRequest;
use App\Models\Branch;
use App\Models\Student;
use App\Models\FeeIncrement;
use App\Models\FeeIncrementStudent;
use App\Http\Requests\ApprovedIncrementRequst;
use App\Models\StudentFeeStructure;
use App\Models\Course;
use Auth;
use DB;
class FeeIncrementController extends Controller
{
    

     function __construct()
    {
         $this->middleware('role_or_permission:Fee Increment', ['only' => ['create','index','store','incrementUpdate']]);
         
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
    $classes=Course::get();
    return view('admin.account.feeIncrement.create',compact('branches','classes'));
}

public function store(FeeIncrementRequest $request){
// dd($request->all());
  
    if($request->std_id){
        $increment=FeeIncrement::create([
            'name'=>$request->name,
            'branch_id'=>$request->branch_id,
            'class_id'=>$request->class_id,
            'amount'=>$request->amount,
            'created_by'=>Auth::user()->id,
        ]);

        $students=Student::find($request->std_id);

        if(!$students){
            session()->flash('error_message', __('Failed! To update Record'));
            return redirect()->back();
        }
        $Net_AnnualFee=round($students->studentFee->Net_AnnualFee)+ ($request->amount);
        $annual_fee=(round($students->studentFee->annual_fee)+($request->amount));

            $fee_increment=FeeIncrementStudent::create([
                'fee_increment_id'=>$increment->id,
                'std_id'=>$students->id,
                'amount'=>$request->amount,
                'scholarship_of'=>(($students->studentFee->scholarship_of)), 
                'annual_fee'=>$annual_fee,
                'Net_AnnualFee'=>$Net_AnnualFee,
                'status'=>0 
            ]);
            

    }else{
        $branch=Branch::where('isFranchise',1);
        if($request->branch_id){
            $branch->where('id',$request->branch_id);
        }
        $branches=$branch->get();

        $increment=FeeIncrement::create([
            'name'=>$request->name,
            'branch_id'=>$request->branch_id,
            'class_id'=>$request->class_id,
            'amount'=>$request->amount,
            'created_by'=>Auth::user()->id,
        ]);


      foreach ($branches as $bb) {
          $students=Student::where('status',1)->where('is_active',1)->where('branch_id',$bb->id)->where('course_id',$request->class_id)->where('admission_date','<','2019-02-28')->get();

          foreach ($students as $std) {

            $Net_AnnualFee=round($std->studentFee->Net_AnnualFee)+ ($request->amount);
            $annual_fee=(round($std->studentFee->annual_fee)+($request->amount));

                $fee_increment=FeeIncrementStudent::create([
                    'fee_increment_id'=>$increment->id,
                    'std_id'=>$std->id,
                    'amount'=>$request->amount,
                    'scholarship_of'=>(($std->studentFee->scholarship_of)), 
                    'annual_fee'=>$annual_fee,
                    'Net_AnnualFee'=>$Net_AnnualFee,
                    'status'=>0 
                ]);
            }
        }
    }
  

$fee_increments=FeeIncrementStudent::where('fee_increment_id',$increment->id)->get();
if(!count($fee_increments)){
    session()->flash('error_message', __('Failed! To update Record'));
    return redirect()->back();
}
return view('admin.account.feeIncrement.index',compact('fee_increments'));




}


public function index(){
    $fee_increments=FeeIncrementStudent::orderBy('fee_increment_id','DESC')->with('student')->get();
            // dd($fee_increments);
    return view('admin.account.feeIncrement.index',compact('fee_increments'));

}

public function incrementCourse(Request $request){

}


public function incrementUpdate(ApprovedIncrementRequst $request){

    for($i=0; $i<count($request->std_id); $i++){
        if(isset($request->std_id[$i])){
            $old=StudentFeeStructure::where('std_id',$request->std_id[$i])->first();
            
           
            if($old &&  $request->annual_fee[$i]){
                $Net_AnnualFee=$request->annual_fee[$i]-$request->scholarship_of[$i];

                $posted['annual_fee']=$request->annual_fee[$i];
                $posted['scholarship_of']=$request->scholarship_of[$i];
                $posted['Net_AnnualFee']=$Net_AnnualFee;

                $postedstd=StudentFeeStructure::where('std_id',$request->std_id[$i])->update($posted);
                $feein=FeeIncrementStudent::where('fee_increment_id',$request->fee_increment_id)->where('std_id',$request->std_id[$i])->orderBy('id',"DESC")->first();
                ($feein->status=1);
                $feein->save();
            }

        }

    }
 
    session()->flash('success_message', __('Record update Successfully'));
    return redirect()->route('fee-increment.create');

}


}

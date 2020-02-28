<?php

namespace App\Http\Controllers\admins\Student\EditStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EditStudentRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;
use Image;

class EditStudentController extends Controller
{

	 function __construct()
    {
        $this->middleware('role_or_permission:Student Edit', ['only' => ['index','store']]);
    }

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

        return view('admin.student.editStudent.create',compact('branches'));
    }

    public function store(EditStudentRequest $request){
        // dd($request->all());
        $records=Student::where('branch_id',$request->branch_id)->where('course_id',$request->class_id)->where('status',1)->get();
         // dd($records);
        if(!count($records)){
             session()->flash('error_message', __(' Record not found'));
                return redirect()->back();
        }



        return view('admin.student.editStudent.index',compact('records'));

    }
    public function show($id)
    {
        try {

            $data = Student::find($id);
            return $data;
            return view('admin.student.editStudent.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }

    public function edit($id)
    {
        try {

            $data = Student::find($id);
 
            return view('admin.student.editStudent.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }


    public function EditStudentProfile(Request $request){
        
        $student=Student::find($request->id);
       
        if(!$student){
            return response()->json(['status'=>0,'message'=>'Failed to update']);
        }
        if($request->hasfile('photo')){

            $image=$request->file('photo');
                $self_image = $request->file('photo')->getClientOriginalName();
                $Extension_profile = $request->file('photo')->getClientOriginalExtension();
                $self_image = $request->id.'_'.date('YmdHis').'.'.$Extension_profile;
                $destinationPath = public_path('images/student/pics/');



                $resize_image = Image::make($image->getRealPath());

                $resize_image->resize(600, 600, function($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $self_image);
                $datas['images']=$self_image;


            $Extension_profile = $request->file('photo')->getClientOriginalExtension();
            $profile = $request->id.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('photo')->move('images/student/pics/', $profile);
        }
        $datas['s_name']=$request->s_name;
        $datas['s_fatherName']=$request->s_fatherName;
        $datas['emergency_mobile']=$request->phone;
        $datas['s_phoneNo']=$request->phone;
        $datas['father_mobile']=$request->phone;

        if(Student::where('id',$request->id)->update($datas)){
            return response()->json(['status'=>1,'message'=>'Record update successfully']);
        }else{
            return response()->json(['status'=>0,'message'=>'Failed to update']);
        }

       
    }
}

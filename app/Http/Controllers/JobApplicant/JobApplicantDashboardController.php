<?php

namespace App\Http\Controllers\JobApplicant;

use App\Http\Controllers\ApiMessageController;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Degree;
use App\Models\ExperienceInstitude;
use App\Models\Grade;
use App\Models\Intitude;
use App\Models\JobApplicantEducation;
use App\Models\JobApplicatExperience;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherEducation;
use App\Models\TeacherExperience;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobApplicantDashboardController extends Controller
{
    public function dashboard(){
        return view('JobApplicant.dashboard.index');
    }
    public function record_video(){
        return view('JobApplicant.videorecord.index');
    }
    public function get_degree_ajax(Request $request){
        $accounts = Degree::orderBy('name','asc')->groupBy('name')->limit(50);
        $filter = $request->input('q');
        if(!empty($filter)){
            $accounts->where('id', 'like', "%{$filter}%")
                ->orWhere('name', 'like', "%{$filter}%");
        }

        $data=$accounts->get();

        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
            return response()->json(200);
        }

    }

    public function get_institude_ajax(Request $request){
        $accounts = Intitude::orderBy('name','asc')->groupBy('name')->limit(50);
        $filter = $request->input('q');
        if(!empty($filter)){
            $accounts->where('id', 'like', "%{$filter}%")
                ->orWhere('name', 'like', "%{$filter}%");
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
            return response()->json(200);
        }

    }
    public function exp_institude_ajax(Request $request){
        $accounts = ExperienceInstitude::orderBy('name','asc')->groupBy('name')->limit(50);
        $filter = $request->input('q');
        if(!empty($filter)){
            $accounts->where('id', 'like', "%{$filter}%")
                ->orWhere('name', 'like', "%{$filter}%");
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
            return response()->json($data, 200);
        }

    }
    public function get_grade_ajax(Request $request){



        $data = Grade::orderBy('id','asc');


        $accounts=$data->limit(50);
        $filter = $request->input('q');
        if(!empty($filter)){
            $accounts->where('name', 'like', "%{$filter}%");

        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
            return response()->json($data, 200);
        }

    }

    public function get_subject_ajax(Request $request){



        $data = Subject::select('sub_name','id')->where('status',1)->groupBy('sub_name');


        $accounts=$data->limit(50);
        $filter = $request->input('q');
        if(!empty($filter)){
            $accounts->where('name', 'like', "%{$filter}%");

        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
            return response()->json($data, 200);
        }

    }
    public function jobapplicanteducationAdd(Request $request){

//dd(Auth::guard('JobApplicant')->user()->id);
// return $request->all();
        $data=Degree::where('name',$request->degree_id)->first();
        if(!$data && $request->degree_id){
            $data=Degree::create(['name'=>$request->degree_id]);
        }

        $institude=Intitude::where('name',$request->institude_id)->first();
        if(!$institude && $request->institude_id){
            $institude=Intitude::create(['name'=>$request->institude_id]);
        }
        if(isset($data->id) && isset($institude->id)){
            $data=JobApplicantEducation::insert([
                'job_applicant_id'=>Auth::guard('JobApplicant')->user()->id,
                'degree_id'=>$data->id,
                'institute_id'=>$institude->id,
                'degree_type'=>isset($request->degree_type)?$request->degree_type:null,
                'passing_year'=>isset($request->passing_year)?$request->passing_year:null,
                'degree_percentage'=>isset($request->degree_percentage)?$request->degree_percentage:null,
                'degree_grade'=>isset($request->degree_grade)?$request->degree_grade:null,
            ]);
            if($data){
                return response()->json(['status'=>true, 'message'=>'Record Added Successfully'], 200);
            }else{
                return response()->json(['status'=>false, 'message'=>'Something Went Wrong'], 200);
            }


        }
        return response()->json(['status'=>false, 'message'=>'Something Went Wrong'], 200);
    }
    public function jobapplicant_qualification_ajax(Request $request){

        $data=JobApplicantEducation::orderBy('id','DESC')->where('job_applicant_id',Auth::guard('JobApplicant')->user()->id)->with('degree','institude')->get();


        return response()->json(['status'=>1,'record'=>$data]);
    }
    public function jobapplicant_qualification_delete(Request $request){

//        if(Auth::guard('JobApplicant')->user()->status==0){
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
//        }
        try {
            $allInputs = $request->all();
            $id = $request->input('id');

            $validation = Validator::make($allInputs, [
                'id' => 'required'
            ]);
            if ($validation->fails()) {
                $response = (new ApiMessageController())->validatemessage($validation->errors()->first());
            } else {
                $deleteItem =JobApplicantEducation::where('id',$id)->delete();




                if (isset($deleteItem) && !empty($deleteItem)) {
                    return response()->json(['status'=>1]);
                    // $response = (new ApiMessageController())->saveresponse("Data Update Successfully");
                } else {
                    return response()->json(['status'=>0]);
                    $response = (new ApiMessageController())->failedresponse("Failed to Update Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }
    public function jobapplicant_qualification_edit(Request $request){
        try {
            $years=Year::get();
            $data = JobApplicantEducation::find($request->id);
            return view('JobApplicant.profile.education.edit',compact('data','years'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }
    public function jobapplicant_qualification_Update(Request $request){


//        if(Auth::guard('JobApplicant')->user()->status==0){
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
//        }



        $years=Year::get();
        $data=Degree::where('name',$request->degree_id )->first();
        if(!$data && $request->degree_id){
            $data=Degree::create(['name'=>$request->degree_id]);
        }
        if($data){
            $institude=Intitude::where('name',$request->institude_id)->first();
            if(!$institude && $request->institude_id){
                $institude=Intitude::create(['name'=>$request->institude_id]);
            }
            if(isset($data->id) && isset($institude->id)){
                $data=JobApplicantEducation::where('job_applicant_id',Auth::guard('JobApplicant')->user()->id)->update([
                    'job_applicant_id'=>Auth::guard('JobApplicant')->user()->id,
                    'degree_id'=>$data->id,
                    'institute_id'=>$institude->id,
                    'degree_type'=>isset($request->degree_type)?$request->degree_type:null,
                    'passing_year'=>isset($request->passing_year)?$request->passing_year:null,
                    'degree_percentage'=>isset($request->degree_percentage)?$request->degree_percentage:null,
                    'degree_grade'=>isset($request->degree_grade)?$request->degree_grade:null,
                ]);
                if($data){
                    return response()->json(['status'=>true, 'message'=>'Record update Successfully'], 200);
                }else{
                    return response()->json(['status'=>false, 'message'=>'Something Went Wrong'], 200);
                }


            }
        }
    }
    //experience
    public function obapplicant_experienceAdd(Request $request){

//         return $request->all();
//        if(Auth::guard('JobApplicant')->user()->status==0){
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
//        }

//        $curriculum=Curriculum::where('name',$request->curriculum_id)->first();
//
//        if(isset($request->curriculum_id) && !($curriculum)){
//            $curriculum=Curriculum::create(['name'=>$request->curriculum_id]);
//        }


        $institude=ExperienceInstitude::where('name',$request->institude_id)->first();


        if(!$institude && $request->institude_id){

            $institude=ExperienceInstitude::create(['name'=>$request->institude_id]);
        }

        $course=Course::where('course_name',$request->class_id)->first();


        if(!$course && $request->class_id){
            $course=Course::create(['course_name'=>$request->class_id]);
        }


        $subject=Subject::where('sub_name',$request->teachering_sub_id)->first();


        if(!$subject && $request->teachering_sub_id){
            $subject=Subject::create(['sub_name'=>$request->teachering_sub_id]);
        }

        if(isset($institude->id)){
            $data=JobApplicatExperience::insert([
                'job_applicant_id'=>Auth::guard('JobApplicant')->user()->id,
                'institute_id'=>isset($institude->id)?$institude->id:null,
                'teachering_sub_id'=>isset($subject->id)?$subject->id:null,
                'curriculum'=>isset($request->curriculum_id)?$request->curriculum_id:null,

                'exp_to'=>isset($request->exp_to)?date('Y-m-d', strtotime($request->exp_to)):null,
                'exp_from'=>isset($request->exp_from)?date('Y-m-d', strtotime($request->exp_from)):null,

                'class_id'=>isset($course->id)?$course->id:null,
                'current_job'=>isset($request->current_job)?$request->current_job:null,


            ]);
            if($data){
                return response()->json(['status'=>true, 'message'=>'Record Added Successfully'], 200);
            }

            return response()->json(['status'=>false, 'message'=>'Something Went wrong'], 200);
        }
        return response()->json(['status'=>false, 'message'=>'Something Went wrong'], 200);

    }
    public function jobapplicant_experience_ajax(Request $request){

        $data=JobApplicatExperience::orderBy('id','ASC')->where('job_applicant_id',Auth::guard('JobApplicant')->user()->id)->with('institude','subject','course')->get();

        if(count($data)){
            return response()->json(['status'=>1,'record'=>$data]);
        }

        return response()->json(['status'=>0]);

    }
    public function jobapplicant_experience_delete(Request $request){

//        if(Auth::guard('teacher')->user()->status==0){
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
//        }
        try {
            $allInputs = $request->all();
            $id = $request->input('id');

            $validation = Validator::make($allInputs, [
                'id' => 'required'
            ]);
            if ($validation->fails()) {
                $response = (new ApiMessageController())->validatemessage($validation->errors()->first());
            } else {
                $deleteItem =JobApplicatExperience::where('id',$id)->delete();




                if (isset($deleteItem) && !empty($deleteItem)) {
                    return response()->json(['status'=>1,'message'=>'Record update Successfully']);
                    // $response = (new ApiMessageController())->saveresponse("Data Update Successfully");
                } else {
                    return response()->json(['status'=>0,'message'=>'Failed to Update Data']);
                    $response = (new ApiMessageController())->failedresponse("Failed to Update Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }
    public function jobapplicant_experience_edit(Request $request){
        try {

            $data = JobApplicatExperience::find($request->id);
            return view('JobApplicant.profile.experience.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }
    public function jobapplicant_experience_Update(Request $request)
    {
//        if(Auth::guard('teacher')->user()->status==0){
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
//        }


        $institude=ExperienceInstitude::where('name',$request->institude_id)->first();


        if(!$institude && $request->institude_id){

            $institude=ExperienceInstitude::create(['name'=>$request->institude_id]);
        }

        $course=Course::where('course_name',$request->class_id)->first();


        if(!$course && $request->class_id){
            $course=Course::create(['course_name'=>$request->class_id]);
        }


        $subject=Subject::where('sub_name',$request->teachering_sub_id)->first();


        if(!$subject && $request->teachering_sub_id){
            $subject=Subject::create(['sub_name'=>$request->teachering_sub_id]);
        }



        if( isset($institude->id)){
            $affected=JobApplicatExperience::where('id',$request->exp_id)->update([
                'job_applicant_id'=>Auth::guard('JobApplicant')->user()->id,
                'institute_id'=>isset($institude->id)?$institude->id:null,
                'teachering_sub_id'=>isset($subject->id)?$subject->id:null,
                'curriculum'=>isset($request->curriculum_id)?$request->curriculum_id:null,

                'exp_to'=>isset($request->exp_to)?date('Y-m-d', strtotime($request->exp_to)):null,
                'exp_from'=>isset($request->exp_from)?date('Y-m-d', strtotime($request->exp_from)):null,

                'class_id'=>isset($course->id)?$course->id:null,
                'current_job'=>isset($request->current_job)?$request->current_job:null,
            ]);

            if($affected){
                return response()->json(['status'=>true, 'message'=>'Profile update Successfullye'], 200);
            }
//            return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);
        }

        return response()->json(['status'=>false, 'message'=>'You are inactive , you can not update your profile'], 200);

    }
    public function jobapplicantProfileUpdate(Request $request)
    {

        if ($request->hasfile('profile')) {
//            $image = $_FILES['profile'];
            $image = $request->profile;
            $fullPathToProfile = public_path('jobapplicant/images/');

//            $fullPathToProfile=$fullPathToProfile.Auth::guard('JobApplicant')->user()->images;
//            try{
//                if(file_exists($fullPathToProfile)) {
//                    unlink($fullPathToProfile);
//                }
//            }catch(\Exception $e){
//
//            }

//            if(Auth::guard('teacher')->user()->image){
//
//                try{
//
//                    $filename=Auth::guard('teacher')->user()->image;
//                    $dir = '/';
//                    $recursive = false;
//                    $contents = collect(Storage::disk('profile')->listContents($dir, $recursive));
//
//                    $file = $contents
//                        ->where('type', '=', 'file')
//                        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
//                        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
//                        ->first();
//
//                    Storage::disk('profile')->delete($file['path']);
//
//                }catch(\Exception $e){
//
//                }
//
//
//            }


            $Extension_profile = $request->file('profile')->getClientOriginalExtension();
            $profile_name = $request->file('profile')->getClientOriginalName();

            $imageRandomName = Auth::guard('JobApplicant')->user()->id . '_' . date('YmdHis') . '.' . $Extension_profile;

            $imageType = $_FILES['profile']['type'];

            $target_dir = public_path() . '/jobapplicant/images/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($imageRandomName);

            $input['images'] = $profile_name;
            $move_image = $image->move($target_dir, $profile_name);
//            if ( move_uploaded_file($image["tmp_name"], $target_file ) ) {
            if ($move_image) {
//                $filesizeonserver = filesize($target_file);
//                $times = 0;
//                if($filesizeonserver > 300000){
//                    do{
//                        clearstatcache();
//                        $resized = $this->resizeImage($target_file, 0.05, $imageType);
//                        $filesizeonserver = filesize($target_file);
//
//                        $times++;
//                    } while ($filesizeonserver > 300000);
//
//                }

            }


            $fullPathToTeacherProfile = public_path('/jobapplicant/images/');
            $fullPathToTeacherProfile = $fullPathToTeacherProfile . $imageRandomName;


            $filename = $imageRandomName;
//            $fileData = File::get($fullPathToTeacherProfile);
//
//            Storage::disk('profile')->put($filename, $fileData);


            if (is_file($fullPathToTeacherProfile)) {

                unlink($fullPathToTeacherProfile);

            }


//            $input['full_image_path']=getProfilePath($imageRandomName);


//        $input['sample_lecture']=isset($request->sample_lecture)?$request->sample_lecture:Auth::guard('teacher')->user()->sample_lecture;
//        $input['medium_of_teaching']=isset($request->medium_of_teaching)?$request->medium_of_teaching:Auth::guard('teacher')->user()->medium_of_teaching;
//
//
//        $input['topic_id']=isset($request->topic_id)?$request->topic_id:Auth::guard('teacher')->user()->topic_id;
//        $input['curriculum_id']=isset($request->curriculum_id)?$request->curriculum_id:Auth::guard('teacher')->user()->curriculum_id;
//
//        $input['sub_id']=isset($request->sub_id)?$request->sub_id:Auth::guard('teacher')->user()->sub_id;
//        $input['note']=isset($request->note)?$request->note:Auth::guard('teacher')->user()->note;
//        $input['web_url']=isset($request->web_url)?$request->web_url:Auth::guard('teacher')->user()->web_url;
            $effectedTeacher = Applicant::where('id', Auth::guard('JobApplicant')->user()->id)->update($input);


        }

        foreach(Auth::guard('JobApplicant')->user()->job_applicant_education as $data) {

            if ($request->hasfile('education_' . $data->id)) {
                $image = $_FILES['education_' . $data->id];
                $Extension_profile = $request->file('education_' . $data->id)->getClientOriginalExtension();
                $profile_name = $request->file('education_' . $data->id)->getClientOriginalName();

                $fullPathToEdu = public_path('/jobapplicant/education/images/');

//                $fullPathToEdu = $fullPathToEdu . $data->image;

                try {
                    if (file_exists($fullPathToEdu)) {
                        unlink($fullPathToEdu);
                    }
                } catch (\Exception $e) {

                }

//                if ($data->image) {
//
//                    try {
//                        $filename = $data->image;
//                        $dir = '/';
//                        $recursive = false;
//                        $contents = collect(Storage::disk('degree')->listContents($dir, $recursive));
//
//                        $file = $contents
//                            ->where('type', '=', 'file')
//                            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
//                            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
//                            ->first();
//                        Storage::disk('degree')->delete($file['path']);
//
//                    } catch (\Exception $e) {
//
//                    }
//
//                }
            }

//
//
//
//
            $imageRandomName = Auth::guard('JobApplicant')->user()->id . '_' . date('YmdHis') . '.' . $Extension_profile;
            $imageType = $_FILES['education_' . $data->id]['type'];
            $education_image = $request['education_' . $data->id];

            $target_dir = public_path() . '/jobapplicant/education/images/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($imageRandomName);

            $move_image = $education_image->move($target_dir, $profile_name);
//                if ( move_uploaded_file($image["tmp_name"], $target_file ) ) {
            if ($move_image) {

//                    $filesizeonserver = filesize($target_file);
//                    $times = 0;
//                    if($filesizeonserver > 300000){
//                        do{
//                            clearstatcache();
//                            $resized = $this->resizeImage($target_file, 0.05, $imageType);
//                            $filesizeonserver = filesize($target_file);
//
//                            $times++;
//                        } while ($filesizeonserver > 300000);
//
//                    }

            }

            $fullPathToTeacherEducation = public_path('/jobapplicant/education/images/');
            $fullPathToTeacherEducation = $fullPathToTeacherEducation . $imageRandomName;


//                $filename = $imageRandomName;
//                $fileData = File::get($fullPathToTeacherEducation);
//
//                Storage::disk('degree')->put($filename, $fileData);


            $education['image'] = $profile_name;
//                $education['full_image_path']=getEducationPath($imageRandomName);

            $jobapplicant_education =JobApplicantEducation::where('id', $data->id)->update($education);


            if (is_file($fullPathToTeacherEducation)) {

                unlink($fullPathToTeacherEducation);

            }
        }
//
//
//
//
//            }
//        }

//        foreach(Auth::guard('teacher')->user()->teacherExp as $data){
//
//            if($request->hasfile('experience_'.$data->id)){
//                $image = $_FILES['experience_'.$data->id];
//
//                $fullPathToExp = public_path('images/TeacherExperience/');
//
//                $fullPathToExp=$fullPathToExp.$data->image;
//
//                try{
//                    if(file_exists($fullPathToExp)) {
//                        unlink($fullPathToExp);
//                    }
//                }catch(\Exception $e){
//
//                }
//
//                if($data->image){
//
//                    try{
//                        $filename=$data->image;
//                        $dir = '/';
//                        $recursive = false;
//                        $contents = collect(Storage::disk('experience')->listContents($dir, $recursive));
//
//                        $file = $contents
//                            ->where('type', '=', 'file')
//                            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
//                            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
//                            ->first();
//                        Storage::disk('experience')->delete($file['path']);
//
//                    }catch(\Exception $e){
//
//                    }
//
//                }
//
//
//
//                $Extension_profile = $request->file('experience_'.$data->id)->getClientOriginalExtension();
//
//                $imageRandomName = Auth::guard('teacher')->user()->id.'_'.date('YmdHis').'.'.$Extension_profile;
//                $imageType = $_FILES['experience_'.$data->id]['type'];
//
//                $target_dir = 'images/TeacherExperience/';
//
//                if ( !file_exists( $target_dir ) ) {
//                    mkdir( $target_dir, 0777, true );
//                }
//
//                $target_file = $target_dir . basename( $imageRandomName );
//
//
//                if ( move_uploaded_file($image["tmp_name"], $target_file ) ) {
//                    $filesizeonserver = filesize($target_file);
//                    $times = 0;
//                    if($filesizeonserver > 300000){
//                        do{
//                            clearstatcache();
//                            $resized = $this->resizeImage($target_file, 0.05, $imageType);
//                            $filesizeonserver = filesize($target_file);
//
//                            $times++;
//                        } while ($filesizeonserver > 300000);
//
//                    }
//
//                }
//
//                $fullPathToTeacherExp = public_path('images/TeacherExperience/');
//                $fullPathToTeacherExp=$fullPathToTeacherExp.$imageRandomName;
//
//
//                $filename = $imageRandomName;
//                $fileData = File::get($fullPathToTeacherExp);
//
//                Storage::disk('experience')->put($filename, $fileData);
//
//
//
//
//                $experience['image']=$imageRandomName;
//                $experience['full_image_path']=getExpPath($imageRandomName);
//                TeacherExperience::where('id',$data->id)->update($experience);
//
//
//                if (is_file($fullPathToTeacherExp)){
//
//                    unlink($fullPathToTeacherExp);
//
//                }
//
//
//
//            }
//        }



        if(isset($effectedTeacher) || $jobapplicant_education){

//            Auth::guard('teacher')->user()->systemRating();
//            Auth::guard('teacher')->user()->userRating();


            session()->flash('success_message', "Profile has been updated" );

            // try {
            //  	$name=Auth::guard('teacher')->user()->f_name;
            //               $message=strip_tags("Thank you for recording your sample lecture. Your documents and lecture recording are successfully uploaded.");


            //              (SendSms(Auth::guard('teacher')->user()->phone,$message));

            //           } catch (\Exception $e) {

            //           }
            //          try{
            //             	$emails=Auth::guard('teacher')->user()->email;
            //            Mail::send('emails.teacher.documentComplete', ['data'=>Auth::guard('teacher')->user()], function($message) use ($emails) {
            //            $message->to($emails)->subject('Sample Lecture Confirmation');
            //        });
            //    }
            //    catch(\Exception $e){
            //              // Never reached
            //    }



            return redirect()->route('teacher.review.rating');
//            return 'yes';

        }else{
            Session::flash('error_message', "Failed to update profile");
//            return 'no';

        }


        return redirect()->back();



    }

}

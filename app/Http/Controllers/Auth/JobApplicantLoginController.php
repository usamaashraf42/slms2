<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\StudentSignUpRequest;

use Illuminate\Support\Str;
use App\Models\{Applicant};
use Auth;
use Session;
class JobApplicantLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
  		$this->middleware("guest:JobApplicant", ['except' => ['logout']]);
  	}

     public function showLoginForm()
    {
            return view('JobApplicant.auth.login');

        // $urlPrevious = url()->previous();

        // $urlBase = url()->to('/');
        // if(($urlPrevious != $urlBase . '/student/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase) && ($urlPrevious != $urlBase . '/login') ) {
        //     session()->put('url.intended', $urlPrevious);
        // }else{
        //   session()->put('url.intended', '');
        // }



    }

     public function registerForm()
    {


        return view('student.auth.register');
    }

    public function registerSubmit(StudentSignUpRequest $request){
       $data=Student::where('email',$request->email)->where('f_name',$request->f_name)->first();
      if($data){
         $emails = $request->email;
         // try{
         //      Mail::send('emails.accountActivateMail', ['data'=>$data], function($message) use ($emails) {
         //      $message->to($emails)->subject('Verify Account');
         //    });
         //  }
         //  catch(\Exception $e){
         //      // Never reached
         //  }
          session()->flash('error_message', __('Account has already exist with same email and name'));
          return redirect()->back()->withInput($request->input());
      }

        $password=$request->password;
        $newUser=Student::create([
            'f_name' => $request->f_name?$request->f_name:' ',
            'l_name' => $request->l_name?$request->l_name:' ',
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob?date('Y-m-d', strtotime($request->dob)):null,
            'grade_id' => $request->grade_id,
            'cnic' => $request->cnic,
            'pwd'=>$password,
            'country_id'=>$request->country_id?$request->country_id:166,
            'temp_city'=>$request->city_id?$request->city_id:null,
            'nation_id'=>166,
            'api_token'=> Str::random(60),
            'password' => Hash::make($password),
        ]);

        if($newUser){
          if($newUser->phone){
            $name=$newUser->f_name;
            $email=$newUser->email;
            $pwd=$newUser->pwd;
            $pwd=$newUser->pwd;


              try {
                 $message=strip_tags("Dear $name\n You have been Successfully registered on British Lyceum. Your login is $email and password is $pwd .\nYou can choose teacher/ subject by visiting www.britishlyceum.com/teacher/list.\nRegards\nBritish Lyceum");
                (SendSms($newUser->phone,$message));

              } catch (\Exception $e) {

              }


          }

          if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            try {
              $emails = $request->email;
                Mail::send('emails.student.signupEmail', ['data'=>$newUser], function($message) use ($emails) {
                    $message->to($emails)->subject('Successful Registration on British Lyceum');
                });

            } catch (\Exception $e) {

            }
          }

          // session()->flash('success_message', __('congratulation , you are registered successfully, we will call you when class will start'));
          //  return redirect()->back();

            if((Auth::guard('student')->attempt(['id' => $newUser->id, 'password'=>$newUser->pwd], $request->remember)) ){
                  session()->flash('success_message', Auth::guard('student')->user()->f_name." Welcome to Portal");
                  return redirect(route('student.secondsetup'));
            }
          }

        else{
            session()->flash('error_message', __('Failed! Something went wrong'));
        }



        return redirect()->back();
    }


    public function studentsIds(Request $request){

        $students=Student::where('email',$request->email)->get(['id','f_name','email']);
        if(!count($students)){
           session()->flash('error_message', 'Account has not found');
           return redirect()->back()->withInput($request->only('email', 'remember'));
        }

        return view('student.auth.check_student_login',compact('students'));

    }


    public function login(Request $request){

        // dd($request->all());
      $validate = $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
      ]);
      if($validate){
        // $Verify=Student::where('email',$request->email)->first();

        // if(isset($Verify) && empty($Verify->email_verified_at)){
        //   session()->flash('error_message', 'Ops! Please Verify Your Account');
        //   return redirect()->back()->withInput($request->only('email', 'remember'));
        // }




      if((Auth::guard('JobApplicant')->attempt(['email' => $request->email, 'password'=>$request->password], $request->remember))){
          session()->flash('success_message', Auth::guard('JobApplicant')->user()->name." Welcome to Portal");
          return redirect()->route('jobApplicant.dashboard');
        }
        else{
          session()->flash('error_message', 'Id or Password not match');
        }
      }
      else{
         session()->flash('error_message', 'validation failed');
      }

      return redirect()->back()->withInput($request->only('email', 'remember'));
    }


   public function logout(){
   	Auth::guard('student')->logout();
   	return redirect('/');
   }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\AdminRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
     protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

     public function admin_register(AdminRequest $request){


        $user=User::where('email',$request->email)->first();

        if($user){
            $newUser = VerifyUser::where('user_id',$user->id)->first();

            Mail::to($user->email)->send(new VerifyMail($user));
            session()->flash('success_message', __('Verification Code Have Been Send, Please Check Your Email Account'));
             return redirect()->route('verifyUser',$user->email);
        }
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/staff/', $profile);
        }
          DB::beginTransaction();
        $newUser=User::create([
            'name' => $request->name,
            'fname' => $request->fname?$request->fname:'',
            'email' => $request->email,
            'phone' => $request->phone,
            'pwd'=>$request->password,
            'branch_id' => $request->branch_id,
            'images'=>isset($profile)?$profile:'no-image.png',
            'api_token'=> Str::random(60),
            'userType'=>'admin',
            's_countryCode'=>$request->s_countryCode,            
            'password' => Hash::make($request->input('password')),
            'activity'=>0
        ]);

        if (isset($request->roles) && !empty($request->roles))
            $newUser=$newUser->syncRoles($request->roles);

        
        // if (isset($request->permissions) && !empty($request->permissions))
        //     $newUser=$newUser->givePermissionTo($request->permissions);


        if($newUser){
            $verifyUser = VerifyUser::create([
            'user_id' => $newUser->id,
            'token' => mt_rand(1000, 999999),
            ]);
          
            $message=("Your Verification code is: $verifyUser->token \n Thank you \n IT Team (SLMS)");

                if(isset($newUser->phone)){
                  (SendSms($newUser->phone,$message));
                }

            Mail::to($newUser->email)->send(new VerifyMail($newUser));

            DB::commit();
            session()->flash('warning_message', __('Please Verify Your Account'));

            return redirect()->route('verifyUser',$newUser->email);
        }else{
            DB::rollBack();
            session()->flash('error_message', __('Failed! To Create Account'));
            return redirect()->back();

        }
        
        
    
    }

     public function verifyUser($token)
    {
        $email= $token;
        
        return view('_layouts.admin.verifyUser',compact('email'));

       
    }


    public function VerifyMailUser(Request $request){
       
        $user=User::where('email',$request->email)->first();
        if(!$user){
             session()->flash('error_message', __('Sorry your Account cannot be identified.'));
            return redirect('/admin/login')->with('warning', "Sorry your email cannot be identified.");
        }
         $verifyUser = VerifyUser::where('token', $request->token)->where('user_id',$user->id)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->status) {
                $verifyUser->user->status = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            session()->flash('error_message', __('Sorry your Account cannot be identified.'));
            return redirect('/admin/login');
        }
        session()->flash('success_message', __('Thanks For Verification! Now wait for Approval by admin'));
        return redirect('/admin/login')->with('status', $status);
    }
}

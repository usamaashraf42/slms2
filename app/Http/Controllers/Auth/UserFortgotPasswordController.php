<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Password;
use Carbon\Carbon;
use App\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Session;
class UserFortgotPasswordController extends Controller
{
    public function token_create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user){
            session()->flash('forgot_danger', 'Record not found');
             return redirect()->back()->withInput($request->only('email', 'remember'));
        }


        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email], [
            'email' => $user->email,
            'token' => Str::random(60)
        ]);
        
        if ($user && $passwordReset){
            if($passwordReset->token){

            	$emails = $user->email;
	            Mail::send('emails.userForgotPasswordMail', ['data'=>$passwordReset,'user'=>$user], function($message) use ($emails) {    
	                $message->to($emails)->subject('Forgot Password');    
	            });
                session()->flash('forgot_success_message', 'Email send successfully, please check email');
             }else{
                session()->flash('forgot_success_message', 'Email send successfully, please check email');
               
             }
        }else{
                session()->flash('forgot_danger', 'Ops! You have no account');
        }
        return redirect()->back();
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('_layouts.admin.auth.reset-user')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function find_account_detail($token)
    {
        $passwordReset =PasswordReset::where('token', $token)->first();
        $token=$token;
        if (!$passwordReset){
            $status= 'success';
            $message='Oh! our Email session has been expire. again forgot password';
        }else{

            if(Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
                $passwordReset->delete();
                $status= 'danger';
                $message= 'Your Email session has been expire. again forgot password';
            }else{
                $status= 'success';
                $message='Now you can update password';
            }
        }
        
        return view('auth.admin_password_reset', compact('passwordReset','status' ,'message','token'));
    }

    public function reset(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);

        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
 
        if (!$passwordReset){
            session()->flash('error_message', 'Ops! Record not update');
        }else{
             $user = User::where('email', $request->email)->first();

            if (!$user){
            	session()->flash('error_message', 'Ops! Record not Found');
                return redirect()->back();
            }

            $user->password = Hash::make($request->password);
            $user->pwd = ($request->password);
            $update_user=$user->save();
            $user = User::where('email', $request->email)->first();

            $passwordReset->delete();

            User::where('email', $request->email)->update(['status'=>1]);
            if($update_user){
                 session()->flash('success_message', 'Your Password Update successfully');
            }else{
            	 session()->flash('error_message', 'Ops! Record not update');
            }
        }

        return redirect()->route('admin.login');
    }
}

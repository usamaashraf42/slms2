<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function login(Request $request)
    {
        // dd($request->all());

        $this->validateLogin($request);

        $Verify=User::where('email',$request->email)->where('pwd',$request->password)->first();
        if(isset($Verify) && ($Verify->activity==0)){

          session()->flash('warning_message', 'Oops! Your Account Not Approved by Admin');
          return redirect()->route('verifyUser',$Verify->email);
          return redirect()->back()->withInput($request->only('email', 'remember'));
        }


        // If the class is using the ThrottlesLogins trait, we can automatically throttle

        // the login attempts for this application. We'll key this by the username and

        // the IP address of the client making these requests into this application.......


        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

              session()->flash('success_message', "Welcome".' '. Auth::user()->name );
             return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}

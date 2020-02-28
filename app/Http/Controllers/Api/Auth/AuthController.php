<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Http\Resources\UserResource;
// use App\Http\Resources\DignosticQuestionResourceCollection;

use App\Models\User;
use Validator;
use Auth;
use DB;
class AuthController extends Controller
{
	public function login(Request $request){
		// Log::info('Topic wise question: '.json_encode($request->all()));
		$validator = Validator::make($request->all(), [
			'email'=>'required',
			'password' => 'required',
			'device_token'=>'required'
		]);    
		if ($validator->fails())
		{
			$status = 0;
			$message = $validator->errors()->first();
			return response()->json(['status'=>$status,'message'=>$message], 200);
		}else{
			$user=User::where('email',$request->email)->where('pwd',$request->password)->first();

			if(isset($user) && !empty($user)){
				User::where('id',$user->id)->update(['device_token'=>$request->device_token]);
				
				$obj= new UserResource($user);
				$status = 1;
				$message = 'user has been successfully login.';
				return response()->json(['status'=>$status,'message'=>$message,'data'=>$obj], 200);
			}else{
				$status = 0;
				$message = 'Invalid Credentials';
				return response()->json(['status'=>$status,'message'=>$message], 200);
			}
			
		}
	}

	public function logout()
	{
		$user = User::where('id', Auth::guard('api')->id())->update(array('timeout'=> now()));

		if($user){
			$status = 1;
			$message = "'user has been successfully logout.";
			return response()->json(['status'=>$status,'message'=>$message], 200);
		}
		else{
			$status = 0;
			$message = "no record found";
			return response()->json(['status'=>$status,'message'=>$message], 200);
		}
	}


	public function forgotton(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'required_without:phone|min:6' ,
			'phone' => 'required_without:email|min:6',
		]);    
		if ($validator->fails())
		{
			$status = 1;
			$message = $validator->errors()->first();
			return response()->json(['status'=>$status,'message'=>$message], 200);
		}
		else
		{
			if(isset($request->email) && !empty($request->email))
			{
				$user = User::select('api_token')->where(['email' => $request->email])->first();
			}
			else if(isset($request->phone) && !empty($request->phone))
			{
				$user=User::select('api_token')->where(['phone' => $request->phone])->first();
			}
			else{
				$status = 0;
				$message = "Email/Phone is not matched.";
				return response()->json(['status'=>$status,'message'=>$message], 200);
			}
			if(isset($user) && !empty($user))
			{
				$status = 1;
				$message = 'Enter new password.';
				return response()->json(['status'=>$status,'message'=>$message, 'user'=>$user], 200);
			}

		}
	}
}

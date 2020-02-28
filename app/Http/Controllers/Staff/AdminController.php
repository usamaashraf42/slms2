<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Branch;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use App\Mail\ApprovalMail;
use App\Models\VerifyUser;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Models\School;
use DB;
use Auth;
class AdminController extends Controller
{
    function __construct()
    {
       // $this->middleware('role_or_permission:Admin Record', ['only' => ['index']]);
       // $this->middleware('role_or_permission:Admin-Create', ['only' => ['create','store']]);
       // $this->middleware('role_or_permission:Admin-Edit', ['only' => ['edit','update']]);

   }
   public function index()
   {
      $user=User::orderBy('id','DESC')->with('roles')->where('status',1);
      if(Auth::user()->branch_id){
        $user->where('branch_id',Auth::user()->branch_id);
    }
    if(Auth::user()->school_id){
        $user->where('school_id',Auth::user()->school_id);
    }
    $staff=$user->get();




    return view('admin.staff.admin.index',compact('staff'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$roles=Role::get();
    	$permissions=Permission::get();
       $branche=Branch::where('status',1);
       if(Auth::user()->school_id){
        $branche->where('school_id',Auth::user()->school_id);
       }
       if(Auth::user()->branch_id){
        $branche->where('id',Auth::user()->branch_id);
       }
        $branches=$branche->get();
       $school=School::orderBy('id','ASC');
       if(Auth::user()->school_id){
        $school->where('id',Auth::user()->school_id);
       }
       $schools=$school->get();
       return view('admin.staff.admin.create',compact('permissions','roles','branches','schools'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

    	// dd($request->all());
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
      'school_id' => $request->school_id,
      'images'=>isset($profile)?$profile:'no-image.png',
      'api_token'=> Str::random(60),
      'status'=>1,
      'userType'=>'admin',
      'password' => Hash::make($request->input('password')),
  ]);

     if (isset($request->roles) && !empty($request->roles))
      $newUser=$newUser->syncRoles($request->roles);
  if (isset($request->permissions) && !empty($request->permissions))
      $newUser=$newUser->givePermissionTo($request->permissions);


  if($newUser){

    DB::commit();

    $verifyUser = VerifyUser::create([
     'user_id' => $newUser->id,
     'token' => mt_rand(1000, 999999)
 ]);

    Mail::to($newUser->email)->send(new VerifyMail($newUser));
    session()->flash('success_message', __('Record Inserted Successfully'));
}else{
  DB::rollBack();
  session()->flash('error_message', __('Failed! To Insert Record'));

}

return redirect()->route('staff.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
    	$roles=Role::get();
    	$permissions=Permission::get();
       $branche=Branch::where('status',1);
       if(Auth::user()->school_id){
        $branche->where('school_id',Auth::user()->school_id);
       }
       if(Auth::user()->branch_id){
        $branche->where('id',Auth::user()->branch_id);
       }
        $branches=$branche->get();
       $school=School::orderBy('id','ASC');
       if(Auth::user()->school_id){
        $school->where('id',Auth::user()->school_id);
       }
       $schools=$school->get();
       $user=User::find($id);
       if(!$user){
          session()->flash('error_message', __('Failed! Record not found'));
          return redirect()->back();
      }
      $banks=Bank::get();
      return view('admin.staff.admin.edit',compact('roles','permissions','user','branches','banks','schools'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        // dd($request->all());

        $user = User::find($id);
        if(!$user){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
        $input=$request->except('_token','_method','roles','password','password_confirmation','description','submit','permissions','logo','banks','school_name','account_no','address');
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/staff/', $profile);
            $input['images']=isset($profile)?$profile:'no-image.png';
        }

        if($request->password){
          $input['pwd']=$request->password;
          $input['password'] = Hash::make($request->input('password'));
        }
        $newUser=User::where('id',$id)->update($input);

        $permissions = $user->getDirectPermissions();
        if($request->permission){
            foreach ($permissions as $permission){
              if($user->hasPermissionTo($permission)){
                  $user->revokePermissionTo($permission);
              }
            }
        }
        

        $roles = Role::all();
        if($request->roles){
          foreach ($roles as $role){
              if($user->hasRole($role)){
                  $user->removeRole($role);
              }
          }
        }
        


        if (isset($request->roles) && !empty($request->roles))
            $user->syncRoles($request->roles);
        if (isset($request->permissions) && !empty($request->permissions))
            $user->syncPermissions($request->permissions);
          
        $emp=Employee::where('emp_id',$request->emp_id)->first();
        if($emp){
          Employee::where('emp_id',$request->emp_id)->update(['user_id'=>$id]);
        }

        if($newUser)
            session()->flash('success_message', __('Record update Successfully'));
        else
            session()->flash('error_message', __('Record not update'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
    public function deleteAdmin(Request $request)
    {
    	try {
    		$allInputs = $request->all();
    		$id = $request->input('id');

    		$validation = Validator::make($allInputs, [
    			'id' => 'required'
    		]);
    		if ($validation->fails()) {
    			$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
    		} else {

    			$deleteItem =User::find($id);

    			if(isset($deleteItem->activity)){
    				$deleteItem->activity=$deleteItem->activity==1?0:1;
    				$statusChange=$deleteItem->save();

                    Mail::to($deleteItem->email)->send(new ApprovalMail($deleteItem));
                    // $message="Dear : $deleteItem->name \r\n"."Account Status\r\n"."Active"." \r\n"."Role Approved: ".isset($deleteItem->roles)?roleImplode($deleteItem->roles):''."\r\n"."Branch: ".isset($deleteItem->branch->branch_name)?$deleteItem->branch->branch_name:''.''. "\r\n".''."For any further information send email at web@americanlyceum.com  Web Portal Administrator, \r\n American Lyceum International School, \r\n Email: web@americanlyceum.com \r\n www.americanlyceum.com\r\n";


                    if(isset($deleteItem->phone) && !empty(isset($deleteItem->phone)) ){

                        if(isset($deleteItem->phone)){
                           // (SendSms($deleteItem->phone,$message));
                        }
                    }

                }


                if (isset($statusChange) && !empty($statusChange)) {
                    $response = (new ApiMessageController())->saveresponse("Data Update Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to Update Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
          $response = (new ApiMessageController())->queryexception($ex);
      }

      return $response;
  }

  public function updateCourse(Request $request)
  {
   try {
      $updateItem = Course::where('id',$request->id)->update($request->except('_token','_method'));

      if ($updateItem) {
         $response = (new ApiMessageController())->saveresponse("Data Updated Successfully");
     } else {
         $response = (new ApiMessageController())->failedresponse("Failed to update Data");
     }
 } catch (\Illuminate\Database\QueryException $ex) {
  $response = (new ApiMessageController())->queryexception($ex);
}

return $response;
}
}

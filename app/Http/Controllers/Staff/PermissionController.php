<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

use App\Models\User;
use DB;

class PermissionController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Permission Record', ['only' => ['index']]);
         $this->middleware('role_or_permission:Permission Add', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Permission Edit', ['only' => ['edit','update']]);
         
    }
    public function index()
    {
        $permissions=Permission::orderBy('id','DESC')->get();
        return view('admin.staff.permission.index',compact('permissions'));
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
        return view('admin.staff.permission.create',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
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
            'images'=>isset($profile)?$profile:'no-image.png',
            'api_token'=> Str::random(60),
            // 'verified_code'=> rand(100000,999999),
            'password' => Hash::make($request->input('password')),
        ]);

        if (isset($request->roles) && !empty($request->roles))
            $newUser=$newUser->syncRoles($request->roles);
        if (isset($request->permissions) && !empty($request->permissions))
            $newUser=$newUser->givePermissionTo($request->permissions);


        if($newUser){

            DB::commit();

            // $verifyUser = VerifyUser::create([
            //  'user_id' => $newUser->id,
            //  'token' => sha1(time()),
            // ]);

            // Mail::to($newUser->email)->send(new VerifyMail($newUser));
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
        $user=User::find($id);
        if(!$user){
            session()->flash('error_message', __('Failed! Record not found'));
            return redirect()->back();
        }

        return view('admin.staff.permission.edit',compact('roles','permissions','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
        $input=$request->except('_token','_method','roles','password','password_confirmation','description','submit','permissions');
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/staff/', $profile);
            $input['images']=isset($profile)?$profile:'no-image.png';
        }
       $newUser=User::where('id',$id)->update($input);

        $permissions = $user->getDirectPermissions();
        foreach ($permissions as $permission){
            if($user->hasPermissionTo($permission)){
                $user->revokePermissionTo($permission);
            }
        }

        $roles = Role::all();
        foreach ($roles as $role){
            if($user->hasRole($role)){
                $user->removeRole($role);
            }
        }


        if (isset($request->roles) && !empty($request->roles))
            $user->syncRoles($request->roles);
        if (isset($request->permissions) && !empty($request->permissions))
            $user->syncPermissions($request->permissions);


        if($newUser)
            session()->flash('success_message', __('messages.success_curd', ['name' => 'user','action'=>'updated']));
        else
            session()->flash('error_message', __('messages.fail_curd', ['name' => 'user','action'=>'updated']));
        return redirect()->route('staff.index');
    }

    public function destroy($id)
    {
        //
    }
    public function deleteCourse(Request $request)
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

                $deleteItem =Course::find($id);

                if(isset($deleteItem->status)){
                    $deleteItem->status=$deleteItem->status==1?0:1;
                    $statusChange=$deleteItem->save();
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

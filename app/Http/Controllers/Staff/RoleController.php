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
use App\Models\User;
use DB;
class RoleController extends Controller
{

    function __construct()
    {
         $this->middleware('role_or_permission:Role Record');
         $this->middleware('role_or_permission:Role-Create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Role-Edit', ['only' => ['edit','update']]);
         $this->middleware('role_or_permission:Role-Delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles=Role::orderBy('id','DESC')->get();
        return view('admin.staff.role.index',compact('roles'));
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
        return view('admin.staff.role.create',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validation = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validation->fails()) {
             session()->flash('error_message', __('Name Field is required'));
            return redirect()->back();
        } else {
          $saveProject=Role::create($request->except('permissions'));

          if (isset($request->permissions) && !empty($request->permissions))
            $saveProject->syncPermissions($request->permissions);

            if ($saveProject) {
                session()->flash('success_message', __('Record insert Successfully'));
            }else{
                session()->flash('error_message', __('Failed! Record not found'));
            }
        }

        
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions=Permission::get();

        if(!$role){
            session()->flash('error_message', __('Failed! Record not found'));
            return redirect()->back();
        }

        return view('admin.staff.role.edit',compact('role','permissions'));
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

        $role = Role::find($id);
        if(!$role){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'role']));
            return redirect(route('admin.role.index'));
        }

        $permissions = Permission::all();
        foreach ($permissions as $permission){
            if($role->hasPermissionTo($permission)){
                $role->revokePermissionTo($permission);
            }
        }

        // remove the this role from all roles.
        if (isset($request->permissions) && !empty($request->permissions))
            $role->syncPermissions($request->permissions);

        $affected = $role->update(['name' => $request->name]);

        if($affected)
            session()->flash('success_message', __('messages.success_curd', ['name' => 'user','action'=>'updated']));
        else
            session()->flash('error_message', __('messages.fail_curd', ['name' => 'user','action'=>'updated']));
        return redirect()->route('role.index');
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

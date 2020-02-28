<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployeeSalary;
use App\Models\EmployeeDesignation;
use Illuminate\Support\Str;
use App\Models\BranchEmployeeDepartment;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeShift;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\User;
use Auth;
use DB;
class EmployeeController extends Controller
{
    function __construct()
    {
       $this->middleware('role_or_permission:Employee Record', ['only' => ['index']]);
       $this->middleware('role_or_permission:Employee Add', ['only' => ['create','store']]);
       $this->middleware('role_or_permission:Employee Edit', ['only' => ['edit','update']]);


       $this->middleware('role_or_permission:Active Employee Record', ['only' => ['activeEmployeeSearch']]);
       $this->middleware('role_or_permission:Left Employee Record', ['only' => ['leftEmployeeSearch']]);

       $this->middleware('role_or_permission:Employee Statement', ['only' => ['statement']]);

   }
   public function index()
   {
      $users=Employee::orderBy('branch_id','ASC')->with('branch','desig')->whereHas('branch');
      if(Auth::user()->branch_id){
        $users->where('branch_id',Auth::user()->branch_id);
    }
    if(Auth::user()->school_id){
        $users->where('school_id',Auth::user()->school_id);
    }

    $employees=$users->get();

     $branche=Branch::orderBy('id',"ASC");
       if(Auth::user()->branch_id){
        $branche->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
        $branche->where('school_id',Auth::user()->school_id);
        }

    $branches=$branche->get();
    $roles=Role::get();
    $permissions=Permission::get();

// dd($employees);

    return view('admin.Hr.employee.index',compact('employees','branches','roles','permissions'));
}


 public function activeEmployeeSearch(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $b_id=$request->branch_id;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        // return $b_id;
        $records = Employee::orderBy('branch_id','ASC')->orderBy('emp_id','DESC')->where('status',1)->where('branch_id',$request->branch_id);
            if(Auth::user()->branch_id){
                $records->where('branch_id',Auth::user()->branch_id);
            }
            if($request->branch_id){
              // return $request->branch_id;
                $records->where('branch_id',$request->branch_id);
            }
        $records->has('branch')->with('branch','desig')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
// return $request->branch_id;
        if(!empty($search)){
           

            $records->whereHas('branch', function ($query) use ($search,$b_id){
              $query->where('branch_name', 'like', "%{$search}%")->where('id',$b_id);
            });
            $records->where('name', 'like', "%{$search}%")
            ->orWhere('emp_id','like',"%{$search}%")
            ->orWhere('fname','like',"%{$search}%")
            ->orWhere('email','like',"%{$search}%")
            ->orWhere('mobile','like',"%{$search}%")
            ->orWhere('images','like',"%{$search}%")
            ->orWhere('status','like',"%{$search}%");
            // ->orWhere('branch_id','like',"%{$search}%");
            // return $records->get();
            
        }
        $data = $records->get();
        $totalFiltereds = Employee::where('status',1)->whereHas('branch');
            if(Auth::user()->branch_id){
                $totalFiltereds->where('branch_id',Auth::user()->branch_id);
            }
            if($request->branch_id){
                $totalFiltereds->where('branch_id',$request->branch_id);
            }

        $totalFiltered =$totalFiltereds->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }
     public function leftEmployeeSearch(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Employee::orderBy('branch_id','ASC')->orderBy('emp_id','DESC')->where('status',0)->has('branch')->with('branch','desig')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
          if(Auth::user()->branch_id){
                $records->where('branch_id',Auth::user()->branch_id);
            }
            if($request->branch_id){
                $records->where('branch_id',$request->branch_id);
            }

        if(!empty($search)){

            $records->whereHas('branch', function ($query) use ($search){
              // return $query->get();
              $query->where('branch_name', 'like', "%{$search}%");
                });
            $records->orWhere('name', 'like', "%{$search}%")
            ->orWhere('emp_id','like',"%{$search}%")
            ->orWhere('fname','like',"%{$search}%")
            ->orWhere('email','like',"%{$search}%")
            ->orWhere('mobile','like',"%{$search}%")
            ->orWhere('images','like',"%{$search}%")
            ->orWhere('status','like',"%{$search}%")
            ->orWhere('branch_id','like',"%{$search}%");

        }
        $data = $records->get();
            // return $data;
        $totalFiltered = Employee::where('status',0)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }
   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $branche=Branch::orderBy('id',"ASC");
       if(Auth::user()->branch_id){
        $branche->where('id',Auth::user()->branch_id);
    }
     if(Auth::user()->school_id){
        $branche->where('school_id',Auth::user()->school_id);
    }

    $branches=$branche->get();
    $roles=Role::get();
    $permissions=Permission::get();
     $designations=EmployeeDesignation::get();
          $departments=EmployeeDepartment::get();
          $shifts=EmployeeShift::get();





    return view('admin.Hr.employee.create',compact('branches','roles','permissions','designations','departments','shifts'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
      // session()->flash('error_message', __('Employee Registeration is blocked'));
      // return redirect()->route('employee.index');


    	if($request->hasfile('images')){
    		$Extension_profile = $request->file('images')->getClientOriginalExtension();
    		$profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
    		$request->file('images')->move('images/staff/', $profile);
    	}
     DB::beginTransaction();
     $newUser=Employee::create([
      'name' => $request->name,
      'fname' => $request->fname?$request->fname:'',
      'email' => $request->email,
      'mobile' => $request->phone,
      'id_no' => $request->id_no,
      // 'pwd'=>$request->password,
      'branch_id' => $request->branch_id,
      'dep_id' => $request->dep_id,
      'shift_id' => $request->shift_id,
      'images'=>isset($profile)?$profile:'no-image.png',
      // 'api_token'=> str_random(60),
      // 'userType'=>'employee',
    		// 'verified_code'=> rand(100000,999999),
      // 'password' => Hash::make($request->input('password')),
      'DOB'=>$request->dob?date("Y-m-d", strtotime($request->dob)):date("Y-m-d"),
      'date_join'=>$request->joiningdate?date("Y-m-d", strtotime($request->joiningdate)):date("Y-m-d"),
      'degreein_education' => $request->qualification,
      'designation_Code' => $request->designation,
      'address' => $request->address,
      'salary'=>$request->salary,
      'status'=>1,
      // 'activity'=>1
  ]);

  //    if (isset($request->roles) && !empty($request->roles))
  //     $newUser=$newUser->syncRoles($request->roles);
  // if (isset($request->permissions) && !empty($request->permissions))
  //     $newUser=$newUser->givePermissionTo($request->permissions);


  if($newUser){

   $EmployeeSalary=EmployeeSalary::create([
    'employee_id'=>$newUser->id, 
    'monthly_salary'=>$request->monthly_salary, 
    'daily'=>round($request->monthly_salary?$request->monthly_salary/30:1/30), 
    'insurance'=>$request->total_insurance, 
    'total_insurance'=>$request->total_insurance, 
    'total_insurance_install'=>$request->total_insurance_install, 
    'pf'=>$request->pf, 
    'ta'=>$request->ta,
    'medical'=>$request->medical, 
    'house_rent'=>$request->house_rent, 
    'transport'=>$request->transport, 
    'mobile'=>$request->mobile, 
    'total_advance'=>$request->total_advance, 
    'advance_install'=>$request->advance_install, 
    'total_adv_installment'=>$request->total_adv_installment, 
    'allow_leaves'=>$request->allow_leaves, 
    'total_annual_leave'=>$request->total_annual_leave, 
    'annual_leave'=>$request->total_annual_leave, 
    'created_by'=>Auth::user()->id, 
    'updated_by'=>Auth::user()->id
  ]);

   if($EmployeeSalary){
    DB::commit();
    session()->flash('success_message', __('Record Inserted Successfully'));
}else{
    DB::rollBack();
    session()->flash('error_message', __('Failed! To Insert Record'));
}



    		// $verifyUser = VerifyUser::create([
    		// 	'user_id' => $newUser->id,
    		// 	'token' => sha1(time()),
    		// ]);

    		// Mail::to($newUser->email)->send(new VerifyMail($newUser));

}else{
  DB::rollBack();
  session()->flash('error_message', __('Failed! To Insert Record'));

}

return redirect()->route('employee.index');
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
       $branches=Branch::get();
       $user=Employee::where('emp_id',$id)->first();
       if(!$user){
          session()->flash('error_message', __('Failed! Record not found'));
          return redirect()->back();
      }
          $designations=EmployeeDesignation::get();
          $departments=BranchEmployeeDepartment::where('branch_id',$user->branch_id)->get();
          $shifts=EmployeeShift::where('branch_id',$user->branch_id)->get();


      return view('admin.Hr.employee.edit',compact('roles','permissions','user','branches','designations','departments','shifts'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = Employee::where('emp_id',$id)->first();
        if(!$user){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
        // $input=$request->except('_token','_method','roles','password','password_confirmation','description','submit','permissions','joiningdate');
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/staff/', $profile);
            $input['images']=isset($profile)?$profile:'no-image.png';
        }

        if($request->joiningdate){
            $input['date_join']=$request->joiningdate?date("Y-m-d", strtotime($request->joiningdate)):date("Y-m-d");
        }


        $input['name'] = $request->name?$request->name:$user->name;
        $input['fname'] = $request->fname?$request->fname:$user->fname;
        $input['email'] = $request->email?$request->email:$user->email;
        $input['mobile'] = $request->phone?$request->phone:$user->mobile;
        $input['branch_id'] = $request->branch_id?$request->branch_id:$user->branch_id;
        $input['shift_id'] = $request->shift_id?$request->shift_id:$user->shift_id;
        $input['dep_id'] = $request->dep_id?$request->dep_id:$user->dep_id;


        $input['DOB']=$request->dob?date("Y-m-d", strtotime($request->dob)):$user->DOB;
        $input['degreein_education'] = $request->qualification?$request->qualification:$user->degreein_education;
        $input['designation_Code'] = $request->designation?$request->designation:$user->designation_Code;
        $input['address'] = $request->address?$request->address:$user->address;
        $input['updated_by'] = Auth::user()->id;
        $input['salary'] = $request->salary?$request->salary:$user->salary;

        $newUser=Employee::where('emp_id',$id)->update($input);


        $salary=EmployeeSalary::where('employee_id',$id)->first();
        if($salary){
            EmployeeSalary::where('employee_id',$id)->update([
                'monthly_salary'=>$request->monthly_salary?$request->monthly_salary:$salary->monthly_salary, 
                'daily'=>round($request->monthly_salary?$request->monthly_salary/30:$salary->daily), 
                'insurance'=>$request->total_insurance?$request->total_insurance:$salary->insurance, 
                'total_insurance'=>$request->total_insurance?$request->total_insurance:$salary->total_insurance, 
                'total_insurance_install'=>$request->total_insurance_install?$request->total_insurance_install:$salary->total_insurance_install, 
                'pf'=>$request->pf?$request->pf:$salary->pf, 
                'ta'=>$request->ta?$request->ta:$salary->ta, 
                'medical'=>$request->medical?$request->medical:$salary->medical, 
                'house_rent'=>$request->house_rent?$request->house_rent:$salary->house_rent, 
                'transport'=>$request->transport?$request->transport:$salary->transport, 
                'mobile'=>$request->mobile?$request->mobile:$salary->mobile, 
                'total_advance'=>$request->total_advance?$request->total_advance:$salary->total_advance, 
                'advance_install'=>$request->advance_install?$request->advance_install:$salary->advance_install, 
                'total_adv_installment'=>$request->total_adv_installment?$request->total_adv_installment:$salary->total_adv_installment, 
                'allow_leaves'=>$request->allow_leaves?$request->allow_leaves:$salary->allow_leaves, 
                'total_annual_leave'=>$request->total_annual_leave?$request->total_annual_leave:$salary->total_annual_leave, 
                'annual_leave'=>$request->total_annual_leave?$request->total_annual_leave:$salary->total_annual_leave, 
                'updated_by'=>Auth::user()->id
            ]);
        }else{
            $EmployeeSalary=EmployeeSalary::create([
                'employee_id'=>$id, 
                'monthly_salary'=>$request->monthly_salary, 
                'daily'=>round($request->monthly_salary?($request->monthly_salary/30):1/30), 
                'insurance'=>$request->total_insurance, 
                'total_insurance'=>$request->total_insurance, 
                'total_insurance_install'=>$request->total_insurance_install, 
                'pf'=>$request->pf, 
                'ta'=>$request->ta, 
                'medical'=>$request->medical, 
                'house_rent'=>$request->house_rent, 
                'transport'=>$request->transport, 
                'mobile'=>$request->mobile, 
                'total_advance'=>$request->total_advance, 
                'advance_install'=>$request->advance_install, 
                'total_adv_installment'=>$request->total_adv_installment, 
                'allow_leaves'=>$request->allow_leaves, 
                'total_annual_leave'=>$request->total_annual_leave, 
                'annual_leave'=>$request->total_annual_leave, 
                'created_by'=>Auth::user()->id, 
                'updated_by'=>Auth::user()->id
            ]);
        }
        


        if($newUser)
            session()->flash('success_message', __('messages.success_curd', ['name' => 'user','action'=>'updated']));
        else
            session()->flash('error_message', __('messages.fail_curd', ['name' => 'user','action'=>'updated']));
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        //
    }
    public function EmployeeStatusChange(Request $request)
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
    			$deleteItem =Employee::where('emp_id',$id)->first();
    		
    				$effected['status']=$deleteItem->status==1?0:1;
    				$statusChange=Employee::where('emp_id',$id)->update($effected);
    			


    			if (isset($statusChange) && !empty($statusChange)) {
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


    public function statement($id){
      $employee=Employee::where('emp_id',$id)->first();
      // dd($employee);
      return view('admin.Hr.employee.statement',compact('employee'));
    }



    public function completeEmployee(){
      $employees=Employee::orderBy('branch_id','ASC')->has('branch')->get();
      // dd($employees);
      return view('admin.Hr.employee.empoyeePdf',compact('employees'));
      // dd($employees);
    }
}

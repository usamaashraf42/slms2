<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeDesignationRequest;
use App\Models\EmployeeDesignation;
use App\Models\Branch;
use App\Models\BranchEmployeeDepartment;
use App\Models\EmployeeDepartment;
use App\Models\DepartmentDesignation;
use App\Models\EmployeeShift;
use Auth;
class DepartmentShiftController extends Controller
{

	function __construct()
	{
		// $this->middleware('role_or_permission:Branch Record', ['only' => ['index','getList']]);
		// $this->middleware('role_or_permission:Branch-Create', ['only' => ['create','store']]);
		// $this->middleware('role_or_permission:Branch-Edit', ['only' => ['edit','update']]);

	}
	public function index(){

		$shift=EmployeeShift::where('status',1);
		if(Auth::user()->branch_id){
			$shift->where('branch_id',Auth::user()->branch_id);
		}
		$shifts=$shift->get();
		// dd($shifts);
		return view('admin.Hr.departmentShift.index',compact('shifts'));
	}


	public function SearchAjax(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = EmployeeDesignation::offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);

		if(!empty($search)){

			$records->where('branch_id', 'like', "%{$search}%")
			->orWhere('dep_id','like',"%{$search}%");
			
		}
		$data = $records->get();
        // return $data;
		$totalFiltered = EmployeeDesignation::count();
		$json_data = array(
			"draw"      => intval($request->input('draw')),
			"recordsTotal"  => count($data),
			"recordsFiltered" => intval($totalFiltered),
			"data"      => $data
		);

		return response()->json($json_data, 200);
	}


	public function create(Request $request){
		$branches=Branch::where('status',1)->get();
		$departments=EmployeeDepartment::where('status',1)->get();
		return view('admin.Hr.departmentShift.create',compact('branches','departments'));

	}

	public function store(Request $request){
		// dd(date("H:i:s", strtotime($request->start_time)));
		// dd($request->all());
// `branch_id`, `dep_id`, `title`, `start_time`, `relaxation_start_time`, `relaxation_end_time`, `end_time`, `created_by`

		foreach ($request->branch_ids as $branch) {

			$branch=EmployeeShift::create([
				'title'=>$request->title,
				'branch_id'=>$branch,
				'start_time'=>date("H:i:s", strtotime($request->start_time)),
				'relaxation_start_time'=>date("H:i:s", strtotime($request->relaxation_start_time)),
				'relaxation_end_time'=>date("H:i:s", strtotime($request->end_time)),
				'end_time'=>date("H:i:s", strtotime($request->relaxation_end_time)),
				'created_by'=>Auth::user()->id,
			]);
		}
		


		
		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('department-shift.index'));
	}
	public function edit($id){
		$design=EmployeeDesignation::find($id);
		$departments=EmployeeDepartment::where('status',1)->get();
		if(!$design){
			Session::flash('error_message',  'Record failed to inserted');
			return redirect(route('department-shift.index'));
		}
		return View('admin.Hr.departmentShift.edit',compact('design','departments'));
	}

	public function destroy($id)	
	{

		$branch = EmployeeShift::find($id);
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('department-shift.index'));
		}

		if($branch->delete())
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('department-shift.index');


	}
}

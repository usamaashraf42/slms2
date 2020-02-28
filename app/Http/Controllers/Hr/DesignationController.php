<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeDesignationRequest;
use App\Models\EmployeeDesignation;
use App\Models\Branch;
use App\Models\BranchEmployeeDepartment;
use App\Models\EmployeeDepartment;
use App\Models\DepartmentDesignation;
use Auth;


class DesignationController extends Controller
{
	function __construct()
	{
		// $this->middleware('role_or_permission:Branch Record', ['only' => ['index','getList']]);
		// $this->middleware('role_or_permission:Branch-Create', ['only' => ['create','store']]);
		// $this->middleware('role_or_permission:Branch-Edit', ['only' => ['edit','update']]);

	}
	public function index(){

		return view('admin.Hr.designation.index');
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
		return view('admin.Hr.designation.create',compact('branches','departments'));

	}
	public function store(EmployeeDesignationRequest $request){
// dd($request->all());
		$branch=EmployeeDesignation::create([
			'designation'=>$request->designation,
		]);


		if(isset($request->dep_ids) && $request->dep_ids){
			if(count($request->dep_ids)){
				$branch->department_designations()->delete();
				foreach($request->dep_ids as $bank){
					\App\Models\DepartmentDesignation::create([
						'dep_id'=>$bank,
						'desg_id'=>$branch->id
					]);
				}

			}
		}		


		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('designation.index'));
	}
	public function edit($id){
		$design=EmployeeDesignation::find($id);
		$departments=EmployeeDepartment::where('status',1)->get();
		if(!$design){
			Session::flash('error_message',  'Record failed to inserted');
			return redirect(route('designation.index'));
		}
		return View('admin.Hr.designation.edit',compact('design','departments'));
	}

	public function update(Request $request, $id)
	{
    	// dd($request->all());

		$branch = EmployeeDesignation::find($id);
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('designation.index'));
		}

		$affected=EmployeeDesignation::where('id',$id)->update([
			'designation'=>$request->designation?$request->designation:$branch->designation,
			
		]);
		$branch->department_designations()->delete();
		if(isset($request->dep_ids) && $request->dep_ids){
			
			if(count($request->dep_ids)){
				
				foreach($request->dep_ids as $bank){
					\App\Models\DepartmentDesignation::create([
						'dep_id'=>$bank,
						'desg_id'=>$branch->id
					]);
				}

			}
		}


		


		if($affected)
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('designation.index');


	}
}

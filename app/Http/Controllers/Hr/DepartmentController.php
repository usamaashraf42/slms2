<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeDepartmentRequest;
use App\Models\EmployeeDepartment;
use App\Models\Branch;
use App\Models\BranchEmployeeDepartment;
use Auth;


class DepartmentController extends Controller
{
	function __construct()
	{
		// $this->middleware('role_or_permission:Branch Record', ['only' => ['index','getList']]);
		// $this->middleware('role_or_permission:Branch-Create', ['only' => ['create','store']]);
		// $this->middleware('role_or_permission:Branch-Edit', ['only' => ['edit','update']]);

	}
	public function index(){

		return view('admin.Hr.department.index');
	}


	public function SearchAjax(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = EmployeeDepartment::with('EmployeeDepartmentBranch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


		// if(Auth::user()->branch_id){
		// 	$records->where('id',Auth::user()->branch_id);
		// }
		

		if(!empty($search)){

			$records->where('branch_id', 'like', "%{$search}%")
			->orWhere('dep_id','like',"%{$search}%");
			
		}
		$data = $records->get();
        // return $data;
		$totalFiltered = EmployeeDepartment::count();
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

		return view('admin.Hr.department.create',compact('branches'));

	}
	public function store(EmployeeDepartmentRequest $request){
// dd($request->all());
		$branch=EmployeeDepartment::create([
			'dep_name'=>$request->dep_name,

			'e_off_fine'=>$request->e_off_fine,
			'late_fine'=>$request->late_fine,
			'leave_fine'=>$request->leave_fine,
			'absent_fine'=>$request->absent_fine,

			'start_time'=>date("H:i:s", strtotime($request->start_time)),
			'relaxation_start_time'=>date("H:i:s", strtotime($request->relaxation_start_time)),
			'relaxation_end_time'=>date("H:i:s", strtotime($request->end_time)),
			'end_time'=>date("H:i:s", strtotime($request->relaxation_end_time)),
		]);


		if(isset($request->branch_ids) && $request->branch_ids){
			if(count($request->branch_ids)){
				$branch->EmployeeDepartmentBranch()->delete();
				foreach($request->branch_ids as $bank){
					\App\Models\BranchEmployeeDepartment::create([
						'dep_id'=>$branch->id,
						'branch_id'=>$bank
					]);
				}

			}
		}		


		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('department.index'));
	}
	public function edit($id){
		$branch=Branch::where('status',1);

		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->s_countryCode){
			$branch->where('b_countryCode',Auth::user()->s_countryCode);
		}
		if(Auth::user()->school_id){
			$branch->where('school_id',Auth::user()->school_id);
		}
		$branches=$branch->get();


		$department=EmployeeDepartment::find($id);
		if(!$department){
			Session::flash('error_message',  'Record failed to inserted');
			return redirect(route('department.index'));
		}
		return View('admin.Hr.department.edit',compact('department','branches'));
	}

	public function update(Request $request, $id)
	{
    	dd($request->all());

		$branch = EmployeeDepartment::find($id);
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('department.index'));
		}

		$affected=EmployeeDepartment::where('id',$id)->update([
			'dep_name'=>$request->dep_name?$request->dep_name:$branch->dep_name,

			'e_off_fine'=>$request->e_off_fine,
			'late_fine'=>$request->late_fine,
			'leave_fine'=>$request->leave_fine,
			'absent_fine'=>$request->absent_fine,

			
			'start_time'=>date("H:i:s", strtotime($request->start_time)),
			'relaxation_start_time'=>date("H:i:s", strtotime($request->relaxation_start_time)),
			'relaxation_end_time'=>date("H:i:s", strtotime($request->end_time)),
			'end_time'=>date("H:i:s", strtotime($request->relaxation_end_time)),
		]);


		if(isset($request->branch_ids) && $request->branch_ids){
			if(count($request->branch_ids)){
				$branch->EmployeeDepartmentBranch()->delete();
				foreach($request->branch_ids as $bank){
					\App\Models\BranchEmployeeDepartment::create([
						'dep_id'=>$id,
						'branch_id'=>$bank
					]);
				}

			}
		}


		if($affected)
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('department.index');


	}
}

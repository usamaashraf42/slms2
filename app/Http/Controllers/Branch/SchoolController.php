<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\Course;
use App\Models\School;
use App\Models\Branch;
use Session;
use Auth;
class SchoolController extends Controller
{
	function __construct()
	{
		$this->middleware('role_or_permission:School Record', ['only' => ['index','SearchAjax']]);
		$this->middleware('role_or_permission:School-Create', ['only' => ['create','store']]);
		$this->middleware('role_or_permission:School-Edit', ['only' => ['edit','update']]);

	}
	public function index(){
		$schools=School::get();
		return view('admin.branch.school.index',compact('schools'));
	}


	public function SearchAjax(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = Branch::offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


		if(Auth::user()->branch_id){
			$records->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->s_countryCode){
			$records->where('b_countryCode',Auth::user()->s_countryCode);
		}
		if(Auth::user()->school_id){
			$records->where('school_id',Auth::user()->school_id);
		}



		if(!empty($search)){

			$records->where('branch_name', 'like', "%{$search}%")
			->orWhere('mangerName','like',"%{$search}%")
			->orWhere('b_contactPerson','like',"%{$search}%")
			->orWhere('b_emil','like',"%{$search}%")
			->orWhere('status','like',"%{$search}%");

		}
		$data = $records->get();
        // return $data;
		$totalFiltered = Branch::count();
		$json_data = array(
			"draw"      => intval($request->input('draw')),
			"recordsTotal"  => count($data),
			"recordsFiltered" => intval($totalFiltered),
			"data"      => $data
		);

		return response()->json($json_data, 200);
	}


	public function create(Request $request){
		$branches=Branch::get();
		return view('admin.branch.school.create',compact('branches'));

	}
	public function store(SchoolRequest $request){
		// dd($request->all());

		if($request->hasfile('school_logo')){
			$Extension_school_logo = $request->file('school_logo')->getClientOriginalExtension();
			$school_logo = 'school_logo'.'_'.date('YmdHis').'.'.$Extension_school_logo;
			$request->file('school_logo')->move('images/school_logo/', $school_logo);
		}

		$school=School::create([
			'school_name'=>$request->school_name,
			'school_email'=>$request->school_email,
			'address'=>$request->address,
			'school_phone_no'=>$request->school_phone_no,
			'sch_tel_no'=>$request->sch_tel_no,
			'sch_cheif_name'=>$request->sch_cheif_name,
			'school_logo'=>isset($school_logo)?$school_logo:'no-image.png',
			'school_status'=>1,
			'created_by'=>Auth::id(),
			'updated_by'=>Auth::id(),
		]);


		if(isset($request->branches) && count($request->branches)){
			foreach ($request->branches as $ids) {
				$bra=Branch::find($ids);
				if($bra){
					$bra->school_id=$school->id;
					$bra->save();

				}
			}
		}




		if(!$school){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('school.index'));
	}
	public function edit($id){
		$school = School::find($id);
		$branches=Branch::get();
		if(!$school){
			Session::flash('error_message',  'Record not found');
			return redirect(route('school.index'));
		}
		return View('admin.branch.school.edit',compact('school','branches'));
	}

	public function update(Request $request, $id)
	{
		// dd($request->all());


		$school = School::find($id);
		if(!$school){
			Session::flash('error_message',  'Record not found');
			return redirect(route('school.index'));
		}

		if($request->hasfile('school_logo')){
			$Extension_school_logo = $request->file('school_logo')->getClientOriginalExtension();
			$school_logo = 'school_logo'.'_'.date('YmdHis').'.'.$Extension_school_logo;
			$request->file('school_logo')->move('images/school_logo/', $school_logo);
		}

		$school=School::where('id',$id)->update([
			'school_name'=>$request->school_name?$request->school_name:$school->school_name,
			'school_email'=>$request->school_email?$request->school_email:$school->school_email,
			'address'=>$request->address?$request->address:$school->address,
			'school_phone_no'=>$request->school_phone_no?$request->school_phone_no:$school->school_phone_no,
			'sch_tel_no'=>$request->sch_tel_no?$request->sch_tel_no:$school->sch_tel_no,
			'sch_cheif_name'=>$request->sch_cheif_name?$request->sch_cheif_name:$school->sch_cheif_name,
			'school_logo'=>isset($school_logo)?$school_logo:$school->school_logo,
			'updated_by'=>Auth::id(),
		]);


		if(isset($request->branches) && count($request->branches)){
			foreach ($request->branches as $ids) {
				$bra=Branch::find($ids);
				if($bra){
					$bra->school_id=$id;
					$bra->save();

				}
			}
		}




		if(!$school){
			Session::flash('error_message', 'Failed to inserted ');
			return redirect()->back();

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
			return redirect(route('school.index'));
		}

		


	}


}

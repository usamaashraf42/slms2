<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Models\ExamType;
use App\Models\Exam;
use App\Models\Branch;
use App\Models\Subject;
use Session;
use Auth;
class ExamController extends Controller
{

	function __construct()
    {
        $this->middleware('role_or_permission:DateSheet Record', ['only' => ['index']]);
        $this->middleware('role_or_permission:DateSheet Add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:DateSheet Edit', ['only' => ['edit','update']]);

    }


	public function index(){
		$exams=Exam::get();
		return view('admin.exam.exam.index',compact('exams'));
	}


	public function SearchAjax(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = ExamType::with('parent')->orderBy('id','ASC')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
		if(!empty($search)){

			$records->where('term', 'like', "%{$search}%")
			->orWhere('status','like',"%{$search}%");

		}
		$data = $records->get();
        // return $data;
		$totalFiltered = ExamType::count();
		$json_data = array(
			"draw"      => intval($request->input('draw')),
			"recordsTotal"  => count($data),
			"recordsFiltered" => intval($totalFiltered),
			"data"      => $data
		);

		return response()->json($json_data, 200);
	}


	public function create(Request $request){
		$categories=ExamType::where('parent_id',null)->get();
		$subjects=Subject::get();
		$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
		return view('admin.exam.exam.create',compact('categories','subjects','branches'));

	}
	public function store(ExamRequest $request){
		$tempArray=array();
// dd($request->all());
		for($i=0; $i<count($request->course_id); $i++){
			$course=array();
			$course['branch_id']=$request->branch_id;
			$course['course_id']=$request->course_id[$i];
			$course['exam_type_id']=$request->exam_sub_id?$request->exam_sub_id:$request->term_id;
			$course['term_id']=$request->term_id;
			$course['section_id']=$request->section_id[$i];
			$course['sub_id']=$request->sub_id[$i];
			$course['max_mark']=$request->max_mark[$i];
			$course['exam_date']=date("Y-m-d", strtotime($request->start_time[$i]));
			$course['start_time']=date("Y-m-d h:i:s", strtotime($request->start_time[$i]));
			$course['end_time']=date("Y-m-d h:i:s", strtotime($request->start_time[$i]));
			$course['created_by']=Auth::user()->id;
			$course['updated_by']=Auth::user()->id;
			$tempArray[]=$course;
			
		}
		$customer=Exam::insert($tempArray);
		if(!$customer){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('exam.index'));
	}
	public function edit($id){
		$category = ExamType::find($id);
		$categories=ExamType::get();
		if(!$category){
			Session::flash('error_message',  'Record failed to inserted');
			return redirect(route('exam-category.index'));
		}
		return View('admin.account.examCategory.edit',compact('category','categories'));
	}

	public function update(Request $request, $id)
	{

		$customer = ExamType::find($id);
		if(!$customer){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('exam-category.index'));
		}

		$request->request->add([
			'last_updated_by'=>Auth::id()
		]);
		$data= $request->all();

		$affected = $customer->update($data);

		if($affected)
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('exam-category.index');


	}
}

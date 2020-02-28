<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamTypeRequest;
use App\Models\ExamType;
use Session;
use Auth;
class ExamCategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Exam Category Record', ['only' => ['index']]);
        $this->middleware('role_or_permission:Exam Category Add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Exam Category Edit', ['only' => ['edit','update']]);

    }
    public function index(){
    	$categories=ExamType::get();
    	return view('admin.exam.examCategory.index',compact('categories'));
    }


    public function ExamTypeCategory(Request $request){
        $types=ExamType::where('parent_id',$request->id)->get();
        if(count($types)){
            return response()->json(['status'=>1,'data'=>$types]);
        }else{
            return response()->json(['status'=>1,'data'=>'Record not found']);
        }
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
        return view('admin.exam.examCategory.create',compact('categories'));

    }
    public function store(ExamTypeRequest $request){
        $request->request->add([
            'created_by'=>Auth::id(),
            'updated_by'=>Auth::id(),
        ]);

        $customer=ExamType::create($request->all());

        if(!$customer){
            Session::flash('error_message', 'Failed to inserted ');
           
        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
        }

            return redirect(route('exam-category.index'));
    }
    public function edit($id){
        $category = ExamType::find($id);
        $categories=ExamType::get();
        if(!$category){
            Session::flash('error_message',  'Record failed to inserted');
            return redirect(route('exam-category.index'));
        }
        return View('admin.exam.examCategory.edit',compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        
        $customer = ExamType::find($id);
        if(!$customer){
            Session::flash('error_message',  __('messages.Record not found'));
            return redirect(route('exam-category.index'));
        }

   
        $data= $request->all();

        $affected = $customer->update($data);

        if($affected)
            session()->flash('success_message', "Record update Successfully");
        else
            session()->flash('error_message', 'failed! To update');

        return redirect()->route('exam-category.index');


    }
}

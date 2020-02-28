<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Branch;
use App\Models\AdmissionQuery;
use App\Models\User;
use Auth;


class QueryController extends Controller
{
   public function index(){

   

        $users=Branch::orderBy('id','ASC');
        
        $branches=$users->get();
        $courses=Course::where('status',1)->where('parentId','<=',0)->get();
        $queries=AdmissionQuery::where('status',1)->orderBy('id','DESC')->get();
    	return view('admin.Query.query.index',compact('branches','courses','queries'));
    }


    public function create(){

    	$users=Branch::orderBy('id','DESC');
        if(Auth::user()->branch_id){
            $users->where('id',Auth::user()->branch_id);
        }

        $branches=$users->get();

        $categories=MaintenanceCategory::where('parent_id',null)->get();
    	return view('admin.maintenance.maintaince.create',compact('branches','categories'));
    }

    public function store(Request $request){
    	
        
    	$query=AdmissionQuery::create([
            'school_id'=>$request->school_id,
            'branch_id'=>$request->branch_id,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'contact_no'=>$request->phone_no,
            'course_id'=>$request->course_id,
            'address'=>$request->address,
            'remarks'=>$request->remarks,
            'reference_by'=>$request->type,
            'query_on'=>date('Y-m-d'),
            'created_by'=>Auth::user()->id,
            'status'=>1
        ]);
    	if(!$query){
            Session::flash('error_message', 'Failed to register query');
           
        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
        }

            return redirect(route('query.index'));
    }

    

    public function closedQueries(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = AdmissionQuery::where('status',0)->with('queryBy','grade','branch','followUps','closedBy')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('name', 'like', "%{$search}%")
            ->orWhere('status','like',"%{$search}%")
            ->orWhere('remarks','like',"%{$search}%")
            ->orWhere('id','like',"%{$search}%")
            ->orWhere('father_name','like',"%{$search}%")
            ->orWhere('contact_no','like',"%{$search}%");

        }
        $data = $records->get();
            // return $data;
        $totalFiltered = AdmissionQuery::where('status',0)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }

    public function followUP($id){
        $id=$id;

        $query=AdmissionQuery::find($id);
        
        return view('admin.Query.query.followup',compact('query','id'));
    }

    public function edit($id){
        $query=AdmissionQuery::find($id);

        if(!($query)){
           Session::flash('error_message', 'Failed to register query');
           return redirect()->back();
        }
        $users=Branch::orderBy('id','ASC');
        
        $branches=$users->get();
        $courses=Course::where('status',1)->where('parentId','<=',0)->get();
        return view('admin.Query.query.edit',compact('branches','courses','query'));
        

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());


        $school = AdmissionQuery::find($id);
        if(!$school){
            Session::flash('error_message',  'Record not found');
            return redirect(route('query.index'));
        }

        

        $school=AdmissionQuery::where('id',$id)->update([
            'school_id'=>$request->school_id,
            'branch_id'=>$request->branch_id,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'contact_no'=>$request->phone_no,
            'course_id'=>$request->course_id,
            'address'=>$request->address,
            'remarks'=>$request->remarks,
            'reference_by'=>$request->type,
        ]);

        if(!$school){
            Session::flash('error_message', 'Failed to inserted ');
            return redirect()->back();

        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
            return redirect(route('query.index'));
        }

    }


    public function followUpRemarks(Request $request){
        $follow=AdmissionQuery::create([
            'follow_up'=>$request->follow_up,
            'parent_id'=>$request->parent_id,
            'created_by'=>Auth::user()->id
        ]);
        if(!$follow){
            Session::flash('error_message', 'Failed to inserted ');
            

        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
        }
        return redirect()->back();
    }


    public function queryClosed(Request $request){
        // return $request->all();
        $school = AdmissionQuery::find($request->id);
        if(!$school){
            return response()->json(['status'=>1,'data'=>'Record not found']);
        }


        $school->status=0;

        if($school->save()){
            return response()->json(['status'=>1]);
        }else{
            return response()->json(['status'=>0]);
        }
    }
}

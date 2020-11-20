<?php

namespace App\Http\Controllers\admins\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MaintainceRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\MaintenanceCategory;
use App\Models\MaintenanceUsers;
use App\Models\Maintenance;
use App\Models\Branch;
use App\Models\User;
use Auth;
use DOMPDF;

class MaintenanceListController extends Controller{
	
	function __construct()
    {
         $this->middleware('role_or_permission:Maintaince-lists', ['only' => ['index','getList']]);
   
    }
    public function index(){

    	$maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',1);

    	$maintenances=$maintenance->get();

        $branches=Branch::where('status',1)->get();
         $categories=MaintenanceCategory::where('parent_id',null)->get();
          $users=User::orderBy('id','ASC')->where('maintain_type',1)->where('status',1)->where('activity',1);
        if(Auth::user()->branch_id){
            $users->where('branch_id',Auth::user()->branch_id);
        }


        $employees=$users->get();
    	return view('admin.maintenance.list.index',compact('maintenances','branches','categories','employees'));

    }

    public function store(Request $request){

        $maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category');

        if($request->branch_id){
            $maintenance->where('branch_id',$request->branch_id);
        }
        if($request->emp_id){
            $maintenance->where('user_id',$request->emp_id);
        }


        if(isset($request->type_id) ){
            $maintenance->where('main_status',$request->type_id);
        }
        

        if($request->cat_id){
            $maintenance->where('main_id',$request->cat_id);
        }

        $records=$maintenance->get();




        $records=['records'=>$records];


        view()->share('employee',$records);



        $pdf = DOMPDF::setOptions([
                'isHtml5ParserEnabled' => true, 
                'isRemoteEnabled' => true,
                'isJavascriptEnabled'=>true,
                'debugCss'=>true,
                'logOutputFile' => storage_path('logs/log.html'),
                'tempDir' => storage_path('logs/'),
                'isPhpEnabled'=>true
            ])->loadView('admin.maintenance.list.maintenanceListPdf',$records);

        $pdf->setPaper('A4', 'landscape');
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ]
            ])
        );  

        return $pdf->stream('BLIS-fee-challan.pdf');


    }


    public function maintenceList(Request $request){
// return $request->all();
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Maintenance::with('assignUser','subcategory','category','branch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(isset($request->type_id) ){
            $records->where('main_status',$request->type_id);
        }
         if($request->branch_id){
            $records->where('branch_id',$request->branch_id);
        }
        if($request->emp_id){
            $records->where('user_id',$request->emp_id);
        }

        if($request->cat_id){
            $records->where('main_id',$request->cat_id);
        }

        if(!empty($search)){

            $records->where('main_id', 'like', "%{$search}%")
            ->orWhere('status','like',"%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere('id','like',"%{$search}%")
            ->orWhere('user_id','like',"%{$search}%")
            ->orWhere('branch_id','like',"%{$search}%");

        }
        $data = $records->get();
            // return $data;
        $totalFiltereds= Maintenance::orderBy('id','DESC');
       
         if(isset($request->type_id) ){
            $records->where('main_status',$request->type_id);
        }
         if($request->branch_id){
            $records->where('branch_id',$request->branch_id);
        }
        if($request->emp_id){
            $records->where('user_id',$request->emp_id);
        }

        if($request->cat_id){
            $records->where('main_id',$request->cat_id);
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
}

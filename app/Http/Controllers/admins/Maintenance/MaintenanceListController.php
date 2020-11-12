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

class MaintenanceListController extends Controller
{
	
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

        $maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',1);
        if($request->branch_id){
            $maintenance->where('branch_id',$request->branch_id);
        }

        // if($request->cat_id){
        //     $maintenance->where('main_id',$request->cat_id);
        // }
        if($request->emp_id){
            $maintenance->where('user_id',$request->emp_id);
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
}

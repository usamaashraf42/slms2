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
class MaintenanceListController extends Controller
{
	
	function __construct()
    {
         $this->middleware('role_or_permission:Maintaince-lists', ['only' => ['index','getList']]);
   
    }
    public function index(){

    	$maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',1);

    	$maintenances=$maintenance->get();
    	return view('admin.maintenance.list.index',compact('maintenances'));

    }
}

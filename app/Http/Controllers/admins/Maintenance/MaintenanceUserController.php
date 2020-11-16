<?php

namespace App\Http\Controllers\admins\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\MaintenanceCategory;
use App\Models\MaintenanceUsers;
use App\Models\User;
use Auth;
class MaintenanceUserController extends Controller
{
    public function index(){
    	$categories=MaintenanceCategory::with('main_users','maintain_childrens')->where('parent_id',null)->get();
//    	 dd($categories);

    	 $mains=MaintenanceCategory::orderBy('id','DESC')->get();

        $users=User::orderBy('id','DESC');
        if(Auth::user()->branch_id){
            $users->where('branch_id',Auth::user()->branch_id);
        }

        $employees=$users->get();

    	return view('admin.maintenance.userMaintain.index',compact('categories','mains','employees'));
    }
}

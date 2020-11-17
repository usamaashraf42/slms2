<?php

namespace App\Http\Controllers\admins\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


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
use Storage;
use File;

class MaintenanceController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Maintaince Category Record', ['only' => ['index','getList']]);

         $this->middleware('role_or_permission:Maintainces Create', ['only' => ['create','store']]);

         $this->middleware('role_or_permission:Pending Maintainces', ['only' => ['edit','update']]);
         $this->middleware('role_or_permission:Resolved Maintainces', ['only' => ['maintainceResolved']]);
         $this->middleware('role_or_permission:Approval Maintainces', ['only' => ['approvedMaintaince']]);
         
    }

    public function index(){

    	$maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',1)->get();
        $approved_maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',2)->get();
        $resolved_maintenance=Maintenance::orderBy('branch_id','ASC')->with('assignUser','category.maintain_category')->where('main_status',0)->get();
        $users=Branch::orderBy('id','ASC');
        if(Auth::user()->branch_id){
            $users->where('id',Auth::user()->branch_id);
        }

        $branches=$users->get();
        $categories=MaintenanceCategory::where('parent_id',null)->get();
    	// dd($maintenance);
    	return view('admin.maintenance.maintaince.index',compact('maintenance','resolved_maintenance','approved_maintenance','branches','categories'));
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
    	
// main_id`, `branch_id`, `user_id`, `type`, `description`, `remarks`, `created_by`, images
        
        // if($request->hasfile('images')){
        //     $Extension_profile = $request->file('images')->getClientOriginalExtension();
        //     $profile = 'maintenance'.'_'.date('YmdHis').'.'.$Extension_profile;
        //     $request->file('images')->move('images/maintenance/', $profile);
        // }
        if($request->hasfile('images')){
            $image = $_FILES['images'];

            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $imageRandomName = $request->name.'_'.'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $imageType = $_FILES['images']['type'];

            $target_dir = 'images/maintenance/';
            if ( !file_exists( $target_dir ) ) {
              mkdir( $target_dir, 0777, true );
            }
            $target_file = $target_dir . basename( $imageRandomName );
            $input['image']=$imageRandomName;

            if ( move_uploaded_file($image["tmp_name"], $target_file ) ) {
              $filesizeonserver = filesize($target_file);
              $times = 0;
              if($filesizeonserver > 350000){
                do{
                  clearstatcache(); 
                  $resized = $this->resizeImage($target_file, 0.05, $imageType);
                  $filesizeonserver = filesize($target_file);

                  $times++;    
                } while ($filesizeonserver > 350000);

              }
            }

            $fullPathToTeacherProfile = public_path('images/maintenance/');
            $fullPathToTeacherProfile=$fullPathToTeacherProfile.$imageRandomName;
            $filename = $imageRandomName;
            $fileData = File::get($fullPathToTeacherProfile);
            Storage::disk('job')->put($filename, $fileData);

            if (is_file($fullPathToTeacherProfile)){
              unlink($fullPathToTeacherProfile);
            }
            $profile=getJobProfilePath($imageRandomName);
        }


    	$maintaince=Maintenance::create([
            'user_id'=>$request->user_id,
            'branch_id'=>$request->branch_id,
            'description'=>$request->description,
            'type'=>$request->type,
            'posted_date'=>date('Y-m-d'),'created_by'=>Auth::user()->id,
            'main_id'=>$request->cat_id,
            'sub_cat_id'=>$request->sub_id,
            'images'=>isset($profile)?$profile:'no-image.png',
        ]);
    	if(!$maintaince){
            Session::flash('error_message', 'Request not register please try again ');
           
        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
        }

            return redirect(route('maintenance.index'));
    }

    public function maintainSubCategory(Request $request){
    	$cats=MaintenanceCategory::where('parent_id',$request->id)->get();
    	if(count($cats)){
    		return response()->json(['status'=>1,'message'=>'Record found','data'=>$cats]);
    	}else{
    		return response()->json(['status'=>0,'message'=>'Record not found']);
    	}
    }

    public function maintainceSearch(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Maintenance::where('main_status',1)->with('assignUser','category.maintain_category','branch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
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
        $totalFiltered = Maintenance::where('main_status',1)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }

    public function maintainceApprovedSearch(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Maintenance::where('main_status',2)->with('assignUser','category.maintain_category','branch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
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
        $totalFiltered = Maintenance::where('main_status',2)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }

    public function maintainceNeedApprovalSearch(Request $request){
           $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Maintenance::where('main_status',5)->with('assignUser','category.maintain_category','branch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
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
        $totalFiltered = Maintenance::where('main_status',5)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }

    public function maintainceResolvedSearch(Request $request){
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Maintenance::where('main_status',0)->with('assignUser','category.maintain_category','branch')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
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
        $totalFiltered = Maintenance::where('main_status',0)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);

    }

    public function maintainceUser(Request $request){
    	$cats=MaintenanceCategory::where('id',$request->id)->with('main_users.user')->first();
    	if(count($cats->main_users)){
    		return response()->json(['status'=>1,'message'=>'Record found','data'=>$cats->main_users]);
    	}else{
    		return response()->json(['status'=>0,'message'=>'Record not found']);
    	}
    }

    public function maintenanceTransferToHigherLevel(Request $request){
        $cats=Maintenance::where('id',$request->id)->first();
        if($cats){
            

            Maintenance::where('id',$request->id)->update(['main_status'=>5,'updated_by'=>Auth::user()->id]);


            try{
                
                $emailsData=['mmanager@americanlyceum.edu.pk','tnadeem@americanlyceum.com'];

                if(isset($cats->assignUser->email) && $cats->assignUser->email){
                    if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                        array_push($emailsData,$cats->assignUser->email);
                    }
                }

                $dataRecord=  Mail::send('emails.maintenance.maintenanceRequestApproval', ['data'=>$cats], function($message) use ($emailsData) {
                    $message->to($emailsData)->subject('Maintenance request for approval');
                });

            }
         
            catch(\Exception $e){

            }
       

            return response()->json(['status'=>1,'message'=>'Record found']);
        }else{
            return response()->json(['status'=>0,'message'=>'Record not found']);
        }
    }

    public function maintainceResolved(Request $request ){
        $cats=Maintenance::where('id',$request->id)->first();
        if($cats){
            Maintenance::where('id',$request->id)->update(['main_status'=>2,'updated_by'=>Auth::user()->id]);
            try{
                
                $emailsData=['mmanager@americanlyceum.edu.pk','tnadeem@americanlyceum.com'];

                if(isset($cats->branch->email) && $cats->branch->email){
                    if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                        array_push($emailsData,$cats->branch->email);
                    }
                }

                $dataRecord=  Mail::send('emails.maintenance.maintenanceResolved', ['data'=>$cats], function($message) use ($emailsData) {
                    $message->to($emailsData)->subject('Maintenance issue has been resolved');
                });

            }
         
            catch(\Exception $e){

            }

            return response()->json(['status'=>1,'message'=>'Record found']);
        }else{
            return response()->json(['status'=>0,'message'=>'Record not found']);
        }
    }
    public function approvedMaintaince(Request $request){
        // return $request->all();
        $cats=Maintenance::where('id',$request->id)->first();
        if($cats){
            Maintenance::where('id',$request->id)->update(['main_status'=>0,'remarks'=>$request->remarks,'updated_by'=>Auth::user()->id]);
            return response()->json(['status'=>1,'message'=>'Record found']);
        }else{
            return response()->json(['status'=>0,'message'=>'Record not found']);
        }
    }

    public function approvedMaintainceHighLevel(Request $request){
        $cats=Maintenance::where('id',$request->id)->first();
        if($cats){
            Maintenance::where('id',$request->id)->update(['main_status'=>1,'updated_by'=>Auth::user()->id]);
            try{
                
                $emailsData=['mmanager@americanlyceum.edu.pk','tnadeem@americanlyceum.com'];

                if(isset($cats->branch->email) && $cats->branch->email){
                    if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                        array_push($emailsData,$cats->branch->email);
                    }
                }

                $dataRecord=  Mail::send('emails.maintenance.maintenanceApproved', ['data'=>$cats], function($message) use ($emailsData) {
                    $message->to($emailsData)->subject('Maintenance approval request approved');
                });

            }
         
            catch(\Exception $e){

            }
            return response()->json(['status'=>1,'message'=>'Record found']);
        }else{
            return response()->json(['status'=>0,'message'=>'Record not found']);
        }

    }


}

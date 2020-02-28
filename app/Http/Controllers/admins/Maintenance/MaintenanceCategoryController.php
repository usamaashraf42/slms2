<?php

namespace App\Http\Controllers\admins\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SectionRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\MaintenanceCategory;
use App\Models\MaintenanceUsers;
use App\Models\User;
use Auth;
class MaintenanceCategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Maintaince Category Record', ['only' => ['index','getList']]);
         $this->middleware('role_or_permission:Maintaince Category-Create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Maintaince Category-Edit', ['only' => ['edit','update']]);
         
    }
    
    public function index()
    {
        $categories=MaintenanceCategory::orderBy('id','DESC')->with('maintain_category','main_users')->get();
        $mains=MaintenanceCategory::orderBy('id','DESC')->get();
        $users=User::orderBy('id','ASC');
        if(Auth::user()->branch_id){
            $users->where('branch_id',Auth::user()->branch_id);
        }

        $employees=$users->get();
        // dd($employees);
        return view('admin.maintenance.category.index',compact('categories','mains','employees'));
    }

    public function getList()
    {
        $response = array();
        try {
            $sectionList = MaintenanceCategory::orderBy('id', 'DESC')->where('status', 1)->get();
            if (count($sectionList) > 0) {
                $response = (new ApiMessageController())->successResponse($sectionList, "List Found");
            } else {
                $response = (new ApiMessageController())->failedresponse("No List Found");
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);

        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

            $savemain = MaintenanceCategory::create($request->except('_token','users'));
            if ($savemain) {
            	if(isset($request->users)){
            		foreach ($request->users as $user) {
            		      MaintenanceUsers::create(['user_id'=>$user,'main_id'=>$savemain->id]);
            	    }
            	}
            	
                $response = (new ApiMessageController())->saveresponse("Data Saved Successfully");
            } else {

                $response = (new ApiMessageController())->failedresponse("Failed to save data");
            }
            return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        try {

            $mains=MaintenanceCategory::orderBy('id','DESC')->get();
            $users=User::orderBy('id','DESC');
            if(Auth::user()->branch_id){
                $users->where('branch_id',Auth::user()->branch_id);
            }

            $employees=$users->get();
            $category=MaintenanceCategory::find($id);
            return view('admin.maintenance.category.edit',compact('mains','employees','category'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        //
    }
    public function deleteMaintenanceCategory(Request $request)
    {
        try {
            $allInputs = $request->all();
            $id = $request->input('id');

            $validation = Validator::make($allInputs, [
                'id' => 'required'
            ]);
            if ($validation->fails()) {
                $response = (new ApiMessageController())->validatemessage($validation->errors()->first());
            } else {
               
                $deleteItem =MaintenanceCategory::where('id', $id)->update([
                    'status' => 0
                ]);

                if ($deleteItem) {
                    $response = (new ApiMessageController())->saveresponse("Data Deleted Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to delete Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }

    public function updateMainCategory(Request $request)
    {
        try {

            $category=MaintenanceCategory::where('id',$request->id)->first();
            if($category){
                $updateItem = MaintenanceCategory::where('id',$request->id)->update($request->except('_token','_method','users'));

                if ($updateItem) {
                    if(isset($request->users)){
                        $category->main_users()->delete();
                        foreach ($request->users as $user) {
                              MaintenanceUsers::create(['user_id'=>$user,'main_id'=>$request->id]);
                        }
                    }
                }


                if ($updateItem) {
                    $response = (new ApiMessageController())->saveresponse("Data Updated Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to update Data");
                }
            }else {
                    $response = (new ApiMessageController())->failedresponse("Failed to update Data");
            }
                
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }
}

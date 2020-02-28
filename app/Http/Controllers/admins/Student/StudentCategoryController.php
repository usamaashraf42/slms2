<?php

namespace App\Http\Controllers\admins\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentCategory;
class StudentCategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Student Category Record', ['only' => ['index']]);
         $this->middleware('role_or_permission:Student Category Add', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Student Category Edit', ['only' => ['edit','update']]);
         
    }
    public function index()
    {
        $category=StudentCategory::orderBy('id','DESC')->where('status',1)->get();
        return view('admin.student.category.index',compact('category'));
    }

    public function getList()
    {
        $response = array();
        try {
            $sectionList = StudentCategory::orderBy('id', 'DESC')->where('status', 1)->get();
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

            $savesection = StudentCategory::create($request->except('_token'));
            if ($savesection) {
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

            $data = StudentCategory::find($id);
            return view('admin.student.category.edit',compact('data'));
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
    public function deleteCategory(Request $request)
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
               
                $deleteItem =StudentCategory::where('id', $id)->update([
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

    public function updateCategory(Request $request)
    {
        try {
                $updateItem = StudentCategory::where('id',$request->id)->update($request->except('_token','_method'));

                if ($updateItem) {
                    $response = (new ApiMessageController())->saveresponse("Data Updated Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to update Data");
                }
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }
}

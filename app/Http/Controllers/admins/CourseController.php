<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('role_or_permission:Class Record', ['only' => ['index','getList']]);
         $this->middleware('role_or_permission:Class-Create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Class-Edit', ['only' => ['edit','update']]);
         
    }

    public function index()
    {
        $course=Course::orderBy('id','DESC')->get();
        return view('admin.course.index',compact('course'));
    }

    public function getList()
    {
        $response = array();
        try {
            $courseList = Course::orderBy('id', 'DESC')->where('status', 1)->get();
            if (count($courseList) > 0) {
                $response = (new ApiMessageController())->successResponse($courseList, "List Found");
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
    public function store(CourseRequest $request)
    {

            $saveCourse = Course::create($request->except('_token'));
            if ($saveCourse) {
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

            $data = Course::find($id);
            return view('admin.course.edit',compact('data'));
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
    public function deleteCourse(Request $request)
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

                $deleteItem =Course::find($id);
                
                if(isset($deleteItem->status)){
                    $deleteItem->status=$deleteItem->status==1?0:1;
                    $statusChange=$deleteItem->save();
                }

                
                if (isset($statusChange) && !empty($statusChange)) {
                    $response = (new ApiMessageController())->saveresponse("Data Update Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to Update Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }

    public function updateCourse(Request $request)
    {
        try {
                $updateItem = Course::where('id',$request->id)->update($request->except('_token','_method'));

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

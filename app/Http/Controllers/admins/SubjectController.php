<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubjectRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;

class SubjectController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Subject Record', ['only' => ['index','getList']]);
         $this->middleware('role_or_permission:Subject-Create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Subject-Edit', ['only' => ['edit','update']]);
         
    }
    public function index()
    {
        $subject=Subject::orderBy('id','DESC')->get();
        return view('admin.subject.index',compact('subject'));
    }

    public function getList()
    {
        $response = array();
        try {
            $subjectList = Subject::orderBy('id', 'DESC')->where('status', 1)->get();
            if (count($subjectList) > 0) {
                $response = (new ApiMessageController())->successResponse($subjectList, "List Found");
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
    public function store(SubjectRequest $request)
    {

            $saveSubject = Subject::create($request->except('_token'));
            if ($saveSubject) {
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

            $data = Subject::find($id);
            return view('admin.subject.edit',compact('data'));
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
               
                $deleteItem =Subject::where('id', $id)->update([
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

    public function updateCourse(SubjectRequest $request)
    {
        try {
                $updateItem = Subject::where('id',$request->id)->update($request->except('_token','_method'));

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

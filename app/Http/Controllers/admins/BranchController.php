<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BranchCourse;
use App\Models\Course;
use App\Models\Student;
use App\Models\Branch;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function branchHasClass(Request $request){
       $accounts =BranchCourse::orderBy('course_id','ASC')->where('branch_id',$request->id)->with('course');

      $data=$accounts->get();
        if(count($data)){
            $status = true;
            return response()->json($data, 200);
        }else{
             return response()->json($data, 200);
        }
    }


     public function branchHasClassDd(Request $request){
       $accounts =BranchCourse::orderBy('course_id','ASC')->where('branch_id',$request->id)->with('course');

       $filter = $request->input('q');
       if ( ! empty( $filter ) ) {
            $accounts->where('branch_id', 'like', "%{$filter}%")
                ->orWhere('course_id','like',"%{$filter}%");

            $accounts->orWhereHas('grade', function ($query) use ($filter){
                $query->where('grade_name', 'like', "%{$filter}%")
                ->orWhere('grade_code', 'like', "%{$filter}%")
                ->orWhere('computer_fee', 'like', "%{$filter}%");
            });
        }

       
      $data=$accounts->get();
        if(count($data)){
            $status = true;
            return response()->json($data, 200);
        }else{
             return response()->json($data, 200);
        }
    }

    public function classHasStudent(Request $request){

        $student=Student::select('id','s_name','s_fatherName','admission_date','is_active')->where('course_id',$request->course_id)->where('branch_id',$request->branch_id)->where('is_active',1)->get();
       
        if($student){
            return response()->json($student, 200);
        }else{
            $message='Record not found';
             return response()->json($message, 200);
        }
    }
}

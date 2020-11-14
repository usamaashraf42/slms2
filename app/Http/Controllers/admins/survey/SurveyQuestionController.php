<?php

namespace App\Http\Controllers\admins\survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\surveyQuestionValidation;
use App\Models\Month;
use App\Models\Year;
use App\SurveyCategory;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyQuestionController extends Controller
{
    public function index()
    {
        $categorys =SurveyCategory::all();
        $months =Month::all();
        $years =Year::all();
       $survey_questions= SurveyQuestion::all();
        return view('admin\survey\question\index',compact('categorys','survey_questions'));
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
    public function store(surveyQuestionValidation $request){
//dd($request->month);
        $categories=SurveyQuestion::create([
            'question'=>$request->question?$request->question:null,
            'category_id'=>$request->category_id?$request->category_id:null,
            'question_type'=>$request->question_type?$request->question_type:null,
            'parent_id'=>Auth::user()->id,
            'created_by'=>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);
        if($categories)
            return response()->json(['status'=>200]);
        else
            return response()->json(['message'=>'Category not added']);


//        return redirect()->route('survey_category.index');

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
        $months =Month::all();
        $years =Year::all();
        $questions = SurveyQuestion::find($id);
        $categorys =SurveyCategory::all();
        if(!$questions){
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
//        return view('admin.OnlineSchool.TimeTablePeriods.edit_new',compact('periods'));
        $html=view('admin.survey.question.edit',compact('questions','categorys'))->render();
        return response()->json(['status'=>true,'contentHtml'=>$html,'message'=>'data not found']);
    }
    public function update(Request $request)
    {
//         dd($request->category_id);
//        $validator = Validator::make($request->all(), [
//            'f_name'=>'required',
////            'email' => 'required|email|unique:teachers,email,'.Auth::guard('teacher')->user()->id,
//            'email' => 'required|email|unique:teachers,email,'.Auth::guard('teacher')->user()->id,
//        ]);
//        if ($validator->fails()) {
//            return back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//        else {
        $question = SurveyQuestion::where('id', $request->question_id)->first();
        $question->question = $request->question;
        $question->question_type = $request->question_type;
        $question->category_id = $request->category_id;
        $question->created_by = Auth::user()->id;
        $question->updated_by = Auth::user()->id;
        $question_updated= $question->save();
        if($question_updated)
        {
            return response()->json(['status'=>true, 'message'=>'Question update Successfully'], 200);
        }
        else{

            return response()->json(['status'=>false, 'message'=>'Something Went Wrong'], 200);
        }


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
    public function Statuschange(Request $request){


        $data=SurveyQuestion::find($request->id);

        if(!$data){
            return response()->json(['status'=>false,'message'=>'Id not found']);
        }

        // $data->status=$data->status?0:1;
        // $status=$data->status?0:1;
        if($data->status ==1)
        {
            $data->status=0;

        }
        else if($data->status ==0){
            $data->status=1;
        }
        if($data->save()){
            return response()->json(['status'=>true,'message'=>'Status has been changed Successfully']);
        }else{
            return response()->json(['status'=>false,'message'=>'failed to change status']);
        }

    }
}

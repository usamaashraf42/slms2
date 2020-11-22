<?php

namespace App\Http\Controllers\admins\survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyAnswerValidation;
use App\SurveyAns;
use App\SurveyCategory;
use App\SurveyTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyAnswerController extends Controller
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
    public function surveryStaffanswers(SurveyAnswerValidation $request)
    {

//dd($request->all());
        //dd($request->answer);
//        implode(',',$request->answer);
        //dd(count($request->questions));
//        dd($request->all());
        $survey = SurveyTable::create([
            'branch_id' => $request->branch_id,
            'section_id' => $request->section_type,
            'name' => $request->check_1?'Not Added name': $request->name,
            'email' => Auth::user()->email,
            'phone' =>Auth::user()->phone,
        ]);
        foreach ($request->questions as $data) {
//    dd($request['question_ans_'.$data]);
            //dd($data);
            $survey_ans = SurveyAns::create([
                'survey_id' => $survey->id,
                'question_id' => $data,
                'category_id' => $request->category_id ? $request->category_id : 20,
                'survey_ans' => $request['question_ans_' . $data],
            ]);
        }
        if ($survey_ans)
            return response()->json(['status' => 200]);
        else
            return response()->json(['message' => 'Survey not added']);


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
}

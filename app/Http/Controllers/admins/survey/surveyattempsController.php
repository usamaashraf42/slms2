<?php

namespace App\Http\Controllers\admins\survey;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\SurveyAns;
use App\Models\SurveyTable;
use Illuminate\Http\Request;

class surveyattempsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function surveyattemps()
    {
//        $survey_questions= SurveyQuestion::where('parent_id',null)->get();
        $attemps =SurveyTable::all();
       $count = count($attemps);

        return view('admin.survey.attempt.index',compact('count','attemps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey_table =SurveyTable::find($id);
        $survey_ans =SurveyAns::where('survey_id',$id)->where('question_parent_id_',null)->with('childrens')->get();
//dd($survey_ans);
//            dd($child_questions);
        if(!$survey_ans ){
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
//        return $survey_ans;
//        return view('admin.OnlineSchool.TimeTablePeriods.edit_new',compact('periods'));
        $html=view('admin.survey.attempt.modal',compact('survey_ans','survey_table'))->render();
        return response()->json(['status'=>true,'contentHtml'=>$html,'message'=>'data not found']);
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

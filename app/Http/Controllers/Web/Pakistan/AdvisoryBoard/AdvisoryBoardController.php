<?php

namespace App\Http\Controllers\Web\Pakistan\AdvisoryBoard;

use App\Http\Controllers\Controller;
use App\Http\Requests\advisorybaordvaldation;
use App\Http\Requests\advisoryboardvalidation;
use App\Models\AdvisoryBoard;
use App\Models\SurveyAns;
use App\Models\SurveyQuestion;
use App\Models\SurveyTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvisoryBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advisory_board(){
        $question =SurveyQuestion::where('status',1)->where('parent_id',null)->where('category_id',4)->with('childrens')->get();


//        $data = DB::table('survey_ans')
//            ->select(
//                DB::raw('course as course'),
//                DB::raw('count(*) as number'))
//            ->groupBy('course')
//            ->get();
        $chart_question =SurveyQuestion::where('category_id',32)->where('status',1)->first();

//        $user_info =  SurveyAns::where('question_id',$chart_question->id)
//            ->select('survey_ans','question_id', DB::raw('count(*) as total'))
//            ->groupBy('survey_ans')
//            ->get();
//        $data = SurveyAns::where('question_id',$question->id)
//            ->select('survey_ans',
////                DB::raw('survey_ans'),
//                DB::raw('count(*) as count'))
//            ->groupBy('survey_ans')
//            ->with('options')
//            ->get();
//
//        $count[] = ['option', 'count'];
//        foreach($data as $key => $value)
//        {
//            $count[++$key] = [$value->options->question, $value->count];
//        }


//        $chart_question =SurveyQuestion::where('category_id',32)->where('status',1)->first();
//        $chart_ans_yes= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',1)->get();
//        $chart_ans_no= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',2)->get();
//        $chart_ans_maybe= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',3)->get();
////        dd(count($chart_ans));
//        $array[] = ['Yes', 'No'];
//        foreach($user_info as $key => $value)
//        {
//            $array[++$key] = [$value->total, $value->total];
//        }
//        return view('google-pie-chart')->with('course', json_encode($array));
        return view('web.pakistan.advisoryboard.advisoryboard')->with(['questions'=>$question]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advisory_board_answers(advisorybaordvaldation $request)
    {


//        dd($request->answer);
//        implode(',',$request->answer);
        //dd(count($request->questions));
//        dd($request->all());
//        dd($request->name);
        $survey = SurveyTable::create([

            'name' => $request->name?$request->name:'Not want to add name',
            'email' => Auth::user()?Auth::user()->email:'null',
            'phone' =>Auth::user()?Auth::user()->phone:'null',
        ]);
        foreach ($request->questions as $data)
        {

            $advisory_board_ans = SurveyAns::create([

                'survey_id' => $survey->id,
                'question_id' => $data,
//                'question_parent_id_'=>isset($request['question_parent_' . $data])?$request['question_parent_' . $data]:null,
//            'question_parent_id_'=>$data,
                'category_id' => $request->category_id ? $request->category_id : null,
                'survey_ans' => $request['question_ans_'.$data],
            ]);

        }


        if (isset($survey) || isset($advisory_board_ans))
            return response()->json(['status' => 200]);
        else
            return response()->json(['message' => 'Survey not added']);


//        return redirect()->route('survey_category.index');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function advisory_board_questions(Request $request){
//        dd($request->question_id,$request->answer_id);
//        dd($request->question_id);
        $options =AdvisoryBoard::where('parent_question_id',$request->question_id)->get('option');
//        if(!$answers)
//        {
//            $answers='';
//            $childerns =SurveyQuestion::where('parent_id',$request->question_id)->get('id');
////            $array_childrens =explode(' ',$childerns);
////            dd($array_childrens);
////           array_push($array_childrens,'');
////            dd($array_childrens);
//            return response()->json(['status'=>200,'answer'=>$answers,'childerns'=>$childerns]);
//        }
//dd($answers);
//        $childerns =SurveyQuestion::where('parent_id',$request->question_id)->get('id');
//dd($childerns);

        return response()->json(['status'=>200,'options'=>$options]);
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

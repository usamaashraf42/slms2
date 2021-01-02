<?php

namespace App\Http\Controllers\Web\Pakistan\AdvisoryBoard;

use App\Http\Controllers\Controller;
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
        $questions =SurveyQuestion::where('status',1)->where('category_id',32)->get();
//        $data = DB::table('survey_ans')
//            ->select(
//                DB::raw('course as course'),
//                DB::raw('count(*) as number'))
//            ->groupBy('course')
//            ->get();
        $chart_question =SurveyQuestion::where('category_id',32)->where('status',1)->first();

        $user_info =  SurveyAns::where('question_id',$chart_question->id)
            ->select('survey_ans','question_id', DB::raw('count(*) as total'))
            ->groupBy('survey_ans')
            ->get();


//        $chart_question =SurveyQuestion::where('category_id',32)->where('status',1)->first();
//        $chart_ans_yes= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',1)->get();
//        $chart_ans_no= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',2)->get();
//        $chart_ans_maybe= SurveyAns::where('question_id',$chart_question->id)->where('survey_ans',3)->get();
////        dd(count($chart_ans));
//        $array[] = ['Yes', 'No'];
        foreach($user_info as $key => $value)
        {
            $array[++$key] = [$value->total, $value->total];
        }
//        return view('google-pie-chart')->with('course', json_encode($array));
        return view('web.pakistan.advisoryboard.advisoryboard')->with(['course'=>json_encode($array),'questions'=>$questions]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advisory_boardanswers(Request $request)
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
        foreach ($request->questions as $data) {

            //dd($data);
            $survey_ans = SurveyAns::create([
                'survey_id' => $survey->id,
                'question_id' => $data,
//                'question_parent_id_'=>isset($request['question_parent_' . $data])?$request['question_parent_' . $data]:null,
//            'question_parent_id_'=>$data,
                'category_id' => $request->category_id ? $request->category_id : 20,
                'survey_ans' => $request['question_ans_' . $data],
            ]);
//dd($request['question_ans_' .$data]);
            if(isset($request['question_parent_' . $data]) && $request['question_parent_' . $data]){
                if(isset($request['question_parent_' . $data]) && $request['question_parent_' . $data]){
                    $childrens=SurveyAns::create([
                        'survey_id' => $survey->id,
                        'question_id' =>isset($request['question_parent_' . $data])?$request['question_parent_' . $data]:null,
                        'question_parent_id_'=>isset($survey_ans->id)?$survey_ans->id:null,
                        'category_id' => $request->category_id ? $request->category_id : 20,
                        'survey_ans' => isset($request['question_ans_' . $request['question_parent_' . $data]])?
                            $request['question_ans_' . $request['question_parent_' . $data]]:null,
                    ]);
                }
            }
        }
        if ($survey_ans)
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
        $answers =SurveyQuestion::where('parent_id',$request->question_id)->where('question_type',$request->answer_id)->first();
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
        $childerns =SurveyQuestion::where('parent_id',$request->question_id)->get('id');
//dd($childerns);

        return response()->json(['status'=>200,'answer'=>$answers,'childerns'=>$childerns]);
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

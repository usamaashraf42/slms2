<?php

namespace App\Http\Controllers\admins\AdvisoryBoard;

use App\Http\Controllers\Controller;
use App\Models\AdvisaryBoard;
use App\Models\Month;
use App\Models\SurveyCategory;
use App\Models\SurveyQuestion;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvisoryBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisary_boards= SurveyQuestion::where('category_id',32)->get();

        return view('admin.AdvisoryBoard.questions.index',compact('advisary_boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.AdvisoryBoard.questions.add_question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){


        $categories=SurveyQuestion::create([
            'question'=>$request->question?$request->question:null,
            'category_id'=>$request->category_id?$request->category_id:'null',
            'question_type' => 'null',
            'created_by'=>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);

        if($request->child_questions) {
            for ($i=0;$i< count($request->child_questions);$i++) {
//                $child_questions = implode(',', $request->child_questions);
//                $questions_type = implode(',', $request->question_type);
                $categories_1 = SurveyQuestion::create([
                    'question' => $request->child_questions ?$request->child_questions[$i] : null,
                    'category_id' => $request->category_id ? $request->category_id  : 'null',
                    'question_type' => $request->question_type ? $request->question_type[$i]: null,
                    'parent_id' => $categories->id,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);
            }
            return response()->json(['status' => 200]);
        }


        return response()->json(['status' => 200]);


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
        $parent_question = SurveyQuestion::where('id',$id)->first();
        $child_questions =SurveyQuestion::where('parent_id',$id)->get();
//            dd($child_questions);

        if(!$parent_question){
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
//        return view('admin.OnlineSchool.TimeTablePeriods.edit_new',compact('periods'));
        $html=view('admin.AdvisoryBoard.questions.edit',compact('parent_question','child_questions'))->render();
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
        $question->question = $request->parent_question;
        $question->question_type = 'null';
        $question->category_id = $request->category_id ? $request->category_id  : 'null';
        $question->created_by = Auth::user()->id;
        $question->updated_by = Auth::user()->id;
        $question_updated= $question->save();
        $child_questions= SurveyQuestion::where('parent_id', $request->question_id)->get();
//        $implode_questions =implode(' ',$request->child_question);
//        dd($implode_questions);
        foreach($child_questions as $child_question)
        {
            //dd($request->child_question);
            $child_question->question =$request->child_question[$child_question->id];
            $child_question->question_type =$request->question_type[$child_question->id];
            $child_question_updated = $child_question->save();
        }
        if(isset($child_question_updated) || isset($question_updated))
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

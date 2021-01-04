<?php

namespace App\Http\Controllers\admins\AdvisoryBoard;

use App\Http\Controllers\Controller;

use App\Models\AdvisoryBoard;
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
        $advisary_boards= AdvisoryBoard::where('parent_question_id',null)->get();
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

        $questions =AdvisoryBoard::create([
            'question'=>$request->question?$request->question:null,
            'option'=>'null',
            'parent_question_id' => null,
            'created_by'=>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);
        $options =[
            [
                'question'=>$questions->question,
                'option'=>$request->option_1,
                'parent_question_id'=>$questions->id,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id,
            ],
            [
                'question'=>$questions->question,
                'option'=>$request->option_2,
                'parent_question_id'=>$questions->id,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id,
            ],
            [
                'question'=>$questions->question,
                'option'=>$request->option_3,
                'parent_question_id'=>$questions->id,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id,
            ],
            [
                'question'=>$questions->question,
                'option'=>$request->option_4,
                'parent_question_id'=>$questions->id,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id,
            ],
        ];
        $options_save =AdvisoryBoard::insert($options);
        if(isset($questions)|| isset($options_save))
        {
            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 404]);


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
        $question = AdvisoryBoard::where('id',$id)->first();
        $options =AdvisoryBoard::where('parent_question_id',$id)->get();
//            dd($child_questions);

        if(!$question){
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
//        return view('admin.OnlineSchool.TimeTablePeriods.edit_new',compact('periods'));
        $html=view('admin.AdvisoryBoard.questions.edit',compact('question','options'))->render();
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

        $question = AdvisoryBoard::where('id', $request->question_id)->first();
        $question->question = $request->question;
        $question->option =null;
        $question->parent_question_id=null;
        $question->created_by = Auth::user()->id;
        $question->updated_by = Auth::user()->id;
        $question_updated= $question->save();
        $options= AdvisoryBoard::where('parent_question_id', $request->question_id)->get();
//        $implode_questions =implode(' ',$request->child_question);
//        dd($implode_questions);
        foreach($options as $option)
        {
            //dd($request->child_question);
            $option->question = $request->question;
            $option->option =$request->option[$option->id];
            $option_updated = $option->save();
        }
        if(isset($question_updated) || isset($option_updated))
        {
            return response()->json(['status'=>true, 'message'=>'Question update Successfully'], 200);
        }
        else{
            return response()->json(['status'=>false, 'message'=>'Something Went Wrong in logic'], 200);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Statuschange(Request $request){


        $data=AdvisoryBoard::find($request->id);

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

<?php

namespace App\Http\Controllers\admins\survey;

use App\Http\Controllers\Controller;
use App\Models\Month;
use App\Models\OnlineSchoolTimeTablePeriod;
use App\Models\Year;
use App\SurveyCategory;
use App\SurveyTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\surveyCategoryValidation;
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys =SurveyCategory::all();
        $months =Month::all();
        $years =Year::all();
        return view('admin.survey.category.index',compact('categorys','months','years'));
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
    public function store(surveyCategoryValidation $request){
//dd($request->month);
        $categories=SurveyCategory::create([
            'category_name'=>$request->category_name?$request->category_name:null,
            'cat_type'=>$request->cat_type?$request->cat_type:null,
            'month'=>$request->month?$request->month:null,
            'year'=>$request->year?$request->year:null,
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
        $categorys = SurveyCategory::find($id);
        if(!$categorys){
            return response()->json(['status'=>false,'message'=>'data not found']);
        }
//        return view('admin.OnlineSchool.TimeTablePeriods.edit_new',compact('periods'));
         $html=view('admin.survey.category.edit',compact('categorys','months','years'))->render();
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
            $category = SurveyCategory::where('id', $request->category_id)->first();
        $category->category_name = $request->category_name;
        $category->cat_type = $request->cat_type;
        $category->month = $request->month;
        $category->year = $request->year;
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category_updated= $category->save();
            if($category_updated)
            {
                return response()->json(['status'=>true, 'message'=>'Category update Successfully'], 200);
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


        $data=SurveyCategory::find($request->id);

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

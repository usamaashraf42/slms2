<?php

namespace App\Http\Controllers\Account\tentive;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Auth;
class TentiveController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Tentive List', ['only' => ['create','index','store']]);
         
    }
    
    public function create(){
       $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }

        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
    	return view('admin.account.tentive.create',compact('branches'));
    }

    public function store(Request $request){
    	// dd($request->all());
        $month=$request->month;
        $year=$request->year;
        $misc1=$request->misc1;
        $misc2=$request->misc2;
        $tutionFee=$request->tutionFee;
        $schFee=$request->schFee;
        $compFee=$request->compFee;
        $statFee=$request->statFee;
        $acFee=$request->acFee;
        $examFee=$request->examFee;
        $libFee=$request->libFee;
        $outType=$request->outType;
        $labFee=$request->labFee;
       


      $record=Branch::with('student','student.grade','student.account')->where('id',$request->branch_id)->get();
      // dd($record);
        return view('admin.account.tentive.index', compact('record','month','year','misc1','misc2','tutionFee','schFee','compFee','statFee','acFee','examFee','libFee','outType','labFee'));
    }
}

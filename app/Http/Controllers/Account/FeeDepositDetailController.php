<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BankFeeDeposit;

use Auth;
class FeeDepositDetailController extends Controller
{
    //feeDepositDetail


    function __construct()
    {
         $this->middleware('role_or_permission:Paid List', ['only' => ['create','index','store']]);
         
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
        return view('admin.account.feeDepositDetail.create',compact('branches'));
    }

    public function store(Request $request){

// dd($request->all());
    	$month=$request->month;
    	$year=$request->year;
   

        $fees=BankFeeDeposit::where('branch_id',$request->branch_id)->where('fee_month',$request->month)->where('fee_year',$request->year)->get();

        $BankFees=BankFeeDeposit::selectRaw('count(*) as deposit_stds , SUM(paid_amount) as depositAmount,bank_id')->where('branch_id',$request->branch_id)->where('fee_month',$request->month)->where('fee_year',$request->year)->groupBy('bank_id')->orderBy('bank_id','ASC')->with('bank')->get();

        // dd($BankFees);
        
        return view('admin.account.feeDepositDetail.index',compact('BankFees','fees','month','year'));
    }
}

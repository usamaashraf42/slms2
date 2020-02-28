<?php
namespace App\Http\Controllers\admins\Student\outstanding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Auth;
class OutStandingController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Outstanding', ['only' => ['create','index','store']]);
         
    }
    public function index(){
        $branch=Branch::where('status',1);
         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }

        $branches=$branch->get();
        return view('admin.student.outstanding.create',compact('branches'));
    }
    public function store(Request $request){
        $month=$request->month;
        $year=$request->year;

        $records=Branch::with('student.feePost');
        if(isset($request->branch_id) && !empty($request->branch_id) && ($request->branch_id)>0){
            $records->where('id',$request->branch_id);
        }else{
             $records->where('isFranchise',1);
        }
        $record=$records->get();
        
        return view('admin.student.outstanding.index',compact('record','month','year'));
    }
}
<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AccountRequest;

use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\AcademicSession;
use App\Models\AccountCategory;
use App\Models\Account;
use App\Models\Student;
use Auth;
class AccountController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Account Record', ['only' => ['index','getList']]);
         $this->middleware('role_or_permission:Account Add', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Account Edit', ['only' => ['edit','update']]);
         
    }
    
    public function index()
    {
        $accounts=Account::orderBy('id','DESC')->where('status',1)->get();
        return view('admin.account.account.index',compact('accounts'));
    }

    public function get_student_search(Request $request){
        $accounts = Student::orderBy('id','desc')->limit(20);
        $filter = $request->input('q');
        if(!empty($filter)){  
            $accounts->where('id', 'like', "%{$filter}%")
            ->orWhere('s_name', 'like', "%{$filter}%")
            ->orWhere('s_fatherName', 'like', "%{$filter}%")
            ->orWhere('admission_date', 'like', "%{$filter}%");
        }

        if(Auth::user()->branch_id){
            $accounts->where('branch_id',Auth::user()->branch_id);
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
          return response()->json($data, 200);
      }
    }

    public function get_account(Request $request){
        $accounts = Account::orderBy('id','desc')->limit(20);
        $filter = $request->input('q');
        if(!empty($filter)){  
            $accounts->where('name', 'like', "%{$filter}%")
            ->orWhere('code', 'like', "%{$filter}%")
            ->orWhere('type', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%");
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
          return response()->json($data, 200);
      }


  }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category=AccountCategory::where('status',1)->get();
        // $courses=BranchCourse::with('course')->get();
        
        // $active_tab='personalInfo';

        return view('admin.account.account.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
       
        $savesection = Account::create($request->except('_token'));
        if ($savesection) {
           Session::flash('success_message', __('Record inserted Successfully'));
        } else {

             Session::flash('error_message', __('Record Not Insert'));
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        try {

            $data = Course::find($id);
            $classes=Course::orderBy('id','DESC')->where('parentId',0)->get();
            return view('admin.section.edit',compact('data','classes'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
}

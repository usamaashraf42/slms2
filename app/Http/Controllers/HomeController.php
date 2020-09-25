<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\ContactUs;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    public function feeChalan()
    {
        return view('fee-chalan');
    }

    
    public function premier(){
        $correction=array();
        $students=\App\Models\Student::where('is_active',1)->where('status',1)->where('branch_id',10)->orderBy('course_id','ASC')->get();

        foreach($students as $std){
            // dd($std->id);
            if(isset($std->id)){

                $records=\App\Models\FeeCorrection::where('std_id',$std->id)->whereMonth('correction_date',9)->whereYear('correction_date',2019)->first();
                if(!$records){
                    $correction[]=$std;
                }
            }



        }

        // dd($temp);
        return view('admin.preimer',compact('correction')); 
    }

    public function employee(){
        $employees=Employee::orderBy('branch_id','ASC')->get();

        return view('admin.preimer',compact('employees'));
    }


     public function ContactFom(Request $request){

        $data=ContactUs::create([
            'name'=>$request->namem,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);
    
        if($data){
            // Session::flash('success_message', 'Record added successfully.');
            $emails=$request->email;
             Mail::send('emails.wellcome', ['email'=>$request->email], function($message) use ($emails){    
                 $message->to($emails)->subject('Welcome to Royal Lyceum School System');    
             });
              return response()->json(['status'=>1]);
        }else{
           return response()->json(['status'=>0]);
        }
    }

}

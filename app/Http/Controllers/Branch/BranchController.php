<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BranchRequest;

use App\Models\BranchCourse;
use App\Models\Course;
use App\Models\Branch;
use Auth;


class BranchController extends Controller
{
	function __construct()
    {
       $this->middleware('role_or_permission:Branch Record', ['only' => ['index','getList']]);
       $this->middleware('role_or_permission:Branch-Create', ['only' => ['create','store']]);
       $this->middleware('role_or_permission:Branch-Edit', ['only' => ['edit','update']]);

   }
   public function index(){

       return view('admin.branch.branch.index');
   }


   public function SearchAjax(Request $request){

    $limit = $request->input('length');
    $start = $request->input('start');
    $start = $start?$start+1:$start;
    $search = $request->input('search.value');
    $order_column_no = $request->input('order.0.column');
    $order_dir = $request->input('order.0.dir');
    $order_column_name = $request->input("columns.$order_column_no.data");
    $records = Branch::offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


        if(Auth::user()->branch_id){
            $records->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $records->where('school_id',Auth::user()->school_id);
        }
         if(Auth::user()->s_countryCode){
            $records->where('b_countryCode',Auth::user()->s_countryCode);
        }



    if(!empty($search)){

        $records->where('branch_name', 'like', "%{$search}%")
        ->orWhere('mangerName','like',"%{$search}%")
        ->orWhere('b_contactPerson','like',"%{$search}%")
        ->orWhere('b_emil','like',"%{$search}%")
        ->orWhere('status','like',"%{$search}%");

    }
    $data = $records->get();
        // return $data;
    $totalFiltered = Branch::count();
    $json_data = array(
        "draw"      => intval($request->input('draw')),
        "recordsTotal"  => count($data),
        "recordsFiltered" => intval($totalFiltered),
        "data"      => $data
    );

    return response()->json($json_data, 200);
}


public function create(Request $request){
    $courses=Course::get();
    return view('admin.branch.branch.create',compact('courses'));

}
public function store(BranchRequest $request){

    $branch=Branch::create([
       'branch_name'=>$request->branch_name,
       'b_countryCode'=>$request->b_countryCode,
       'school_id'=>Auth::user()->school_id,
       'mangerName'=>$request->mangerName,
       'b_contactPerson'=>$request->b_contactPerson,
       'b_emil'=>$request->b_emil,
       'b_cell'=>$request->b_cell,
       'Rent'=>$request->Rent,
       'utilities'=>$request->utilities,
       'Misc'=>$request->Misc,
       'b_address'=>$request->address,
       'created_by'=>Auth::id(),
       'updated_by'=>Auth::id(),
   ]);


    if(isset($request->banks) && $request->banks){
        if(count($request->banks)){
            $branch->userBank()->delete();
            foreach($request->banks as $bank){
                \App\Models\UserBank::create([
                    'user_id'=>$branch->id,
                    'bank_id'=>$bank
                ]);
            }

        }
    }






    $setting=\App\Models\UserSetting::where('user_id',$branch->id)->first();

    if($request->hasfile('logo')){
        $Extension_profile = $request->file('logo')->getClientOriginalExtension();
        $profile = 'logo'.'_'.$branch->branch_name.'.'.$Extension_profile;
        $request->file('logo')->move('newSchool/logo/', $profile);
        $data['logo']=isset($profile)?$profile:'no-image.png';
    }

    if($setting){

        $data['school_name']=($request->school_name)?$request->school_name:$setting->school_name;
        $data['user_id']=$branch->id;
        $data['address']=$request->address?$request->address:$setting->address;
        $data['account_no']=$request->account_no?$request->account_no:$setting->account_no;
        $data['currency']=$request->currency?$request->currency:$setting->currency;
        $data['on_round_off']=$request->on_round_off?round($request->on_round_off):0;


        

        $data['securityFee']=$request->securityFee?$request->securityFee:$setting->securityFee;
        $data['deffered']=$request->deffered?$request->deffered:$setting->deffered;
        $data['examFee']=$request->examFee?$request->examFee:$setting->examFee;
        $data['compFee']=$request->compFee?$request->compFee:$setting->compFee;
        $data['utitlity']=$request->utitlity?$request->utitlity:$setting->utitlity;
        $data['multipleFeeFactor']=$request->multipleFeeFactor?$request->multipleFeeFactor:$setting->multipleFeeFactor;


        
        $data['uniFee']=$request->uniFee?$request->uniFee:$setting->uniFee;
        $data['acctant_no']=$request->acctant_no?$request->acctant_no:$setting->acctant_no;
        $data['bookFee']=$request->bookFee?$request->bookFee:$setting->bookFee;
        $data['StatFee']=$request->StatFee?$request->StatFee:$setting->StatFee;
        $data['labFee']=$request->labFee?$request->labFee:$setting->labFee;
        $data['transportCharge']=$request->transportCharge?$request->transportCharge:$setting->transportCharge;
        $data['acCharge']=$request->acCharge?$request->acCharge:$setting->acCharge;
        $data['Insurace']=$request->Insurace?$request->Insurace:$setting->Insurace;
        $data['summerPack']=$request->summerPack?$request->summerPack:$setting->summerPack;
         $data['lib']=$request->lib?$request->lib:$setting->lib;

        \App\Models\UserSetting::where('user_id',$branch->id)->update($data);

    }else{
        if(isset($request->school_name) && $request->school_name){
            $data['school_name']=($request->school_name)?$request->school_name:'';
            $data['user_id']=$branch->id;
            $data['address']=$request->address?$request->address:'';
            $data['currency']=$request->currency?$request->currency:'';
            $data['account_no']=$request->account_no?$request->account_no:'';
            $data['securityFee']=$request->securityFee?$request->securityFee:0;
            $data['deffered']=$request->deffered?$request->deffered:0;
            $data['examFee']=$request->examFee?$request->examFee:0;
            $data['utitlity']=$request->utitlity?$request->utitlity:0;
            $data['compFee']=$request->compFee?$request->compFee:0;
            $data['lib']=$request->lib;
            $data['multipleFeeFactor']=$request->multipleFeeFactor;
            $data['on_round_off']=$request->on_round_off?round($request->on_round_off):0;

            $data['acctant_no']=$request->acctant_no;

            $data['uniFee']=$request->uniFee?$request->uniFee:0;
            $data['bookFee']=$request->bookFee?$request->bookFee:0;
            $data['StatFee']=$request->StatFee?$request->StatFee:0;
            $data['labFee']=$request->labFee?$request->labFee:0;
            $data['transportCharge']=$request->transportCharge?$request->transportCharge:0;
            $data['acCharge']=$request->acCharge?$request->acCharge:0;
            $data['Insurace']=$request->Insurace?$request->Insurace:0;
            $data['summerPack']=$request->summerPack?$request->summerPack:0;


            \App\Models\UserSetting::insert($data);
        }
    }




    for($i=0; $i<count($request->classes); $i++){
        if(isset($request->classes[$i])){
            BranchCourse::insert([
                'branch_id'=>$branch->id,
                'course_id'=>$request->classes[$i],
            ]);
        }
    }


    if(!$branch){
        Session::flash('error_message', 'Failed to inserted ');

    }else {
        Session::flash('success_message', 'Record Inserted Successfully');
    }

    return redirect(route('branch.index'));
}
public function edit($id){
    $branch = Branch::find($id);
    $courses=Course::get();
    if(!$branch){
        Session::flash('error_message',  'Record failed to inserted');
        return redirect(route('branch.index'));
    }
    return View('admin.branch.branch.edit',compact('branch','courses'));
}

public function update(Request $request, $id)
{
    	// dd($request->all());

    $branch = Branch::find($id);
    if(!$branch){
        Session::flash('error_message',  __('messages.Record not found'));
        return redirect(route('branch.index'));
    }

    $affected=Branch::where('id',$id)->update([
       'branch_name'=>$request->branch_name?$request->branch_name:$branch->branch_name,
       'b_countryCode'=>$request->b_countryCode?$request->b_countryCode:$branch->b_countryCode,
       'mangerName'=>$request->mangerName?$request->mangerName:$branch->mangerName,
       'b_contactPerson'=>$request->b_contactPerson?$request->b_contactPerson:$branch->b_contactPerson,
       'b_emil'=>$request->b_emil?$request->b_emil:$branch->b_emil,
       'b_cell'=>$request->b_cell?$request->b_cell:$branch->b_cell,
       'Rent'=>$request->Rent?$request->Rent:$branch->Rent,
       'slary'=>$request->slary?$request->slary:$branch->slary,
       'utilities'=>$request->utilities?$request->utilities:$branch->utilities,
       'Misc'=>$request->Misc?$request->Misc:$branch->Misc,
       'b_address'=>$request->address?$request->address:$branch->address,

       'updated_by'=>Auth::id(),
   ]);


    if(isset($request->banks) && $request->banks){

        if(count($request->banks)){
            $branch->userBank()->delete();
            foreach($request->banks as $bank){
                \App\Models\UserBank::create([
                    'user_id'=>$branch->id,
                    'bank_id'=>$bank
                ]);
            }

        }
    }




    $setting=\App\Models\UserSetting::where('user_id',$branch->id)->first();

    if($request->hasfile('logo')){
        $Extension_profile = $request->file('logo')->getClientOriginalExtension();
        $profile = 'logo'.'_'.$branch->branch_name.'.'.$Extension_profile;
        $request->file('logo')->move('newSchool/logo/', $profile);
        $data['logo']=isset($profile)?$profile:'no-image.png';
    }

    if($setting){

        $data['school_name']=($request->school_name)?$request->school_name:$setting->school_name;
        $data['user_id']=$branch->id;
        $data['address']=$request->address?$request->address:$setting->address;
        $data['account_no']=$request->account_no;
        $data['currency']=$request->currency?$request->currency:$setting->currency;
        $data['securityFee']=$request->securityFee?$request->securityFee:$setting->securityFee;
        $data['deffered']=$request->deffered?$request->deffered:$setting->deffered;
        $data['examFee']=$request->examFee?$request->examFee:$setting->examFee;
        $data['compFee']=$request->compFee?$request->compFee:$setting->compFee;
        $data['utitlity']=$request->utitlity?$request->utitlity:$setting->utitlity;
        $data['uniFee']=$request->uniFee?$request->uniFee:$setting->uniFee;
        $data['acctant_no']=$request->acctant_no;
        $data['on_round_off']=$request->on_round_off?round($request->on_round_off):0;
        
        $data['bookFee']=$request->bookFee?$request->bookFee:$setting->bookFee;
        $data['StatFee']=$request->StatFee?$request->StatFee:$setting->StatFee;
        $data['labFee']=$request->labFee?$request->labFee:$setting->labFee;
        $data['lib']=$request->lib?$request->lib:$setting->lib;
        $data['multipleFeeFactor']=$request->multipleFeeFactor?$request->multipleFeeFactor:$setting->multipleFeeFactor;
        $data['fine']=$request->fine?$request->fine:$setting->fine;
        


        $data['transportCharge']=$request->transportCharge?$request->transportCharge:$setting->transportCharge;
        $data['acCharge']=$request->acCharge?$request->acCharge:$setting->acCharge;
        $data['Insurace']=$request->Insurace?$request->Insurace:$setting->Insurace;
        $data['summerPack']=$request->summerPack?$request->summerPack:$setting->summerPack;
        \App\Models\UserSetting::where('user_id',$branch->id)->update($data);

    }else{
            $data['school_name']=($request->school_name)?$request->school_name:'';
            $data['user_id']=$branch->id;
            $data['address']=$request->address?$request->address:'';
            $data['currency']=$request->currency?$request->currency:'';
            $data['account_no']=$request->account_no?$request->account_no:'';
            $data['securityFee']=$request->securityFee?$request->securityFee:0;
            $data['deffered']=$request->deffered?$request->deffered:0;
            $data['examFee']=$request->examFee?$request->examFee:0;
            $data['compFee']=$request->compFee?$request->compFee:0;
            $data['utitlity']=$request->utitlity?$request->utitlity:0;
            $data['uniFee']=$request->uniFee?$request->uniFee:0;
            $data['acctant_no']=$request->acctant_no;
            $data['bookFee']=$request->bookFee?$request->bookFee:0;
            $data['lib']=$request->lib?$request->lib:0;
            $data['multipleFeeFactor']=$request->multipleFeeFactor?$request->multipleFeeFactor:0;
             $data['fine']=$request->fine?$request->fine:1;
             $data['on_round_off']=$request->on_round_off?round($request->on_round_off):0;
             
            $data['StatFee']=$request->StatFee?$request->StatFee:0;
            $data['labFee']=$request->labFee?$request->labFee:0;
            $data['transportCharge']=$request->transportCharge?$request->transportCharge:0;
            $data['acCharge']=$request->acCharge?$request->acCharge:0;
            $data['Insurace']=$request->Insurace?$request->Insurace:0;
            $data['summerPack']=$request->summerPack?$request->summerPack:0;
            \App\Models\UserSetting::insert($data);
       
    }
    if(isset($request->classes) && count($request->classes)){
        BranchCourse::where('branch_id',$id)->delete();
        // courses
        $branch->courses()->delete();
        for($i=0; $i<count($request->classes); $i++){
            if(isset($request->classes[$i])){
                $course=BranchCourse::where('branch_id',$id)->where('course_id',$request->classes[$i])->first();
                if(!$course){
                    BranchCourse::insert([
                        'branch_id'=>$id,
                        'course_id'=>$request->classes[$i],
                    ]);
                }
                
            }
        }
    }


    if($affected)
        session()->flash('success_message', "Record update Successfully");
    else
        session()->flash('error_message', 'failed! To update');

    return redirect()->route('branch.index');


}
}

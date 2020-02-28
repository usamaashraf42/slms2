<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BankRequest;
use App\Models\Account;
use App\Models\Bank;
use DB;
use Auth;
class BankController extends Controller
{
	function __construct()
	{
		$this->middleware('role_or_permission:Bank Record', ['only' => ['index']]);
		$this->middleware('role_or_permission:Bank-Create', ['only' => ['create','store']]);
		$this->middleware('role_or_permission:Bank-Edit', ['only' => ['edit','update']]);

	}
	public function index()
	{
	
		$banks=Bank::get();
		return view('admin.branch.bank.index',compact('banks'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
    	return view('admin.branch.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {

    	// dd($request->all());
    
    	DB::beginTransaction();
    	$newUser=Bank::create([
    		'bank_name' => $request->bank_name,
    		'account_no' => $request->account_no,
    		'address' => $request->address,
    		'cont_no' => $request->cont_no,
    		'created_by'=>Auth::user()->id,
    		'updated_by'=>Auth::user()->id
    		
    	]);

    	

    	if($newUser){

    		DB::commit();

    		Account::create(['bank_id'=>$newUser->id,'name'=>$newUser->bank_name,'type'=>'bank']);
    		session()->flash('success_message', __('Record Inserted Successfully'));
    	}else{
    		DB::rollBack();
    		session()->flash('error_message', __('Failed! To Insert Record'));

    	}

    	return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
    	
    	$bank=Bank::find($id);
    	if(!$bank){
    		session()->flash('error_message', __(' Record not found'));
    		return redirect()->back();
    	}
    	return view('admin.branch.bank.edit',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        // dd($request->all());

    	$bank = Bank::find($id);
    	if(!$bank){
    		Session::flash('error_message',  __('Record not found'));
    		return redirect()->back();
    	}
    

    	$newUser=Bank::where('id',$id)->update(['bank_name'=>$request->bank_name?$request->bank_name:$bank->bank_name,'account_no' => $request->account_no?$request->account_no:$bank->account_no,
    		'address' => $request->address?$request->address:$bank->address,
    		'cont_no' => $request->cont_no?$request->cont_no:$bank->cont_no,
    		'updated_by'=>Auth::user()->id]);

// 147852
    	if($newUser)
    		session()->flash('success_message', 'Record update Successfully');
    	else
    		session()->flash('error_message', 'Failed to update Record');
    	return redirect()->route('bank.index');
    }

    public function destroy($id)
    {
        //
    }
    public function deleteAdmin(Request $request)
    {
    	try {
    		$allInputs = $request->all();
    		$id = $request->input('id');

    		$validation = Validator::make($allInputs, [
    			'id' => 'required'
    		]);
    		if ($validation->fails()) {
    			$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
    		} else {

    			$deleteItem =User::with('branch')->find($id);

    			if(isset($deleteItem->activity)){
    				$deleteItem->activity=$deleteItem->activity==1?0:1;
    				$statusChange=$deleteItem->save();

    				Mail::to($deleteItem->email)->send(new ApprovalMail($deleteItem));
                    // $message="Dear : $deleteItem->name \r\n"."Account Status\r\n"."Active"." \r\n"."Role Approved: ".isset($deleteItem->roles)?roleImplode($deleteItem->roles):''."\r\n"."Branch: ".isset($deleteItem->branch->branch_name)?$deleteItem->branch->branch_name:''.''. "\r\n".''."For any further information send email at web@americanlyceum.com  Web Portal Administrator, \r\n American Lyceum International School, \r\n Email: web@americanlyceum.com \r\n www.americanlyceum.com\r\n";


    				if(isset($deleteItem->phone) && !empty(isset($deleteItem->phone)) ){

    					if(isset($deleteItem->phone)){
                           // (SendSms($deleteItem->phone,$message));
    					}
    				}

    			}


    			if (isset($statusChange) && !empty($statusChange)) {
    				$response = (new ApiMessageController())->saveresponse("Data Update Successfully");
    			} else {
    				$response = (new ApiMessageController())->failedresponse("Failed to Update Data");
    			}
    		}

    	} catch (\Illuminate\Database\QueryException $ex) {
    		$response = (new ApiMessageController())->queryexception($ex);
    	}

    	return $response;
    }

    public function updateCourse(Request $request)
    {
    	try {
    		$updateItem = Course::where('id',$request->id)->update($request->except('_token','_method'));

    		if ($updateItem) {
    			$response = (new ApiMessageController())->saveresponse("Data Updated Successfully");
    		} else {
    			$response = (new ApiMessageController())->failedresponse("Failed to update Data");
    		}
    	} catch (\Illuminate\Database\QueryException $ex) {
    		$response = (new ApiMessageController())->queryexception($ex);
    	}

    	return $response;
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\summerBookChargeRequest;


use App\Models\BankTransactionDetail;

use App\Models\InvProduct;
use App\Models\InvOrder;
use App\Models\InvOrderDetail;

use App\Models\Student;


class SummerBookChargeController extends Controller
{
    public function summerBookCharge(summerBookChargeRequest $request){
    	$student=Student::find($request->std_id);

    	if(!$student){
    		session()->flash('error_message', __('Something went wrong please try later'));
			return redirect()->route('pakistan.summerBook');
    	}

        $amount=$student->course_id>4?300:150;
        $delivery_charge=120;

        $amount_delivery=$amount+$delivery_charge;

    	$order=InvOrder::create([
    		'pro_id'=>1,
    		'school_id'=>1,
    		'branch_id'=>$student->branch_id,
    		'std_id'=>$student->id,
    		'price'=>$amount,
    		'delivery_charge'=>$delivery_charge,
    		'email'=>$request->email,
    		'phone'=>$request->phone,
    		'address'=>$request->address,
    	]);

    	if(!$order){
    		session()->flash('error_message', __('Something went wrong please try later'));
			return redirect()->route('pakistan.summerBook');
    	}
    	InvOrderDetail::create([
    		'order_id'=>$order->id,
    		'pro_id'=>1,
    		'qty'=>1,
    		'pro_total_price'=>$amount
    	]);

    	$fees=BankTransactionDetail::create([
			'std_id'=>$request->std_id,
			'amount'=>$amount_delivery,
			'bank_id'=>8,
			'order_id'=>$order->id,
			'status'=>1,
			'branch_id'=>isset($student->branch_id)?$student->branch_id:0,
		]);
		if(!$fees){
			session()->flash('error_message', __('Something went wrong please try later'));
			return redirect()->route('pakistan.summerBook');
		}
		$object = new \stdClass;
		$object->desire_amount=($amount_delivery).'00';
		$object->pp_Amount=($amount_delivery);
// dd($request->all());
		return view('web.summerBookCharge',compact('student','fees','object','request'));


    }
}

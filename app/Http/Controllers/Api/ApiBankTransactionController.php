<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankTransactionDetail;
class ApiBankTransactionController extends Controller
{

	// prepon project Id: 2
	// britishlyceum project Id: 3

    public function bankTransactionApi($amount,$user_id,$project_id,$package_id){
    	$fees=BankTransactionDetail::create([
			'amount'=>$amount,
			'bank_id'=>8,
			'status'=>1,
			'project_id'=>$project_id,
			'prepon_package_id'=>$package_id,
			'prepon_user_id'=>$user_id
		]);

		if($fees){
			return response()->json(['data'=>$fees]);
		}else{
			return response()->json(['data'=>0]);
		}
    }

    public function britishLyceumTransactionApi($amount,$user_id,$project_id,$transaction_id){
    	$fees=BankTransactionDetail::create([
			'amount'=>$amount,
			'bank_id'=>8,
			'status'=>1,
			'project_id'=>$project_id,
			'prepon_transaction_id'=>$transaction_id,
			'britishlyceum_user_id'=>$user_id
		]);

		if($fees){
			return response()->json(['data'=>$fees]);
		}else{
			return response()->json(['data'=>0]);
		}
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeePost;
class OnlineFeeDepositChallanController extends Controller
{
    public function onlineChallan($fee_id){

    
    	$data=FeePost::find($fee_id);

    	return view('web.feedeposit.onlineFeeDepositChallan',compact('data'));


    }


    public function feees(){
    	$data=FeePost::orderBy('id','DESC')->limit(200)->where('branch_id',1)->get();
		return view('web.feedeposit.fees',compact('data'));

    }
}

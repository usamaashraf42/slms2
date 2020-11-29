<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EasypaisaController extends Controller
{
    public function store(Request $request){
    	dd($request->all());
    }


    public function easypaisaCallback(Request $request){
    	dd($request->all());
    }


    public function EncriptHashedKey(Request $request){

        // $sampleString ="amount=".$request->amount."&emailAddress=".$request->emailAddr."&expiryDate=".$request->expiryDate.
        //                 "&merchantPaymentMethod=MA_PAYMENT_METHOD"."&mobileNum=".$request->mobileNum."&orderRefNum=".$request->orderRefNum.
        //                 "&paymentMethod=InitialRequest"."&postBackURL=".$request->postBackURL."&storeId=".$request->storeId."&timeStamp=".$request->timeStamp;
        $sampleString ="amount=".$request->amount."&expiryDate=".$request->expiryDate."&orderRefNum=".$request->orderRefNum.
                        "&paymentMethod=InitialRequest&storeId=".$request->storeId."&timeStamp=".$request->timeStamp;


        $hashKey='8JZVPIU6MPD6H4GH';
        $cipher = "aes-128-ecb";
        $crypttext = openssl_encrypt($sampleString, $cipher, $hashKey,OPENSSL_RAW_DATA);
        $hashRequest = base64_encode($crypttext);

        return $hashRequest;
    }
}

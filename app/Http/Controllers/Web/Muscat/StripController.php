<?php

namespace App\Http\Controllers\Web\Muscat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripController extends Controller
{
    public function stripPayment(Request $request){
    	dd($request->all());

    	\Stripe\Stripe::setApiKey ('sk_test_51GqIueGEnqFtoeJkb7vGbqVGDZ8kQA6kzpM6LqYGMaQn8MM8uu93ZsJ0QzissPUDGqRseKDKrxWEjQN090VWA5x000VYYOnxoS');
	    try {
	        \Stripe\Charge::create ( array (
	                "amount" => 300 * 100,
	                "currency" => "usd",
	                "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
	                "description" => "Test payment." 
	        ) );
	        Session::flash ( 'success-message', 'Payment done successfully !' );
	        return redirect()->route('muscat.admission_query');
	    } catch ( \Exception $e ) {
	        Session::flash ( 'fail-message', "Error! Please Try again." );
	         return redirect()->route('muscat.admission_query');
	    }
    }
}

<?php

namespace App\Http\Controllers\Web\Muscat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripController extends Controller
{
    public function stripPayment(Request $request){
    	dd($request->all());
    }
}

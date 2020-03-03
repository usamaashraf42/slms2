<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeDepositController extends Controller
{
   public function index(){
   	return view('web.pakistan.feeDeposit.challan');
   }
}

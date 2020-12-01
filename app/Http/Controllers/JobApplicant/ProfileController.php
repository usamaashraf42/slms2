<?php

namespace App\Http\Controllers\JobApplicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index(){
       return view('jobApplicant.profile.index');
   }
}

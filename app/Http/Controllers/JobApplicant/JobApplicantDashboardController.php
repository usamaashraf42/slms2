<?php

namespace App\Http\Controllers\JobApplicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApplicantDashboardController extends Controller
{
    public function dashboard(){
        return view('JobApplicant.dashboard.index');
    }
}

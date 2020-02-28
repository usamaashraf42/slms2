<?php

namespace App\Http\Controllers\Hr\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdvanceRequestRequest;
use App\Models\AdvanceRequest;
use App\Models\ApprovedAdvanceRequest;
use App\Models\ApprovedAdvanceInstallment;
use App\Models\AdvanceInstallment;
use App\Models\Employee;
use Session;
use Auth;
use DB;

class AdvanceController extends Controller
{
    public function index()
	{
		$advances=ApprovedAdvanceRequest::orderBy('branch_id','DESC')->orderBy('id','DESC')->get();
		return view('admin.Hr.ApprovedAdvance.index',compact('advances'));
	}
}

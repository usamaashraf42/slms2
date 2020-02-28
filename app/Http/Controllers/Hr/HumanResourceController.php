<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HumanResourceController extends Controller
{

	function __construct()
    {
         $this->middleware('role_or_permission:HR Dashboard', ['only' => ['index']]);
         $this->middleware('role_or_permission:HR-Create', ['only' => ['create','store']]);
         
    }

    public function index(){
    	return view('admin.Hr.humanResource.index');
    }
}

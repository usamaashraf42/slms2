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
}

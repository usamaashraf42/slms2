<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeavesRequest extends Model
{
    protected $guarded=[''];

    public function leave(){
    	return $this->belongsTo(EmployeeLeaves::class,'leave_id');
    }


    public function user(){
    	return $this->belongsTo(User::class,'emp_id');
    }


    public function approvedBy(){
    	return $this->belongsTo(User::class,'approved_by');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchEmployeeDepartment extends Model
{
    protected $guarded=[''];


    public function department(){
    	return $this->belongsTo(EmployeeDepartment::class,'dep_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }


    
}

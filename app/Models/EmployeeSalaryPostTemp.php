<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryPostTemp extends Model
{
     protected $connection = 'mysql';
    protected $guarded=[''];


    public function employee(){
    	
    	return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }
}

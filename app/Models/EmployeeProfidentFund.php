<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfidentFund extends Model
{
   	protected $connection = 'mysql';
    protected $guarded=[''];

    public function employee(){
    	return $this->belongsTo(Employee::class,'employee_id','emp_id');
    }
}

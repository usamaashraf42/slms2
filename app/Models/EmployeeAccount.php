<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    protected $guarded=[''];
    protected $table='employee_accounts';

   	public function employee(){
    	return $this->belongsTo(Employee::class,'employee_id','emp_id');
    }
   
}

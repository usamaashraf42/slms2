<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $connection = 'mysql';
    protected $guarded=[''];

    public function employee(){
    	return $this->belongsTo(User::class,'employee_id');
    }

    public function EmployeeDate(){
    	return $this->hasMany(EmployeeDate::class,'emp_id','employee_id');
    }


}

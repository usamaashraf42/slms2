<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDate extends Model
{
    protected $connection = 'mysql';
    protected $guarded=[''];


    public function EmployeeSalary(){
    	return $this->belongsTo(EmployeeSalary::class,'emp_id','employee_id');
    }


    public function employee(){
    	return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }


    public function attendance(){
    	return $this->hasMany(EmployeeAttendance::class,'date_id');
    }


    public function holiday(){
        return $this->belongsTo(EmployeeHoliday::class,'holiday_id');
    }

    public function leave(){
        return $this->belongsTo(EmployeeLeaves::class,'leave_id');
    }
}

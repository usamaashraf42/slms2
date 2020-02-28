<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded=[''];

    public function salaryPost(){
    	return $this->hasMany(EmployeeSalaryPost::class,'employee_id','emp_id');
    }



    public function profident_fund(){
    	return $this->hasMany(EmployeeProfidentFund::class,'employee_id','emp_id');
    }

    public function department(){
        return $this->belongsTo(EmployeeDepartment::class,'dep_id');
    }


    public function EmployeeAccount(){
    	return $this->hasMany(EmployeeAccount::class,'employee_id','emp_id');
    }


     public function desig(){
    	return $this->belongsTo(EmployeeDesignation::class,'designation_Code');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }


    public function Employeesalary(){
      return $this->hasOne(EmployeeSalary::class,'employee_id','emp_id');
    }


    public function EmployeeDate(){
      return $this->hasMany(EmployeeDate::class,'emp_id','emp_id');
    }

    public function get_attandanceByMonth($date){
      
      return $this->EmployeeDate()->where('attendance_date',$date)->first();
    }


    public function EmployeeDateByMonth($month,$year){
// dd($year);
      return $this->hasMany(EmployeeDate::class,'emp_id','emp_id')->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->get();
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }



    public function EmployeePerformance(){
        $this->hasMany(EmployeePerformance::class,'emp_id','emp_id');
    }

    public function get_employeePerformance($emp_id,$month,$year,$ind){
        // dd($emp_id);

       return  $this->hasMany(EmployeePerformance::class,'emp_id','emp_id')->where('month',$month)->where('year',$year)->where('indicator_id',$ind)->first();
    }
}

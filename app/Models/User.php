<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
     use Notifiable;
      use HasRoles;
      protected $guard = 'web';

    protected $guarded = [];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

     public function verifyUser()
    {
        return $this->hasOne(\App\Models\VerifyUser::class, 'user_id');
    }


    public function userBank(){
      return $this->hasMany(UserBank::class,'user_id');
    }


    public function userSetting(){
      return $this->hasOne(UserSetting::class,'user_id');
    }


    public function salary(){
      return $this->hasOne(EmployeeSalary::class,'employee_id');
    }


    public function EmployeeDate(){
      return $this->hasMany(EmployeeDate::class,'emp_id');
    }

    public function get_attandanceByMonth($month,$year){
      return $this->hasMany(EmployeeDate::class,'emp_id')->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->get();
    }


    public function employee(){
      return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }

    


    



    
}

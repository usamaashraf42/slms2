<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDesignation extends Model
{
    protected $table='employee_designations';
    protected $guarded=[''];

    public function employees(){
    	return $this->hasMany(Employee::class,'designation_Code');
    }


    public function department_designations(){
    	return $this->hasMany(DepartmentDesignation::class,'desg_id');
    }


    public function hasDepartment($design_id){
return $this->hasMany(DepartmentDesignation::class,'desg_id')->where('desg_id',$design_id)->first();
    }

   
}

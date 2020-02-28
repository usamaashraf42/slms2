<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentDesignation extends Model
{
    protected $guarded=[''];


    public function EmployeeDesignation(){
    	return $this->belongsTo(EmployeeDesignation::class,'desg_id');
    }

    public function department(){
    	return $this->belongsTo(EmployeeDepartment::class,'dep_id');
    }


}

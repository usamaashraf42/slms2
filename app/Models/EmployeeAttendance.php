<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    protected $connection = 'mysql';
    protected $guarded=[''];


    public function emp_dates(){
    	return $this->belongsTo(EmployeeDate::class,'date_id');
    }
}

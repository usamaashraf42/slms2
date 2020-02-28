<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePerformance extends Model
{
    protected $guarded=[''];

    public function employee(){
        $this->hasMany(Employee::class,'emp_id','emp_id');
    }

    public function indicator(){
    	return $this->belongsTo(PerformanceIndicator::class,'indicator_id');
    }

    
}

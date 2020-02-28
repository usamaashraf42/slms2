<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promtion extends Model
{
    protected $guarded=[''];

    public function employee(){
    	return $this->belongsTo(User::class,'emp_id');
    }
    public function requestBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function from_designation(){
    	return $this->belongsTo(EmployeeDesignation::class,'designation');
    }
    public function to_designation(){
    	return $this->belongsTo(EmployeeDesignation::class,'promtion_designation');
    }
    
}

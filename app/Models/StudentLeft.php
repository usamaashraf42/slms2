<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLeft extends Model
{
    protected $guarded=[''];

    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchCourse extends Model
{
    protected $guarded=[];

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }
    public function course(){
    	return $this->belongsTo(Course::class,'course_id');
    }
}

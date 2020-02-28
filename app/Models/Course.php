<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded=[];

    public function classes(){
    	return $this->belongsTo(self::class,'parentId','id');
    }

    public function Students(){
    	return $this->hasMany(Student::class,'course_id')->where('status',1);
    }

    public function branchStudents($branch_id){
    	return $this->Students()->where('branch_id',$branch_id)->count();
    }
}

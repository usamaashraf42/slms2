<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
 
    protected $guarded=[''];


    public function exam_main_category(){
    	return $this->belongsTo(ExamType::class,'term_id');
    }

    public function exam_type(){
    	return $this->belongsTo(ExamType::class,'exam_type_id');
    }

    public function subjects(){
    	return $this->belongsTo(Subject::class,'sub_id');
    }

    public function  course(){
    	return $this->belongsTo(Course::class,'course_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

}

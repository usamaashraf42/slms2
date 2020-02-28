<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentExamMark extends Model
{
    protected $guarded=[''];


    public function subject_marks(){
    	return $this->hasMany(StudentSubjectExamMark::class,'std_exam_mark')->orderBy('subject_id','ASC');
    }

    public function exam_main_category(){
    	return $this->belongsTo(ExamType::class,'term_id');
    }

    public function exam_type(){
    	return $this->belongsTo(ExamType::class,'exam_type_id');
    }


    public function exam(){
        return $this->belongsTo(ExamType::class,'exam_id');
    }

    

    public function  course(){
    	return $this->belongsTo(Course::class,'course_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }


    public function student(){
    	return $this->belongsTo(Student::class,'std_id')->orderBy('course_id','ASC');
    }
}

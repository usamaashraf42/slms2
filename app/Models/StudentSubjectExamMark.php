<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSubjectExamMark extends Model
{
    protected $guarded=[''];

    public function StudentExamMark(){
    	return $this->belongsTo(StudentExamMark::class,'std_exam_mark');
    }

    public function subjects(){
    	return $this->belongsTo(Subject::class,'subject_id');
    }


    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }
}

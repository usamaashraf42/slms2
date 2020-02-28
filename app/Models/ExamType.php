<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $guarded=[''];

    public function parent(){
    	return $this->belongsTo(self::class,'parent_id');
    }

    public function main_exam(){
    	return $this->hasMany(Exam::class,'term_id');
    }

    public function exam(){
    	return $this->hasMany(Exam::class,'exam_type_id');
    }
}

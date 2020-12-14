<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicatExperience extends Model
{
    protected $guarded=[];
    public function institude(){
        return $this->belongsTo(ExperienceInstitude::class,'institute_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'teachering_sub_id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'class_id');
    }
}

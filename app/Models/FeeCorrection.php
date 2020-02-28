<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeCorrection extends Model
{
    protected $guarded=[];

    public function student(){
    	return $this->belongsTo(Student::class,'std_id')->orderBy('course_id','ASC');
    }

    // public function studentFee(){
    // 	return $this->belongsTo();
    // }

    public function feePost(){
    	return $this->belongsTo(FeePost::class,'feeId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDate extends Model
{
    protected $guarded=[''];


    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }

    public function attendance(){
    	return $this->hasMany(StudentAttandance::class,'date_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=[''];
    protected $connection = 'mysql';

    public function Applicant(){
    	return $this->hasMany(Applicant::class,'subject_preference1');
    }
    public function Applicant2(){
    	return $this->hasMany(Applicant::class,'subject_preference2');
    }
    public function Applicant3(){
    	return $this->hasMany(Applicant::class,'subject_preference3');
    }
}

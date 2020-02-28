<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $connection = 'mysql2';
    protected $guarded=[''];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class,'user_id');
    }
    public function jobs(){
    	return $this->belongsTo(Job::class,'job_id');
    }

    public function applicationStatus(){
    	return $this->belongsTo(ApplicationStatus::class,'status');
    }

    public function interviewStatus(){
        return $this->belongsTo(ApplicationStatus::class,'status');
    }

    public function interview(){
        return $this->hasOne(Interview::class,'application_id');
    }

    public function MarksInterview(){
        return $this->hasMany(MarksInterview::class,'application_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Applicant extends Authenticatable
{
    protected $connection = 'mysql2';
    protected $guarded=[''];
    protected $guard='JobApplicant';

   public function application(){
   		return $this->hasOne(Application::class,'user_id');
   }

   public function degrees(){
    return $this->hasMany(UserDegree::class,'user_id');
   }
   public function exper(){
    return $this->hasMany(UserExperience::class,'user_id');
   }
   public function preferenceBranch1(){
   		return $this->belongsTo(Branch::class,'branch_preference1');
   }
   public function preferenceBranch2(){
   		return $this->belongsTo(Branch::class,'branch_preference2');
   }
   public function preferenceBranch3(){
   		return $this->belongsTo(Branch::class,'branch_preference3');
   }

   public function preferenceSubject1(){
      return $this->belongsTo(\App\Models\Subject::class,'subject_preference1');
   }
   public function preferenceSubject2(){
      return $this->belongsTo(\App\Models\Subject::class,'subject_preference2');
   }
   public function preferenceSubject3(){
      return $this->belongsTo(\App\Models\Subject::class,'subject_preference3');
   }
    public function job_applicant_education(){
        return $this->hasMany(JobApplicantEducation::class,'job_applicant_id');
    }


}

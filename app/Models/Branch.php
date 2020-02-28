<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Branch extends Model
{
	protected $connection = 'mysql';
    protected $guarded=[''];
    public function jobs(){
    	return $this->hasMany(Job::class,'branch_id');
    }


    public function school(){
        return $this->belongsTo(School::class,'school_id');
    }

    public function Applicant(){
    	return $this->hasMany(Applicant::class,'branch_preference1');
    }
    public function applicant2(){
    	return $this->hasMany(Applicant::class,'branch_preference2');
    }
    public function applicant3(){
    	return $this->hasMany(Applicant::class,'branch_preference3');
    }

    public function courses(){
        return $this->hasMany(BranchCourse::class,'branch_id');
    }




    public function Students(){
        return $this->hasMany(Student::class,'branch_id');
    }

    public function admittedStd($from_date, $till_date){
         return $this->hasMany(Student::class,'branch_id')->where('admission_date','>=',$from_date)->where('admission_date','<=',$till_date)->get();
           
    }
    public function leftStd($from_date, $till_date){
    
         return $this->hasMany(StudentLeft::class,'branch_id')->where('status',1)->where('created_at','>=',$from_date)->where('created_at','<=',$till_date)->distinct('std_id')->get();
           
    }


     public function student(){
        return $this->hasMany(Student::class,'branch_id')->where('status',1)->orderBy('course_id','ASC');
    }

    public function level(){
        return $this->hasMany(BranchClass::class,'branch_id');
    
    }

    public function studentByLyno($lyNo){
        return $this->student()->where('s_lyceonianNo',$lyNo);
    }

    public function hasCourse($course){

        if(isset($this->courses) && !empty($this->courses)) {
            foreach ($this->courses as $roleModule) {
                if ($roleModule->course_id == $course->id)
                    return true;
            }
        }
        return false;
    }
    public function hasBank($banks){

        if(isset($this->userBank) && !empty($this->userBank)) {
            foreach ($this->userBank as $bank) {
                if ($bank->bank_id == $banks)
                    return true;
            }
        }
        return false;
    }

    public function userBank(){
        return $this->hasMany(UserBank::class,'user_id');
    }

    public function userSetting(){
      return $this->hasOne(UserSetting::class,'user_id');
    }
}

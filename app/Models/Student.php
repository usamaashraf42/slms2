<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=[''];

    public function Branchs(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

    public function firstStdFee(){
        return $this->hasOne(FeePost::class,'std_id');
    }

    public function course(){
    	return $this->belongsTo(Course::class,'course_id');
    }

    public function Section(){
    	return $this->belongsTo(Course::class,'section_id');
    }

    public function StudentParent(){
        return $this->hasMany(StudentParent::class,'std_id');
    }


    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function feePost(){
        return $this->hasMany(FeePost::class,'std_id')->orderBy('id','DESC');
    }
    public function account(){
        return $this->hasOne(Account::class,'std_id')->orderBy('id','DESC');
    }
    public function grade(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function correction(){
        return $this->belongsTo(Correction::class,'ly_no');
    }
    public function studentFee(){
        return $this->hasOne(StudentFeeStructure::class,'std_id');
    }
    public function branchFeePost(){
        return $this->hasOne(FeePost::class,'std_id')->orderBy('id','ASC');
    }

    public function branchFeePostDesc(){
        return $this->hasOne(FeePost::class,'std_id')->orderBy('id','DESC');
    }

    public function FeeCorrection(){
        return $this->hasMany(FeeCorrection::class,'std_id')->orderBy('course_id','ASC');
    }


    public function Balance(){
        return $this->hasOne(Master::class,'std_id')->orderBy('id','DESC');
    }


    public function feePostOfMonth($month){
        return $this->hasOne(FeePost::class,'std_id')->where('fee_month',$month)->first();
    }




   
}

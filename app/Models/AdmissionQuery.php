<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionQuery extends Model
{
    protected $guarded=[''];

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

    public function queryBy(){
    	return $this->belongsTo(User::class,'created_by');
    }

    public function grade(){
    	return $this->belongsTo(Course::class,'course_id');
    }

    public function followUps(){
    	return $this->hasMany(self::class,'parent_id','id');
    }

    public function closedBy(){
    	return $this->belongsTo(User::class,'updated_by');
    }
}

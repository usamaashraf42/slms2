<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTransfer extends Model
{
    protected $guarded=[''];

    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }
    public function fromBranch(){
    	return $this->belongsTo(Branch::class,'from_branch_id');
    }
    public function toBranch(){
    	return $this->belongsTo(Branch::class,'to_branch_id');
    }

    public function toClass(){
    	return $this->belongsTo(Course::class,'to_class_id');
    }

    public function fromClass(){
    	return $this->belongsTo(Course::class,'from_class_id');
    }
}

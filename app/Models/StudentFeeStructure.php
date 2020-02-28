<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFeeStructure extends Model
{
    protected $guarded=[''];

    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }
}

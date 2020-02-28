<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttandance extends Model
{
    protected $guarded=[''];

    public function studentDate(){
    	return $this->belongsTo(StudentDate::class,'date_id');
    }

}

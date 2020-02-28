<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $connection = 'mysql2';
    protected $guarded=[''];

    public function application(){
    	return $this->belongsTo(Application::class,'application_id');
    }

    public function user(){
    	return $this->belongsTo(Applicant::class,'emp_id');
    }
}

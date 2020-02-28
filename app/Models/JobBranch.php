<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobBranch extends Model
{
	protected $connection = 'mysql2';
    protected $guarded=[''];
    public function job(){
    	return $this->belongsTo(Job::class,'job_id');
    }
    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }
}

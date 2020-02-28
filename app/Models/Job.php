<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $connection = 'mysql2';
	protected $guarded=[''];

	public function jobBranch(){
		return $this->hasMany(JobBranch::class,'job_id');
	}
	public function applications(){
		return $this->hasMany(Application::class,'job_id');
	}
	public function applicants(){
		return $this->hasMany(Application::class,'job_id')->count();
	}
}

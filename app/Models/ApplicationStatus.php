<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $connection = 'mysql2';

    protected $guarded=[''];

    public function applicants(){
    	return $this->hasMany(Application::class,'status');
    }
}


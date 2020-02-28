<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarksInterview extends Model
{
    protected $connection = 'mysql2';
    protected $guarded=[''];

    public function application(){
    	return $this->belongsTo(Application::class,'application_id');
    }
}

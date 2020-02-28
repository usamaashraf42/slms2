<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $guarded=[''];

    public function employee(){
    	return $this->belongsTo(User::class,'emp_id');
    }
    public function requestBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}

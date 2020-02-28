<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventApplicant extends Model
{
    protected $guarded=[''];


    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }
}

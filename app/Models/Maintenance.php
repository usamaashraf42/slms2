<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded=[''];

    public function assignUser(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
    	return $this->belongsTo(MaintenanceCategory::class,'main_id');
    }
    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }
}

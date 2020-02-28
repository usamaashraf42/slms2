<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceUsers extends Model
{
    protected $guarded=[''];

    public function main_category(){
    	return $this->belongsTo(MaintenanceCategory::class,'main_id');
    }
    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
}

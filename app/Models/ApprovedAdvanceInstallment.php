<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedAdvanceInstallment extends Model
{
     protected $guarded=[''];

     public function approvedAdvance(){
    	return $this->belongsTo(ApprovedAdvanceRequest::class,'app_adv_id');
    }
}

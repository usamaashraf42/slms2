<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceInstallment extends Model
{
    protected $guarded=[''];

    public function advanceRequest(){
    	return $this->belongsTo(AdvanceRequest::class,'adv_id');
    }
}

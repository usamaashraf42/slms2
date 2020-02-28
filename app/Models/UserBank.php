<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $guarded=[''];

    public function branch(){
    	return $this->belongsTo(Branch::class,'user_id');
    }

    public function bank(){
    	return $this->belongsTo(Bank::class,'bank_id');
    }
}

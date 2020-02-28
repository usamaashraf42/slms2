<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $guarded=[''];

    public function user(){
    	return $this->belongsTo(Branch::class,'user_id');
    }
}

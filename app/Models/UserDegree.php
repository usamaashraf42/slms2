<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDegree extends Model
{
   protected $connection = 'mysql2';
	protected $guarded=[''];
   
   public function user(){
   		return $this->belongsTo(User::class,'user_id');
   }
}

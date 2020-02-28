<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvProductCategory extends Model
{
    protected $guarded=[''];


    public function parent(){
    	return $this->belongsTo(self::class,'parent_id','id');
    }
    public function children(){
    	return $this->hasMany(self::class,'id','parent_id');
    }
}

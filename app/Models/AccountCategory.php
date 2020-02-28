<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    protected $guarded=[''];


    public function parent(){
    	return $this->belongsTo(self::class,'parent_id','id');
    }

    public function childrens(){
    	return $this->hasMany(self::class,'parent_id','id');
    }

    public function accounts(){
    	return $this->hasMany(Account::class,'cat_id');
    }
}

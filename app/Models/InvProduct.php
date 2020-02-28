<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvProduct extends Model
{
    protected $guarded=[''];

    public function category(){
    	return $this->belongsTo(InvProductCategory::class,'cat_id');
    }
    public function sub_category(){
    	return $this->belongsTo(InvProductCategory::class,'sub_cat_id');
    }
}

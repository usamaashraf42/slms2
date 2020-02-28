<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvInventory extends Model
{
    protected $guarded=[''];


    public function product(){
    	return $this->belongsTo(InvProduct::class,'pro_id','pro_id');
    }

    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

    public function category(){
    	return $this->belongsTo(InvProductCategory::class,'cat_id');
    }
    public function sub_category(){
    	return $this->belongsTo(InvProductCategory::class,'sub_id');
    }

    
}

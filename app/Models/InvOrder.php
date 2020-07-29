<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvOrder extends Model
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
    	return $this->belongsTo(InvProductCategory::class,'sub_cat_id');
    }

    public function details(){
        return $this->hasMany(InvOrderDetail::class,'order_id','order_id');
    }


    public function student(){
        return $this->belongsTo(Student::class,'std_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvOrderDetail extends Model
{
    protected $guarded=[''];


    public function products(){
    	return $this->belongsTo(InvProduct::class,'pro_id','pro_id');
    }

    public function order(){
    	return $this->belongsTo(InvOrder::class,'order_id','order_id');
    }

    


}

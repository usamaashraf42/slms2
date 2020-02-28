<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $guarded=[''];

    public function account(){
    	return $this->belongsTo(Account::class,'account_id');
    }

    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }


    public function feePost(){
    	return $this->belongsTo(FeePost::class,'fee_id');
    }


    public function detail(){
        return $this->belongsTo(MasterDetail::class,'detail_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeePost extends Model
{
    protected $guarded=[''];

    public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }

    public function BankFeeDeposit(){
    	return $this->hasOne(BankFeeDeposit::class,'fee_id');
    }


}

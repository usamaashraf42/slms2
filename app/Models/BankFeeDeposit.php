<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankFeeDeposit extends Model
{
    protected $guarded=[''];

    public function feePost(){
    	return $this->belongsTo(FeePost::class,'fee_id');
    }

    public function bank(){
    	return $this->belongsTo(Bank::class,'bank_id');
    }

     public function student(){
    	return $this->belongsTo(Student::class,'std_id');
    }


    public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }





}

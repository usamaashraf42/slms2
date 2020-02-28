<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checque extends Model
{
    protected $guarded=[''];

    public function bank(){
    	return $this->belongsTo(Bank::class,'bank_id');
    }

    public function account(){
    	return $this->belongsTo(Account::class,'account_id');
    }

    public function detail(){
    	return $this->hasOne(MasterDetail::class,'cheque','checque_no');
    }
}

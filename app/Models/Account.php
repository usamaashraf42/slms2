<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded=[''];


    public function ledger(){
    	return $this->hasMany(Master::class,'account_id');
    }

     public function lengthLedger(){
        return $this->ledger()->orderBy('id','DESC')->limit(12);
    }
    public function LedgerBalance(){
    	return $this->hasOne(Master::class,'account_id')->orderBy('id','DESC');
    }

    public function student(){
        return $this->belongsTo(Student::class,'std_id');
    }

    public function category(){
        return $this->belongsTo(AccountCategory::class,'cat_id');
    }
}

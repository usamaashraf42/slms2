<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterDetail extends Model
{
    protected $guarded=[''];


    public function checque(){
    	return $this->belongsTo(Checque::class,'cheque','checque_no');
    }

    public function IssueAccount(){
    	return $this->belongsTo(Account::class,'to_account_id');
    }

    public function masters(){
    	return $this->hasMany(Master::class,'detail_id');
    }
}

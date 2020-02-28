<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedAdvanceRequest extends Model
{
    protected $guarded=[''];

     public function branch(){
    	return $this->belongsTo(Branch::class,'branch_id');
    }

    public function employee(){
    	return $this->belongsTo(Employee::class,'emp_id','emp_id');
    }


    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function installment(){
        return $this->hasMany(ApprovedAdvanceInstallment::class,'app_adv_id');
    }

}

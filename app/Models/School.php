<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded=[''];


    public function branch(){
    	return $this->hasMany(Branch::class,'school_id');
    }


    public function checkBranch($id){
    	$branches=$this->branch()->get();
    	// dd($branches);
    	foreach ($branches as $bra) {
    		if($bra->id==$id){
    			return true;
    		}
    	}
    }
}

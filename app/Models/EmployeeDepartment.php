<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDepartment extends Model
{
    protected $guarded=[''];


    public function EmployeeDepartmentBranch(){
    	return $this->hasMany(BranchEmployeeDepartment::class,'dep_id');
    }


    public function ImplodeBranchName($departBranch){
    	$temarry=array();
    	foreach ($departBranch as $branches) {
    		if(isset($branches->branch->branch_name)){
    			array_push($temarry,$branches->branch->branch_name);
    		}
    	}

    	return implode(',', $temarry);
    }


    public function hasBranch($b_id){

        return $this->EmployeeDepartmentBranch()->where('branch_id',$b_id)->first();
    }


    public function departments(){
        return $this->hasMany(DepartmentDesignation::class,'dep_id');
    }
}

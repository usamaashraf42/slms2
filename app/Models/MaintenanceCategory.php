<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceCategory extends Model
{
    protected $guarded=[''];

    public function maintain_category(){
    	return $this->belongsTo(self::class,'parent_id','id');
    }

    public function maintain_childrens(){
    	return $this->hasMany(self::class,'parent_id','id');
    }

    public function main_users(){
    	return $this->hasMany(MaintenanceUsers::class,'main_id');
    }
    

    public function hasUser($main_users){

    		foreach ($this->main_users as $valued) {
    			# code...
    			if($valued->user_id==$main_users){
    					return true;
    			}
    		}

    		return false;
    }


}

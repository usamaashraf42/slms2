<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(SurveyCategory::class,'category_id');
    }

    public function childrens(){
        return $this->hasMany(self::class,'parent_id');
    }

}

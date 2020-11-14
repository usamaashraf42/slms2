<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(SurveyCategory::class,'category_id');
    }
}

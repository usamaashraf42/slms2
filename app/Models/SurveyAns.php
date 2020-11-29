<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAns extends Model
{
    protected $guarded=[];
    public function question(){
        return $this->belongsTo(SurveyQuestion::class,'question_id');
    }
    public function parent(){
        return $this->belongsTo(self::class,'question_parent_id_');
    }

    public function childrens(){
        return $this->hasMany(self::class,'question_parent_id_');
    }
}

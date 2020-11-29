<?php

namespace App\Models;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class SurveyTable extends Model
{
    protected $guarded=[];
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
}

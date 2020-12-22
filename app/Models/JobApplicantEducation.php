<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicantEducation extends Model
{
    protected $connection = 'mysql';
    protected $guarded=[];
    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }

    public function institude(){
        return $this->belongsTo(Intitude::class,'institute_id');
    }

}

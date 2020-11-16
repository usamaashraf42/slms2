<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCategory extends Model
{
    protected $fillable =['category_name','cat_type','month','year','created_by','updated_by'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
   protected $connection = 'mysql2';
    protected $guarded=[''];
}

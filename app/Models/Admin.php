<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //  use Notifiable;
    protected $guard = 'admin';
    protected $guarded=[''];
}

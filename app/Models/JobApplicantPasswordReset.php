<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicantPasswordReset extends Model
{

    protected $primaryKey='email';
    protected $fillable = [
        'email', 'token'
    ];

    const UPDATED_AT = null;
}

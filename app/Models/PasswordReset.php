<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
	protected $table='password_resets';
    protected $primaryKey='email';
    protected $fillable = [
        'email', 'token'
    ];

    const UPDATED_AT = null;
}

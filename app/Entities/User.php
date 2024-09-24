<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'email', 'password', 'name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

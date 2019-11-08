<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    const STATUS_EMPTY = 'empty';
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_GENERATED = 'generated';

    protected $fillable = [
        'login', 'password', 'firstname', 'surname', 'lastname',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

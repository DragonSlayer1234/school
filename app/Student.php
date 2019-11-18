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

    public function isGenerated()
    {
        return $this->status === self::STATUS_GENERATED;
    }

    public function getFullname()
    {
        return $this->firstname . ' ' . $this->surname .  ' ' . $this->lastname;
    }

    public function isEmpty()
    {
        return $this->status === self::STATUS_EMPTY;
    }

    public function changePassword($password)
    {
        if ($this->isGenerated()) {
          $this->status = Student::STATUS_EMPTY;
        }
        $this->password = bcrypt($password);
        $this->save();
    }
}

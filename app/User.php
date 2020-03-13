<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

abstract class User extends Authenticatable
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $fillable = [
        'username', 'password', 'firstname', 'surname', 'lastname', 'status',
        'generated_password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generate($username, $firstname, $lastname, $surname = null)
    {
        $password = Str::random(10);

        return static::create([
            'username' => $username,
            'password' => bcrypt($password),
            'generated_password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'surname' => $surname,
            'status' => self::STATUS_ACTIVE
        ]);
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isInactive()
    {
        return $this->status === self::STATUS_INACTIVE;
    }

    public function resetGeneratedPassword()
    {
        $this->generated_password = null;
    }

    public function getFullname()
    {
        return $this->firstname . ' ' . $this->surname .  ' ' . $this->lastname;
    }

    public function changePassword($password)
    {
        $this->resetGeneratedPassword();
        $this->password = bcrypt($password);
        $this->save();
    }

    public function resetPassword()
    {
        $password = Str::random(10);
        $this->password = bcrypt($password);
        $this->generated_password = $password;
        $this->save();
    }

    public function edit($firstname, $lastname, $surname = null)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->surname = $surname;
        $this->save();
    }
}

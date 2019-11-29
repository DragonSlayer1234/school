<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_EMPTY_PROFILE = 'empty profile';
    const STATUS_GENERATED_USER = 'generated user';
    const STATUS_GENERATED_PASSWORD = 'generated password';

    protected $fillable = [
        'login', 'password', 'firstname', 'surname', 'lastname', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generate($login, $firstname, $surname, $lastname = null)
    {
        return static::create([
            'login' => $login,
            'password' => bcrypt('12345'),
            'firstname' => $firstname,
            'surname' => $surname,
            'lastname' => $lastname,
            'status' => self::STATUS_GENERATED_USER
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

    public function isGeneratedPassword()
    {
        return $this->status === self::STATUS_GENERATED_PASSWORD;
    }

    public function isGeneratedUser()
    {
        return $this->status === self::STATUS_GENERATED_USER;
    }

    public function isEmptyProfile()
    {
        return $this->status === self::STATUS_EMPTY_PROFILE;
    }

    public function getFullname()
    {
        return $this->firstname . ' ' . $this->surname .  ' ' . $this->lastname;
    }

    public function changePassword($password)
    {
        if ($this->isGeneratedUser()) {
            $this->status = self::STATUS_EMPTY_PROFILE;
        } else {
            $this->status = self::STATUS_ACTIVE;
        }
        $this->password = bcrypt($password);
        $this->save();
    }

    public function resetPassword()
    {
        $this->password = bcrypt('12345');
        $this->status = self::STATUS_GENERATED_PASSWORD;
        $this->save();
    }
}

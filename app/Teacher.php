<?php

namespace App;

class Teacher extends User
{
    public function olympiads()
    {
        return $this->hasMany(Olympiad::class);
    }
}

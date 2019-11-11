<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function olympiads()
    {
        return $this->hasMany(Olympiad::class);
    }
}

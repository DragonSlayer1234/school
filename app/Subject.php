<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public static function new ($name)
    {
        return static::create([
            'name' => $name
        ]);
    }

    public function olympiads()
    {
        return $this->hasMany(Olympiad::class);
    }

    public function rename($name)
    {
        $this->name = $name;
        $this->save();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'image'
    ];

    public static function new($name, $image)
    {
        return static::create([
            'name' => $name,
            'image' => $image
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

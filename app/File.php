<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = false;

    protected $fillable = ['path', 'name', 'comment'];

    public static function new($path, $name, $comment = null)
    {
        return static::create([
            'path' => $path,
            'name' => $name,
            'comment' => $comment
        ]);
    }
}

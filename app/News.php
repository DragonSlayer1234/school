<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'description', 'text', 'image'];

    public static function new($title, $description, $image, $text)
    {
        return static::create([
          'title' => $title,
          'description' => $description,
          'image' => $image,
          'text' => $text
        ]);
    }
}

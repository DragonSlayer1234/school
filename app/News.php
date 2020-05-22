<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'description', 'text', 'image', 'preview_image'];

    public static function new($title, $description, $image, $preview, $text)
    {
        return static::create([
          'title' => $title,
          'description' => $description,
          'image' => $image,
          'preview_image' => $preview,
          'text' => $text
        ]);
    }
}

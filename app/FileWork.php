<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileWork extends Model
{
    public $timestamps = false;

    protected $fillable = ['path', 'olympiad_id'];

    public function answers()
    {
        return $this->hasMany(FileWorkAnswer::class);
    }
}

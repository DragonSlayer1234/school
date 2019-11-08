<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileWork extends Model
{
    protected $table = 'file_work';
    public $timestamps = false;

    public function answers()
    {
        return $this->hasMany(FileWorkAnswer::class);
    }
}

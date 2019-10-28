<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table='subject';
    public $timestamps = false;
    protected $fillable=['name'];

    public function olympics()
    {
        return $this->hasMany(Olympic::class);
    }
}

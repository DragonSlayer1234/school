<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public $timestamps = false;

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}

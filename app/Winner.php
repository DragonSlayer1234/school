<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public $timestamps = false;

    protected $fillable = ['participant_id', 'place'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public static function new($participant, $place)
    {
        return static::create([
            'participant_id' => $participant,
            'place' => $place
        ]);
    }
}

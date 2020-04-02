<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public $timestamps = false;

    protected $fillable = ['olympiad_id', 'participant_id', 'place'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public static function new($olympiad, $participant, $place)
    {
        return static::create([
            'olympiad_id' => $olympiad,
            'participant_id' => $participant,
            'place' => $place
        ]);
    }
}

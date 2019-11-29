<?php

namespace App\UseCases\Teacher;

use App\Winner;
use App\Participant;

class WinnerService
{
    public function choose(Participant $participant, $place)
    {
        return $winner = Winner::new($participant->id, $place);
    }
}

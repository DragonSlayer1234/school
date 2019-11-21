<?php

namespace App\UseCases\Teacher;

use App\Olympiad;
use App\Participant;

class ParticipantService
{
    public function mark(Participant $participant, $mark)
    {
        $participant->mark($mark);
    }
}

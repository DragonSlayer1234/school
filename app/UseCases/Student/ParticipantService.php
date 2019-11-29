<?php

namespace App\UseCases\Student;

use App\Olympiad;
use App\Participant;

class ParticipantService
{
    public function add(Olympiad $olympiad, $student)
    {
        $participant = $this->get($olympiad->id, $student);

        if (!$participant) {
            $participant = Participant::new($olympiad->id, $student);
        }
        return $participant;
    }

    public function answered(Participant $participant)
    {
        $participant->changeToAnswered();
    }

    private function get($olympiad, $student)
    {
        return Participant::where([
            ['olympiad_id', $olympiad],
            ['student_id', $student]
        ])->first();
    }
}

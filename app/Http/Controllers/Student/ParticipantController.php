<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{
    public function answer(Participant $participant)
    {
        try {
            $participant->answered();
        } catch (\LogicException $e) {
            return redirect()
                    ->route('student.file-answer.paper', $participant->olympiad)
                    ->with('error', $e->getMessage());
        }

        return redirect()->route('student.file-answer.paper', $participant->olympiad);
    }
}

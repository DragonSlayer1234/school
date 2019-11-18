<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Olympiad;
use App\Participant;

class OlympiadController extends Controller
{
    public function join(Olympiad $olympiad)
    {
        if ($this->getParticipant($olympiad->id)) {
            return redirect()->route('student.file-answer.paper', $olympiad);
        }
        $participant = Participant::new($olympiad->id, Auth::id());

        return redirect()->route('student.file-answer.paper', $olympiad);
    }

    private function getParticipant($olympiad)
    {
        return Participant::where([
                                ['olympiad_id', $olympiad],
                                ['student_id', Auth::id()]
                            ])->first();
    }
}

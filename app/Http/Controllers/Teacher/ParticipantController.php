<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{
    public function mark(Request $request, Participant $participant)
    {
        $participant->mark($request->mark);

        return redirect()->route('teacher.olympiad.check', $participant->olympiad);
    }

    public function setPlace(Request $request, Participant $participant)
    {
        $participant->setPlace($request->place);

        return redirect()->route('teacher.olympiad.check', $participant->olympiad);
    }
}

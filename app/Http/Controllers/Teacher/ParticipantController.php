<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{
    public function mark(Participant $participant, Request $request)
    {
        $participant->mark = $request->mark;
        $participant->save();

        return redirect()->route('teacher.olympiad.answers', $participant->olympiad);
    }
}

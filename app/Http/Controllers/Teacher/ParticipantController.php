<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCases\Teacher\ParticipantService;
use App\Participant;

class ParticipantController extends Controller
{
    public function mark(ParticipantService $service, Participant $participant, Request $request)
    {
        $service->mark($participant, $request->mark);

        return redirect()->route('teacher.olympiad.answers', $participant->olympiad);
    }
}

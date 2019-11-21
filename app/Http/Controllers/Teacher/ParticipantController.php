<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\UseCases\Teacher\ParticipantService;

class ParticipantController extends Controller
{
    public function mark(ParticipantService $service, Participant $participant, Request $request)
    {
        $service->mark($participant, $request->mark);

        return redirect()->route('teacher.olympiad.answers', $participant->olympiad);
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Student\ParticipantService;
use App\Olympiad;
use App\Participant;

class OlympiadController extends Controller
{
    public function join(ParticipantService $participantService, Olympiad $olympiad)
    {
        $participant = $participantService->add($olympiad, Auth::id());

        return redirect()->route('student.file-answer.paper', compact('participant'));
    }
}

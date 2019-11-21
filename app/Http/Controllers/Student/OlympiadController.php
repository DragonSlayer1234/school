<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Student\OlympiadManagerService;
use App\Olympiad;
use App\Participant;

class OlympiadController extends Controller
{
    public function join(OlympiadManagerService $service, Olympiad $olympiad)
    {
        $participant = $service->addParticipant($olympiad, Auth::id());

        return redirect()->route('student.file-answer.paper', compact('olympiad', 'participant'));
    }
}

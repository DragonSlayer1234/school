<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\UseCases\Student\ParticipantService;

class ParticipantController extends Controller
{
    public function answer(Request $request, ParticipantService $service, Participant $participant)
    {
        try {
            $service->answered();
        } catch (\LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('student.file-answer.paper', $participant->olympiad);
    }
}

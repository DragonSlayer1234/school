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
    public function join(Request $request, Olympiad $olympiad)
    {
        $student = $request->user();
        $olympiad->addParticipant($student);

        return redirect()->route('student.olympiad.answer', $olympiad);
    }

    public function answer(Olympiad $olympiad)
    {
        return view('student.olympiads.answer', compact('olympiad'));
    }
}

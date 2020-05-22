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

        return redirect()->route('student.olympiad.show', $olympiad);
    }

    public function show(Request $request, Olympiad $olympiad)
    {
        $student = $request->user();
        $participant = $olympiad->participants()
                                ->where('student_id', $student->id)
                                ->first();
        return view('student.olympiads.show', compact('olympiad', 'participant'));
    }

    public function history(Request $request)
    {
        $student = $request->user();
        $participants = Participant::where('student_id', $student->id)->get();

        return view('student.olympiads.history', compact('participants'));
    }
}

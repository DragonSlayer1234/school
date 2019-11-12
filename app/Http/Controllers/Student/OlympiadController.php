<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Olympiad;
use App\Participant;

class OlympiadController extends Controller
{
    public function active()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_ACTIVE)
                    ->get();
        return view('student.olympiad.active', compact('olympiads'));
    }

    public function join(Olympiad $olympiad)
    {
        if($this->getParticipant($olympiad->id, Auth::id())){
            return redirect()->route('student.olympiad.active')->with('error', 'you have already joined');
        }
        $participant = new Participant();
        $participant->student_id = Auth::id();
        $participant->olympiad_id = $olympiad->id;
        $participant->save();

        return redirect()->route('student.olympiad.active');
    }

    private function getParticipant($olympiad, $student)
    {
        $participant = Participant::where([
            ['olympiad_id', $olympiad],
            ['student_id', $student]
        ])->first();
        return $participant;
    }
}

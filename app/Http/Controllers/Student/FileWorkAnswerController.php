<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Olympiad;
use App\Participant;
use App\FileWorkAnswer;
use App\Http\Requests\FileWorkRequest;
use Illuminate\Support\Facades\Auth;

class FileWorkAnswerController extends Controller
{
    public function answer(Olympiad $olympiad)
    {
        return view('student.olympiad.answer', compact('olympiad'));
    }

    public function attach(FileWorkRequest $request, Olympiad $olympiad)
    {
        $file = new FileWorkAnswer();
        $path = $request->file('path')->store('answers');
        $file->path = $path;
        $participant = Participant::where([
            ['olympiad_id', $olympiad->id],
            ['student_id', Auth::id()]
        ])->first();
        $participant->fileAnswer()->save($file);
        return redirect()->route('student.olympiad.index');
    }
}

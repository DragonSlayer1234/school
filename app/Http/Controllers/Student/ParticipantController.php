<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\File;
use App\Olympiad;

class ParticipantController extends Controller
{
    public function answer(Olympiad $olympiad, Request $request)
    {
        $student = $request->user();
        $participant = $olympiad->participants()->where('student_id', $student->id)->first();
        if($participant != null && $participant->canAnswer()){
            $path = $request->answer->store("answers/{$student->id}", 'public');
            $file = File::create(['path'=>$path]);
            $participant->addAnswer($file);
        }
        return redirect()->route('student.olympiad.show', $olympiad);
    }
}

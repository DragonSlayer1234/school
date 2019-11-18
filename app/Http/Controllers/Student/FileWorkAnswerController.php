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
    public function paper(Olympiad $olympiad)
    {
        $participant = $this->getParticipant($olympiad->id);
        return view('student.file-answer.paper', compact('olympiad', 'participant'));
    }

    public function attach(FileWorkRequest $request, Participant $participant)
    {
        $file = new FileWorkAnswer();
        $path = $request->file('path')->store('answers');
        $file->path = $path;

        $participant->file()->save($file);
        return redirect()->route('student.file-answer.paper');
    }

    public function detach(Participant $participant)
    {
      Storage::delete($participant->file->path);
      $participant->file->delete();

      return redirect()->route('student.file-answer.paper');
    }

    private function getParticipant($olympiad)
    {
        return Participant::where([
                                  ['olympiad_id', $olympiad->id],
                                  ['student_id', Auth::id()]
                            ])->first();
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Http\Requests\FileWorkRequest;
use App\UseCases\Student\FileWorkAnswerService;

class FileWorkAnswerController extends Controller
{
    private $file;

    public function __construct(FileWOrkAnswerService $file)
    {
        $this->file = $file;
    }

    public function paper(Participant $participant)
    {
        $olympiad = $participant->olympiad;
        return view('student.file-answer.paper', compact('participant', 'olympiad'));
    }

    public function attach(FileWorkRequest $request, Participant $participant)
    {
        try {
            $this->file->attach($request, $participant);
        } catch (\LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }


        return redirect()->route('student.file-answer.paper', $participant);
    }

    public function detach(Request $request, Participant $participant)
    {
        try {
            $this->file->detach($participant);
        } catch (\LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('student.file-answer.paper', $participant);
    }
}

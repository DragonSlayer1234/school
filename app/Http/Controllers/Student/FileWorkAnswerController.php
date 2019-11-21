<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Olympiad;
use App\Participant;
use App\Http\Requests\FileWorkRequest;
use App\UseCases\Student\FileWOrkAnswerService;

class FileWorkAnswerController extends Controller
{
    private $file;

    public function __construct(FileWOrkAnswerService $file)
    {
        $this->file = $file;
    }

    public function paper(Olympiad $olympiad, Participant $participant)
    {
        return view('student.file-answer.paper', compact('olympiad', 'participant'));
    }

    public function attach(FileWorkRequest $request, Participant $participant)
    {
        $this->file->attach($request, $participant);

        return redirect()->route('student.file-answer.paper');
    }

    public function detach(Participant $participant)
    {
        $this->file->detach($participant);

        return redirect()->route('student.file-answer.paper');
    }
}

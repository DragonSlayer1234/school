<?php

namespace App\UseCases\Student;

use App\Olympiad;
use App\Participant;
use App\FileWorkAnswer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileWorkRequest;

class FileWorkAnswerService
{
    const FILE_WORK_PATH = 'answers';

    public function attach(FileWorkRequest $request, Participant $participant)
    {
        if ($participant->isAnswered()) {
            throw new \LogicException('You cannot change the work after you have answered.');
        }
        $student = $participant->student;

        $path = self::FILE_WORK_PATH . "/{$student->login}";
        $path = $request->file('path')->store($path);

        $file = FileWorkAnswer::create([
            'path' => $path,
            'participant_id' => $participant->id
        ]);
        $participant->file()->save($file);
    }

    public function detach(Participant $participant)
    {
        if ($participant->isAnswered()) {
            throw new \LogicException('You cannot change the work after you have answered.');
        }
        Storage::delete($participant->file->path);
        $participant->file->delete();
    }
}

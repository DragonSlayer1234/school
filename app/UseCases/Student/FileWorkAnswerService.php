<?php

namespace App\UseCases\Student;

use App\Olympiad;
use App\FileWorkAnswer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileWorkRequest;

class FileWorkService
{
    const FILE_WORK_PATH = 'answers';

    public function attach(FileWorkRequest $request, Participant $participant)
    {
        $student = $participant->student();

        $path = self::FILE_WORK_PATH . "/{$student->login}";
        $path = $request->file('path')->store($path);

        $file = FileWorkAnswer::create(['path' => $request->path]);
        $participant->file()->save($file);
    }

    public function detach(Olympiad $olympiad)
    {
        Storage::delete($participant->file->path);
        $participant->file->delete();
    }
}

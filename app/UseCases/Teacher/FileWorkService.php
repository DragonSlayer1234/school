<?php

namespace App\UseCases\Teacher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileWorkRequest;
use App\Olympiad;
use App\FileWork;

class FileWorkService
{
    const FILE_WORK_PATH = 'exercises';

    public function attach(FileWorkRequest $request, Olympiad $olympiad)
    {
        $teacher = Auth::user();

        $path = self::FILE_WORK_PATH . "/{$teacher->login}";
        $path = $request->file('path')->store($path);

        $work = FileWork::create([
            'path' => $path,
            'olympiad_id' => $olympiad->id
        ]);

        $olympiad->work_type = Olympiad::WORK_TYPE_FILE;
        $olympiad->file()->save($work);
        $olympiad->save();
    }

    public function detach(Olympiad $olympiad)
    {
        Storage::delete($olympiad->file->path);
        $olympiad->file->delete();
    }
}

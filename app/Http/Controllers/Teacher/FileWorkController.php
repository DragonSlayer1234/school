<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Olympiad;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFileWorkRequest;
use App\FileWork;
use Illuminate\Support\Facades\Storage;

class FileWorkController extends Controller
{
    public function create(Olympiad $olympiad)
    {
        return view('teacher.file.create', compact('olympiad'));
    }

    public function attach(CreateFileWorkRequest $request, Olympiad $olympiad)
    {
        $file = new FileWork();
        $path = $request->file('file')->store('exercises');
        $file->path = $path;
        $olympiad->work_type = Olympiad::WORK_TYPE_FILE;
        $olympiad->file()->save($file);
        $olympiad->save();

        return redirect()->route('teacher.olympiad.draft');
    }

    public function detach(Olympiad $olympiad)
    {
        Storage::delete($olympiad->file->path);
        $olympiad->file->delete();

        return redirect()->route('teacher.olympiad.draft');
    }
}

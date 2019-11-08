<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Olympiad;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFileWorkRequest;
use App\FileWork;

class FileWorkController extends Controller
{
    public function create(Olympiad $olympiad)
    {
        return view('teacher.file.create', compact('olympiad'));
    }

    public function store(CreateFileWorkRequest $request, Olympiad $olympiad)
    {
        $file = new FileWork();
        $path = $request->file('file')->store('exercises');
        $file->path = $path;
        $olympiad->work_type = Olympiad::WORK_TYPE_FILE;
        $olympiad->file()->save($file);

        return redirect()->route('teacher.olympiad.index');
    }
}

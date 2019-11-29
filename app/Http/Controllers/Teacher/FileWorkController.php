<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FileWorkRequest;
use App\UseCases\Teacher\FileWorkService;
use App\Olympiad;

class FileWorkController extends Controller
{
    private $fileWorkService;

    public function __construct(FileWorkService $fileWorkService)
    {
        $this->fileWorkService = $fileWorkService;
    }

    public function create(Olympiad $olympiad)
    {
        return view('teacher.file-works.create', compact('olympiad'));
    }

    public function attach(Request $request, Olympiad $olympiad)
    {
        dd($request->work);
        $this->fileWorkService->attach($request, $olympiad);

        return redirect()->route('teacher.olympiad.draft');
    }

    public function detach(Olympiad $olympiad)
    {
        $this->fileWorkService->detach($olympiad);

        return redirect()->route('teacher.olympiad.draft');
    }
}

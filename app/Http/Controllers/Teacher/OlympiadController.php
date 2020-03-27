<?php

namespace App\Http\Controllers\Teacher;

use App\Olympiad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateOlympiadRequest;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Teacher\OlympiadManagerService;
use App\Subject;
use App\Participant;
use App\Winner;
use App\File;
use LogicException;
use DomainException;

class OlympiadController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();
        $status = $request->status;
        $olympiads = $teacher->olympiads()->byStatus($status)->paginate(10);

        return view('teacher.olympiads.index', compact('olympiads', 'status'));
    }

    public function create()
    {
        $subjects = Subject::all();

        return view('teacher.olympiads.create', compact('subjects'));
    }

    public function store(CreateOlympiadRequest $request)
    {
        $teacher = $request->user();
        $path = $request->work->store("works/{$teacher->id}", 'public');

        $work = File::create([
            'path' => $path
        ]);

        $olympiad = Olympiad::new (
            $teacher->id,
            $request->subject,
            $work->id,
            $request->name,
            $request->description,
            $request->startDate,
            $request->endDate,
            $request->cost,
            $request->duration
        );

        return redirect()->route('teacher.olympiad.index');
    }

    public function show(Olympiad $olympiad)
    {
        return view('teacher.olympiads.show', compact('olympiad'));
    }
}

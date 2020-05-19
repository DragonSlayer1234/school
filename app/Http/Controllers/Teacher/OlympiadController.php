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
use App\UseCases\OlympiadSorter;
use LogicException;
use DomainException;

class OlympiadController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();
        $subjects = Subject::all();
        $selected = collect();
        $selected->status = $request->status;
        $selected->subject = $request->subject;
        $selected->date = $request->date;

        $olympiads = OlympiadSorter::sort($teacher->olympiads(), $selected);

        return view('teacher.olympiads.index',
                compact('olympiads', 'selected', 'subjects'));
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

    public function rejectReason(Olympiad $olympiad)
    {
        return view('teacher.olympiads.reject-reason', compact('olympiad'));
    }

    public function check(Olympiad $olympiad)
    {
        return view('teacher.olympiads.check', compact('olympiad'));
    }

    public function finish(Request $request, Olympiad $olympiad)
    {
        try {
            $olympiad->finished();
            $request->session()->flash('success', 'Победители объявлены');
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('teacher.olympiad.index');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Olympiad;
use App\Subject;
use App\UseCases\OlympiadSorter;

class OlympiadController extends Controller
{
    public function __construct()
    {
        $this->middleware('active.olympiad')->only('show');
    }

    public function index(Request $request)
    {
        $teacher = $request->user();
        $subjects = Subject::all();
        $selected = collect();
        $selected->status = $request->status;
        $selected->subject = $request->subject;
        $selected->date = $request->date;

        $olympiads = OlympiadSorter::getSortedView($selected);

        return view('olympiads.index',
            compact('olympiads', 'subjects', 'selected'));
    }

    public function participants(Olympiad $olympiad)
    {
        return view('olympiads.participants', compact('olympiad'));
    }

    public function passed()
    {
        $olympiads = Olympiad::byStatus(Olympiad::STATUS_PASSED)->get();
        return view('olympiads.passed', compact('olympiads'));
    }

    public function winners(Olympiad $olympiad)
    {
        return view('olympiads.winners', compact('olympiad'));
    }

     public function show(Olympiad $olympiad)
     {
         return view('olympiads.show', compact('olympiad'));
     }
}

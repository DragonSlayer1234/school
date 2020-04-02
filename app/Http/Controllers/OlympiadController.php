<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Olympiad;

class OlympiadController extends Controller
{
    public function __construct()
    {
        $this->middleware('active.olympiad')->only('show');
    }

    public function index(Request $request)
    {
        $status = $request->status;
        if ($status === null) {
            $status = 'active';
        } elseif (!Olympiad::isCorrectViewStatus($status)) {
            abort(404);
        }
        $olympiads = Olympiad::byStatus($status)->paginate(10);

        return view('olympiads.index', compact('olympiads', 'status'));
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOlympiadRequest;
use Illuminate\Http\Request;
use App\Olympiad;
use App\Subject;
use Illuminate\Support\Facades\Storage;

class OlympiadController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::active()->get();
        return view('admin.olympiads.index', compact('olympiads'));
    }

    public function moderating()
    {
        $olympiads = Olympiad::moderating()->get();
        return view('admin.olympiads.moderating', compact('olympiads'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.olympiads.create', compact('subjects'));
    }

    public function show(Olympiad $olympiad)
    {
        return view('admin.olympiads.show', compact('olympiad'));
    }

    public function accept(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_UPCOMING;
        $olympiad->save();
        return redirect()->route('admin.olympiad.moderating');
    }

    public function reject(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_REJECTED;
        $olympiad->save();
        return redirect()->route('admin.olympiad.moderating');
    }

    public function start(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_ACTIVE;
        $olympiad->save();
        return redirect()->route('admin.olympiad.index');
    }

    public function finish(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_CHECKING;
        $olympiad->save();
        return redirect()->route('admin.olympiad.index');
    }
}

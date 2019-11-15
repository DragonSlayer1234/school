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

    public function store(CreateOlympiadRequest $request)
    {
        $request->validated();

        $olympiad = new Olympiad();
        $olympiad->fill($request->except('exercise'));

        $path = $request->file('exercise')->store('exercises');
        $olympiad->exercise = $path;
        $olympiad->status = Olympiad::STATUS_UPCOMING;
        $olympiad->save();
        return redirect()->route('admin.olympiad.index');
    }

    public function show(Olympiad $olympiad)
    {
        return view('admin.olympiads.show', compact('olympiad'));
    }

    public function download(Request $request)
    {
        return Storage::download($request->path);
    }

    public function accept(Olympiad $olympiad)
    {
        if (!$olympiad->isModerating()) {
            return redirect()
                    ->route('admin.olympiad.index')
                    ->with('error', 'Can not accept the olympiad');
        }
        $olympiad->status = Olympiad::STATUS_UPCOMING;
        $olympiad->save();
        return redirect()->route('admin.olympiad.moderating');
    }

    public function reject(Olympiad $olympiad)
    {
        if (!$olympiad->isModerating()) {
            return redirect()
                    ->route('admin.olympiad.index')
                    ->with('error', 'Can not reject the olympiad');
        }
        $olympiad->status = Olympiad::STATUS_REJECTED;
        $olympiad->save();
        return redirect()->route('admin.olympiad.moderating');
    }
}

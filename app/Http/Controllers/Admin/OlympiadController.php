<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOlympiadRequest;
use App\Olympiad;
use App\Subject;
use Illuminate\Support\Facades\Storage;

class OlympiadController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::all();
        return view('admin.olympiads.index', compact('olympiads'));
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

    public function download(Request $request)
    {
        $path = $request->exercise;
        return Storage::download($path);
    }
}

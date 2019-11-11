<?php

namespace App\Http\Controllers\Teacher;

use App\Olympiad;
use Illuminate\Http\Request;
use App\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOlympiadRequest;
use Illuminate\Support\Facades\Auth;

class OlympiadController extends Controller
{

    public function upcoming()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_UPCOMING)
                    ->get();
        return view('teacher.olympiad.upcoming', compact('olympiads'));
    }

    public function active()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_ACTIVE)
                    ->get();
        return view('teacher.olympiad.active', compact('olympiads'));
    }

    public function draft()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_DRAFT)
                    ->get();
        return view('teacher.olympiad.draft', compact('olympiads'));
    }

    public function checking()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_CHECKING)
                    ->get();
        return view('teacher.olympiad.checking', compact('olympiads'));
    }

    public function moderating()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_MODERATING)
                    ->get();
        return view('teacher.olympiad.moderating', compact('olympiads'));
    }

    public function rejected()
    {
        $olympiads = Olympiad::author(Auth::id())
                    ->byStatus(Olympiad::STATUS_REJECTED)
                    ->get();
        return view('teacher.olympiad.rejected', compact('olympiads'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $types = Olympiad::getTypes();

        return view('teacher.olympiad.create', compact('subjects', 'types'));
    }
    
    public function store(CreateOlympiadRequest $request)
    {
        $olympiad = new Olympiad();
        $olympiad->fill($request->validated());
        $olympiad->paid = $request->filled('paid');
        $olympiad->teacher_id = Auth::id();
        $olympiad->status = Olympiad::STATUS_DRAFT;
        $olympiad->save();

        return redirect()->route('teacher.work.choose-type', compact('olympiad'));
    }

    public function toModeration(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_MODERATING;
        $olympiad->save();

        return redirect()->route('teacher.olympiad.moderating');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Olympiad  $olympiad
     * @return \Illuminate\Http\Response
     */
    public function show(Olympiad $olympiad)
    {
        return view('teacher.olympiad.show', compact('olympiad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Olympiad  $olympiad
     * @return \Illuminate\Http\Response
     */
    public function edit(Olympiad $olympiad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Olympiad  $olympiad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olympiad $olympiad)
    {
        //
    }
}

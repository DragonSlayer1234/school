<?php

namespace App\Http\Controllers\Teacher;

use App\Olympiad;
use Illuminate\Http\Request;
use App\Subject;
use App\Participant;
use App\Winner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOlympiadRequest;
use Illuminate\Support\Facades\Auth;

class OlympiadController extends Controller
{
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

    public function answers(Olympiad $olympiad)
    {
        return view('teacher.olympiad.answers', compact('olympiad'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $types = Olympiad::getTypes();

        return view('teacher.olympiad.create', compact('subjects', 'types'));
    }

    public function store(CreateOlympiadRequest $request)
    {
        $olympiad = Olympiad::newDraft(
                                  Auth::id(),
                                  $request->subject_id,
                                  $request->name,
                                  $request->type,
                                  $request->start_date,
                                  $request->end_date,
                                  $request->filled('paid'),
                                  $request->cost
                                );

        return redirect()->route('teacher.work.choose-type', compact('olympiad'));
    }

    public function toModeration(Olympiad $olympiad, Request $request)
    {
        try {
            $olympiad->toModeration();
        } catch (\LogicException $e) {
            return redirect()
                  ->route('teacher.olympiad.draft')
                  ->with('error', $e->getMessage());
        }

        return redirect()->route('teacher.olympiad.moderating');
    }

    public function mark(Participant $participant, Request $request)
    {
        $participant->mark = $request->mark;
        $participant->save();
        $olympiad = $participant->olympiad;

        return redirect()->route('teacher.olympiad.answers', compact('olympiad'));
    }

    public function chooseWinner(Participant $participant, Request $request)
    {
        $winner = new Winner();
        $winner->participant_id = $participant->id;
        $winner->place = $request->place;
        $winner->save();
        $olympiad = $participant->olympiad;

        return redirect()->route('teacher.olympiad.answers', compact('olympiad'));
    }

    public function announce(Olympiad $olympiad)
    {
        $olympiad->status = Olympiad::STATUS_PASSED;
        $olympiad->save();

        return redirect()->route('teacher.olympiad.checking');
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

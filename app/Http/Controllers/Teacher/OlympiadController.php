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
use App\UseCases\Teacher\OlympiadManagerService;
use LogicException;
use DomainException;

class OlympiadController extends Controller
{
    private $olympiadManager;

    public function __construct(OlympiadManagerService $olympiadManager)
    {
        $this->olympiadManager = $olympiadManager;
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
        $olympiad = $this->olympiadManager->create($request);

        return redirect()->route('teacher.work.choose-type', compact('olympiad'));
    }

    public function toModeration(Request $request, Olympiad $olympiad)
    {
        try {
            $this->olympiadManager->sendToModeration($olympiad);
        } catch (LogicException $e) {
            return redirect()
                  ->route('teacher.olympiad.draft')
                  ->with('error', $e->getMessage());
        }

        return redirect()->route('teacher.olympiad.moderating');
    }

    public function announce(Olympiad $olympiad)
    {
        try {
            $this->olympiadManager->announce($olympiad);
        } catch (LogicException $e) {
            return redirect()->route('teacher.olympiad.checking', $olympiad);
        }

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

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $types = Olympiad::getTypes();

        return view('teacher.olympiad.create', compact('subjects', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOlympiadRequest $request)
    {
        $olympiad = new Olympiad();
        $olympiad->fill($request->validated());
        $olympiad->paid = $request->filled('paid');
        $olympiad->teacher_id = Auth::id();
        $olympiad->status = Olympiad::STATUS_DRAFT;
        $olympiad->save();

        return redirect()->route('teacher.olympiad.choose-work-type', compact('olympiad'));
    }

    public function choose(Olympiad $olympiad)
    {
        return view('teacher.olympiad.choose-work-type', compact('olympiad'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Olympiad  $olympiad
     * @return \Illuminate\Http\Response
     */
    public function show(Olympiad $olympiad)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Olympiad  $olympiad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olympiad $olympiad)
    {
        //
    }
}

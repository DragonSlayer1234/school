<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Olympic;
use App\Subject;
use Illuminate\Support\Facades\Storage;


class OlympicController extends Controller
{
    public function index()
    {
        $olympics = Olympic::all();
        return view('admin.olympics.index', compact('olympics', 'olympics'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.olympics.create', compact('subjects','subjects'));
    }

    public function store(Request $request)
    {
        $olympic = new Olympic();
        $olympic->fill([
          'name'=>$request->name,
          'startDate'=>$request->startDate,
          'endDate'=>$request->endDate,
          'cost'=>$request->cost,
          'subjectId'=>$request->subjectId
        ]);

        $path = $request->file('exercise')->store('exercises');
        $olympic->exercise = $path;
        $olympic->status = Olympic::STATUS_UPCOMING;
        $olympic->save();
        return redirect('/admin/olympic');
    }

    public function download(Request $request)
    {
        $path = $request->exercise;
        return Storage::download($path);
    }

}

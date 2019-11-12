<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Http\Requests\UpdateStudentRequest;

class CabinetController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        return view('student.cabinet.index', compact('student'));
    }

    public function edit()
    {
        $student = Auth::user();
        return view('student.cabinet.edit', compact('student'));
    }


    public function update(UpdateStudentRequest $request)
    {
        $validated = $request->validated();
        $student = Auth::user();

        $student->fill($validated);
        $student->status = Student::STATUS_ACTIVE;
        $student->save();

        return redirect()->route('student.cabinet.index');
    }


}

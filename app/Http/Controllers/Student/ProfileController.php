<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;

class ProfileController extends Controller
{
    public function edit()
    {
        $student = Auth::user();
        return view('student.profile.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request)
    {
        $validated = $request->validated();
        $student = Auth::user();

        $student->fill($validated);
        $student->status = Student::STATUS_ACTIVE;
        $student->save();

        return redirect()->route('student.profile.edit');
    }
}

<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Teacher;

class ProfileController extends Controller
{
    public function edit()
    {
        $teacher = Auth::user();
        return view('teacher.profile.edit', compact('teacher'));
    }

    public function update(UpdateStudentRequest $request)
    {
        $validated = $request->validated();
        $teacher = Auth::user();

        $teacher->fill($validated);
        $teacher->status = Teacher::STATUS_ACTIVE;
        $teacher->save();

        return redirect()->route('teacher.profile.edit');
    }
}

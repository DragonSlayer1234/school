<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Student\ProfileService;
use Illuminate\Http\Request;
use App\Student;

class ProfileController extends Controller
{
    public function edit()
    {
        $student = Auth::user();
        return view('student.profile.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, ProfileService $profile)
    {
        $student = Auth::user();
        $profile->edit($request, $student);

        return redirect()->route('student.profile.edit');
    }
}

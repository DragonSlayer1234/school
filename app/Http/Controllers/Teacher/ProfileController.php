<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UseCases\Teacher\ProfileService;
use App\Teacher;

class ProfileController extends Controller
{
    public function edit()
    {
        $teacher = Auth::user();
        return view('teacher.profile.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, ProfileService $profile)
    {
        $teacher = Auth::user();
        $profile->edit($request, $teacher);

        return redirect()->route('teacher.profile.edit');
    }
}

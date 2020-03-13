<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Requests\ChangePasswordRequest;
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

    public function passwordForm()
    {
        $teacher = Auth::user();
        return view('teacher.profile.change-password');
    }

    public function update(UpdateTeacherRequest $request, ProfileService $profile)
    {
        $teacher = Auth::user();
        $profile->edit($request, $teacher);
        $request->session()->flash('success', 'Данные обновлены');

        return redirect()->route('teacher.profile.edit');
    }

    public function changePassword(ChangePasswordRequest $request, ProfileService $profile)
    {
        $teacher = Auth::user();
        $profile->changePassword($teacher, $request->password);
        $request->session()->flash('success', 'Пароль был успешно изменен');

        return redirect()->route('teacher.profile.password-form');
    }
}

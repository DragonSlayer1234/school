<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Teacher;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $teacher = $request->user();
        return view('teacher.profile.edit', compact('teacher'));
    }

    public function passwordForm()
    {
        return view('teacher.profile.change-password');
    }

    public function update(UpdateTeacherRequest $request)
    {
        $teacher = $request->user();
        $teacher->edit(
                        $request->firstname,
                        $request->lastname,
                        $request->surname
                      );

        $request->session()->flash('success', 'Данные обновлены');

        return redirect()->route('teacher.profile.edit');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $teacher = $request->user();
        $teacher->changePassword($request->password);

        $request->session()->flash('success', 'Пароль был успешно изменен');

        return redirect()->route('teacher.profile.password-form');
    }
}

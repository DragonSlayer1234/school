<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Student;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $student = $request->user();
        return view('student.profile.edit', compact('student'));
    }

    public function passwordForm()
    {
        return view('student.profile.change-password');
    }

    public function update(UpdateStudentRequest $request)
    {
        $student = $request->user();
        $student->edit(
                        $request->firstname,
                        $request->lastname,
                        $request->surname
                      );

        $request->session()->flash('success', 'Данные обновлены');

        return redirect()->route('student.profile.edit');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $student = $request->user();
        $student->changePassword($request->password);

        $request->session()->flash('success', 'Пароль был успешно изменен');

        return redirect()->route('student.profile.password-form');
    }
}

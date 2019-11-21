<?php

namespace App\UseCases\Admin;

use App\Teacher;
use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherService
{
    public function generate(CreateTeacherRequest $request)
    {
        $teacher = Teacher::generate(
          $request->login,
          $request->firstname,
          $request->surname,
          $request->lastname
        );
    }

    public function updateInformation(Teacher $teacher, UpdateTeacherRequest $request)
    {
        $teacher->fill([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'lastname' => $request->lastname
        ]);
        $teacher->save();
    }

    public function resetPassword(Teacher $teacher)
    {
        $teacher->resetPassword();
    }
}

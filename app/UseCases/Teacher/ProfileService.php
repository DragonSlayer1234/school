<?php

namespace App\UseCases\Teacher;

use App\Teacher;
use App\Http\Requests\Teacher\UpdateTeacherRequest;

class ProfileService
{
    public function edit(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->fill([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'surname' => $request->surname
        ]);

        $teacher->save();
    }

    public function changePassword(Teacher $teacher, $password)
    {
        $teacher->changePassword($password);
    }
}

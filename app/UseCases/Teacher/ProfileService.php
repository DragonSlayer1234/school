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
            'surname' => $request->surname,
            'lastname' => $request->lastname
        ]);

        if ($teacher->isEmptyProfile()) {
            $teacher->status = Teacher::STATUS_ACTIVE;
        }
        $teacher->save();
    }
}

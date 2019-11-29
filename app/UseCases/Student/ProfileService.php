<?php

namespace App\UseCases\Student;

use App\Student;
use App\Http\Requests\Student\UpdateStudentRequest;

class ProfileService
{
    public function edit(UpdateStudentRequest $request, Student $student)
    {
        $student->fill([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'lastname' => $request->lastname
        ]);

        if ($student->isEmptyProfile()) {
            $student->status = Student::STATUS_ACTIVE;
        }
        $student->save();
    }
}

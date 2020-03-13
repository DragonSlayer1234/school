<?php

namespace App\UseCases\Admin;

use App\Student;
use App\Http\Requests\Admin\CreateStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;

class StudentService
{
    public function generate(CreateStudentRequest $request)
    {
        $student = Student::generate(
          $request->username,
          $request->firstname,
          $request->surname,
          $request->lastname
        );
    }

    public function updateInformation(Student $student, UpdateStudentRequest $request)
    {
        $student->fill([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'lastname' => $request->lastname
        ]);
        $student->save();
    }

    public function resetPassword(Student $student)
    {
        $student->resetPassword();
    }
}

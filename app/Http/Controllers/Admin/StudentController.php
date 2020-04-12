<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\UseCases\Admin\StudentService;
use Illuminate\Support\Facades\Auth;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Student::paginate(10);
        $active = 'student';
        $title = 'ученика';
        return view('admin.users.index', compact('users', 'active', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Создать ученика';
        $active = 'student';
        return view('admin.users.create', compact('title', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $student = Student::generate(
            $request->username,
            $request->firstname,
            $request->lastname,
            $request->surname
        );

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->edit(
            $request->firstname,
            $request->lastname,
            $request->surname
        );

        return redirect()->route('admin.student.index');
    }

    public function resetPassword(Student $student)
    {
        $student->resetPassword();
        Auth::guard('student')->logout();

        return redirect()->route('admin.student.index');
    }
}

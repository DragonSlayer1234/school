<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTeacherRequest;
use App\Http\Requests\Admin\UpdateTeacherRequest;
use App\UseCases\Admin\TeacherService;
use Illuminate\Support\Facades\Auth;
use App\Teacher;

class TeacherController extends Controller
{
    private $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Teacher::paginate(10);
        $active = 'teacher';
        $title = 'учителя';
        return view('admin.users.index', compact('users', 'active', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Создать учителя';
        $active = 'teacher';
        return view('admin.users.create', compact('title', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $teacher = Teacher::generate(
            $request->username,
            $request->firstname,
            $request->lastname,
            $request->surname
        );

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->teacherService->updateInformation($teacher, $request);

        return redirect()->route('admin.teacher.index');
    }

    public function resetPassword(Teacher $teacher)
    {
        $this->teacherService->resetPassword($teacher);
        Auth::guard('teacher')->logout();

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

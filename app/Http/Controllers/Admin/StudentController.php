<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', [
          'students'=>$students
        ]);
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function save(Request $request)
    {
        $student = new Student();
        $student->login=$request->input('login');
        $student->firstname=$request->input('firstname');
        $student->surname=$request->input('surname');
        $student->lastname=$request->input('lastname');
        $student->password=Str::random(8);
        $student->status=Student::STATUS_EMPTY;
        $student->save();
        return redirect('/admin/student/');
    }

    public function edit($id)
    {
        $student=Student::findOrFail($id);
        return view('admin.student.edit',[
          'student'=>$student
        ]);
    }

    public function update(Request $request, $id)
    {
        $student=Student::findOrFail($id);
        $student->fill([
          'firstname'=>$request->firstname,
          'surname'=>$request->surname,
          'lastname'=>$request->lastname,
        ]);
        $student->save();
        return redirect('/admin/student');
    }
}

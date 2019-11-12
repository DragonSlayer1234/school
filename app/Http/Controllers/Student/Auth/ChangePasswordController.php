<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Student;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function showPasswordForm()
    {
        return view('student.auth.password-form');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->status = Student::STATUS_EMPTY;
        $user->save();
        Auth::guard("student")->logout();

        return redirect()->route('student.login');
    }
}

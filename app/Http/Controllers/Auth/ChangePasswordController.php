<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:student,teacher', 'empty.profile:student,teacher']);
    }

    public function showPasswordForm()
    {
        return view('auth.password-form');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->changePassword($request->password);
        Auth::logout();

        return redirect()->route('home');
    }
}

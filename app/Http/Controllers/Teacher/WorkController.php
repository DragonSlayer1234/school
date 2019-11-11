<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Olympiad;

class WorkController extends Controller
{
    public function chooseType(Olympiad $olympiad)
    {
        return view('teacher.work.choose-type', compact('olympiad'));
    }
}

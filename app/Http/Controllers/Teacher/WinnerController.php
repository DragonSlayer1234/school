<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Winner;

class WinnerController extends Controller
{
    public function chooseWinner(Participant $participant, Request $request)
    {
        Winner::choose($participant->id, $request->place);

        return redirect()->route('teacher.olympiad.answers', $participant->olympiad);
    }
}

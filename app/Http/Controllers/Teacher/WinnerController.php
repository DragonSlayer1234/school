<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Winner;

class WinnerController extends Controller
{
    public function choose(WinnerService $service, Participant $participant, Request $request)
    {
        $service->choose($participant, $place);

        return redirect()->route('teacher.olympiad.answers', $participant->olympiad);
    }
}

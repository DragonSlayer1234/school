<?php

namespace App\UseCases\Teacher;

use App\Olympiad;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Teacher\CreateOlympiadRequest;

class OlympiadManagerService
{
    public function create(CreateOlympiadRequest $request)
    {
        $olympiad = Olympiad::newDraft (
            Auth::id(),
            $request->subject_id,
            $request->name,
            $request->type,
            $request->start_date,
            $request->end_date,
            $request->filled('paid'),
            $request->cost
        );

        return $olympiad;
    }

    public function sendToModeration(Olympiad $olympiad)
    {
        $olympiad->changeToModeration();
    }

    public function announce(Olympiad $olympiad)
    {
        $olympiad->changeToPassed();
    }
}

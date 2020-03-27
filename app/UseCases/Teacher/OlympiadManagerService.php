<?php

namespace App\UseCases\Teacher;

use App\Olympiad;
use App\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Teacher\CreateOlympiadRequest;

class OlympiadManagerService
{
    public function create(CreateOlympiadRequest $request)
    {
        $teacher = Auth::user();
        $path = $request->work->store("works/{$teacher->id}", 'public');

        $work = File::create([
            'path' => $path
        ]);

        $olympiad = Olympiad::new (
            $teacher->id,
            $request->subject,
            $work->id,
            $request->name,
            $request->description,
            $request->startDate,
            $request->endDate,
            $request->cost,
            $request->duration
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

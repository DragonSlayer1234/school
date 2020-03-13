<?php

namespace App\UseCases\Admin;

use App\Olympiad;

class OlympiadManagerService
{
    public function accept(Olympiad $olympiad)
    {
        $olympiad->changeToUpcoming();
    }

    public function reject(Olympiad $olympiad)
    {
        $olympiad->changeToRejected();
    }

    public function start(Olympiad $olympiad)
    {
        $olympiad->changeToActive();
    }

    public function finish(Olympiad $olympiad)
    {
        $olympiad->changeToCheck();
    }
}

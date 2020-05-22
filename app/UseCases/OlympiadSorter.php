<?php

namespace App\UseCases;

use App\Olympiad;

class OlympiadSorter
{
    public static function sort($olympiads, $selected)
    {
        if ($selected->status !== null && Olympiad::isCorrectStatus($selected->status)) {
            $olympiads->byStatus($selected->status);
        }
        if ($selected->subject !== null) {
            $olympiads->where('subject_id', $selected->subject);
        }
        if ($selected->date === 'new') {
            $olympiads->orderBy('start_date', 'desc');
        } elseif ($selected->date === 'old') {
            $olympiads->orderBy('start_date', 'asc');
        }

        return $olympiads->get();
    }

    public static function getSortedView($selected)
    {
        $olympiads = null;

        if ($selected->status === null ||
        !Olympiad::isCorrectViewStatus($selected->status)) {
            $selected->status = 'active';
            $olympiads = Olympiad::byStatus(Olympiad::STATUS_ACTIVE);
        } else {
            $olympiads = Olympiad::byStatus($selected->status);
        }
        if ($selected->subject !== null) {
            $olympiads->where('subject_id', $selected->subject);
        }
        if ($selected->date === 'new') {
            $olympiads->orderBy('start_date', 'desc');
        } elseif ($selected->date === 'old') {
            $olympiads->orderBy('start_date', 'asc');
        }

        return $olympiads->get();
    }
}

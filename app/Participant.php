<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps = false;

    protected $fillable = ['olympiad_id', 'student_id', 'end_time'];

    protected $dates = ['end_time'];

    public static function new($olympiad, $student, $end)
    {
        return static::create([
            'olympiad_id' => $olympiad,
            'student_id' => $student,
            'end_time' => $end
        ]);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function olympiad()
    {
        return $this->belongsTo(Olympiad::class);
    }

    public function answer()
    {
        return $this->belongsTo(File::class, 'answer_id');
    }

    public function hasAnswer()
    {
        return $this->answer()->exists();
    }

    public function mark($mark)
    {
        $this->mark = $mark;
        $this->save();
    }

    public function addAnswer(File $answer)
    {
        if ($this->hasAnswer()) {
            return;
        }
        $this->answer()->associate($answer);
        $this->save();
    }
}

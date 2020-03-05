<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps = false;

    protected $fillable = ['olympiad_id', 'student_id'];

    public static function new($olympiad, $student)
    {
        return static::create([
            'olympiad_id' => $olympiad,
            'student_id' => $student
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
}

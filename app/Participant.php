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

    public function scopeAnswered($query)
    {
        return $query->where('is_answered', true);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function olympiad()
    {
        return $this->belongsTo(Olympiad::class);
    }

    public function file()
    {
        return $this->hasOne(FileWorkAnswer::class);
    }

    public function hasFileAnswer()
    {
        return $this->file ? true : false;
    }

    public function hasAnswer()
    {
        return $this->hasFileAnswer();
    }

    public function isAnswered()
    {
        return $this->is_answered;
    }

    public function mark($mark)
    {
        $this->mark = $mark;
        $this->save();
    }

    public function changeToAnswered()
    {
        if ($this->isAnswered()) {
            throw new \LogicException('You have already answered');
        } elseif (!$this->hasAnswer()) {
            throw new \LogicException('The participant does not have an answer');
        }
        $this->is_answered = true;
        $this->save();
    }
}

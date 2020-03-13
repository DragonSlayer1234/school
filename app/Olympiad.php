<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Olympiad extends Model
{
    const STATUS_MODERATION = 'moderation';
    const STATUS_UPCOMING = 'upcoming';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ACTIVE = 'active';
    const STATUS_CHECK = 'check';
    const STATUS_FINISHED = 'finished';

    protected $fillable = [
        'name', 'start_date', 'end_date', 'cost', 'subject_id', 'teacher_id',
        'status', 'work_id', 'description'
    ];

    public $timestamps = false;

    protected $dates = ['start_date', 'end_date'];

    public static function getStatuses()
    {
        return [
            self::STATUS_MODERATION => 'На модерации',
            self::STATUS_UPCOMING => 'Предстоящие',
            self::STATUS_ACTIVE => 'Активные',
            self::STATUS_CHECK => 'На проверке',
            self::STATUS_FINISHED => 'Прошедшие',
            self::STATUS_REJECTED => 'Отклоненные'
        ];
    }

    public static function isCorrectStatus($status)
    {
        return in_array($status, array_keys(self::getStatuses()));
    }

    public static function new($author, $subject, $work, $name, $description,
                                 $startDate, $endDate, $cost)
    {
        return static::create([
            'teacher_id' => $author,
            'subject_id' => $subject,
            'work_id' => $work,
            'name' => $name,
            'description' => $description,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'cost' => $cost,
            'status' => self::STATUS_MODERATION
        ]);
    }

    public function scopeAuthor($query, $teacher)
    {
        return $query->where('teacher_id', $teacher);
    }

    public function scopeByStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query->where('status', static::STATUS_MODERATION);
    }

    public function canChangeToModeration()
    {
        return $this->isDraft() || $this->isRejected();
    }

    public function isModeration()
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isUpcoming()
    {
        return $this->status === self::STATUS_UPCOMING;
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isDraft()
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function isCheck()
    {
        return $this->status === self::STATUS_CHECK;
    }

    private function isStartTime()
    {
        return $this->start_date->diffInDays(Carbon::now()) === 0;
    }

    private function isEndDate()
    {
        return $this->end_date->diffInDays(Carbon::now()) === 0;
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }

    public function work()
    {
        return $this->belongsTo(File::class, 'work_id');
    }

    public function addParticipant(Student $student)
    {
        if ($this->hasParticipant($student)) {
            return;
        }
        return Participant::new($this->id, $student->id);
    }

    public function hasParticipant(Student $student)
    {
        return $this->participants()
                    ->where('student_id', $student->id)
                    ->exists();
    }

    public function changeToUpcoming()
    {
        if (!$this->isModeration()) {
            throw new \DomainException('Данная олимпиада не соответствует требованиям');
        }
        $this->status = self::STATUS_UPCOMING;
        $this->save();
    }

    public function changeToRejected()
    {
        if (!$this->isModeration()) {
            throw new \DomainException('Данная олимпиада не соответствует требованиям');
        }
        $this->status = self::STATUS_REJECTED;
        $this->save();
    }

    public function changeToActive()
    {
        if (!$this->isUpcoming()) {
            throw new \DomainException('Данная олимпиада не соответствует требованиям');
        } elseif (!$this->isStartTime()) {
            throw new \LogicException('Дата начала и текущая дата не совпадают ');
        }
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }

    public function changeToCheck()
    {
        if (!$this->isActive()) {
            throw new \DomainException('Данная олимпиада не соответствует требованиям');
        } elseif (!$this->isEndDate()) {
            throw new \LogicException('Current time does not match the end date');
        }
        $this->status = self::STATUS_CHECK;
        $this->save();
    }

    public function getAllDates()
    {
        return $this->start_date->locale('ru')->isoFormat('D MMMM YYYY')
                . ' - ' .
                $this->end_date->locale('ru')->isoFormat('D MMMM YYYY');
    }
}

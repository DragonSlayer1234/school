<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterval;

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
        'status', 'work_id', 'description', 'duration'
    ];

    public $timestamps = false;

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

    public static function getViewStatuses()
    {
        return [
            self::STATUS_UPCOMING => 'Предстоящие',
            self::STATUS_ACTIVE => 'Активные',
            self::STATUS_FINISHED => 'Прошедшие',
        ];
    }

    public static function isCorrectStatus($status)
    {
        return in_array($status, array_keys(self::getStatuses()));
    }

    public static function isCorrectViewStatus($status)
    {
        return in_array($status, array_keys(self::getViewStatuses()));
    }

    public static function new($author, $subject, $work, $name, $description,
                                 $startDate, $endDate, $cost, $duration)
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
            'duration' => $duration,
            'status' => self::STATUS_MODERATION
        ]);
    }

    public function reason()
    {
        return $this->hasOne(RejectedReason::class);
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

    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_UPCOMING)
                    ->orWhere('status', static::STATUS_ACTIVE);
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
        $now = Carbon::now();
        return $this->getStartDate()->timestamp < $now->timestamp;
    }

    private function isEndDate()
    {
        $now = Carbon::now();
        return $this->getEndDate()->timestamp < $now->timestamp;
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
        $end = Carbon::now();
        $time = Carbon::createFromFormat('H:i:s', $this->duration);
        $end->addHour($time->hour);
        $end->addMinute($time->minute);

        if ($end->timestamp > $this->getEndDate()->timestamp) {
            $end = $this->getEndDate();
        }
        return Participant::new($this->id, $student->id, $end);
    }

    public function hasParticipant(Student $student)
    {
        return $this->participants()
                    ->where('student_id', $student->id)
                    ->exists();
    }

    public function setPlace(Participant $participant, $place)
    {
        if ($this->hasWinner($participant)) {
            $winner = $this->winners()
                            ->where('participant_id', $participant->id)
                            ->first();
            $winner->place = $place;
            $winner->save();
            return $winner;
        }
        return Winner::new($this->id, $participant->id, $place);
    }

    public function hasWinner(Participant $participant)
    {
        return $this->winners()
                    ->where('participant_id', $participant->id)
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

    public function finished()
    {
        if (!$this->isCheck()) {
            throw new \DomainException('Данная олимпиада не соответствует требованиям');
        }
        $this->status = self::STATUS_FINISHED;
        $this->save();
    }

    public function getStartDate()
    {
        return Carbon::parse( $this->start_date)->locale('ru');
    }

    public function getEndDate()
    {
        return Carbon::parse($this->end_date)->locale('ru');
    }

    public function getDuration()
    {
        CarbonInterval::setLocale('ru');
        return CarbonInterval::createFromFormat('H:i:s', $this->duration);
    }

    public function getCost()
    {
        return $this->cost === 0 ? 'Бесплатно' : "$this->cost тг.";
    }
}

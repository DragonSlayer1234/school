<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olympiad extends Model
{
    const STATUS_UPCOMING = 'upcoming';
    const STATUS_ACTIVE = 'active';
    const STATUS_PASSED = 'passed';
    const STATUS_DRAFT = 'draft';
    const STATUS_CHECKING = 'checking';
    const STATUS_MODERATING = 'moderating';
    const STATUS_REJECTED = 'rejected';

    const TYPE_SCHOOL = 'school';
    const TYPE_CITY = 'city';
    const TYPE_REGIONAL = 'regional';

    const WORK_TYPE_FILE = 'file';
    const WORK_TYPE_TEST = 'test';

    protected $fillable = [
        'name', 'start_date', 'end_date', 'cost', 'subject_id',
        'type', 'paid', 'teacher_id', 'status'
    ];

    public static function getStatuses()
    {
        return [
            self::STATUS_UPCOMING,
            self::STATUS_ACTIVE,
            self::STATUS_PASSED,
            self::STATUS_DRAFT,
            self::STATUS_CHECKING,
            self::STATUS_MODERATING,
            self::STATUS_REJECTED
        ];
    }

    public static function getTypes()
    {
        return [
            self::TYPE_SCHOOL,
            self::TYPE_CITY,
            self::TYPE_REGIONAL
        ];
    }

    public static function newDraft($author, $subject, $name, $type, $start_date, $end_date, $paid, $cost = null)
    {
        return static::create([
            'teacher_id' => $author,
            'subject_id' => $subject,
            'name' => $name,
            'type' => $type,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'paid' => $paid,
            'cost' => $cost,
            'status' => self::STATUS_DRAFT
        ]);
    }

    public function scopeAuthor($query, $teacher)
    {
        return $query->where('teacher_id', $teacher);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_UPCOMING)
                     ->orWhere('status', self::STATUS_ACTIVE)
                     ->orderBy('start_date', 'asc')
                     ->orderBy('status', 'desc');
    }

    public function scopeModerating($query)
    {
        return $query->where('status', self::STATUS_MODERATING);
    }

    public function canSendToModeration()
    {
        return $this->isDraft() || $this->isRejected();
    }

    public function toModeration()
    {
        if (!$this->canSendToModeration()) {
            throw new \LogicException('Can not send to moderation');
        } elseif (!$this->hasWork()) {
            throw new \LogicException('Can not send to moderation without work');
        }
        $this->status = self::STATUS_MODERATING;
        $this->save();
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
        return $this->hasManyThrough(Winner::class, Participant::class);
    }

    public function file()
    {
        return $this->hasOne(FileWork::class);
    }

    public function isFileWork()
    {
        return $this->work_type == self::WORK_TYPE_FILE;
    }

    public function isTestWork()
    {
        return $this->work_type == self::WORK_TYPE_TEST;
    }

    public function isModerating()
    {
        return $this->status === self::STATUS_MODERATING;
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

    public function hasWork()
    {
        return $this->file ? true : false;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olympic extends Model
{
    const STATUS_UPCOMING = 'upcoming';
    const STATUS_ACTIVE = 'active';
    const STATUS_PASSED = 'passed';

    public $timestamps = false;
    protected $fillable = ['name', 'startDate', 'endDate', 'cost', 'subjectId'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectId');
    }
}

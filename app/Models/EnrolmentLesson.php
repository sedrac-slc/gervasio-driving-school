<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class EnrolmentLesson extends Model
{
    use HasUuids;

    protected $table = 'enrolment_lesson';

    protected $fillable = [
        'id',
        "enrolment_id",
        "lesson_id"
    ];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

}

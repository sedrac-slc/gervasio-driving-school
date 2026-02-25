<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DrivingLesson extends Model
{
    use HasUuids;

    protected $fillable = ['id', 'lesson_id', 'enrolment_id', 'instructor_id', 'student_id', 'vehicle_id', 'starter', 'finished'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

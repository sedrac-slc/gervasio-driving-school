<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasUuids;

    protected $fillable = [
        "topic",
        "type"
    ];

    public function drivingLessons() {
        return $this->hasMany(DrivingLesson::class);
    }

    public function labelTopic() {
        if($this->type == 'DRIVER') return "Prático";
        return "Teórica";
    }

}

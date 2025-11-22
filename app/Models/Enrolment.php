<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasUuids;

    protected $fillable = [
        'code',
        'classroom_id',
        'student_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($enrolment) {
            $enrolment->code = self::generateCode();
        });
    }

    public static function generateCode(): string
    {
        $prefix = 'MA';
        $year = date('y');
        $unique = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        return $prefix . $year . 'A' . $unique;
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function drivingLessons() {
        return $this->hasMany(DrivingLesson::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}

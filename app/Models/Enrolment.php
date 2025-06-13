<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasUuids;

    protected $fillable = [
        'classroom_id',
        'student_id'
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

}

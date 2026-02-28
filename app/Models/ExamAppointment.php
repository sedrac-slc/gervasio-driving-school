<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ExamAppointment extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'enrolment_id',
        'date',
        'hour',
        'completed',
        'approved'
    ];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }
}

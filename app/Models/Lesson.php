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

    public function labelTopic() {
        if($this->topic == 'TEORIC') return "Teórica";
        return "Prático";
    }

}

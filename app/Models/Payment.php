<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasUuids;

    protected $fillable = [
        "enrolment_id",
        "article_id"
    ];

    public function enrolment() {
        return $this->belongsTo(Enrolment::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function __toString() {
        return $this->user->name;
    }
}

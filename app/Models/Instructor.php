<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasUuids;

    protected $fillable = [
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

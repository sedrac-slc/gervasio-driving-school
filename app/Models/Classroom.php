<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    use HasUuids;

    protected $fillable = [
        'category_id',
        'period',
        'starter',
        'finished'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

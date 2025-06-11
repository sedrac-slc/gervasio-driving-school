<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasUuids;

    protected $fillable = [
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

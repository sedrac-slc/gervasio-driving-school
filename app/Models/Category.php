<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'price',
        'installment',
        'completed_installment'
    ];

    public function classrooms() {
        return $this->hasMany(Classroom::class);
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}

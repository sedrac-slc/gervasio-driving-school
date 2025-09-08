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

    public function enrolments() {
        return $this->hasMany(Enrolment::class);
    }

    public function period(){
        switch($this->period){
            case 'MORNING':
                return 'Manhã';
            case 'AFTERNOON':
                return 'Tarde';
            case 'NIGHT':
                return 'Noite';
        }
    }

    public function __toString() {
        return $this->category->name.", ". $this->period() . " | ".$this->starter." à ".$this->finished;
    }
}

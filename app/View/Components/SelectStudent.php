<?php

namespace App\View\Components;

use Closure;
use App\Models\Student;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SelectStudent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $students = Student::all();
        return view('components.select-student', compact('students'));
    }
}

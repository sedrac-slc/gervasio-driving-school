<?php

namespace App\View\Components;

use Closure;
use App\Models\Instructor;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SelectInstructor extends Component
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
        $instructors = Instructor::all();
        return view('components.select-instructor', compact('instructors'));
    }
}

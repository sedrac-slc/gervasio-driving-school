<?php

namespace App\View\Components;

use Closure;
use App\Models\Lesson;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SelectLessonTopicTeoric extends Component
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
        $lessons = Lesson::where('type', Lesson::TEORIC)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('components.select-lesson-topic-teoric', compact('lessons'));
    }
}

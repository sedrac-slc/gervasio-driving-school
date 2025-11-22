<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AccordionButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $target,
        public string $label = "",
        public bool $expanded = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accordion-button');
    }
}

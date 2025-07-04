<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InputField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $value,
        public string $name = "",
        public string $type = "text",
        public bool $required = true,
        public string $placeholder = ""
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class LinkEdit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href,
        public string $json = "",
        public bool $redirect = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link-edit');
    }
}

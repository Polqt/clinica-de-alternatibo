<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public string $for;
    public string $class;
    public bool $required;

    public function __construct(
        string $for = '',
        string $class = '',
        bool $required = false
    )
    {
        $this->for = $for;
        $this->class = $class;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.label');
    }
}

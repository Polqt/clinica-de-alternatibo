<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $type;
    public string $class;
    public string $disabled;

    public function __construct(
        string $type = 'button',
        string $class = '',
        bool $disabled = false
    )
    {
        $this->type = $type;
        $this->class = $class;
        $this->disabled = $disabled ? 'disabled' : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.button');
    }
}

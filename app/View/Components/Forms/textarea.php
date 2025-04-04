<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textarea extends Component
{
    /**
     * Create a new component instance.
     */

    public string $name;
    public string $id;
    public string $placeholder;
    public ?string $value;
    public string $class;
    public bool $required;

    public function __construct(
        string $name = '',
        string $id = '',
        string $placeholder = '',
        ?string $value = '',
        string $class = '',
        bool $required = false
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value ?? '';
        $this->class = $class;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.textarea');
    }
}

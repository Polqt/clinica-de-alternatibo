<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    public string $type;
    public string $name;
    public string $id;
    public string $placeholder;
    public ?string $value;
    public bool $required;

    public function __construct(
        string $type = 'text',
        string $name = '',
        string $id = '',
        string $placeholder = '',
        ?string $value = '',
        bool $required = false
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value ?? '';
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}

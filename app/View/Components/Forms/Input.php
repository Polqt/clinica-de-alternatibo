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
    public string $value;
    public bool $required;

    public function __construct()
    {
        $this->type = 'text';
        $this->name = '';
        $this->id = '';
        $this->placeholder = '';
        $this->value = '';
        $this->required = false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}

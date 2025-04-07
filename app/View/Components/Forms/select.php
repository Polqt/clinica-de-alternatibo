<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public string $name;
    public string $id;
    public string $class;
    public string $placeholder;
    public ?string $value;
    public bool $required;

    public function __construct(
        string $name,
        string $id,
        string $class = '',
        string $placeholder = '',
        ?string $value = '',
        bool $required = false
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->value = $value ?? '';
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}

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
    public string $label;
    public string $placeholder;

    public function __construct(
        string $name,
        string $id,
        string $class = '',
        string $label = '',
        string $placeholder = '',
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}

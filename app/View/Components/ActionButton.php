<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public $color;
    public $text;

    public function __construct(public $type, public $href)
    {
        if ($type === "Create") {
            $this->color = 'primary';
            $this->text = __('keywords.Add New');
        } elseif ($type === "Edit") {
            $this->color = 'warning';
            $this->text = __('keywords.Edit');
        } elseif ($type === "Show") {
            $this->color = 'info';
            $this->text = __('keywords.Show');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}

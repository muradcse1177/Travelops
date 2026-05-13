<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Adsense extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slot;
    public $format;
    public $style;
    public $responsive;

    public function __construct($slot, $format = 'auto', $style = 'display:block;width:100%;', $responsive = true)
    {
        $this->slot = $slot;
        $this->format = $format;
        $this->style = $style;
        $this->responsive = $responsive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adsense');
    }
}

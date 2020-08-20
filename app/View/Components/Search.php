<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public $bgColor;

    public $textColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bgColor = 'bg-white', $textColor = 'text-gray-800')
    {
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search');
    }
}

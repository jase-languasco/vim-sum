<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Key extends Component
{
    /**
     * Helper text for the command
     * @var string
     */
    public $text;

    /**
     * The command
     *
     * @var string
     */
    public $key;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $key)
    {
        $this->text = $text;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.key');
    }
}

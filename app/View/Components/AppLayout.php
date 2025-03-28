<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $title;
    public $showNav;
    public $showFooter;

    public function __construct(
        $title = '',
        $showNav = true,
        $showFooter = true
    ) {
        $this->title = $title;
        $this->showNav = $showNav;
        $this->showFooter = $showFooter;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}

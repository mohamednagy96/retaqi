<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;

    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Page Title', $links = null)
    {
        $this->title = $title;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.breadcrumb');
    }
}

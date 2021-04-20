<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $header;
    public $title;
    public $icon;
    public $anchor;
    public $action;
    public $desc;
    public $note;

    public function __construct(String $header, String $title, String $icon, String $anchor, String $action, String $desc, String $note = null)
    {
        $this->header = $header;
        $this->title = $title;
        $this->icon = $icon;
        $this->anchor = $anchor;
        $this->action = $action;
        $this->desc = $desc;
        $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-card');
    }
}

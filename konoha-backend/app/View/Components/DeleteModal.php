<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $id;
    public $title;
    public $message;
    public $route;

    public function __construct($id, $title = 'Conferma eliminazione', $message = '', $route)
    {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.delete-modal');
    }
}

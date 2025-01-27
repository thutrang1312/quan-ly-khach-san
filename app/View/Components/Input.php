<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $for;  // Biến để lưu tên trường
    public $label;  // Biến để lưu nhãn
    public $type;  // Biến để lưu loại input

    public function __construct($for, $label, $type = 'text')
    {
        $this->for = $for;  // Gán tên trường
        $this->label = $label;  // Gán nhãn
        $this->type = $type;  // Gán loại input
    }

    public function render()
    {
        return view('components.input');
    }
}

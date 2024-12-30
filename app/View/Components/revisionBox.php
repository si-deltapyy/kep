<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class revisionBox extends Component
{
    /**
     * Create a new component instance.
     */
    // public function __construct($namaDokumen, $revisi, $tanggal)
    // {
    //     $this->namaDokumen = $namaDokumen;
    //     $this->revisi = $revisi;
    //     $this->tanggal = $tanggal;
    // }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.revision-box');
    }
}

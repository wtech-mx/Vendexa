<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EnviarRecibo extends Component
{
    public $orden;

    public function __construct($orden)
    {
        $this->orden = $orden;
    }

    public function render()
    {
        return view('components.enviar-recibo');
    }
}

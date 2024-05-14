<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Récupère la page / le contenu qui représente le composant
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}

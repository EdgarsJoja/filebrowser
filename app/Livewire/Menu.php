<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Menu extends Component
{
    #[Reactive]
    public string $currentDirectory = '';

    public function render(): View
    {
        return view('livewire.menu');
    }
}

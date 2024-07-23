<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Menu extends Component
{
    #[Reactive]
    public string $currentDirectory = '';

    public bool $fileUploadModal = false;
    public bool $createDirectoryModal = false;

    public function render(): View
    {
        return view('livewire.menu');
    }

    #[On('file-uploaded')]
    #[On('directory-created')]
    public function closeModals(): void
    {
        $this->fileUploadModal = false;
        $this->createDirectoryModal = false;
    }
}

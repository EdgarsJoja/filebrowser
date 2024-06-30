<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CreateFolder extends Component
{
    #[Reactive]
    public string $currentDirectory = '';

    public string $newDirectoryName = '';

    public function render(): View
    {
        return view('livewire.create-folder');
    }

    public function save(): void
    {
        if (!$this->newDirectoryName) {
            return;
        }

        $basePath = rtrim($this->currentDirectory, '/');

        Storage::disk('filebrowser')->makeDirectory("$basePath/$this->newDirectoryName");

        $this->reset('newDirectoryName');

        $this->dispatch('directory-created');
    }
}

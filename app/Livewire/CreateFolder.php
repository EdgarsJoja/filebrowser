<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateFolder extends Component
{
    use Toast;

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

        $disk = Storage::disk('filebrowser');
        $path = "$basePath/$this->newDirectoryName";

        $disk->makeDirectory($path);
        $disk->setVisibility($path, 'public');

        $this->dispatch('directory-created');
        $this->success("Directory \"$this->newDirectoryName\" created!");

        $this->reset('newDirectoryName');
    }
}

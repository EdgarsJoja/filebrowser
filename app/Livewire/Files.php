<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Files extends Component
{
    public string $currentDirectory = '';

    public function render(): View
    {
        return view('livewire.files');
    }

    #[Computed]
    public function fullPath(): array
    {
        return array_filter([
            ...explode('/', config('filesystems.disks.filebrowser.root')),
            ...explode('/', $this->currentDirectory),
        ]);
    }

    #[Computed]
    public function directories(): array
    {
        return array_map(
            static fn (string $path) => last(explode('/', $path)),
            Storage::disk('filebrowser')->directories($this->currentDirectory)
        );
    }

    #[Computed]
    public function files(): array
    {
        return array_map(
            static fn (string $path) => last(explode('/', $path)),
            Storage::disk('filebrowser')->files($this->currentDirectory)
        );
    }

    public function changeDirectory(string $directory): void
    {
        $parts = explode('/', $this->currentDirectory);

        if ($directory === '..') {
            array_pop($parts);
        } else {
            $parts[] = $directory;
        }

        $this->currentDirectory = implode('/', $parts);
    }
}

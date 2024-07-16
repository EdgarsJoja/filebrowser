<?php

declare(strict_types=1);

namespace App\Livewire\List;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Directory extends Component
{
    public string $currentDirectory;
    public string $directory;

    public function render(): View
    {
        return view('livewire.list.directory');
    }

    public function changeDirectory(string $directory): void
    {
        $this->dispatch('change-directory', directory: $directory);
    }

    public function delete(string $name): void
    {
        $path = rtrim($this->currentDirectory, '/') . '/' . $name;
        $this->disk()->deleteDirectory($path);
    }

    protected function disk(): Filesystem
    {
        return Storage::disk('filebrowser');
    }
}

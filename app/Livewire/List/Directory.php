<?php

declare(strict_types=1);

namespace App\Livewire\List;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mary\Traits\Toast;

class Directory extends Component
{
    use Toast;

    public string $currentDirectory;
    public string $directory;

    public bool $confirmDeleteModal = false;

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
        $this->confirmDeleteModal = false;
        $this->dispatch('list-updated');

        $path = rtrim($this->currentDirectory, '/') . '/' . $name;
        $this->disk()->deleteDirectory($path);

        $this->success("Directory \"$name\" deleted!");
    }

    protected function disk(): Filesystem
    {
        return Storage::disk('filebrowser');
    }
}

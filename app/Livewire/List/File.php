<?php

declare(strict_types=1);

namespace App\Livewire\List;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mary\Traits\Toast;

class File extends Component
{
    use Toast;

    public string $currentDirectory;
    public string $file;

    public bool $confirmDeleteModal = false;

    public function render(): View
    {
        return view('livewire.list.file');
    }

    public function delete(string $name): void
    {
        $this->confirmDeleteModal = false;
        $this->dispatch('list-updated');

        $path = rtrim($this->currentDirectory, '/') . '/' . $name;
        $this->disk()->delete($path);

        $this->success("File \"$name\" deleted!");
    }

    protected function disk(): Filesystem
    {
        return Storage::disk('filebrowser');
    }
}

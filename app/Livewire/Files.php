<?php

namespace App\Livewire;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Files extends Component
{
    public string $currentDirectory = '';

    public string $filter = '';

    #[On('list-updated')]
    public function render(): View
    {
        return view('livewire.files');
    }

    #[Computed]
    public function directories(): array
    {
        return array_map(
            static fn (string $path) => last(explode('/', $path)),
            $this->filter($this->disk()->directories($this->currentDirectory)),
        );
    }

    #[Computed]
    public function files(): array
    {
        return array_map(
            static fn (string $path) => last(explode('/', $path)),
            $this->filter($this->disk()->files($this->currentDirectory)),
        );
    }

    #[On('change-directory')]
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

    protected function filter(array $items): array
    {
        return array_filter($items, fn(string $item) => str_contains(strtolower($item), strtolower($this->filter)));
    }

    protected function disk(): Filesystem
    {
        return Storage::disk('filebrowser');
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;

    #[Reactive]
    public string $currentDirectory = '';

    public function render(): View
    {
        return view('livewire.file-upload');
    }

    public function save(): void
    {
        $this->file?->storePubliclyAs($this->currentDirectory, $this->file->getClientOriginalName(), 'filebrowser');
        $this->file = null;

        $this->dispatch('file-uploaded');
    }
}

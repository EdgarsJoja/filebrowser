<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $currentDirectory = '';

    public function render(): View
    {
        return view('livewire.file-upload');
    }

    public function save(): void
    {
        $this->file?->storeAs($this->currentDirectory, $this->file->getClientOriginalName(), 'filebrowser');
        $this->file = null;
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class FileUpload extends Component
{
    use WithFileUploads;
    use Toast;

    public $file;

    #[Reactive]
    public string $currentDirectory = '';

    public function render(): View
    {
        return view('livewire.file-upload');
    }

    public function save(): void
    {
        $fileName = $this->file->getClientOriginalName();

        $this->file?->storePubliclyAs($this->currentDirectory, $fileName, 'filebrowser');
        $this->file = null;

        $this->dispatch('file-uploaded');
        $this->success("File \"$fileName\" has been uploaded!");
    }
}

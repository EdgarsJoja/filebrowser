<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Files extends Component
{
    public function render(): View
    {
        $files = Storage::disk('filebrowser')->allFiles('/');

        dump($files);

        return view('livewire.files', ['files' => $files]);
    }
}

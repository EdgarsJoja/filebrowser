<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public function __construct(protected string $currentDirectory = '')
    {
    }

    public function render(): View
    {
        return view('components.partials.breadcrumbs');
    }

    public function fullPath(): array
    {
        return array_filter([
            ...explode('/', config('filesystems.disks.filebrowser.root')),
            ...explode('/', $this->currentDirectory),
        ]);
    }
}

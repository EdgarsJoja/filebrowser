<?php

declare(strict_types=1);

namespace App\Services\Filesystem;

class FolderSize
{
    public function size(string $directory): string
    {
        return $this->humanReadableSize((string)$this->sizeInBytes($directory));
    }

    protected function sizeInBytes(string $directory): int
    {
        $size = 0;

        foreach (glob(rtrim($directory, '/') . '/*', GLOB_NOSORT) as $item) {
            $size += is_file($item) ? filesize($item) : $this->sizeInBytes($item);
        }

        return $size;
    }

    protected function humanReadableSize(string $bytes, int $decimal = 2): string
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        if ($factor == 0) {
            $dec = 0;
        }

        return sprintf("%.{$decimal}f %s", $bytes / (1024 ** $factor), $size[$factor]);
    }
}

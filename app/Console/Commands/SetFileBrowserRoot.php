<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetFileBrowserRoot extends Command
{
    protected $signature = 'filebrowser:set-root {root}';

    public function handle(): void
    {
        $root = $this->argument('root');

        if ($root) {
            $result = $this->setEnvironmentValue(['FILEBROWSER_DIRECTORY_ROOT' => $root]);

            if ($result) {
                $this->info('Root directory set!');
            } else {
                $this->warn('Root directory could not set.');
            }
        }
    }

    protected function setEnvironmentValue(array $values): bool
    {

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (!$values) {
            return false;
        }

        foreach ($values as $envKey => $envValue) {
            $str .= "\n"; // In case the searched variable is in the last line without \n
            $keyPosition = strpos($str, "{$envKey}=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            // If key does not exist, add it
            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                $str .= "{$envKey}={$envValue}\n";
            } else {
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}

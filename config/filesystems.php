<?php

return [
    'disks' => [
        'filebrowser' => [
            'driver' => 'local',
            'root' => env('FILEBROWSER_DIRECTORY_ROOT', ''),
            'throw' => false
        ]
    ]
];

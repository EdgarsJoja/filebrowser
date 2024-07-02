<?php

return [
    'disks' => [
        'filebrowser' => [
            'driver' => 'local',
            'root' => env('FILEBROWSER_DIRECTORY_ROOT', ''),
            'throw' => false,
            'permissions' => [
                'file' => [
                    'public' => 0777
                ],
                'dir' => [
                    'public' => 0777,
                ]
            ]
        ]
    ]
];

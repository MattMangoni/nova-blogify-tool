<?php

return [
    'model' => env('BLOGIFY_USER_MODEL', App\User::class),

    'image_settings' => [
        'disk' => env('BLOGIFY_DISK_NAME', 'public'),
        'path' => env('BLOGIFY_IMAGE_PATH', ''),
        'path_thumb' => env('BLOGIFY_THUM_PATH', 'thumb/'),
    ],

    'image_thumb_settings' => [
        'width' => env('BLOGIFY_THUMB_WIDTH', '200'),
        'height' => env('BLOGIFY_THUMB_HEIGHT', '200'),
    ],
];

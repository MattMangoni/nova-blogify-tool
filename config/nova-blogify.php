<?php

return [
    'model' => App\User::class,

    'image_settings' => [
        'disk' => 'blogify',
        'path' => '',
        'path_thumb' => 'thumb/',
    ],

    'image_thumb_settings' => [
        'width' => '200',
        'height' => '200',
    ],
];

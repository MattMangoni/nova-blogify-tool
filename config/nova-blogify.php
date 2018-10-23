<?php

return [
    'resources' => [
        'users' => [
            'model' => env('BLOGIFY_USER_MODEL', App\User::class),
	        'resource' => env('BLOGIFY_USER_NOVA_RESOURCE', App\Nova\User::class)
        ],

        'posts' => [
            'search' => ['id', 'title', 'summary', 'body'],
        ],

        'categories' => [
            'search' => ['id', 'name', 'description'],
        ],

        'comments' => [
            'search' => ['id', 'name'],
        ],

        'tags' => [
            'search' => ['id', 'name'],
        ],
    ],

    'table_prefix' => env('BLOGIFY_TABLE_PREFIX', 'blogify_'),

    'user_model' => env('BLOGIFY_USER_MODEL', App\User::class),

    'image_settings' => [
        'disk' => env('BLOGIFY_DISK_NAME', 'public'),
        'path' => env('BLOGIFY_IMAGE_PATH', ''),
        'collection' => env('BLOGIFY_IMAGE_COLLECTION', 'posts'),
        'path_thumb' => env('BLOGIFY_THUM_PATH', 'thumb/'),
    ],

    'image_thumb_settings' => [
        'width' => env('BLOGIFY_THUMB_WIDTH', '200'),
        'height' => env('BLOGIFY_THUMB_HEIGHT', '200'),
    ],
];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'logo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/logo'),
            'url' => env('APP_URL').'/storage/brands',
            'visibility' => 'public',
            'throw' => false,
        ],

        'brands' => [
            'driver' => 'local',
            'root' => storage_path('app/public/brands'),
            'url' => env('APP_URL').'/storage/brands',
            'visibility' => 'public',
            'throw' => false,
        ],

        'cpus' => [
            'driver' => 'local',
            'root' => storage_path('app/public/cpus'),
            'url' => env('APP_URL').'/storage/cpus',
            'visibility' => 'public',
            'throw' => false,
        ],

        'features' => [
            'driver' => 'local',
            'root' => storage_path('app/public/features'),
            'url' => env('APP_URL').'/storage/features',
            'visibility' => 'public',
            'throw' => false,
        ],

        'models' => [
            'driver' => 'local',
            'root' => storage_path('app/public/models'),
            'url' => env('APP_URL').'/storage/models',
            'visibility' => 'public',
            'throw' => false,
        ],

        'points' => [
            'driver' => 'local',
            'root' => storage_path('app/public/points'),
            'url' => env('APP_URL').'/storage/points',
            'visibility' => 'public',
            'throw' => false,
        ],
        
        'products' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL').'/storage/products',
            'visibility' => 'public',
            'throw' => false,
        ],

        'slides' => [
            'driver' => 'local',
            'root' => storage_path('app/public/slides'),
            'url' => env('APP_URL').'/storage/slides',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

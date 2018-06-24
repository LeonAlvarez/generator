<?php

return [

    /*
   |--------------------------------------------------------------------------
   | Models config
   |--------------------------------------------------------------------------
   |
   | Here you can specify default models settings.
   |
   */
    'models' => [
        'namespace' => 'App\Models',
        'path' => app_path('Models/'),
        'extends' => 'Illuminate\Database\Eloquent\Model',
        'timestamps' => [
            'enabled' => true,
            'fields' => [
                'created_at' => 'created_at',
                'updated_at' => 'updated_at',
                'deleted_at' => 'deleted_at',
            ],
        ],
        'soft_delete' => true,
        'primary_key' => 'id',
    ],

    /*
   |--------------------------------------------------------------------------
   | Controllers config
   |--------------------------------------------------------------------------
   |
   | Here you can specify  controllers settings
   |
   */
    'controllers' => [
        'namespace' => 'App\Http\Controllers',
        'path' => app_path('Http/Controllers/'),
    ],

    /*
    |--------------------------------------------------------------------------
    | API config
    |--------------------------------------------------------------------------
    |
    | Here you can specify  API settings
    |
    */
    'api' => [
        'version' => 'v1',
        'routes' => [
            'path' => base_path('routes/'),
            'file' => 'api.php',
        ],
        'controllers' => [
            'namespace' => 'App\Http\Controllers\Api',
            'path' => app_path('Http/Controllers/Api/'),
        ],
        'request' => [
            'namespace' => 'App\Http\Requests\Api',
            'path' => app_path('Http/Requests/Api/'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migrations config
    |--------------------------------------------------------------------------
    |
    | Here you can specify  migrations settings
    |
    */
    'migrations' => [
        'path' => base_path('database/migrations/'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Views config
    |--------------------------------------------------------------------------
    |
    | Here you can specify  migrations settings
    |
    */
    'views' => [
        'path' => base_path('resources/views/'),
    ],

];

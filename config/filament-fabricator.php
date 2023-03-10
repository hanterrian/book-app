<?php

// config for Z3d0X/FilamentFabricator
return [
    'routing' => [
        'enabled' => true,
        'prefix' => null, //    /pages
    ],

    'layouts' => [
        'namespace' => 'App\\Filament\\Fabricator\\Layouts',
        'path' => app_path('Filament/Fabricator/Layouts'),
        'register' => [
            \App\Filament\Fabricator\Layouts\DefaultLayout::class,
        ],
    ],

    'page-blocks' => [
        'namespace' => 'App\\Filament\\Fabricator\\PageBlocks',
        'path' => app_path('Filament/Fabricator/PageBlocks'),
        'register' => [
            \App\Filament\Fabricator\PageBlocks\HeaderBlock::class,
            \App\Filament\Fabricator\PageBlocks\TextBlock::class,
            \App\Filament\Fabricator\PageBlocks\ImageBlock::class,
            \App\Filament\Fabricator\PageBlocks\GalleryBlock::class,
        ],
    ],

    'page-model' => \App\Models\Page::class,

    'page-resource' => \App\Filament\Resources\PageResource::class,

    /*
     * This is the name of the table that will be created by the migration and
     * used by the above page-model shipped with this package.
     */
    'table_name' => 'pages',
];

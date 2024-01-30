<?php

return [
    'name' => 'Vendexa',
    'manifest' => [
        'name' => env('APP_NAME', 'Punto de vental Mobil'),
        'description' => 'Apliacion de punto de Venta',
        'short_name' => 'Vendexa',
        'scope' => '/home',
        'start_url' => '/home',
        'background_color' => '#577590',
        'theme_color' => '#577590',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> '#577590',
        'prefer_related_applications'=> 'true',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.png',
                'sizes'=> '72x72',
                'type'=> 'image/png',
                'purpose' => 'any maskable'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.png',
                'purpose' => 'any maskable',
                'sizes'=> '96x96',
                'type'=> 'image/png',
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128x128.png',
                'purpose' => 'any maskable',
                'sizes'=> '128x128',
                'type'=> 'image/png',
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.png',
                'purpose' => 'any maskable',
                'sizes'=> '144x144',
                'type'=> 'image/png',
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.png',
                'purpose' => 'any maskable',
                'sizes'=> '152x152',
                'type'=> 'image/png',
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any maskable',
                'sizes'=> '192x192',
                'type'=> 'image/png',
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384x384.png',
                'purpose' => 'any maskable',
                'sizes'=> '384x384',
                'type'=> 'image/png',
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any maskable',
                'sizes'=> '512x512',
                'type'=> 'image/png',
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];

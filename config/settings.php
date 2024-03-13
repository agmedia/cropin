<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'pagination' => [
        'front' => 40,
        'back' => 30
    ],

    'search_keyword' => 'pojam',
    'admin_input_currency' => 'EUR',
    'default_admin_id' => 1,

    'images_domain' => '',
    'image_size_ratio' => '800x530',
    'thumb_size_ratio' => '400x265',
    'default_listing_image' => 'media/default_img.jpg',

    'sorting_list' => [
        0 => [
            'title' => 'Najnovije',
            'value' => 'novi'
        ]
    ],

    'default_opening_hours' => '08:00',
    'default_closing_hours' => '23:00',

    'product_select_status' => ['active', 'inactive'/*, 'with_action', 'without_action'*/],
    'product_select_sort' => ['new', 'old', 'price_up', 'price_down'/*, 'az', 'za'*/],

    'calendar_colors' => ['3c90df', '2177C7', 'DF8B3C' , '3CDFDC'],

    'order' => [
        'made_text' => 'Narudžba napravljena.',
        'status' => [
            'new' => 1,
            'canceled' => 5,
            'unfinished' => 8,
            'declined' => 7,
            'paid' => 3,
            'pending' => 2
        ],
        'origin' => [
            0 => 'all',
            1 => \Illuminate\Support\Str::slug(env('APP_NAME'))
        ],
        'sort' => ['new', 'old', 'active', 'inactive'],
    ],

    'payment' => [
        'default' => 'corvus',
        'providers' => [
            'bank' => \App\Models\Front\Checkout\Payment\Bank::class,
            'pickup' => \App\Models\Front\Checkout\Payment\Pickup::class,
            //'wspay' => \App\Models\Front\Checkout\Payment\Wspay::class,
            //'payway' => \App\Models\Front\Checkout\Payment\Payway::class,
            //'corvus' => \App\Models\Front\Checkout\Payment\Corvus::class,
            //'keks' => \App\Models\Front\Checkout\Payment\Keks::class,
            'cod' => \App\Models\Front\Checkout\Payment\Cod::class
        ]
    ],

    //
    'categories' => [
        0 => [
            'hr' => 'Sve Kategorije',
            'en' => 'All Categories'
        ],
        1 => [
            'hr' => 'Barovi',
            'en' => 'Bars'
        ],
        2 => [
            'hr' => 'Klubovi',
            'en' => 'Clubs'
        ],
        3 => [
            'hr' => 'Hrana',
            'en' => 'Food'
        ],
        4 => [
            'hr' => 'Zabava',
            'en' => 'Fun'
        ],
    ]

];

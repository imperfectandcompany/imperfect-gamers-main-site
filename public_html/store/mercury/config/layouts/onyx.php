<?php

return [
    'onyx' => [
        /*
        |--------------------------------------------------------------------------
        | Information
        |--------------------------------------------------------------------------
        |
        | General info / main block about your server.
        | please keep in mind you need to have an image link with an extension.
        |
        |
        */
        'slogan' => 'slogan',

        'server_description' => 'some type of description',

        'logo' => 'https://icefuse.net/assets/img/icf.png',

        /*
        |--------------------------------------------------------------------------
        | Featured Package
        |--------------------------------------------------------------------------
        |
        | You can set a featured packaged for users to click, the example link is something you're looking for when getting the link to a package.
        | In terms of the actual icon, see here: https://fontawesome.com/icons
        |
        |
        */
        'featured_package_info' => 'EXAMPLE PACKAGE',

        'featured_package_link' => 'http://prometheus.test/store.php?page=purchase&type=pkg&pid=1',

        'links' => [
            [
                'icon' => 'fab fa-discord',
                'icon_link' => 'https://nmscripts.com'
            ],
            [
                'icon' => 'fab fa-steam',
                'icon_link' => 'https://nmscripts.com'
            ],
            [
                'icon' => 'fas fa-users',
                'icon_link' => 'https://nmscripts.com'
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        |
        | Basically same as the first, except this time you can put more than one, typically these are your donator ranks.
        | Please keep in mind of the format when editing these arrays.
        |
        |
        */

        'product_info_title' => 'Title Breakpoint',

        'products' => [
            [
                'title' => 'Cool package #1',
                'features' => [
                    'feature one',
                    'feature two',
                    'feature three'
                ],
                'purchase_text' => 'purchase',
                'purchase_link' => ''
            ],
            [
                'title' => 'Cool package #2',
                'features' => [
                    'feature one',
                    'feature two',
                    'feature three'
                ],
                'purchase_text' => 'purchase',
                'purchase_link' => ''
            ],
            [
                'title' => 'Cool package #3',
                'features' => [
                    'feature one',
                    'feature two',
                    'feature three'
                ],
                'purchase_text' => 'purchase',
                'purchase_link' => ''
            ],
        ],
    ]
];
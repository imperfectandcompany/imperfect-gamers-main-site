<?php

return [
    'umbra' => [

        /*
        |--------------------------------------------------------------------------
        | Information
        |--------------------------------------------------------------------------
        |
        | General info / main block about your server.
        | Please keep in mind you need to have an image link with an extension.
        |
        |
        */
        'server_name' => 'Example Server',

        'logo' => 'https://icefuse.net/assets/img/icf.png',

        'show_server_info' => true,

        'server_description' => 'Example description.',

        /*
        |--------------------------------------------------------------------------
        | Primary Cards
        |--------------------------------------------------------------------------
        |
        | Basically features, ported from Ignis.
        | Please keep in mind of the format when editing these arrays.
        | For icon codes, see here: https://fontawesome.com/icons?d=gallery
        |
        */
        'show_primary_row' => true,
        'primary_row_cards' => [
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description description description description description description description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ],
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ],
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ]
        ],

        'show_secondary_row' => true,
        'secondary_row_title' => 'Frequently Asked Questions',
        'secondary_row_cards' => [
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description description description description description description description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ],
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ],
            [
                'icon' => 'fas fa-home',
                'title' => 'Very cool title',
                'info' => 'some description',
                'link' => 'https://www.google.com',
                'link_title' => 'Click here for more information.',
                'icon_color' => '#FFF'
            ]
        ],

    ]
];
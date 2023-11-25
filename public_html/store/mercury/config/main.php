<?php

return [
    'main' => [

        /*
        |--------------------------------------------------------------------------
        | Backstretch
        |--------------------------------------------------------------------------
        |
        | This is the background engine mercury uses.
        | Please keep in mind of the examples you are given, how they are links to the full image (see the extension).
        | Not all themes make uses of the background engine.
        |
        */
        'backstretch' => [
            'enabled' => true,
            'duration' => 5,
            'fade' => 0.5,
            'random' => true,
            'backgrounds' => [
                'https://i.imgur.com/ukakFAY.jpg',
                'https://i.imgur.com/7ScMT1s.jpg',
                'https://i.imgur.com/ZigXtRx.jpg',
                'https://i.imgur.com/Cgkigto.jpg'
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Layouts
        |--------------------------------------------------------------------------
        |
        | Layouts have been revamped since Ignis, each theme comes with a layout, and vice versa.
        | It is not guaranteed that layouts keep their exact look when switching between themes.
        |
        |
        */
        'layout' => 'mercury',

        /*
        |--------------------------------------------------------------------------
        | Theme Engine
        |--------------------------------------------------------------------------
        |
        | Mercury's theme engine takes over the current Prometheus one, it also stops you from accidentally making a theme in the editor and overriding this one.
        | All layouts have respective themes.
        | It is not guarenteed themes make X layout look fantastic.
        | Layouts / themes do not effect the admin panel anymore.
        |
        */
        'theme' => 'umbra',

        /*
        |--------------------------------------------------------------------------
        | Header
        |--------------------------------------------------------------------------
        |
        | The header has been simplified to keep updates easy for both you (the end user) and me.
        | Please keep in mind the structure, watch where you put (or forget) commas, quotations etc.
        |
        |
        */
        'show_header_links' => true,
        'header_links' => [
            [
                'link' => 'https://www.google.com',
                'icon' => 'fab fa-google',
                'title' => 'Google'
            ],
            [
                'link' => 'https://www.facebook.com',
                'icon' => 'fab fa-facebook',
                'title' => 'Facebook'
            ],
            [
                'link' => 'https://www.twitter.com',
                'icon' => 'fab fa-twitter',
                'title' => 'Twitter'
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Color customization
        |--------------------------------------------------------------------------
        |
        | You can edit the main color of each theme.
        | Each theme is chromatic and at least has the primary color change.
        | This will be expanded in the future.
        |
        */
        'theme_colors' => [
            'primary_color' => '#7289da'
        ]
    ],
];
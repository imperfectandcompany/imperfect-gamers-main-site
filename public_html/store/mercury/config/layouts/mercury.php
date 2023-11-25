<?php

return [
    "mercury" => [
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
        "server_name" => "Community Name",

        "slogan" => "Something witty.",

        "logo" => "https://icefuse.net/assets/img/icf.png",

        /*
        |--------------------------------------------------------------------------
        | Links
        |--------------------------------------------------------------------------
        |
        | You can make quick links for users to get to your forums, community, etc.
        | Please keep in mind of the format when editing these arrays,
        |
        |
        */

        "links" => [
            [
                "link" => "https://www.google.com",
                "icon" => "fab fa-discord",
                "title" => "Discord",
                "icon_color" => "inherit"
            ],
            [
                "link" => "https://www.google.com",
                "icon" => "fas fa-users",
                "title" => "Forums",
                "icon_color" => "inherit"
            ],
            [
                "link" => "https://steamcommunity.com/groups/YOUR-COMMUNITY",
                "icon" => "fab fa-steam",
                "title" => "Steam",
                "icon_color" => "inherit"
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        |
        | In a perfect world these would be automatic.
        | You can put tid-bits / statistics here for users to see when they visit your store.
        |
        |
        */

        "stats" => [
            [
                "icon" => "fas fa-users",
                "icon_color" => "inherit",
                "title" => "Players",
                "statistic" => "1,000+",
            ],
            [
                "icon" => "fab fa-discord",
                "icon_color" => "inherit",
                "title" => "Discord Members",
                "statistic" => "3,000+",
            ],
            [
                "icon" => "fas fa-users",
                "icon_color" => "inherit",
                "title" => "Registered Users",
                "statistic" => "10,000+",
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Features
        |--------------------------------------------------------------------------
        |
        | Features just tell small stories about your community / server.
        | Please keep in mind of the format when editing these arrays.
        | The example ones are jokes about other bad servers, not a direct attack on anyone :)
        |
        |
        */

        "feature_divider_title" => "What we're made of",

        "features" => [
            [
                "icon" => "fas fa-microchip",
                "icon_color" => "",
                "description" => "Something descriptive about your hardware, and how Gmod doesn't care because your addons are eating 99% of your cpu anyways."
            ],
            [
                "icon" => "fas fa-microchip",
                "icon_color" => "",
                "description" => "Something about your content being unique and featured packed, maybe add some big words like ever-changing, does anyone read this far?"
            ],
            [
                "icon" => "fas fa-microchip",
                "icon_color" => "",
                "description" => "Something about how your staff isn't toxic and does their job. Also how they don't express favoritism."
            ],
            [
                "icon" => "fas fa-microchip",
                "icon_color" => "",
                "description" => "I wouldn't know what to put here either, maybe something about how you strive for the upmost best, but again I don't think anyone reads this far."
            ]
        ]
    ]
];
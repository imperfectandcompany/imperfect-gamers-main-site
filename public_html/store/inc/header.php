<?php

ob_start();

if (!isset($devmode)) {
    $devmode = false;
}

if ($devmode) {
    $time = microtime(true);
}

include 'lib/mix.php';

?>

<!DOCTYPE html>
<html lang="en" dir="<?= $dir; ?>">
<head>
    <!-- Include required CSS and scripts -->
    <meta charset="UTF-8">
    <title>
    <?= $page_title; ?> | <?= getSetting('site_title', 'value'); ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php print $META_WORDS ?? 'imperfect gamers, underground music, surf, counterstrike, gaming entertainment, rap server, csgo, imperfect and company'; ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?= $page_title; ?> | <?= getSetting('site_title', 'value'); ?>">
    <meta property="og:description" content="The new age underground scene for music and gaming enthusiasts.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://imperfectgamers.org">    
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@1.x.x/dist/alpine-clipboard.js">
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="https://cdn.imperfectgamers.org/inc/assets/icon/favicon.ico">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="https://use.fontawesome.com/cdebacd051.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://imperfectgamers.org/css/main.css">

    <script src="compiled/js/essential.js"></script>

    <script src="https://imperfectgamers.org/store/compiled/js/site.js"></script>

    <?php

    if (isset($_GET['a']) && $_GET['a'] == 'theme') {
        if (isset($_GET['default'])) {
            setSetting('', 'theme', 'value');
        }
    }

    $theme = theme::current();
    if (isset($_COOKIE['prometheus_theme']) && getSetting('disable_theme_selector', 'value2') == 0) {
        $theme = $_COOKIE['prometheus_theme'];
    }


    ?>


    <script type="text/javascript">
            setTimeout(function () {
                snowStorm.start();
            }, 500);
    </script>

    <?php if (gateways::enabled('stripe')) { ?>
        <script src="https://js.stripe.com/v3/"></script>
    <?php } ?>


    <style>
        /* Navbar container */
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 10px 0;
        }


        /* Logo Styles */
        .nav-logo img {
            max-width: 120px;
            z-index: 2;
        }

        /* Navigation Links */
        .nav-links {
            display: flex;
            z-index: 2;
            position: relative;
        }

        .nav-links a {
            color: #fff;
            padding: 0 15px;
            text-decoration: none;
            transition: color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
        }

        .nav-links a:hover {
            color: #ddd;
        }

        /* Bottom border under navbar */
        .navbar:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: red;
            z-index: 3;
        }

        /* Remove the individual gradients since we're using an overlay for both sides */
        .navbar::before,
        .navbar::after {
            display: none;
        }

        /* Add border to both ends */
        .navbar {
            background: linear-gradient(to right, rgb(169 42 42 / 79%), rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4), rgb(169 42 42 / 79%));
            border-bottom: 1px solid red;
            /* Adjust the color and thickness as needed */
        }

        .ig_logo {
  --animate-duration: 0.3s;
}
    </style>

</head>


<body>
    <div class="overlay-bg"></div>
    <nav class="navbar">
        <div class="nav-gradient left"></div>
            <div class="nav-logo ig_logo animate__animated animate__slideInDown">
                <a href="/">
                <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" alt="Imperfect Gamers Brand Logo"
                class="pointer-events-none"  
                type="image/svg+xml" height="48px" width="48px">
                </object>
    </a>
            </div>
        <ul class="nav-links left">
            <li>
                <?php if (!prometheus::loggedInIG()) {
                    echo '<a href="/register">' . "Register" . '</a>';
                    echo '<a href="/login">' . "Login" . '</a>';
                } else {
                    echo '<a href="/logout">' . "Logout" . '</a>';
                }
                ?>
            </li>
            <?php if (prometheus::loggedInIG()) { ?>
                <li>
                    <a href="/settings">
                        Settings
                    </a>
                </li>
            <?php } ?>
            <?php if (prometheus::loggedInIG()) { ?>
                <li>
                    <a href="/profile">
                        Profile
                    </a>
                </li>
            <?php } ?>

            </li>
        </ul>
        <ul class="nav-links right">
            <li><a href="/store"><span class="underline decoration-wavy decoration-red-600/50">Store</span></a></li>
            <li><a href="/applications">Applications</a></li>
            <li><a href="/appeals">Appeals</a></li>
        </ul>
        <div class="nav-gradient right"></div>
    </nav>
    <?php if ($page != 'admin') { ?>
        <?php if (getSetting('paypal_sandbox', 'value2') == 1 && getSetting('warning_sandbox', 'value2') == 0 && prometheus::isAdmin() && gateways::enabled('paypal')) { ?>
            <div class="notSetup d-flex align-items-center p-0">
                <div class="container">
                    <?= lang('header_sandbox'); ?>
                </div>
            </div>
        <?php } ?>

        <?php if (actions::missing() && !getSetting('warning_missingactions', 'value2') && prometheus::isAdmin()) { ?>
            <div class="notSetup">
                <div class="container">
                    <?= lang('missing_action'); ?>
                </div>
            </div>
        <?php } ?>

        <?php

        try {
            $sale_end = new datetime(getSetting('sale_enddate', 'value'));
            $valid_date = true;
        } catch (Exception $e) {
            $sale_end = null;
            $valid_date = false;
        }

        ?>

        <?php if ($valid_date && $sale_end > new datetime()) { ?>
            <div class="sale-box d-flex align-items-center p-0">
                <div class="container">
                    <div class="row">
                        <div class="col text-left">
                            <?= htmlentities(getSetting('sale_message', 'value')); ?>
                        </div>
                        <div class="col text-right">
                            <div id="countdown"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var target_date = new Date("<?= getSetting('sale_enddate', 'value'); ?>").getTime();
                var days, hours, minutes, seconds;

                var countdown = document.getElementById("countdown");

                setInterval(function () {
                    var current_date = new Date().getTime();
                    var seconds_left = (target_date - current_date) / 1000;

                    days = parseInt(seconds_left / 86400);
                    seconds_left = seconds_left % 86400;

                    hours = parseInt(seconds_left / 3600);
                    seconds_left = seconds_left % 3600;

                    minutes = parseInt(seconds_left / 60);
                    seconds = parseInt(seconds_left % 60);

                    if (hours < 10) {
                        hours = '0' + hours;
                    }

                    if (days < 10) {
                        days = '0' + days;
                    }

                    if (minutes < 10) {
                        minutes = '0' + minutes;
                    }

                    if (seconds < 10) {
                        seconds = '0' + seconds;
                    }

                    if (current_date < target_date) {
                        countdown.innerHTML = "<i class='fas fa-clock'></i> " + days + ":" + hours + ":"
                            + minutes + ":" + seconds + "";
                    }

                }, 1000);
            </script>
        <?php } ?>
    <?php } ?>
    <div class="wrap">
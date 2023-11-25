<?php
$loggedIn = false;
if (User::isLoggedin()) {
    $loggedIn = true;
}
?> 

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
</style>
<div class="overlay-bg"></div>
<nav class="navbar">
    <div class="nav-gradient left"></div>
    <ul class="nav-links left">



        <li> <a href="<?php echo $GLOBALS['config']['url']; ?><?php if ($loggedIn): ?>
logout
<?php else: ?>
login
<?php endif; ?>">
                <?php if ($loggedIn): ?>
                    Logout
                <?php else: ?>
                    Login
                <?php endif; ?>
            </a></li>
            <li><a href="<?php echo $GLOBALS['config']['url']; ?>/settings">settings</a></li>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/profile">profile</a></li>            
    </ul>

    <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
        <div class="nav-logo">

            <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" alt="Imperfect Gamers Brand Logo"
                type="image/svg+xml" height="48px" width="48px">
            </object>
        </div>

    </a>

    <ul class="nav-links right">
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/store">store</a></li>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/applications">applications</a></li>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/appeals">appeals</a></li>
    </ul>
    <div class="nav-gradient right"></div>
</nav>

<div class="flex justify-center my-4">





    <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
        <div class="mx-auto text-center animate__animated animate__fadeIn animate__delay-1s">
            <object class="pointer-events-none	" data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg"
                height="30px"></object>
        </div>
    </a>
    <div class="flex">
        <?php
        /*Call our notification handling*/include("../frontend/sitenotif.php");
        ?>
    </div>
</div>
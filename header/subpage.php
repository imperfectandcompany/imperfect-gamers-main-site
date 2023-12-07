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

    .ig_logo {
  --animate-duration: 0.3s;
}
    
</style>
<nav class="navbar">
    <div class="nav-gradient left"></div>

    <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
        <div class="mx-auto text-center ig_logo animate__animated animate__slideInDown ">
            <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" alt="Imperfect Gamers Brand Logo"
                class="pointer-events-none" type="image/svg+xml" height="48px" width="48px">
            </object>
        </div>
    </a>

    <ul class="nav-links left">


    <?php if (!$loggedIn): ?>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/register">
                <span class="<?php
                echo ($FRONTEND == "register" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Register
                </span>
            </a></li>
<?php endif; ?>
        
        <li> <a href="<?php echo $GLOBALS['config']['url']; ?><?php if ($loggedIn): ?>
/logout
<?php else: ?>
/login
<?php endif; ?>">
                <?php if ($loggedIn): ?>
                    <span class="<?php
                echo ($FRONTEND == "logout" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">Logout
                </a></li>
                <li><a href="<?php echo $GLOBALS['config']['url']; ?>/settings">
                <span class="<?php
                echo ($FRONTEND == "settings" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Settings
                </span>
            </a></li>
            <li><a href="<?php echo $GLOBALS['config']['url']; ?>/profile">
                <span class="<?php
                echo ($FRONTEND == "profile" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Profile
                </span>
            </a></li>


                <?php else: ?>
                    <span class="<?php
                echo ($FRONTEND == "login" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">Login
                </a></li>
                <?php endif; ?>

        </ul>
    <ul class="nav-links right">
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/store">
        <span class="<?php
                echo ($FRONTEND == "store" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Store
                </span>
    </a></li>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/applications">                <span class="<?php
                echo ($FRONTEND == "applications" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Applications
                </span></a></li>
        <li><a href="<?php echo $GLOBALS['config']['url']; ?>/appeals">
        <span class="<?php
                echo ($FRONTEND == "appeals" ? "underline decoration-wavy decoration-red-600/50" : "");
                ?>">
                    Appeals
                </span>
    </a></li>
    </ul>
    <div class="nav-gradient right"></div>
</nav>

<div class="flex justify-center mt-4">
    <div class="flex">
        <?php
        /*Call our notification handling*/include("../frontend/sitenotif.php");
        ?>
    </div>
</div>
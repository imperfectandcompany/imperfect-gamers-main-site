<?php
$loggedIn = false;
if (User::isLoggedin()) {
    $loggedIn = true;
}
?>
<nav class="navbar">
    <div class="nav-gradient left"></div>
    <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
        <div class="mx-auto text-center ig_logo animate__animated animate__slideInDown ">
            <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" class="pointer-events-none"
                type="image/svg+xml" height="48" width="48"></object>
        </div>
    </a>
<ul class="nav-links left">
    <?php if (!$loggedIn): ?>
        <li>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/register">
                <span class="<?php echo ($FRONTEND == "register" ? "underline decoration-wavy decoration-red-600/50" : ""); ?>">
                    Register
                </span>
            </a>
        </li>
        <li>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/login">
                <span class="<?php echo ($FRONTEND == "login" ? "underline decoration-wavy decoration-red-600/50" : ""); ?>">
                    Login
                </span>
            </a>
        </li>
    <?php else: ?>
        <li>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/logout">
                <span class="<?php echo ($FRONTEND == "logout" ? "underline decoration-wavy decoration-red-600/50" : ""); ?>">
                    Logout
                </span>
            </a>
        </li>
        <li>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/settings">
                <span class="<?php echo ($FRONTEND == "settings" ? "underline decoration-wavy decoration-red-600/50" : ""); ?>">
                    Settings
                </span>
            </a>
        </li>
        <li>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/profile">
                <span class="<?php echo ($FRONTEND == "profile" ? "underline decoration-wavy decoration-red-600/50" : ""); ?>">
                    Profile
                </span>
            </a>
        </li>
    <?php endif; ?>
</ul>
    <ul class="nav-links right">
        <li>
            <a href="
                <?php echo $GLOBALS['config']['url']; ?>/store">
                <span class="
                    <?php
                    echo ($FRONTEND == "store" ? "underline decoration-wavy decoration-red-600/50" : "");
                    ?>">
                    Store

                </span>
            </a>
        </li>
        <li>
            <a href="
                <?php echo $GLOBALS['config']['url']; ?>/applications">
                <span class="
                    <?php
                    echo ($FRONTEND == "applications" ? "underline decoration-wavy decoration-red-600/50" : "");
                    ?>">
                    Applications

                </span>
            </a>
        </li>
        <li>
            <a href="
                <?php echo $GLOBALS['config']['url']; ?>/appeals">
                <span class="
                    <?php
                    echo ($FRONTEND == "appeals" ? "underline decoration-wavy decoration-red-600/50" : "");
                    ?>">
                    Appeals

                </span>
            </a>
        </li>
    </ul>
    <div class="nav-gradient right"></div>
</nav>
<div class="flex justify-center mt-4">
    <div class="flex">
        <?php
        /*Call our notification handling*/ include("../frontend/sitenotif.php");
        ?>
    </div>
</div>
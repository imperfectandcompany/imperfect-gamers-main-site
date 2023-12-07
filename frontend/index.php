<div>
    <div class="flex flex-col mt-8 mb-8 md:mb-0 justify-around md:mt-40 fullscreen justify-content-center align-items-center">
        <div
            class="flex-grow flex items-center justify-center mb-12 animate__animated animate__fadeIn animate__delay-1s ">
            <object data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg" height="30px"></object>
        </div>

        <div class="flex flex-col justify-center items-center md:flex-row space-y-6 md:space-y-0 md:space-x-4">
            <?php if (!$loggedIn): ?>
                <a href="<?php echo $GLOBALS['config']['url']; ?>/register"
                    class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
                    <i class="fas fa-user-plus"></i>
                    Register
                </a>
            <?php endif; ?>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/<?php if ($loggedIn): ?>
logout
<?php else: ?>
login
<?php endif; ?>" class="primary-btn animate__animated animate__fadeInUp">
                <?php if ($loggedIn): ?>
                    <i class="fa fa-sign-out-alt"></i>
                    Logout
                <?php else: ?>
                    <i class="fa fa-sign-in-alt fa-fw" aria-hidden="true"></i>
                    Login
                <?php endif; ?>
            </a>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/store"
                class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
                <i class="fas fa-store fa-fw"></i>
                Store
            </a>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/applications"
                class="primary-btn animate__animated animate__fadeInUp">
                <i class="fas fa-comments fa-fw"></i>
                Applications
            </a>
            <a href="<?php echo $GLOBALS['config']['url']; ?>/appeals"
                class="primary-btn animate__animated animate__fadeInUp">
                <i class="fas fa-gavel"></i>
                Appeals
            </a>
            <?php if ($loggedIn): ?>
                <a href="<?php echo $GLOBALS['config']['url']; ?>/settings"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-cog fa-fw"></i>

                    Settings
                </a>
                <a href="<?php echo $GLOBALS['config']['url']; ?>/profile"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-user fa-fw"></i>
                    Profile
                </a>
            <?php endif; ?>
        </div>
    </div>



</div>
</div>
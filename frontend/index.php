<div>
    <div class="flex flex-col mt-40 fullscreen justify-content-center align-items-center">
        <div class="flex-grow flex items-center justify-center mb-12 animate__animated animate__fadeIn animate__delay-1s ">
            <object data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg" height="30px"></object>
        </div>

        <div class="flex flex-col justify-center items-center md:flex-row space-y-6 md:space-y-0 md:space-x-4">
            <a href="<?php echo $GLOBALS['config']['url']; ?>/<?php if ($loggedIn): ?>
logout
<?php else: ?>
login
<?php endif; ?>" class="primary-btn animate__animated animate__fadeInUp">
                <?php if ($loggedIn): ?>
                    <i class="fa fa-sign-out"></i>
                    Log out
                <?php else: ?>
                    <i class="fa fa-sign-in"></i>
                    Log in
                <?php endif; ?>
            </a>
            <a href="https://prototype.imperfectgamers.org/applications"
                class="primary-btn animate__animated animate__fadeInUp">
                <i class="fas fa-comments fa-fw"></i>
                Applications
            </a>
            <a href="https://prototype.imperfectgamers.org/appeals"
                class="primary-btn animate__animated animate__fadeInUp">
                <i class="fas fa-ban fa-fw"></i>
                Appeals
            </a>
            <a href="https://prototype.imperfectgamers.org/store"
                class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
                <i class="fas fa-store fa-fw"></i>
                Store
            </a>
            <?php if ($loggedIn): ?>
                <a href="https://prototype.imperfectgamers.org/settings"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-cog fa-fw"></i>

                    Settings
                </a>
                <a href="https://prototype.imperfectgamers.org/profile"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-user fa-fw"></i>
                    Profile
                </a>
            <?php endif; ?>
        </div>
    </div>



</div>
</div>
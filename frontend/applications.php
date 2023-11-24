<section class="banner-area mx-auto">
    <div class="overlay-bg"></div>
    <div
        class="flex flex-col fullscreen justify-content-center align-items-center">
        <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
            <div class="mx-auto text-center animate__animated animate__fadeIn animate__delay-1s">
                <object class="pointer-events-none	" data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg"
                    height="30px"></object>
            </div>
        </a>
        <div class="mb-4 flex">
            <?php
            /*Call our notification handling*/include("../frontend/sitenotif.php");
            ?>
        </div>
        <div class="forum-container animate__animated animate__fadeIn animate__delay-0s text-white relative">
            <?php
            // Display content based on context
            if ($threadRequested) {
                if (is_numeric($threadId)) {
                    // Specific thread requested
                    echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - Thread #{$threadId}</h2>";
                    echo "<div class='section-header'></div>";            
                    include_once("application/thread.php");
                } else {
                    // Thread ID was not provided or not numeric
                    echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - No Thread Requested</h2>";
                    echo "<div class='section-header'></div>";            
                }
            } elseif (isset($GLOBALS['url_loc'][2])) {
                // A non-thread page was requested
                echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - Invalid Page Requested</h2>";
                echo "<div class='section-header'></div>";            
            } else {
                // No specific thread or page requested; show the general Applications section
                echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications</h2>";
                include_once("application/main.php"); // Include the main applications content
            }
            ?>

            <?php if (!$threadRequested): ?>
                <div class="banner-content text-center">
                    <?php include_once("application/main.php"); ?>
                </div>
                <?php include_once("application/pagination.php"); ?>
            <?php endif; ?>
        </div>

        <div class="banner-content text-center mb-12">
            <a href="<?php echo $backUrl ?>"
                class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                <span class="material-icons">arrow_back_ios_new</span>
                Go back
            </a>
        </div>
    </div>
</section>
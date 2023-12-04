    <div class="flex flex-col fullscreen justify-content-center align-items-center">
        <div class="container animate__animated animate__fadeIn animate__delay-0s text-white relative">
            <?php
            // Display content based on context
            if ($threadRequested) {
                if (is_numeric($threadId)) {
                    // check if $thread['tid'] exists in any of the objects in the $staffApplications array
                    // if it does, then don't display it
                    // if it doesn't, then display it
                    //threadId would be a property within one of the objects inside $staffApplications if it exists
                    if ($threadDetails) {
                        // threadId exists in $staffApplications
                        // Specific thread requested
                        echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - Thread #{$threadId}</h2>";
                        echo "<div class='section-header'></div>";
                        $backUrl = $GLOBALS['config']['url'] . "/applications";
                        include_once("application/thread.php");
                    } else {
                        // threadId does not exist in $staffApplications
                        echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - Invalid Thread Requested</h2>";
                        echo "<div class='section-header'></div>";
                        $backUrl = $GLOBALS['config']['url'] . "/applications";
                    }
                } else {
                    // Thread ID was not provided or not numeric
                    echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - No Thread Requested</h2>";
                    echo "<div class='section-header'></div>";
                }
            } elseif (isset($GLOBALS['url_loc'][2])) {
                // A non-thread page was requested
                echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications - Invalid Page Requested</h2>";
                echo "<div class='section-header'></div>";
                $backUrl = $GLOBALS['config']['url'] . "/applications";
            } else {
                // No specific thread or page requested; show the general Applications section
                echo "<h2 class='text-lg font-semibold text-gray-700 capitalize text-white'>Applications</h2>";
                echo "<div class='section-header'></div>";
                include_once("application/main.php"); // Include the main applications content
                include_once("application/pagination.php"); // Include the main applications content
            }
            ?>
        </div>
        <div class="text-center mb-12">
            <a href="<?php echo $backUrl ?>"
                class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                <span class="material-icons">arrow_back_ios_new</span>
                Go back
            </a>
        </div>
    </div>
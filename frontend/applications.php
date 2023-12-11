<div class="container mx-auto text-white bg-black">
    <div class="animate__animated animate__fadeIn animate__delay-0s">
        <?php
        // Display content based on context
        if (isset($pageOutOfRange) && $pageOutOfRange) {
            // Page requested is out of range
            echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center text-center py-6">
                    <h1 class="text-4xl font-bold"> Applications - Invalid Page Requested</h1>
                </div>
            </div>
        </div>';
            $backUrl = $GLOBALS['config']['url'] . "/applications";
            $backUrlText = "Applications";
        } else {
            if ($threadRequested) {
                if (is_numeric($threadId)) {
                    // check if $thread['tid'] exists in any of the objects in the $banapplications array
                    // if it does, then don't display it
                    // if it doesn't, then display it
                    //threadId would be a property within one of the objects inside $banapplications if it exists
                    if ($threadDetails) {
                        // threadId exists in $banapplications
                        // Specific thread requested
                        echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between items-center text-center py-6">
                                <h1 class="text-4xl font-bold"> Applications - Thread ' . $threadId . '</h1>
                            </div>
                        </div>
                    </div>';
                        $backUrl = $GLOBALS['config']['url'] . "/applications";
                        $backUrlText = "Applications";
                        echo '<div class="bg-black/50 md:p-4 mt-2 md:mt-0">';
                        include_once("application/thread.php");
                        echo '</div>';
                    } else {
                        // threadId does not exist in $banapplications
                        echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between items-center text-center py-6">
                                <h1 class="text-4xl font-bold"> Applications - Invalid Thread Requested</h1>
                            </div>
                        </div>
                    </div>';
                        $backUrl = $GLOBALS['config']['url'] . "/applications";
                        $backUrlText = "Applications";
                    }
                } else {
                    // Thread ID was not provided or not numeric
                    echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center text-center py-6">
                            <h1 class="text-4xl font-bold"> Applications - No Thread Requested</h1>
                        </div>
                    </div>
                </div>';
                    $backUrl = $GLOBALS['config']['url'] . "/applications";
                    $backUrlText = "Applications";
                }
            } elseif (isset($GLOBALS['url_loc'][2])) {
                echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center text-center py-6">
                        <h1 class="text-4xl font-bold"> Applications - Invalid Page Requested</h1>
                    </div>
                </div>
            </div>';
                $backUrl = $GLOBALS['config']['url'] . "/applications";
                $backUrlText = "Applications";
            } else {
                echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center text-center py-6">
                        <h1 class="text-4xl font-bold"> Applications</h1>
                    </div>
                </div>
            </div>';
                echo '<div class="bg-black/50 md:p-4 mt-2 md:mt-0">';
                include_once("application/main.php"); // Include the main applications content
                include_once("application/pagination.php"); // Include the main applications content
                $backUrlText = "Home";
                echo '</div>';
            }
        }
        ?>
    </div>
    <div class="flex justify-center mb-12 ">
        <a href="<?php echo $backUrl; ?>"
            class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
            <span class="material-icons">arrow_back_ios_new</span>
            <?php echo $backUrlText; ?>
        </a>
    </div>
</div>
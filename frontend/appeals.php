<div class="container mx-auto text-white bg-black">
    <div class="animate__animated animate__fadeIn animate__delay-0s">
        <?php
        // Display content based on context
        if (isset($pageOutOfRange) && $pageOutOfRange) {
            // Page requested is out of range
            echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center text-center py-6">
                    <h1 class="text-4xl font-bold">Appeals - Invalid Page Requested</h1>
                </div>
            </div>
        </div>';
            $backUrl = $GLOBALS['config']['url'] . "/appeals";
            $backUrlText = "Appeals";
        } else {
            if ($threadRequested) {
                if (is_numeric($threadId)) {
                    // check if $thread['tid'] exists in any of the objects in the $banAppeals array
                    // if it does, then don't display it
                    // if it doesn't, then display it
                    //threadId would be a property within one of the objects inside $banAppeals if it exists
                    if ($threadDetails) {
                        // threadId exists in $banAppeals
                        // Specific thread requested
                        echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between items-center text-center py-6">
                                <h1 class="text-4xl font-bold">Appeals - Thread '.$threadId.'</h1>
                            </div>
                        </div>
                    </div>';
                        $backUrl = $GLOBALS['config']['url'] . "/appeals";
                        $backUrlText = "Appeals";
                        echo '<div class="bg-black/50 md:p-4 mt-2 py-2 md:py-0 md:mt-0">';
                        include_once("appeals/thread.php");
                        echo '</div>';
                    } else {
                        // threadId does not exist in $banAppeals
                        echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between items-center text-center py-6">
                                <h1 class="text-4xl font-bold">Appeals - Invalid Thread Requested</h1>
                            </div>
                        </div>
                    </div>';
                        $backUrl = $GLOBALS['config']['url'] . "/appeals";
                        $backUrlText = "Appeals";
                    }
                } else {
                    // Thread ID was not provided or not numeric
                    echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center text-center py-6">
                            <h1 class="text-4xl font-bold">Appeals - No Thread Requested</h1>
                        </div>
                    </div>
                </div>';
                    $backUrl = $GLOBALS['config']['url'] . "/appeals";
                    $backUrlText = "Appeals";
                }
            } elseif (isset($GLOBALS['url_loc'][2])) {
                echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center text-center py-6">
                        <h1 class="text-4xl font-bold">Appeals - Invalid Page Requested</h1>
                    </div>
                </div>
            </div>';
                $backUrl = $GLOBALS['config']['url'] . "/appeals";
                $backUrlText = "Appeals";
            } else {
                echo '<div class="py-12 bg-red-900/20 mx-auto text-center justify-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center text-center py-6">
                        <h1 class="text-4xl font-bold">Appeals</h1>
                    </div>
                </div>
            </div>';
                echo '<div class="bg-black/50 md:p-4 mt-2 md:mt-0">';
                include_once("appeals/main.php"); // Include the main appeals content
                include_once("appeals/pagination.php"); // Include the main appeals content
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
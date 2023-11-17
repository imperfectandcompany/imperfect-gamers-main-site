<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col mt-20 fullscreen justify-content-center align-items-center">

            <div class="mb-4 flex">
                <?php
                /*Call our notification handling*/include("../frontend/sitenotif.php");
                ?>
            </div>
            <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">Your profile</h2>
                <div class="profile-container">
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <p class="main-username" style="font-size: 0.9em; margin-top: 5px;">
                            <?= htmlspecialchars($mainUsername); ?>
                        </p>
                        <p class="additional-usernames" style="font-size: 0.9em; margin-top: 5px;">Also known as:
                            <?= implode(', ', $additionalUsernames); ?>
                        </p>
                    </div>

                    <!-- Titles Section -->
                    <div class="profile-section">
                        <label>Your titles:</label>
                        <ul>
                            <?php foreach ($processedTitles as $processedTitle): ?>
                                <?php if (!empty($processedTitle)): // Check if the title is not empty ?>
                                    <li>
                                        <?= $processedTitle; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Role Section -->
                    <div class="profile-section user-role">
                        <label>Your role:</label>
                        <div>
                            <?= htmlspecialchars($userRole); ?>
                        </div>
                    </div>

                    <!-- Packages Section -->
                    <div class="profile-section permanent-packages">
                        <label>Your permanent packages:</label>
                        <ul>
                            <?php foreach ($permanentPackages as $packageTitle): ?>
                                <li>
                                    <?= htmlspecialchars($packageTitle); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="banner-content text-center">
            </div>

            <div class="banner-content text-center mb-12">
                <a href="<?php echo $GLOBALS['config']['url'] ?>"
                    class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                    <span class="material-icons">arrow_back_ios_new</span>
                    Go back
                </a>
            </div>
        </div>
    </div>
</section>
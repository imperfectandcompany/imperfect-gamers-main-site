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
                <div class="banner-content text-center">
        <div>
    <h3>Your Titles:</h3>
    <ul>
        <?php foreach ($processedTitles as $processedTitle): ?>
            <li><?= $processedTitle; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
                </div>
            </div>


            <div class="banner-content text-center mb-12">
                <a href="https://prototype.imperfectgamers.org/"
                    class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                    <span class="material-icons">arrow_back_ios_new</span>
                    <div>Go back</div>
                </a>
            </div>
        </div>
</section>
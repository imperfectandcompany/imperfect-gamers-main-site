<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col mt-20 fullscreen justify-content-center align-items-center">
            <div class="mb-8 mt-4 text-center animate__animated animate__fadeIn animate__delay-1s ">
                <h1 class="text-white text-6xl font-bold">
                    <?php echo (!isset($success)) ? "Pick a username" : htmlspecialchars($username, ENT_QUOTES) . " is a good name!"; ?><br />
                </h1>
                <div class="">

                    <?php if (isset($success)): ?>
                        <?php header('Refresh: 2;'); ?>
                    <?php endif; ?>
                </div>

            </div>


            <div class="mb-4 flex">
                <?php
                /*Call our notification handling*/include("../frontend/sitenotif.php");
                ?>
            </div>

            <?php if (!isset($success)): ?>
                <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                    <form method="POST">
                        <div class="flex flex-col space-y-8">
                            <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="username">Username</label>
                                <input type="username" tabindex="1" id="username" name="username"
                                    value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>" class="
bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition
" autofocus />
                            </div>
                        </div>
                        <!-- not developed yet 
    <div class="flex justify-end">
        <a href="./reset" class="text-sm text-green-500 hover:underline underline-none mb-6">Forgot Password?</a>
    </div>
-->
                        <input type="hidden" name="form_type" value="user_login">
                        <input type="hidden" name="user_insert" value="user_insert">
                        <div class="mt-12">
                            <button type="submit" name="changeusername" tabindex="2"
                                class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none pb-3 w-full rounded-full upper my-auto ring-2 ring-red-700 mt-5 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100 transition"
                                type="submit">Continue</button>
                        </div>

                    </form>
                </div>
                <div class="banner-content text-center">
                    <a href="https://prototype.imperfectgamers.org/logout"
                        class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                        <span class="material-icons">arrow_back_ios_new</span>
                        <div>Logout</div>
                    </a>
                </div>
            <?php endif; ?>

        </div>
</section>
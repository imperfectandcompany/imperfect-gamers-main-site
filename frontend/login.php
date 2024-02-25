<section class="mx-auto">
        <div class="flex flex-col fullscreen justify-content-center align-items-center">
            <div class="mb-8 mt-4 text-center animate__animated animate__fadeIn animate__delay-1s ">
                <h1 class="text-white text-6xl font-bold">
                    <?php echo (!isset($success)) ? "Login" : "Welcome back"; ?>
                </h1>
                <div class="text-white">
                    <?php
                    // Check if the $success variable is set to indicate a successful sign-up
                    if (isset($success)) {
                        // Use an HTML meta tag to refresh the page after 2 seconds
                        echo '<meta http-equiv="refresh" content="2;url=' . $GLOBALS['url_loc'][0] . '/getstarted">';
                        // Display a success message or any other content you want shown before redirect
                        echo 'You have successfully logged in. Redirecting you now...';
                        exit; // Stop further PHP execution
                    }
                    ?>
                </div>
            </div>
            <?php if (!isset($success)): ?>
                <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                    <form method="POST">
                        <div class="flex flex-col space-y-8">
                            <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="emailoruser">Email / Username</label>
                                <input type="text" tabindex="1" id="emailoruser" name="login_emailoruser" value="" class="
bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition
" autofocus>
                            </div>
                            <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="password">Password</label>
                                <input type="password" tabindex="2" id="password" name="login_password" value="" class="
        bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800  focus:bg-opacity-100  transition
">
                            </div>
                        </div>
                        <!-- not developed yet 
    <div class="flex justify-end">
        <a href="./reset" class="text-sm text-green-500 hover:underline underline-none mb-6">Forgot Password?</a>
    </div>
-->
                        <input type="hidden" name="form_type" value="user_login">
                        <div class="mt-12">
                            <button name="login" tabindex="3"
                                class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none pb-3 w-full rounded-full upper my-auto ring-2 ring-red-700 mt-5 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100 transition"
                                type="submit">Log In</button>
                        </div>

                    </form>
                </div>
                <div class="banner-content text-center">
                    <a href="https://prototype.imperfectgamers.org/"
                        class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                        <span class="material-icons">arrow_back_ios_new</span>
                        <div>Go back</div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
</section>
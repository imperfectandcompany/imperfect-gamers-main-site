<section class="mx-auto">
    <div class="">
        <div class="flex flex-col fullscreen justify-content-center align-items-center">
            <div class="mb-8 mt-4 text-center animate__animated animate__fadeIn animate__delay-1s ">
                <h1 class="text-white text-6xl font-bold">
                    <?php echo (!isset($success)) ? "Register" : "Welcome!"; ?><br />
                </h1>
                <div class="text-white">
                <?php
                    // Check if the $success variable is set to indicate a successful sign-up
                    if (isset($success) && $success == 1) {
                        // Use an HTML meta tag to refresh the page after 2 seconds
                        echo '<meta http-equiv="refresh" content="2;url=' . $GLOBALS['url_loc'][0] . '/login">';
                        // Display a success message or any other content you want shown before redirect
                        echo 'You have successfully signed up. Redirecting to the login page...';
                        exit; // Stop further PHP execution
                    }
                    ?>
                </div>
            </div>
            <?php if (!isset($success)): ?>
                <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                    <form method="POST">
                        <div class="flex flex-col space-y-8">
                            <!-- Email Input -->
                            <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="signup_email">Email</label>
                                <input type="email" tabindex="1" id="signup_email" name="signup_email" value="" class="
bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition
" required autofocus />
                            </div>
                            <!-- Password Input -->
                            <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="signup_password">Password</label>
                                <input type="password" tabindex="2" id="signup_password" name="signup_password" value=""
                                    class="
bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition
" required />
                            </div>
                           <!-- <div class="selection:bg-red-300 selection:text-red-900">
                                <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                                    for="confirm_password">Confirm Password</label>
                                <input type="password" tabindex="3" id="confirm_password" name="confirm_password" value=""
                                    class="
bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition
" required />
                            </div> -->
                        </div>
                        <input type="hidden" name="form_type" value="new_user" />
                        <div class="g-recaptcha mt-6 flex justify-center"
                            data-sitekey="6LeNNyYpAAAAALke68Ar0IQNVzDYKM7iVvnwFUpe" data-callback='onSubmit'
                            data-action='submit'></div>
                        <div class="mt-12">
                            <button tabindex="4"
                                class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none pb-3 w-full rounded-full upper my-auto ring-2 ring-red-700 mt-5 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100 transition"
                                type="submit" name="createaccount" tabindex="4">Register</button>
                        </div>
                    </form>
                </div>
                <div class="banner-content text-center">
                    <a href="<?php echo $GLOBALS['url_loc'][0];?>/"
                        class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                        <span class="material-icons">arrow_back_ios_new</span>
                        <div>Go back</div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
</section>
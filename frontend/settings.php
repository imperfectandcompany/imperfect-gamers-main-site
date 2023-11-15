
<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col mt-20 fullscreen justify-content-center align-items-center">
            <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
                <div id="username" class="mt-2">
                    <div class="form-group">
                        <?php if ($steamId): ?>
                            <form action="" method="POST">
                                <label for="form_steam_account">Your steam account</label>
                                <input type="text" class="form-control mt-0" id="form_steam_account"
                                    value="<?php echo htmlspecialchars($steamId, ENT_QUOTES); ?>" disabled />
                                <input type="hidden" name="form_type" value="unhook_steam" />
                                <button type="submit" class="btn btn-primary mt-1">Unhook my Steam account</button>
                            </form>
                        <?php else: ?>
                            <label for="form_username">Connect your steam account</label>
                            <form action="https://prototype.imperfectgamers.org/settings/attachSteam" method="POST"
                                class="cleanform">
                                <input type="image" class="align-middle"
                                    src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/steamworks_docs/english/sits_small.png"
                                    alt="Submit button" />
                                <input type="hidden" value="1" name="login" />
                            </form>
                            <small id="emailHelp" class="form-text text-muted">Connecting your steam account to your IG
                                account allows you to match your Surf Stats to your profile page</small>
                        <?php endif; ?>
                    </div>
                </div>
                <!--
                <form>
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                            <input id="username" type="text"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                            <input id="emailAddress" type="email"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                            <input id="password" type="password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password
                                Confirmation</label>
                            <input id="passwordConfirmation" type="password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
-->


            </div>
            <div class="banner-content text-center">

            </div>

            <div class="banner-content text-center">
                <a href="https://prototype.imperfectgamers.org/"
                    class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                    <span class="material-icons">arrow_back_ios_new</span>
                    <div>Go back</div>
                </a>
            </div>
        </div>
</section>
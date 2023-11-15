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

                                <div class="flex flex-col space-y-8">
                                    <div class="selection:bg-red-300 selection:text-red-900">
                                        <label class=" font-medium text-gray-200 focus:text-gray-100"
                                            for="form_steam_account">Your steam account</label>
                                        <input type="username"
                                            class="bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition"
                                            tabindex="1" id="form_steam_account"
                                            value="<?php echo htmlspecialchars($steamId, ENT_QUOTES); ?>" autofocus
                                            disabled />
                                    </div>
                                </div>
                                <input type="hidden" name="form_type" value="unhook_steam" />
                                <div class="mt-12">
                                    <button type="submit" name="changeusername" tabindex="2"
                                        class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none pb-3 w-full rounded-full upper my-auto ring-2 ring-red-700 mt-5 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100 transition"
                                        type="submit">Unhook</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <label for="form_username">Connect your steam account</label>
                            <form action="<?php echo $GLOBALS['config']['url']; ?>/attachSteam" method="POST"
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
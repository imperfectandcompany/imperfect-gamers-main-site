<section class="mx-auto">
    <div class="container">
        <div class="flex flex-col fullscreen justify-content-center align-items-center">
            <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">Account settings</h2>
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

                    <!-- Avatar Section -->
                    <div x-data="{ avatarChanged: false, avatarPreview: '', avatarFilename: '' }" class="mt-12 w-full">
                        <!-- Current Avatar Display -->
                        <div class="mb-8">
                            <img :src="avatarPreview || '<?php echo $userProfile['avatar'] ? $GLOBALS['config']['avatar_url'] . '/' . $userProfile['avatar'] : $GLOBALS['config']['avatar_url'] . '/' . $GLOBALS['config']['default_avatar']; ?>'"
                                class="h-32 w-32 rounded-full object-cover mx-auto" alt="Current Avatar">
                        </div>
                        <!-- Avatar Update Form -->
                        <form method="POST" enctype="multipart/form-data"
                            class="flex flex-col items-center space-y-4">
                            <div class="form-group w-full">
                                <label for="avatarUpload"
                                    class="font-medium text-gray-200 focus:text-gray-100 block">Your avatar</label>
                                <input type="file" name="avatar" id="avatarUpload" accept="image/*" class="hidden"
                                    @change="avatarChanged = $event.target.files.length > 0; 
                         avatarFilename = avatarChanged ? $event.target.files[0].name : '';
                         avatarPreview = avatarChanged ? URL.createObjectURL($event.target.files[0]) : ''">

                                <!-- Custom button that triggers the file input and shows the selected filename -->
                                <label for="avatarUpload"
                                    class="bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition">
                                    <span x-text="avatarFilename || 'Choose Avatar'"></span>
                                </label>

                                <input type="hidden" name="form_type" value="adjust_avatar" />
                            </div>
                            <button type="submit" :class="{'cursor-not-allowed opacity-50': !avatarChanged}"
                                :disabled="!avatarChanged"
                                class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none w-full rounded-full my-auto ring-2 ring-red-700 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100">
                                Update Avatar
                            </button>
                        </form>
                    </div>

                    <!-- Username Change Section -->
                    <div class="mt-12 w-full hidden">
                        <form method="POST" action="" class="flex flex-col items-center space-y-4">
                            <div class="form-group w-full">
                                <label for="newUsername"
                                    class="font-medium text-gray-200 focus:text-gray-100 block">Change Username</label>
                                <input type="text" name="new_username" id="newUsername"
                                    value="<?php echo htmlspecialchars($userProfile['username'], ENT_QUOTES); ?>"
                                    class="bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition"
                                    required>
                            </div>
                            <button type="submit" name="change_username_submit"
                                class="bg-opacity-40 shadow-xl px-3 py-3 focus:outline-none w-full rounded-full my-auto ring-2 ring-red-700 cursor-pointer hover:bg-red-900 hover:bg-opacity-100 transition font-bold text-2xl focus:bg-red-900 focus:bg-opacity-100">
                                Change Username
                            </button>
                        </form>
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

            <div class="banner-content text-center mb-12">
                <a href="https://prototype.imperfectgamers.org/"
                    class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                    <span class="material-icons">arrow_back_ios_new</span>
                    <div>Go back</div>
                </a>
            </div>
        </div>
</section>
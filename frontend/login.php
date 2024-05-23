<section class="mx-auto" x-data="{ username: '', password: '', loading: false, errorMessage: '', loginSuccess: false }">
    <div class="flex flex-col fullscreen justify-content-center align-items-center">
        <div class="mb-8 mt-4 text-center animate__animated animate__fadeIn animate__delay-1s">
            <template x-if="!loginSuccess">
                <div x-data="{ open: true }" x-show="errorMessage" x-bind:class="! open ? 'hidden' : 'block'"
                    class="flex animate__animated animate__fadeIn animate__delay-0s text-white mb-6 select-none ">
                    <div class="flex gap-4 bg-red-900 bg-opacity-40 p-4 rounded-md">
                        <div class="w-max" @click="open = !open" class="cursor-pointer transition focus:outline-none">
                            <div
                                class="h-10 w-10 flex rounded-full bg-red-500 cursor-pointer hover:bg-opacity-30 transition bg-opacity-40 hover:text-red-400 text-white">
                                <span class="material-icons material-icons-outlined m-auto "
                                    style="font-size:20px">gpp_bad</span>
                            </div>
                        </div>
                        <div class="space-y-1 text-sm">
                            <h6 class="font-medium text-white">Fatal error</h6>
                            <p class="text-red-100 leading-tight" x-text="errorMessage">
                            </p>
                        </div>
                    </div>
                </div>
                <h1 class="text-white text-6xl font-bold">Login</h1>
            </template>
            <template x-if="loginSuccess">
                <div x-data="{ open: true }" x-bind:class="! open ? 'hidden' : 'block'"
                    class="flex flex-col animate__animated animate__fadeIn animate__delay-0s text-white mb-6 select-none ">
                    <div class="flex gap-4 bg-green-900 bg-opacity-40 p-4 rounded-md">
                        <div class="w-max" @click="open = !open" class="cursor-pointer transition focus:outline-none">
                            <div
                                class="h-10 w-10 flex rounded-full bg-green-500 cursor-pointer hover:bg-opacity-30 transition bg-opacity-40 hover:text-green-400 text-white">
                                <span class="material-icons material-icons-outlined m-auto "
                                    style="font-size:20px">gpp_bad</span>
                            </div>
                        </div>
                        <div class="space-y-1 text-sm">
                            <h6 class="font-medium text-white">Success</h6>
                            <p class="text-green-100 leading-tight">
                                Please wait while we redirect you...
                            </p>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-white text-6xl font-bold">Welcome Back!</h1>
                        <script>
                            setTimeout(() => {
                                window.location.href = 'https://prototype.imperfectgamers.org/';
                            }, 2000);
                        </script>
                    </div>
                </div>
            </template>

        </div>
        <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
            <form @submit.prevent="loading = true; $nextTick(() => {
                if(username && password) {
                    fetch('https://api.imperfectgamers.org/auth', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ username: username, password: password })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status === 'success') {
                            var domain = (window.location.hostname !== 'localhost') ? window.location.hostname : false;
                            document.cookie = 'IMPERFECTGAMERS_=1; path=/; max-age=' + (60 * 60 * 24 * 3) + (domain ? '; domain=' + domain : '');
                            document.cookie = 'token=' + data.token + '; path=/; max-age=' + (60 * 60 * 24 * 3) + (domain ? '; domain=' + domain : '');
                            loginSuccess = true;
                        } else {
                            errorMessage = 'Invalid credentials';
                            loading = false;
                        }
                    })
                    .catch(() => {
                        errorMessage = 'An error occurred';
                        loading = false;
                    });
                } else {
                    errorMessage = 'Please fill in all fields';
                    loading = false;
                }
            })">
                <div class="flex flex-col space-y-8">
                    <div class="selection:bg-red-300 selection:text-red-900">
                        <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                            for="emailoruser">Email / Username</label>
                        <input type="text" x-model="username" id="emailoruser"
                            class="bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition"
                            autofocus>
                    </div>
                    <div class="selection:bg-red-300 selection:text-red-900">
                        <label class="text-uppercase font-medium text-gray-200 focus:text-gray-100"
                            for="password">Password</label>
                        <input type="password" x-model="password" id="password"
                            class="bg-red-900 bg-opacity-40 shadow-xl px-3 py-3 text-base focus:outline-none pb-3 w-full rounded-lg my-auto ring-2 ring-offset-2 ring-offset-red-800 ring-red-700 mt-5 cursor-pointer focus:bg-red-900 hover:bg-red-800 focus:bg-opacity-100 transition">
                    </div>
                </div>
                <div class="mt-12">
                    <button :class="{ 'opacity-50 cursor-not-allowed': loading }" :disabled="loading"
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
    </div>
</section>
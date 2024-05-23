<div class="overlay-bg"></div>
<nav class="navbar">
    <div class="nav-gradient left"></div>
    <div class="nav-logo ig_logo animate__animated animate__slideInDown">
        <a href="/">
            <object data="https://cdn.imperfectgamers.org/inc/assets/img/logo.svg" alt="Imperfect Gamers Brand Logo"
                class="pointer-events-none" type="image/svg+xml" height="48px" width="48px">
            </object>
        </a>
    </div>
    <ul class="nav-links left">
        <li>
            <a href="/register">Register</a><a href="/login">Login</a>
        </li>

        </li>
    </ul>
    <ul class="nav-links right">
        <li><a href="/store"><span class="underline decoration-wavy decoration-red-600/50">Store</span></a></li>
        <li><a href="/applications">Applications</a></li>
        <li><a href="/appeals">Appeals</a></li>
    </ul>
    <div class="nav-gradient right"></div>
</nav>

<div class="mb-5">




<div class="text-center mt-8 mb-12">
                        <h1 class="text-6xl font-bold text-white">LOGIN</h1>
                        <p class="text-xl text-gray-300 mt-6 ">You need to <a href="/login"><span
                                    class="text-underline font-underline text-red-600 cursor-pointer">login</span></a>
                            first in order to buy any packages
                        </p>
                    </div>



    <div x-data="{ openModal: false }" class="text-white">
        <section class="mb-8 md:mb-12 text-center mx-auto justify-center text-center">
            <div class="mb-6 text-center">
                <div class="text-2xl md:text-3xl font-bold mb-2 focus:outline-none">
                    Current VIP Perks
                </div>
                <p class="mb-6 text-base text-gray-200  md:text-lg">
                    Vip is currently in a very beta state on the CS2 servers
                </p>
            </div>
            <div x-transition:enter="transition ease-out duration-300" x-transition:enter-end="opacity-100 scale-100"
                x-transition:enter-start="opacity-0 scale-90">
                <ul class="list-disc list-inside mx-auto w-3/4 mb-6 text-gray-400 text-sm md:text-base space-y-2">
                    <li class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                        <span class="inline-block">
                            275x55 gif of your choosing for your hud it will be visible for spectators
                            and if you set a
                            bot
                        </span>
                        <img src="https://i.imgur.com/XCNkpVi.gif" alt="Example HUD gif"
                            class="mx-auto hover:scale-105 transition-transform duration-300 ease-in-out">
                    </li>
                    <li class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                        <span class="inline-block">
                            [VIP] Tags in chat/scoreboard with custom text/name color
                        </span>
                    </li>
                    <li class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                        <span class="inline-block">
                            Reserve slot for when the server is full
                        </span>
                    </li>
                </ul>
            </div>
            <div class="mb-12 text-center">
                <button @click="openModal = true"
                    class="bg-red-600/50 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out focus:outline-none">
                    Become a VIP Today!
                </button>
            </div>
        </section>
        <!-- VIP Modal -->
        <div aria-labelledby="modal-headline" class="fixed z-10 inset-0 overflow-y-auto" x-show="openModal"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-end="opacity-100"
            x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="opacity-0" x-transition:leave-start="opacity-100">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div @click="openModal = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    x-show="openModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-end="opacity-100" x-transition:enter-start="opacity-0"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-end="opacity-0"
                    x-transition:leave-start="opacity-100">
                </div>
                <!-- This is the modal content -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    x-show="openModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-end="opacity-0 scale-95"
                    x-transition:leave-start="opacity-100 scale-100">
                    <!-- Modal content goes here -->
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    VIP Membership
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Your support as a VIP member helps us maintain and improve our
                                        services. Are
                                        you ready to become a VIP?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex md:space-y-0 sm:flex-row-reverse">
                        <button @click="openModal = false"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                            type="button">
                            Yes!
                        </button>
                        <button @click="openModal = false"
                            class="xs:mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            type="button">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="mx-auto p-6 md:p-0 md:container">
        <div class="row ">
            <div class="col-xs-12">
            </div>
        </div>

        <div class="row ">
            <div class="col-12">





                <div class="justify-content-center text-center">
                    <div class=" mx-auto px-4 py-4">
                        <div class="grid grid-cols-3 gap-8 p-4 bg-black/50 border-t border-[#4E0D0D]">
                            <!-- Repeat this block for each card -->
                            <div
                                class="card flex flex-col justify-between rounded-lg p-6 bg-red-900/10 border-red-600/50 text-white">
                                <div class="flex justify-between items-center mb-4">
                                    <i class="fas fa-credit-card text-2xl"></i>
                                </div>
                                <h2 id="title" class="min-h-64 text-2xl font-semibold mb-2 flex-grow">Can I use
                                    something other than paypal?</h2>
                                <p id="text" class=" flex-1 mb-6 flex-grow">You can use the debit / credit card
                                    options
                                    that are used inside of paypal as a guest account.</p>
                                <a id="button" target="_blank"
                                    href="https://www.paypal.com/us/enterprise/payment-processing"
                                    class="self-end bg-red-600/50 hover:bg-red-700 transition hover:text-red-500/50 duration-300 rounded py-2 px-4 self-start mt-auto">Learn
                                    More</a>
                            </div>
                            <!-- Repeat for each card -->



                            <!-- Repeat this block for each card -->
                            <div class="rounded-lg bg-dark-card p-6 max-w-sm w-full mx-auto">
                                <h3 class="text-2xl text-white font-bold mb-4">Upcoming VIP Perks</h3>
                                <p class="text-gray-200">Get ready for the next big update in CS2 - more
                                    features, more
                                    fun!</p>


                                <div class="text-gray-400" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:enter-start="opacity-0 scale-90">
                                    <ul
                                        class="list-disc list-inside text-left mx-auto w-3/4 mb-6 text-sm md:text-base space-y-2">
                                        <li
                                            class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                                            <span class="inline-block">
                                                !ve command to vote to extend the current map
                                            </span>
                                        </li>
                                        <li
                                            class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                                            <span class="inline-block">
                                                Player models (skins)
                                            </span>
                                        </li>
                                        <li
                                            class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                                            <span class="inline-block">
                                                Trails that follow your character
                                            </span>
                                        </li>
                                        <li
                                            class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                                            <span class="inline-block">
                                                VIP server to play test maps a week before release
                                            </span>
                                        </li>
                                        <li
                                            class="transform hover:translate-x-2 transition-transform duration-300 ease-in-out">
                                            <span class="inline-block">
                                                And much more
                                            </span>
                                        </li>
                                    </ul>
                                </div>






                            </div>





                            <!-- Repeat for each card -->

                            <!-- Repeat this block for each card -->
                            <div
                                class="card flex flex-col justify-between rounded-lg p-6 bg-red-900/10 border-1 border-red-600/50 text-white">
                                <div class="flex justify-between items-center mb-4">
                                    <i class="fas fa-question-circle text-2xl"></i>
                                </div>
                                <h2 id="title" class="min-h-64 text-2xl font-semibold mb-2 flex-grow">Have any
                                    questions?</h2>
                                <p id="text" class=" flex-1 mb-6 flex-grow">Do not hesitate to reach out to us
                                    on
                                    discord. We have a team ready to assist.</p>
                                <a id="button" target="popup" href="https://imperfectgamers.org/discord"
                                    class="self-end bg-red-600/50 hover:bg-red-700 transition hover:text-red-500/50 duration-300 rounded py-2 px-4 self-start mt-auto">Discord</a>
                            </div>
                            <!-- Repeat for each card -->
                        </div>


                        <div class="py-6 bg-black/50 text-white border-1 border-red-600/50">
                            <h2 class="text-2xl font-bold mb-4">
                                Recent Purchases
                            </h2>
                            <div class="space-y-4">
                                <div class="md:col-span-2 p-4">
                                    <div class="flex justify-between flex-wrap gap-4">
                                        <div class="flex items-center">
                                            <img alt="Avatar of ALlamaCannon" class="rounded-full" height="50"
                                                width="50"
                                                src="https://avatars.steamstatic.com/f8a7ecc33a05eff5ebdf45a875e698c4c717fcd9.jpg">
                                            <a href="https://steamcommunity.com/profiles/76561197995159273/"
                                                class="ml-2">
                                                ALlamaCannon </a>
                                        </div>
                                        <div class="flex items-center">
                                            <img alt="Avatar of Sharp" class="rounded-full" height="50" width="50"
                                                src="https://avatars.steamstatic.com/1f780be23cd46434983ec4a9235b2d72c8ff41c0.jpg">
                                            <a href="https://steamcommunity.com/profiles/76561197979182499/"
                                                class="ml-2">
                                                Sharp </a>
                                        </div>
                                        <div class="flex items-center">
                                            <img alt="Avatar of ALlamaCannon" class="rounded-full" height="50"
                                                width="50"
                                                src="https://avatars.steamstatic.com/f8a7ecc33a05eff5ebdf45a875e698c4c717fcd9.jpg">
                                            <a href="https://steamcommunity.com/profiles/76561197995159273/"
                                                class="ml-2">
                                                ALlamaCannon </a>
                                        </div>
                                        <div class="flex items-center">
                                            <img alt="Avatar of CaptinCrunchr" class="rounded-full" height="50"
                                                width="50"
                                                src="https://avatars.steamstatic.com/0e704f3ad2289c31a770a37f96ee76008dc6c708.jpg">
                                            <a href="https://steamcommunity.com/profiles/76561198064835304/"
                                                class="ml-2">
                                                CaptinCrunchr </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-black/50 ">
                            <div
                                class="card flex flex-col justify-between rounded-lg p-6 bg-red-900/20 border-1 border-red-600/50 text-white">
                                <div class="bg-dark-background text-white p-6">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <h2 class="text-4xl font-bold text-center mb-6">Lifetime VIP Benefits
                                        </h2>
                                        <p class="text-center mb-8">As a Lifetime VIP, you get exclusive access
                                            to
                                            features that enhance your experience and increase your visibility
                                            within
                                            our community.</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div class="benefit-card bg-dark-secondary rounded-lg p-4 text-center">
                                                <i class="fas fa-crown fa-3x mb-3"></i>
                                                <h3 class="text-2xl font-semibold mb-2">Custom VIP Title</h3>
                                                <p>Stand out in the community with a unique title displayed next
                                                    to your
                                                    name.</p>
                                            </div>
                                            <!-- Profile Customization Card -->
                                            <div class="benefit-card bg-dark-secondary rounded-lg p-4 text-center">
                                                <i class="fas fa-user-edit fa-3x mb-3"></i>
                                                <h3 class="text-2xl font-semibold mb-2">Profile Customization
                                                </h3>
                                                <p>Personalize your profile with bios, social links, and more to
                                                    connect
                                                    with others.</p>
                                            </div>
                                            <div class="flex flex-col items-center p-4 bg-dark-secondary rounded-lg">
                                                <i class="fas fa-infinity fa-3x mb-2"></i>
                                                <h3 class="text-2xl font-semibold">Unlimited Access</h3>
                                                <p>Enjoy unlimited access to all VIP areas and features.</p>
                                            </div>
                                            <div class="flex flex-col items-center p-4 bg-dark-secondary rounded-lg">
                                                <i class="fas fa-user-shield fa-3x mb-2"></i>
                                                <h3 class="text-2xl font-semibold">Priority Support</h3>
                                                <p>Get priority assistance from support with any issues or
                                                    questions.</p>
                                            </div>
                                            <div class="flex flex-col items-center p-4 bg-dark-secondary rounded-lg">
                                                <i class="fas fa-gifts fa-3x mb-2"></i>
                                                <h3 class="text-2xl font-semibold">Exclusive Deals</h3>
                                                <p>Receive special offers and discounts only available to VIP
                                                    members.</p>
                                            </div>
                                            <!-- More benefits... -->
                                        </div>
                                        <button onclick="alertMessage()"
                                            class="primary-btn animate__animated animate__zoomIn items-center text-center mx-auto">Become
                                            a VIP</button>

                                    </div>
                                    <h2 class="text-3xl font-bold text-center mb-6 pt-12">What you get</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                                        <!-- Commands Column -->
                                        <div class="bg-dark-secondary rounded-lg py-4 px-4">
                                            <h3 class="text-2xl font-semibold mb-2">Commands</h3>
                                            <ul class="list-none space-y-2">
                                                <li class="flex justify-between items-center">VIP Mute [!vmute]
                                                    <i class="fas fa-check text-green-500"></i>
                                                </li>
                                                <li class="flex justify-between items-center">VIP Menu [!vip] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Vote Extend [!ve]
                                                    <i class="fas fa-check text-green-500"></i>
                                                </li>
                                                <li class="flex justify-between items-center">Noclip [!nc] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                            </ul>
                                        </div>

                                        <!-- Aesthetics Column -->
                                        <div class="bg-dark-secondary rounded-lg py-4 px-4">
                                            <h3 class="text-2xl font-semibold mb-2">Aesthetics</h3>
                                            <ul class="list-none space-y-2">
                                                <li class="flex justify-between items-center">Name colors <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Message Colors <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">
                                                    Voice/Scoreboard/Chat Tag
                                                    [VIP] <i class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Paint [+paint,
                                                    !paintcolor, !paintsize] <i class="fas fa-check text-green-500"></i>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- VIP Exclusive Store Column -->
                                        <div class="bg-dark-secondary rounded-lg py-4 px-4">
                                            <h3 class="text-2xl font-semibold mb-2">VIP Exclusive Store</h3>
                                            <ul class="list-none space-y-2">
                                                <li class="flex justify-between items-center">Models: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Pets: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Hats: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Eyewear: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Tracers: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Auras: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Sprays: [ALL] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-12 bg-red-900/20">
                            <div class="flex flex-wrap justify-between items-center px-4 md:px-8 py-4">
                                <div class="flex items-center text-white mb-4 md:mb-0">
                                    <i class="text-red-400 fas fa-user-plus mr-2"></i>
                                    <span class="text-sm md:text-base">Be able to join the rap server while
                                        full</span>
                                    <span
                                        class="ml-2 bg-red-600/25 px-2 py-1 rounded text-xs md:text-sm text-red-200">[IG]
                                        24/7 Rap Surf Server - Easy Beginner</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-red-600/25 px-3 md:px-4 py-1 md:py-2 rounded mr-2 md:mr-4">
                                        <span class="text-white font-bold text-xs md:text-base">44 / 44</span>
                                        <span class="text-white ml-2 text-xs md:text-sm">[+1 VIP slot]</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <section class="py-12 px-6 rounded-lg bg-black/50 text-white">
                            <!-- Server Rental Header -->
                            <div class="text-center mb-6">
                                <h2 class="text-4xl font-bold">Private Server Rental</h2>
                                <p class="text-xl">Enjoy a private space with full IG experience, admin access,
                                    and no
                                    ads.</p>
                            </div>
                            <div class="flex-col justify-between rounded-lg p-6 text-white">

                                <!-- Rental Steps -->
                                <div class="flex flex-col md:flex-row justify-around items-center mb-6">
                                    <!-- Step 1 -->
                                    <div class="flex flex-col items-center mb-4 md:mb-0">
                                        <div
                                            class="w-16 h-16 bg-red-900/10  rounded-full flex items-center justify-center mb-2">
                                            <span class="text-2xl font-bold">1</span>
                                        </div>
                                        <p class="text-center">Check Availability</p>
                                    </div>

                                    <!-- Step 2 -->
                                    <div class="flex flex-col items-center mb-4 md:mb-0 ">
                                        <div
                                            class="w-16 h-16 bg-red-900/10 border-1 border-red-600/50 rounded-full flex items-center justify-center mb-2">
                                            <span class="text-2xl font-bold">2</span>
                                        </div>
                                        <p class="text-center">Choose Your Package</p>
                                    </div>

                                    <!-- Step 3 -->
                                    <div class="flex flex-col items-center mb-4 md:mb-0">
                                        <div
                                            class="w-16 h-16 bg-red-900/10 border-1 border-red-600/50 rounded-full flex items-center justify-center mb-2">
                                            <span class="text-2xl font-bold">3</span>
                                        </div>
                                        <p class="text-center">Complete Payment</p>
                                    </div>


                                    <!-- Step 4 -->
                                    <div class="flex flex-col items-center mb-4 md:mb-0">
                                        <div
                                            class="w-16 h-16 bg-red-900/10 border-1 border-red-600/50 rounded-full flex items-center justify-center mb-2">
                                            <span class="text-2xl font-bold">4</span>
                                        </div>
                                        <p class="text-center">Start Surfing</p>
                                    </div>
                                </div>


                                <!-- Rental Packages -->

                                <div class="mx-auto py-6 mb-4">
                                    <div class="grid grid-cols-3 gap-8">
                                        <div
                                            class="card flex flex-col justify-between rounded-lg p-6 bg-red-900/10 border-red-600/50 text-white">
                                            <h4 class="text-xl font-bold text-white mb-2">Package 1</h4>
                                            <p class="mb-4">Ideal for casual surfers wanting a private area to
                                                play
                                                with the full IG experience.</p>

                                            <ul class="mb-4 text-gray-300">
                                                <li>Full server setup with all standard IG network plugins</li>
                                                <li>Password-protected access</li>
                                                <li>Full support/updates</li>
                                                <li>Includes all maps on our network</li>
                                                <li>20 player capacity</li>
                                                <li>102.4 tick rate</li>
                                                <li>Admin Access with limited commands</li>
                                                <li>No Server Advertisements</li>
                                                <li>Choose optional plugins: !store !ws !gloves</li>
                                            </ul>
                                            <div class="text-center">
                                                <span class="text-2xl font-bold text-white">$60</span>/month
                                            </div>
                                        </div>


                                        <div
                                            class="card flex flex-col justify-between rounded-lg p-6 bg-black/40 border-red-900/20 text-white select-none opacity-50">
                                            <div class="">
                                                <h4 class="text-xl font-bold text-white mb-2">Sold Out</h4>
                                                <p class="mb-4">Perfect for surfers wanting the full gamut of
                                                    the IG
                                                    experience</p>
                                                <ul class="mb-4 text-gray-300">
                                                    <li>10 player capacity</li>
                                                    <li>102.4 Tick Rate</li>
                                                    <li>Admin Access with limited commands</li>
                                                    <li>All maps on IG Network</li>
                                                    <li>Choose optional plugins: !store !ws !gloves</li>
                                                </ul>

                                            </div>
                                        </div>


                                        <div
                                            class="card flex flex-col justify-between rounded-lg p-6 bg-black/40 border-red-900/20 text-white select-none opacity-50">
                                            <div class="">
                                                <h4 class="text-xl font-bold text-white mb-2">Not Available</h4>
                                                <p class="mb-4">Your very own blank-slate surf server! (pricing
                                                    determined by a sliding scale based on desired player
                                                    capacity and
                                                    tick rate)</p>
                                                <ul class="mb-4 text-gray-300">
                                                    <li>Up to 40 player capacity</li>
                                                    <li>Choose your tickrate</li>
                                                    <li>Admin Access with limited commands</li>
                                                    <li>All maps on IG Network</li>
                                                    <li>Choose optional plugins: !store !ws !gloves</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Server Rental Disclaimer -->
                                    <div class="mt-8">
                                        <h3 class="text-2xl font-bold mb-2">How To Order</h3>
                                        <p>Please contact our staff via discord or email at <a
                                                href="mailto:rentals@imperfectgamers.org"
                                                class="text-red-400">rentals@imperfectgamers.org</a> to check
                                            availability. We will do our best to accommodate all requests.</p>
                                    </div>

                                </div>

                                <!-- Server Rental Information -->


                                <div class="border-t border-[#4E0D0D] pt-10 pb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <div class="text-sm">
                                            <h4 class="font-bold mb-2">Server Rental Information</h4>
                                            <p>All IG servers restart at 5:00AM PST (8:00AM EST) to ensure
                                                stable
                                                reliability and performance (restarts take less than 1 minute).
                                            </p>
                                            <p class="mt-2">Turn-around time for server setup is anywhere from
                                                1-7 days.
                                                We have
                                                limited availability and it is first-come, first-serve.</p>
                                            <p class="mt-2">Terms are subject to
                                                change; we
                                                will honor a set agreement for 1 year (12 full months).</p>
                                        </div>
                                        <div class="text-sm">
                                            <h4 class="font-bold mb-2">Our guarantee</h4>
                                            <p>Maximized uptime per our host provider's standards (essentially
                                                24/7
                                                uptime)</p>
                                            <p>Reliable service and support</p>
                                            <p>DDoS protection</p>
                                        </div>
                                    </div>
                        </section>
                        <div class="border-t border-[#4E0D0D] pt-10 pb-4 text-white">
                            We reserve the right to refuse service to anyone.

                            By using our services you agree to our
                            <a href="https://imperfectgamers.org/terms-of-service" class="text-red-400"
                                target="_blank">terms of service</a> and
                            <a href="https://imperfectgamers.org/privacy-policy" class="text-red-400"
                                target="_blank">privacy policy</a> located on our website.

                            Please contact our staff on discord or email
                            <a href="mailto:support@imperfectgamers.org"
                                class="text-red-400">support@imperfectgamers.org</a>
                            in case something was left out or to be corrected or inquiries.
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
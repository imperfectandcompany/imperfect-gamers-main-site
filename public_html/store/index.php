<?php

session_start();

$page = 'home';
$page_title = 'Store';

try {
    require_once('inc/functions.php');

    if (isset($_GET['newlicense'])) {
        cache::clear();

        if (!prometheus::licenseCheck()) {
            setSetting($_GET['newlicense'], 'api_key', 'value', false);

            cache::clear();
        }
    }

    if (!prometheus::loggedIn()) {
        include('inc/login.php');
    } else {
        $UID = $_SESSION['uid'];
    }

    if (!getSetting('installed', 'value2')) {
        cache::clear();
        util::redirect('install.php');
    }

    if (prometheus::loggedIn() && !actions::delivered() && $page != 'required') {
        util::redirect('store.php?page=required');
    }

    if (prometheus::loggedIn() && is_numeric(actions::delivered('customjob', $_SESSION['uid'])) && $_GET['page'] !== 'customjob') {
        util::redirect('store.php?page=customjob&pid=' . actions::delivered('customjob', $_SESSION['uid']));
    }
} catch (PDOException $e) {
    util::redirect('install.php');
}

?>

<?php include('inc/header.php'); ?>

<style>
    /* Base styles */
    .card {
        flex-direction: column;
        /* Stack elements vertically */
    }

    /* Small screens (mobile devices) */
    @media (max-width: 600px) {
        .grid-cols-3 {
            grid-template-columns: 1fr;
            /* Stack grid items vertically */
        }
    }

    /* Medium screens (tablets) */
    @media (min-width: 601px) and (max-width: 1024px) {
        .grid-cols-3 {
            grid-template-columns: repeat(2, 1fr);
            /* 2 columns for grid */
        }
    }

    /* Large screens (desktops) */
    @media (min-width: 1025px) {
        .grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
            /* 3 columns for grid */
        }
    }


    img {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 600px) {
        h2 {
            font-size: 1.5rem;
            /* Smaller titles for small screens */
        }
    }

    .card {
        flex-direction: column;
        /* Stack card content vertically */
    }

    /* Responsive grid layout */
    @media (max-width: 768px) {

        /* On smaller screens, use a single column layout */
        .grid-cols-3 {
            grid-template-columns: 1fr;
        }

        /* Adjust the padding and margin for smaller screens */
        .mx-auto.px-4.py-4 {
            padding: 2rem 1rem;
        }

        /* Adjust the font size for smaller screens */
        .text-2xl {
            font-size: 1.5rem;
            /* Smaller titles for small screens */
        }

        /* Adjust card spacing */
        .gap-8 {
            gap: 0.5rem;
        }

        /* Full width buttons */
        #button {
            width: 100%;
            margin-top: 1rem;
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {

        /* On medium screens, use a two column layout */
        .grid-cols-3 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>


<div class="mb-5">
    <div class="mx-auto p-6 md:p-0 md:container">
        <div class="row ">
            <div class="col-xs-12">
                <?php if (tos::getLast() < getSetting('tos_lastedited', 'value3') && prometheus::loggedin()) { ?>
                    <div class="info-box">
                        <form method="POST" style="width: 40%;">
                            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

                            <style>
                                .yeeta {
                                    display: flex;
                                }

                                .yeetup display: flex;
                                justify-content: flex-end;
                                }
                            </style>

                            <div class="yeeta">
                                <h2>
                                    <?= lang('tos'); ?>
                                </h2>
                                <div class="yeetup">
                                    <div class="infoelez">
                                        <a href="tos.php"><i class="fa fa-info-circle" style="font-size:18px;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?= lang('tos_edited'); ?><br>
                            <input type="submit" class="btn btn-prom" value="<?= lang('tos_accept'); ?>" name="tos_submit"
                                style="margin-top: 10px;">
                        </form>

                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row ">
            <div class="col-12">
                <div class="justify-content-center text-center">
                    <?php if (!prometheus::loggedInIG()): ?>
                        <div class="text-center mt-8 mb-12">
                            <h1 class="text-6xl font-bold text-white">LOGIN</h1>
                            <p class="text-xl text-gray-300 mt-6 ">You need to <a href="/login"><span
                                        class="text-underline font-underline text-red-600 cursor-pointer">login</span></a>
                                first in order to buy any packages
                            </p>
                        </div>
                    <?php elseif (!prometheus::loggedin()): ?>
                        <div class="text-center mt-8 mb-12">
                            <h1 class="text-6xl font-bold text-white">LINK STEAM</h1>
                            <p class="text-xl text-gray-300 mt-6 ">
                                You need to link your steam in <a href="/settings"><span
                                        class="text-underline font-underline text-red-600 cursor-pointer">settings</span></a>
                                first in order to buy any packages
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="text-center mt-8 mb-6">
                            <h1 class="text-6xl font-bold text-white">STORE</h1>
                            <p class="text-xl text-gray-300 mt-6 ">Welcome to the store!</p>
                        </div>
                    <?php endif; ?>


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
                                <p id="text" class=" flex-1 mb-6 flex-grow">You can use the debit / credit card options
                                    that are used inside of paypal as a guest account.</p>
                                <a id="button" target="_blank"
                                    href="https://www.paypal.com/us/enterprise/payment-processing"
                                    class="self-end bg-red-600/50 hover:bg-red-700 transition hover:text-red-500/50 duration-300 rounded py-2 px-4 self-start mt-auto">Learn
                                    More</a>
                            </div>
                            <!-- Repeat for each card -->



                            <!-- Repeat this block for each card -->
                            <div class="rounded-lg bg-dark-card p-6 max-w-sm w-full mx-auto">
                                <h3 class="text-2xl text-white font-bold mb-4">Coming Soon</h3>
                                <p class="text-gray-400">Get ready for the next big update in CS2 - more features, more
                                    fun!</p>
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
                                <p id="text" class=" flex-1 mb-6 flex-grow">Do not hesitate to reach out to us on
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
                                        <?php
                                        $recentPurchases = dashboard::getRecentPurchases();
                                        foreach ($recentPurchases as $purchase): ?>
                                            <div class="flex items-center">
                                                <img alt="Avatar of <?= htmlspecialchars($purchase['name']) ?>"
                                                    class="rounded-full" height="50" width="50"
                                                    src="<?= htmlspecialchars($purchase['avatarUrl']) ?>">
                                                <a href="<?= htmlspecialchars($purchase['profileUrl']) ?>" class="ml-2">
                                                    <?= htmlspecialchars($purchase['name']) ?>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-black/50 ">
                            <div
                                class="card flex flex-col justify-between rounded-lg p-6 bg-red-900/20 border-1 border-red-600/50 text-white">
                                <div class="bg-dark-background text-white p-6">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <h2 class="text-4xl font-bold text-center mb-6">Lifetime VIP Benefits</h2>
                                        <p class="text-center mb-8">As a Lifetime VIP, you get exclusive access to
                                            features that enhance your experience and increase your visibility within
                                            our community.</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div class="benefit-card bg-dark-secondary rounded-lg p-4 text-center">
                                                <i class="fas fa-crown fa-3x mb-3"></i>
                                                <h3 class="text-2xl font-semibold mb-2">Custom VIP Title</h3>
                                                <p>Stand out in the community with a unique title displayed next to your
                                                    name.</p>
                                            </div>
                                            <!-- Profile Customization Card -->
                                            <div class="benefit-card bg-dark-secondary rounded-lg p-4 text-center">
                                                <i class="fas fa-user-edit fa-3x mb-3"></i>
                                                <h3 class="text-2xl font-semibold mb-2">Profile Customization</h3>
                                                <p>Personalize your profile with bios, social links, and more to connect
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
<button onclick="alertMessage()" class="primary-btn animate__animated animate__zoomIn items-center text-center mx-auto">Become a VIP</button>

                                    </div>
                                    <h2 class="text-3xl font-bold text-center mb-6 pt-12">What you get</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                                        <!-- Commands Column -->
                                        <div class="bg-dark-secondary rounded-lg py-4 px-4">
                                            <h3 class="text-2xl font-semibold mb-2">Commands</h3>
                                            <ul class="list-none space-y-2">
                                                <li class="flex justify-between items-center">VIP Mute [!vmute] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">VIP Menu [!vip] <i
                                                        class="fas fa-check text-green-500"></i></li>
                                                <li class="flex justify-between items-center">Vote Extend [!ve] <i
                                                        class="fas fa-check text-green-500"></i></li>
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
                                                <li class="flex justify-between items-center">Voice/Scoreboard/Chat Tag
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
                                    <span class="text-sm md:text-base">Be able to join the rap server while full</span>
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
                                <p class="text-xl">Enjoy a private space with full IG experience, admin access, and no
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
                                            <p class="mb-4">Ideal for casual surfers wanting a private area to play
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
                                                <p class="mb-4">Perfect for surfers wanting the full gamut of the IG
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
                                                    determined by a sliding scale based on desired player capacity and
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
                                            <p>All IG servers restart at 5:00AM PST (8:00AM EST) to ensure stable
                                                reliability and performance (restarts take less than 1 minute).</p>
                                            <p class="mt-2">Turn-around time for server setup is anywhere from 1-7 days.
                                                We have
                                                limited availability and it is first-come, first-serve.</p>
                                            <p class="mt-2">Terms are subject to
                                                change; we
                                                will honor a set agreement for 1 year (12 full months).</p>
                                        </div>
                                        <div class="text-sm">
                                            <h4 class="font-bold mb-2">Our guarantee</h4>
                                            <p>Maximized uptime per our host provider's standards (essentially 24/7
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

<?php if (isset($_GET['tos']) && $_GET['tos'] == 1) {
    echo "<script type='text/javascript'>console.log('TOS has been agreed. You now have access to purchasing packages, if for some reason there is an issue please come on the discord for immediate assistance. Thank you!');</script>";

} ?>

<script>
function alertMessage() {
    alert("To become a VIP, please DM Low on the Imperfect Gamers Discord. Ensure you're only ever sending payment to the email 'hazzzzzzmat@gmail.com'.");
}
</script>

<?php include('inc/footer.php'); ?>

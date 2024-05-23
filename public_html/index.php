<?php
ob_start(); // Turn on output buffering
include("../loader.php");

include('../config.php');

// if (isset($_GET['sitemap'])) {
//     include_once('./sitemap_gen.php');
//     ob_end_flush(); // Send the output buffer and turn off output buffering
//     exit; // Stop further processing
// }

// ob_end_clean(); // Clear the output buffer and turn off output buffering


if (isset($BACKEND)) {
    include_once('../backend/' . $BACKEND . '.php');
}

?>
<!doctype html>
<html lang="en">
<?php include_once('head.php'); ?>

<body class="flex flex-col justify-between h-screen">
    <div id="top"></div>
    <script>
        setTimeout(function () {
            snowStorm.start();
        }, 500);
    </script>
    <?if ($FRONTEND !== 'store'):?>
    <script src="./snowstorm.js"></script>
    <? else: ?>
    <script src="../snowstorm.js"></script>
    <?endif;?>
    <div class="flex flex-col justify-between">
        <?php if (isset($HEADER)): ?>
            <header id="header" class="text-center justify-center" style="touch-action: none;">
                <div class="overlay-bg"></div>
                <?php include('../header/' . $HEADER . '.php'); ?>
            </header>
        <?php endif; ?>
        <?php if (isset($FRONTEND)): ?>
            <main id="content" class="" style="-webkit-overflow-scrolling:touch">
                <div class="banner-area mx-auto">
                    <?php if (!isset($HEADER)): ?>
                        <div class="overlay-bg"></div>
                    <?php endif; ?>
                    <?php include('../frontend/' . $FRONTEND . '.php'); ?>
                </div>
            </main>
        <?php endif; ?>

        <footer id="footer"
            class="bg-black/10 border-t border-[#4E0D0D] justify-between items-center px-8 py-4 text-white"
            style="backdrop-filter: blur(10px);  -webkit-backdrop-filter: blur(10px); touch-action: none; bottom: 0px;">
            <a id="topbutton" href="#top" style="display: none;"><i class="fas fa-arrow-up"></i></a>
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <div class="flex space-x-4 mb-4 md:mb-0 ">
                    <a href="/terms-of-service" class="footer-link text-white hover:text-gray-300 font-medium">Terms of
                        Service</a>
                    <a href="/privacy-policy" class="footer-link text-white hover:text-gray-300 font-medium">Privacy
                        Policy</a>
                    <a href="/imprint" class="footer-link text-white hover:text-gray-300 font-medium">Imprint</a>
                    <a href="/about" class="footer-link text-white hover:text-gray-300 font-medium">About</a>
                </div>
                <div class="flex justify-center space-x-4">
                    <a href="https://imperfectgamers.org/discord" target="_blank" class="icon">
                        <i class="fab fa-discord fa-2x text-white hover:text-gray-300"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCp3hfjpn-y-8QMBu6LJYhJQ" target="_blank" class="icon">
                        <i class="fab fa-youtube fa-2x text-white hover:text-gray-300"></i>
                    </a>
                    <a href="https://steamcommunity.com/groups/ImperfectGamersRAP" target="_blank" class="icon">
                        <i class="fab fa-steam fa-2x text-white hover:text-gray-300"></i>
                    </a>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="footer-link text-white hover:text-gray-300 font-medium select-none">© 2023 Imperfect
                        Gamers</span>
                    <br>
                    <span class="text-white text-xs font-semibold">Powered by <a target="_blank"
                            class="transition hover:opacity-30" href="https://imperfectandcompany.com">Imperfect and
                            Company</a></span>
                </div>
            </div>
        </footer>



        <?php if (isset($FOOTER)): ?>
            <footer id="footer"
                class="bg-white dark:bg-dark dark:text-light border-gray-300 dark border-dark inset-x-0 bottom-0 text-center z-50 flex lg:hidden"
                style="touch-action: none; bottom: 0px;">

            </footer>
        <?php endif; ?>
    </div>




    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('avatarForm', () => ({
                avatarChanged: false,
                avatarPreview: '<?php echo $userAvatarUrl ?? $GLOBALS['config']['avatar_url'] . '/' . $GLOBALS['config']['default_avatar']; ?>',

                fileChosen(event) {
                    const input = event.target;
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            this.avatarPreview = e.target.result;
                            this.avatarChanged = true;
                        }.bind(this); // Use .bind(this) to refer to the Alpine component
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }));
        });
    </script>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("topbutton").style.display = "block";
            } else {
                document.getElementById("topbutton").style.display = "none";
            }
        }
    </script>

    <script>
        function setFullHeight() {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }

        // Set the --vh custom property initially
        setFullHeight();

        // Update it on resize
        window.addEventListener('resize', setFullHeight);
    </script>
    <script>
        function adjustViewportHeight() {
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }

        window.addEventListener('resize', adjustViewportHeight);
        window.addEventListener('orientationchange', adjustViewportHeight);

        // Run the function to set the variable initially
        adjustViewportHeight();</script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('avatarForm', () => ({
                avatarChanged: false,
                avatarPreview: '<?php echo $userAvatarUrl ?? $GLOBALS['config']['avatar_url'] . '/' . $GLOBALS['config']['default_avatar']; ?>',
                fileChosen(event) {
                    const input = event.target;
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            this.avatarPreview = e.target.result;
                            this.avatarChanged = true;
                        }.bind(this); // Use .bind(this) to refer to the Alpine component
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }));
        });
    </script>

    <!-- External script inclusion -->
    <script src="https://cdn.imperfectgamers.org/inc/assets/npm/widget/crate.js" async defer></script>

    <!-- Inline script execution -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const button = new Crate({
                server: '193909594270072832',
                channel: '366373736766636042',
                shard: 'https://e.widgetbot.io',
                color: '#ff3535'
            });
        });
    </script>

</body>

</html>
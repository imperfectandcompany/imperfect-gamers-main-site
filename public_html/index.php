<?php
include("../loader.php");

include('../config.php');
if (isset($BACKEND)) {
    include('../backend/' . $BACKEND . '.php');

}


?>
<!doctype html>
<html>
<?php include_once('head.php'); ?>

<body class="flex flex-col justify-between w-full max-w-8xl mx-auto h-screen">
    <div class="flex flex-col justify-between">
        <?php if (isset($HEADER)): ?>
            <header id="header" class="text-center justify-center" style="touch-action: none;">
            <div class="overlay-bg"></div>
                <?php include('../header/' . $HEADER . '.php'); ?>
            </header>
        <?php endif; ?>
        <?php if (isset($FRONTEND)): ?>
            <main style="-webkit-overflow-scrolling:touch">
                <section class="banner-area mx-auto">
                <?php if (!isset($HEADER)): ?>
                    <div class="overlay-bg"></div>
                <?php endif; ?>
                    <?php include('../frontend/' . $FRONTEND . '.php'); ?>
                </section>
            </main>




        <?php endif; ?>

        <div class="bg-black/10 border-t border-[#4E0D0D] justify-between items-center px-8 py-4 text-white"
style="backdrop-filter: blur(10px); touch-action: none; bottom: 0px;">
    <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
        <div class="flex space-x-4 mb-4 md:mb-0 ">
            <a href="/terms-of-service" class="footer-link text-white hover:text-gray-300 font-medium">Terms of Service</a>
            <a href="/privacy-policy" class="footer-link text-white hover:text-gray-300 font-medium">Privacy Policy</a>
            <a href="/imprint" class="footer-link text-white hover:text-gray-300 font-medium">Imprint</a>
            <a href="/about" class="footer-link text-white hover:text-gray-300 font-medium">About</a>
        </div>
        <div class="flex justify-center space-x-4">
            <a href="#" class="icon">
                <i class="fab fa-discord fa-2x text-white hover:text-gray-300"></i>
            </a>
            <a href="#" class="icon">
                <i class="fab fa-youtube fa-2x text-white hover:text-gray-300"></i>
            </a>
        </div>
        <div class="mt-4 sm:mt-0">
            <span class="footer-link text-white hover:text-gray-300 font-medium select-none">© 2015 Imperfect
                Gamers</span>
                <br>
            <span class="text-white text-xs font-semibold">Powered by <a target="_blank" class="transition hover:opacity-30" href="https://imperfectandcompany.com">Imperfect and Company</a></span>
        </div>
    </div>
</div>



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

</body>

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

</html>
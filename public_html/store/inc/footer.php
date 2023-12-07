<?php

global $page, $version, $devmode, $time;

if ($page !== 'admin') { ?>
    <div class="push"></div>
<?php } ?>

<?php if ($page !== 'admin') { ?>





    <footer
        class="footer py-5 mt-5 bg-black/10 border-t border-[#4E0D0D] justify-between items-center px-8 py-4 text-white"
        style="backdrop-filter: blur(10px); left:0;right:0;bottom:0;-webkit-backdrop-filter: blur(10px); touch-action: none; bottom: 0px;">
        <div class="container">
            <div >
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
            </div>
        </div>
    </footer>
<?php } ?>

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script src="compiled/js/site.js"></script>

<script>
    <?php if ($page !== 'admin' && getSetting('halloween_things', 'value2')) { ?>
        $.fn.halloweenBats({});
    <?php } ?>
</script>

<script type="template" id="message-danger">
  <p class='bs-callout bs-callout-danger'>
    <button
      type='button'
      class='close'
      data-dismiss='alert'
    >&times;
    </button>
  </p>
  </script>

<script type="template" id="message-success">
  <p class='bs-callout bs-callout-success'>
    <button
      type='button'
      class='close'
      data-dismiss='alert'
    >&times;
    </button>
  </p>
  </script>
</body>

</html>
<script src="https://cdn.imperfectgamers.org/inc/assets/npm/widget/crate.js" async defer>
            const button = new Crate({
                server: '193909594270072832',
                channel: '366373736766636042',
                shard: 'https://e.widgetbot.io',
                color: '#ff3535'
            })
         </script>

<?php
if ($devmode) { ?>
    <div class="position-fixed top-right p-3 m-3 bs-callout bs-callout-danger alert" style="bottom: 0; right: 0;">
        <i class="fas fa-stopwatch fa-fw"></i>
        <span>
            <?= "Page loaded in: " . (microtime(true) - $time) . "s" ?>
        </span>
    </div>
<?php } ?>

<?php
//var_dump($db->queries);

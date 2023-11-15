<section class="banner-area mx-auto">
   <div class="overlay overlay-bg"></div>
<div class="container">
<div class="flex flex-col mt-40 fullscreen justify-content-center align-items-center">
<div class="header-social mb-20 mx-auto text-center animate__animated animate__fadeIn animate__delay-1s ">
<object data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg" height="30px" ></object>
</div>
 
<div class="banner-content text-center">
<a 
href="https://prototype.imperfectgamers.org/<?php if ($loggedIn): ?>
logout
<?php else: ?>
login
<?php endif; ?>" class="primary-btn banner-btn animate__animated animate__fadeInUp">
<?php if ($loggedIn): ?>
Log out 
<?php else: ?>
Log in
<?php endif; ?>
</a>

<?php if ($loggedIn): ?>
<a href="https://prototype.imperfectgamers.org/settings" class="primary-btn banner-btn animate__animated animate__fadeInUp">
Settings
</a>
<?php endif; ?>




</div>
</div>
</section>



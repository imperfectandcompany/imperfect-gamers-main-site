<div>
   <div class="flex flex-col mt-8 mb-8 md:mb-0 justify-around md:mt-40 justify-content-center align-items-center">
      <div class="flex justify-between items-center mb-12 text-white ">
         <div class="flex justify-center items-center w-full relative">
            <span
               class="absolute top-1 left-1 z-10 transform -translate-y-1/2 w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full">
            </span>
            <a href="stats" class="cta-button mx-auto">
               <span>
               <span class="font-bold">BETA</span> Stats is live 2/20/24.
               </span>
               <span
                  class="group-hover:bg-white/[.1] py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-white/[.075] font-semibold text-white text-sm icon">
                  <svg class="flex-shrink-0 w-4 h-4" width="16" height="16" viewBox="0 0 16 16" fill="none">
                     <path
                        d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                  </svg>
               </span>
            </a>
         </div>
      </div>
      <div
         class="flex-grow flex items-center justify-center mb-12 animate__animated animate__fadeIn animate__delay-1s">
         <object data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg" height="30"></object>
      </div>
      <div class="flex flex-col justify-center items-center md:flex-row space-y-6 md:space-y-0 md:space-x-4">
         <?php if (!$loggedIn): ?>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/register"
            class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
         <i class="fas fa-user-plus">
         </i>
         Register
         </a>
         <?php endif; ?>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/<?php if ($loggedIn): ?>logout<?php else: ?>login<?php endif; ?>" class="primary-btn animate__animated animate__fadeInUp">
         <?php if ($loggedIn): ?>
         <i class="fa fa-sign-out-alt"></i>
         Logout
         <?php else: ?>
         <i class="fa fa-sign-in-alt fa-fw" aria-hidden="true"></i>
         Login
         <?php endif; ?>
         </a>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/store"
            class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
         <i class="fas fa-store fa-fw"></i>
         Store
         </a>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/applications"
            class="primary-btn animate__animated animate__fadeInUp">
         <i class="fas fa-comments fa-fw"></i>
         Applications
         </a>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/appeals"
            class="primary-btn animate__animated animate__fadeInUp">
         <i class="fas fa-gavel"></i>
         Appeals
         </a>
         <?php if ($loggedIn): ?>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/settings"
            class="primary-btn animate__animated animate__fadeInUp">
         <i class="fas fa-cog fa-fw"></i>
         Settings
         </a>
         <a href="<?php echo $GLOBALS['config']['url']; ?>/profile"
            class="primary-btn animate__animated animate__fadeInUp">
         <i class="fas fa-user fa-fw"></i>
         Profile
         </a>
         <?php endif; ?>
      </div>
   </div>
</div>
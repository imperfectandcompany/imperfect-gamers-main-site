<style>
    .card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
    }

    .vip-features ul li {
        position: relative;
        padding-left: 1.5rem;
    }

    .vip-features ul li::before {
        content: "\2022";
        color: #dc2626;
        /* Match with your red color theme */
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1.5em;
    }

    .vip-features ul {
        list-style: none;
    }

    .vip-features p {
        margin-top: 1rem;
    }
</style>


<div class="container flex flex-col items-center justify-center flex-grow">

<section class="mb-8 animate__animated animate__fadeIn text-white text-center items-center justify-center ">
    <h1 class="text-6xl font-bold mb-4">Page Not Found</h1>
        <p class="mb-8">The page you requested could not be found.</p>
        <object data="https://cdn.imperfectgamers.org/inc/assets/icon/not-found.svg"
                    alt="Imperfect Gamers Not found sad face Icon" class="mx-auto mb-8 animate__animated animate__rotateIn" type="image/svg+xml"
                    height="128px" width="128px">
        </object>        
        <p class="mb-8">Perhaps you are here because:</p>
        <ul class="mb-8 text-center">
            <li>The page has moved.</li>
            <li>The page no longer exists.</li>
            <li>You were snooping for SwaggerSouls' face reveal.</li>
            <li>You enjoy 404 pages.</li>
        </ul>
<div class="flex flex-col space-y-4">
<a href="/" class="mt-6 primary-btn animate__animated animate__zoomIn tabindex="-1" role="button" aria-disabled="true">Back to
                homepage</a>
            <span class="text-muted text-xs">404</span>
</div>
</section>
</div>
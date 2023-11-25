<section>
    <div class="overlay-bg"></div>
    <div>
        <div class="flex flex-col mt-40 fullscreen justify-content-center align-items-center">
            <div class="header-social mb-20 mx-auto text-center animate__animated animate__fadeIn animate__delay-1s ">
                <object data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg" height="30px"></object>
            </div>

            <div class="banner-content text-center flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <a href="<?php echo $GLOBALS['config']['url']; ?><?php if ($loggedIn): ?>
logout
<?php else: ?>
login
<?php endif; ?>" class="primary-btn animate__animated animate__fadeInUp">
                    <?php if ($loggedIn): ?>
                    <i class="fa fa-sign-out"></i>
                        Log out
                    <?php else: ?>
                    <i class="fa fa-sign-in"></i>
                        Log in
                    <?php endif; ?>
                </a>
                <a href="https://prototype.imperfectgamers.org/applications"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-comments fa-fw"></i>
                    Applications
                </a>
                <a href="https://prototype.imperfectgamers.org/appeals"
                    class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-ban fa-fw"></i>
                    Appeals
                </a>
                <a href="https://prototype.imperfectgamers.org/store"
                class="primary-btn animate__animated animate__fadeInU animate__fadeInUp">
                <i class="fas fa-store fa-fw" ></i>
                Store
            </a>
                <?php if ($loggedIn): ?>
                    <a href="https://prototype.imperfectgamers.org/settings"
                        class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-cog fa-fw"></i>

                        Settings
                    </a>
                    <a href="https://prototype.imperfectgamers.org/profile"
                        class="primary-btn animate__animated animate__fadeInUp">
                    <i class="fas fa-user fa-fw"></i>
                        Profile
                    </a>
                <?php endif; ?>
                <div id="server" class="container hidden">
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col">
                            <h2
                                class="text-4xl md:text-5xl font-medium tracking-tight text-center leading-tight text-white">
                                Our Servers</h2>
                            <div class="flex flex-col md:flex-row ">
                                <div class="flex flex-col">
                                    <div class="md:hidden w-80 rounded-xl shadow-lg"
                                        style="background-color: rgba(27, 27, 27, 0.66); backdrop-filter: blur(10px);">
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <img class="block mr-2 w-12 h-12"
                                                    src="https://i.ytimg.com/vi/YJ8OypG2vjA/maxresdefault.jpg"
                                                    alt="cs2">
                                                <div>
                                                    <p class="text-lg text-zinc-200">Counter-Strike 2 </p>
                                                    <p class="text-zinc-400">cs2.rap.imperfectgamers.org</p>
                                                    <p class="text-zinc-400">[coming soon]</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col pt-4">
                                            <div class="outline outline-1 rounded-xl outline-white overflow-hidden">
                                                <img class="rounded-xl"
                                                    src="https://i.ytimg.com/vi/YJ8OypG2vjA/maxresdefault.jpg"
                                                    alt="map">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden md:block w[33.5rem] h[37rem] max-w-[33.5rem] p-6 rounded-xl shadow-lg mx-2"
                                        style="background-color: rgba(27, 27, 27, 0.66); backdrop-filter: blur(10px);">
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <img class="block mr-2 w-12 h-12"
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABHCAYAAACzmZFbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAA/2SURBVHgB7Vt7jB3Vef+dedzXvl/2ru3CYhaIt8jFuDQxQakxgcYiCirVuolk2iYocZAaUkhSJVKa9SotappETaSWhgBpKSoJrOqA4wQ7RvYiHBwnXhsMXidgNmtss97H3ed9zL3zOPm+MzPr6wfgvXc25g9/0uzMnTv3zDm/8/ue5yxwSS5JqQgsnJxuu7vbv968WUIIifegLAwQ3d0a7py5HVaxE1LSO8QoTO116PYgrvveW/TEew4MDRFLN4PQ0yNguzcITXtAaOIBYegPC0/shpfcge33NRAMC8nEsiRSIBiEnp4eXbVbKA4SG2jmhYDnaZAuHbIG1nQCmxUQ4eELgdMtuzXFIMUi+u4PCJiBCITGK0gwMDDAHWdwBSatLFprHbie7g+HnvC8JbJeLF77/NrRlq4W2dvb6wUNCOy9v6EnNv0h4PMr6IaJX967C79IvAz5b5kAjgVVp6gYIYkNggbG7TG4OmJ6Iw1QOz2nTA9PYsYTfX19+uHDhxVzFAsO3H+TiMvdQrpb6PF/Fp7cLHT5rEhYj+PAP9yM/Z8xFpodkTBC0YGko6NDS6fTxqSuexieOYyGqlnAa1Dq4UsBGauwePFiI5fLuXjoM7LnV5NdQse34bqLuaFALehnshpCfkxo+HMpE/d2o/v/etDD3ywIMyJjBP85evSomJycFBgfr2n+wu6XZcF7CEJ3557SjeN46U1nJDeSGGpzBK7yVgpTe4xsSCuEOHPGRfBXenX0zVd6+oYbu57q0pTZWQBvFwkQJZ0LZ0uMj4/HkZ7+HV17p++KERydsOizjr0nXBjGGjiO/s6Nq2MpkmJV74ZeJl/kno5lIRqVVVVVLjoai1hUfy15C31u/lw3i3itBb3O7uzqBFLmJyHflenMimo44trOzk7ur44FYEQkNoKFWOGxX6BLLx6P57Jfv22FiGl3ER+EogxPpOua+NTKj2FV48DAaxPHhBRXXeCQJAxz6cDkpIGQI6cPFuFfBR/LiF4jQTZ0n2vXrtWPHDkSzy8347PfvfN/pJC3UN/6qV8fpLOmeup3eQiaMQjPXac8y7u1bsSOY2zm8/iLR5+lGyYxo9jV1eVQzOIp49q3qQmpWDtcZCCdCRStGTyYtbuf6lSA9IjAyMq5EcsFAaKkLUMdD6yvFh++cg/NzCLSPp3UowbnGWCJN3m7Fj3pyhfxw1fvx0P7Rqp0vZjNZvP0jcVAECCy59Z0q0jqP6DmPkCvylC7U7DtY1LXB4iFY/SZQnovh6IzA01LUKPH8f7/OISzwIgyoAojRbPxW/sKEzcuf0ykxD8BTvz8eIsLmwRDP1j//LHX3SZTn83qbtvqNnu4f1j2/hlFqGtGl8GMXUUd6CDPU6sOyCXU9ApSjtvoWqjD9QQZ5gLd16XQjmBn14dwa+8sStQrKhuhAqoezjGIAuYy04ZwOdmKX/CAz9sqNOHYd0x989ZGAsQh5XKHY4YLTaYoj1lKM95BD7UQADEotJllmkMqOa08VNHZRy0YdN1MYCSIETY9e6B9T1VhyHcULgJvF1VApU7gxumVI9e11ouq2EZ6KSoWXb9MNBifOINVnucHXp57DtmInXnqUBZjuU/W39P7+tQ0caOOnr2yVcexUXuZlbKHTpzQS553uf9RMUJ1p62tTQzrNHObbrydPl6NqGyQxwb1bPt2to1Rrolzm68ZO1/rd7763MgUsJi+KGISNoamZCqVik2KglT3OMolRgQqLSNznyRiOB738NmOuIiZH1eztlBCbpoIcVToWgM8p3kOEE2bMY5P7icQTpqm2UBjZOobxWKRqSkprLfpXKypqXFmZ2f95DCQqCNL4P1Xr6E7q7BQRR8hbDLN28k+/JQCrbQCQSXs+ixlvP/uPP2b39JT9bZtq8cDEPhgUJRxJBCAM+OQyJIuH92/bBNaSu8ih12HqEXTOFQvSE3bQcUek1zk39Nd058GPY3B9Gb8y+7ncOitJvgDtAkEVgEFQCKR8CzLcuiaDzs483PKkEXBCH/mKWLGmuUd0tA+eAFh83wkR6buaTmc2SynrC76nCIQPkJDMP230+vz9gE8+vJWAoGNYCIWi7H+Z/m3wTlLIPBZxSBky+zVq1e75Om8gM2VMSJsRDGibpmOpfU3kSW/siKXea7E4ZEX+K8XfoJNN/2VqPfWgfON8A1Co064gzgwyDPM4ykQERiAfENDQ5GyYYfSfoyMjChVoCDMTSaTsr+/392/f78Mk96KGCECIXSBjR26MAR5C6GjIjmHTjqN9eP46m1fEktrNqokruRZ6XkF5OztGM8xxR1SgXx1dTXPfL6pqcmic5FAYIbwoUJzAoFB49xo7l0VAdHtl+n1/nRaRxPBbhhXkAFDeUIAaNpbFCYf8/OREkDICAhTsCe6/By2UfUD0zPj8G2Bpeu6lclkeNA21Uec4L4aOB8qPzlPrlEJEBxJgqgmMDQE1KaWqQJLWcIg6Fn5y+NfkD/ov0ta3vfp8+xZYJzh7vzfGBM4nvkOvrjjFN2op6NAblOBQAkgAxB6DL+Fd6huVUJjxYaxsTEDnS0GNqy6gyj8UWCehROefc1w5Eh2Mz67dQt+8YaBLYf68L7WA/ij+hU0/83n1isZID0j35z6Jr6+4ym8lk7CD5LyZBT5bA8NDYXu8oKkIkaog9IdNNUlaTzr598em1ttl/zunnW4/dGnkMlcA57Z6cIS3Lft1eT39q2XmeLTQImqKG9p5OR07ou4+38fxEunqukuG0AFQHt7e6gG83JdlbpP0ZZt0/F3f3I54ub7UIaQwboWJtU1YzEeEA+CB1Q0KJPMP7KvGp/a8mU5XfwGqUpB/YDqnnIie39iY+9OTOFy+BNi5/N5FRsQE+YNguoHyhMRZJsxtBGYP7znr0WV/rCqRc5fpBye/TLueIxnninuBf0ySN8NFSEmEqO4eXkD6pIxDAxPUbzA2Wb4LvYQVIdAjtiQJyBCAzkvMMqOI+YWc+xmHRPZMdQ0zFIprh7zFZ3iAEND9eLqqUxOpKmCIygETtE3VQRCTIFhWc3YPTCaSCbgZtxGmGacvgtdohWci4FdKIsR5RpLQUBoLS0tZm583MQrtLi7/rKlFEdcj/myjIs61fFbinf96c24c4UoXrdoBoetU4RoxjKMPMXFVNMgwB3UOpZTS+5REAgqe+SYwXEcFS3idNhclv8uVzVUNbm5uTlBZfsUlmEGT9+7gQzmI5Qyl8cyCo0ojlD9kZp+ELO5H+HJgz+qe+K1zLRtJ5DLNQX95YGezQY+nKCAXFZ8X5GxJBB8z2GlGvDCG78ibAZRbqLBYXqwACxc5zoq7HxD3H3j/ukdGz+Hv70+iZqaU8QAtgUZqiuEeYSKHIOYwRUV7L0oWzXgg8izH6MQV8dhqoNsWPkBGsmKCHKNYDXc45LcWnH90i7ccdWgY3lH6k/k82RDbMofuJDLKhJ6ioqkkoBKo85o1BnOApNwDQ8f6UiImvh6RFaLCArCnqwRCXO9tqbdyF/fsAfP/Mai95Z6h4rT3UoYIagz/HudKBvTqYCqtzccdztbbxHSa/b7FlEW6rdiUiH2Bq21folsm92G58fK8g5vJ2UzgrI45Tm4DbLcuuu6KWPfyaJrip24tjUpdONq0ncjUkCkR/0V1+CyJT/Hf/dHugWp7A4GaxlsI9i9VdEyX02hUKgCBziLFrn41rrb0bn40/TkcuF5SUSlLlyvtNzP4fF9D+P7/arCJP3OVARK2V4jKGh4y5Ytc2tra20CQbkxCoCqMDpai0//+Ke4d9sn8PLwRnKMz8AvpEYg5FlMfTV29c8tCIsICFdpriFPnDjhEBuKVAxRfp0jPgKDICm04MU3XDy4Zwcms/3wc4jKhTNRTXRW3XZDAzCXmgsZbjApUyoBghnpka3wKBW3g2KIqgzRDFlBXaAGhydbUFvFWWUc0Qivf8XcxgZWt5AVqJQVlZbqEGwIY9qHkV5O07QsMUMFPKlqWmbTRcP87Zr0U++5apX03aRGuclEbof17Ctck9dJNTVKANUPUIFEVWQNN2/4AZY/+wlSmWShLTmK3r95koKBDwdVpncWtXypebRYm6YWpyiRO0mfk2r7QN4ew4TVhx4qxhwcZvCZgRxl2pWE10AE6xpBJdsN1jY48VGWnFaTqK7qFQv/uK6REFqplu0uhL4MwrT1MLYNPIOhyTR+fXwKna0pzBSKOHhKT+r6BLnqGjI4OXoHgsWailWjYiBKOhDWETji41S6iMZGYNXSuwmbRRcGArnGvLMV9235Dl5Jx4lbkkxsHCdnPVqr0An0BBVgeD0zRxUpj95RGlpXpBpRrn2yhCtH/sHZpKGt9E3IuwiDUJBb0b29m0BgjyAIhLktQrRWwWcGmdPvQlCRKrv+cLZEDYQSqmwjnU7LkSYzRsO7hpybeEdz5IOwHd0/+xp2/Y5tTGiAvbMOBQQVaFUhBoEqBgEVKpEF2arHK0kjpunhSzdeTYy44u1B4NotgSD0F/Dq0D14bjBPbpcfZiPIXicTHLOcglO7fK2W7jj7hA+WKyL414cFAYJWkjSy9gJ1icW01hHHOcGO7wqlMDJSM3fGXzq5CZu28b1acruhJ2ArGALBa5ezZCfm6hDkNlUKjojyjUhVgxm6YcMGbe/evRp1XB+PaRNQAxGJ0qeoIm3LSes/9UPDu9wXj/628P9H2P2yEQyZoAoudNhUDuSATQE3PT09pyYEtjqHO/oqlUiBKNlCJFo6WySef/MtbPjj4pmaQaownv1X3NX7uDs2w8XZWtv/DQ8+X3KoGiSBwD/iCJZ386vroCEZvDMSRkSuGlQ2U+2OjZI6CCem3jHXVZo/Td+LJw89grEZqlmgjsv1RHkGIQRC1SGpndAYKu/AESzvd0JEhZizJXIg+vr6/ItaV8MVi3hhOBbui1VL+IPprXjiEFe1eGbV4Mk1zqkE6b4qxFI7pYNWh4iorHE+iRSI0i1EjRpRNiFTflXbt40UNr9uPnFgJ2WmnDCpvASnvUOOQLA4m0VEscF8JFIgSmZMTLCZzJEH0PQiLfLyXuo8Rme/Hdt5jFeu2TjmyR2GO1qYEQUGgRKoea9SRdJ3RCth4sVJVwrX1FWh+6M3+7tiZTr5lZ/vzp+c4O3IPNgcFXRyMzMzoS0IXeGC2IAL6XjU7YUZKC/q1qAxaan7eRpcPs9LgjzgUCXmvAMuEgChRG0jSgfjh8kT+Xpz1mkmEFrIO4SrVBatkqkNHYgwX6hEovYa4X/xuMHBAy2Qi7QIBPYOFq1SqWCJSnu8q6V0R8tFlYXwR+EKGNuJOBnEOGWK/NkjEJxcLje3ek0EchbSJV5UCYqoent7O4fVbBg5pW6mIooKoMBGVG0URYW776KVyKfjrP/dYCZoOK2CocqEKnFR7UKpLBQvw3ZLd8KF9iME4D0Dwh9KQnZUvPZwSS7JJbkkl+Qiy+8BW7WFXRMvKLUAAAAASUVORK5CYII="
                                                    alt="cs2">
                                                <div>
                                                    <p class="text-left text-lg text-zinc-200">Imperfect Gamers | Rap
                                                    </p>
                                                    <p class="text-zinc-400">74.91.112.155:27015</p>
                                                </div>
                                            </div>
                                            <div class="inline-flex flex-col items-end text-right">
                                                <p class="text-zinc-200">Released Fri Nov 17</p>
                                                <p class="text-red-500 text-sm">[BETA]</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col pt-4">
                                            <div class="outline outline-1 rounded-xl outline-white overflow-hidden">
                                                <img class="rounded-xl"
                                                    src="https://i.ytimg.com/vi/YJ8OypG2vjA/maxresdefault.jpg"
                                                    alt="map">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
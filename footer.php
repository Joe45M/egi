
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gaming
 */

?>
<div id="footer">
    <div class="px-10 pb-10 pt-10 mt-10 footer-div text-white mt-20" style="background-image: url('/wp-content/themes/gaming/img/footer-bg.png');">
        <div class="container mx-auto">
            <div class="bg-nd-500 -mt-20 rounded-lg mb-5 p-5 shadow-lg shadow-nd-700/20 border-4 border-nd-600">
                <span class="text-3xl font-display font-bold mb-3">Find your next read</span>

                <form action="" class="flex justify-between rounded-lg bg-nd-600 p-3">
                    <button aria-label="Search" class="bg-transparent p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <input type="text" name="s" class="bg-transparent px-3 py-2 text-white placeholder:text-gray-300 flex-grow w-full" placeholder="Search news & tutorials">

                </form>
            </div>
            <div class="grid lg:grid-cols-4 gap-10">
                <div>
                    <p class="tracking-widest text-lg uppercase mb-3 font-display">About us</p>
                    <p>We are EliteGamerInsights, your go-to source for everything Call of Duty and Minecraft related. Get better at games with our help.</p>
                </div>
                <div>
                    <p class="tracking-widest text-lg uppercase mb-3 font-display">Links</p>
                    <ul>
                        <li><a class="p-2 text-sm inline-block" href="/">Home</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://elitegamerinsights.com/k-d-calculator-calculate-your-kill-death-ratio/">K/D Calculator</a></li>
                        <li><a class="p-2 text-sm inline-block" href="/game-download-speed-calculator">Game Download Speed Calculator</a></li>
                        <li><a class="p-2 text-sm inline-block" href="/contact">About & Contact us</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://elitegamerinsights.com/privacy/">Privacy</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://elitegamerinsights.com/do-not-sell-my-personal-information/">Do not sell my personal Information (CCPA)</a></li>
                        <li><a class="p-2 text-sm inline-block" href="/gdpr-policy/">GDPR Policy</a></li>
                    </ul>
                </div>
                <div>
                    <p class="tracking-widest text-lg uppercase mb-3 font-display">Socials</p>
                    <ul>
                        <li><a class="p-2 text-sm inline-block" href="http://Twitter.com/EliteGInsights">Twitter</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://www.tiktok.com/@elitegamerinsights">Tiktok</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://www.youtube.com/@EliteGamerInsights">Youtube</a></li>
                        <li><a class="p-2 text-sm inline-block" href="https://www.reddit.com/r/EliteGamerInsights/">Reddit</a></li>
                    </ul>
                </div>
                <div>
                    <p class="tracking-widest text-lg uppercase mb-3 font-display">How To Guides</p>
                    <ul>
                        <li><a class="p-2 text-sm inline-block" href="https://elitegamerinsights.com/games/how-to-download-cod-warzone/">How To Install CoD Warzone</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-nd-600">
        <div class="p-5 text-white text-center">
            <p>Copyright © <?php echo date('Y') ?> EliteGamerInsights</p>
        </div>
    </div>
</div>


<?php wp_footer(); ?>
</body>
</html>

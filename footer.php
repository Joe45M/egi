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
<div class="bg-nd px-10 pb-10 pt-10 mt-10 text-white">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-10">
            <div>
                <p class="tracking-wider uppercase mb-3 font-display">About us</p>
                <p>We are EliteGamerInsights, your go-to source for everything Call of Duty and Minecraft related.</p>
            </div>
            <div>
                <p class="tracking-wider uppercase mb-3 font-display">Links</p>
                <ul>
                    <li><a class="p-3 inline-block" href="/">Home</a></li>
                    <li><a class="p-3 inline-block" href="/contact">About & Contact us</a></li>
                    <li><a class="p-3 inline-block" href="https://elitegamerinsights.com/privacy/">Privacy</a></li>
                </ul>
            </div>
            <div>
                <p class="tracking-wider uppercase mb-3 font-display">Socials</p>
                <ul>
                    <li><a class="p-3 inline-block" href="http://Twitter.com/EliteGInsights">Twitter</a></li>
                    <li><a class="p-3 inline-block" href="https://www.tiktok.com/@elitegamerinsights">Tiktok</a></li>
                    <li><a class="p-3 inline-block" href="https://www.youtube.com/@EliteGamerInsights">Youtube</a></li>
                    <li><a class="p-3 inline-block" href="https://www.reddit.com/r/EliteGamerInsights/">Reddit</a></li>
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
<?php wp_footer(); ?>

</body>
</html>

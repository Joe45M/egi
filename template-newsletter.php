<?php


/**
 * Template Name: Newsletter
 */

get_header();

?>
    <style>
        #masthead, #footer {
            display: none;
        }
    </style>

    <main class="site-main relative h-screen bg-center" style="background-image: url('/wp-content/themes/gaming/img/newsletter.webp');">
        <div class="container text-white mx-auto py-5 text-center">
            <h1 class="text-3xl mb-5 font-bold uppercase pt-10 lg:pt-[10vh] drop-shadow-lg drop-shadow-pink-500">Gaming Discount Newsletter</h1>
            <p class="mb-3">The EGI newsletter will send you the best gaming discounts once a week, <br> from Steam, to XBOX and Playstation, we'll save you money.</p>
            <p class="text-pink-500">Once a week and no more.</p>
            <?php echo do_shortcode('[sibwp_form id=2]') ?>
        </div>
    </main>
<?php
get_footer();

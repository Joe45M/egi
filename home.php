<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */

get_header();

$minecraftMessages = array(
    "1. Digging deep!",
    "2. Blocks upon blocks!",
    "3. Mining for fun!",
    "4. Crafting your world!",
    "5. A world of infinite possibilities!",
    "6. Redstone rocks!",
    "7. Beware the Creeper!",
    "8. Explore your creativity!",
    "9. Pixel perfect!",
    "10. Build it up!",
    "11. Discover the unknown!",
    "12. Unearth hidden treasures!",
    "13. Let's get blocky!",
    "14. One block at a time!",
    "15. A miner's delight!",
    "16. Venturing into the darkness!",
    "17. Taming the wild!",
    "18. A world of adventure awaits!",
    "19. Pixelated paradise!",
    "20. Craft your destiny!",
    "21. Raise your sword!",
    "22. Don't dig straight down!",
    "23. Defeat the Ender Dragon!",
    "24. Enchanting encounters!",
    "25. Home is where the heart is!",
    "26. Create. Explore. Survive.",
    "27. Journey to the Nether!",
    "28. Keep calm and mine on!",
    "29. Join the block party!",
    "30. Unleash your inner architect!",
    "31. Embrace your creativity!",
    "32. Adventure awaits!",
    "33. Battle the mobs!",
    "34. Conquer the elements!",
    "35. Forge your own path!",
    "36. Find your own way!",
    "37. Survive the night!",
    "38. The sky's the limit!",
    "39. Harvest the fruits of your labor!",
    "40. Keep on building!",
    "41. Together we craft!",
    "42. Where imagination meets reality!",
    "43. Create a masterpiece!",
    "44. Journey into the unknown!",
    "45. Leave no stone unturned!",
    "46. Craft your legacy!",
    "47. Unlock your potential!",
    "48. Beware the deep!",
    "49. Rule the skies!",
    "50. Find your treasure!",
    "51. The world is your canvas!",
    "52. Dare to dream!",
    "53. Dig, craft, build!",
    "54. Mine the depths!",
    "55. Blaze your own trail!",
    "56. Adventure is out there!",
    "57. Unleash your creativity!",
    "58. Embrace the block!",
    "59. Brave the unknown!",
    "60. Go beyond the horizon!",
    "61. Defy gravity!",
    "62. Dream big!",
    "63. Master the elements!",
    "64. Find your inner builder!",
    "65. A blocky new beginning!",
    "66. Carve your own path!",
    "67. Unleash the power of redstone!",
    "68. Unravel the mysteries!",
    "69. A pixel-perfect world!",
    "70. Explore. Craft. Conquer.",
    "71. Immerse yourself in the world!",
    "72. Ignite your imagination!",
    "73. Defend your creations!",
    "74. The world is your playground!",
    "75. Shape your destiny!",
    "76. Expand your horizons!",
    "77. Venture forth!",
    "78. The sky is no limit!",
    "79. Stand tall!",
    "80. Create your own adventure!",
    "81. Blaze a trail!",
);


$headerMessage = $minecraftMessages[array_rand($minecraftMessages)];

$args = [
    'post_type'      => 'games',
    'orderby'        => 'publish_date',
    'order'          => 'DESC',
    'tax_query'      => [
        [
            'taxonomy' => 'game',
            'field'    => 'slug',
            'terms'    => 'minecraft',
        ],
    ],
    'posts_per_page' => 6,
];

$mcPosts = new WP_Query($args);


$args = [
    'post_type'      => 'games',
    'orderby'        => 'publish_date',
    'order'          => 'DESC',
    'tax_query'      => [
        [
            'taxonomy' => 'game',
            'field'    => 'slug',
            'terms'    => 'call-of-duty',
        ],
    ],
    'posts_per_page' => 6,
];

$codPosts = new WP_Query($args);

$args = [
    'post_type' => 'games',
    'orderby'   => 'publish_date',
    'order'     => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'game',
            'field'    => 'slug',
            'terms'    => 'reviews',
        ],
    ],
    'limit'     => 10,
];

$reviews = new WP_Query($args);
?>

    <main id="primary" class="site-main bg-zinc-900">
        <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
        />

        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <div class="py-10 lg:py-0 lg:min-h-[70vh] header-home relative" style="background-image: url('/wp-content/themes/gaming/img/home-header.jpg');">

            <div class="container mx-auto lg:pt-[10%]">
                <h1 class="text-2xl lg:text-4xl uppercase mt-32 text-white font-bold mb-2">Elitegamerinsights</h1>
                <h2 class="text-5xl lg:text-7xl uppercase text-white font-bold mb-5">MWIII News & Guides</h2>
                <p class="text-2xl text-white lg:w-2/3 lg:mr-10">The latest Call of Duty MWIII Loadouts, metas and guides to
                    <br class="lg:block hidden"> improve your game and dominate the field.</p>
            </div>

            <video id="home-vid" playsinline="" loop="" muted="" autoplay="">
                <source src="/wp-content/themes/gaming/img/hero.mp4" type="video/mp4">
            </video>
        </div>

<!--        <div class="bg-black">-->
<!--            <div class="home-header bg-cover" style="background-image:url('/wp-content/themes/gaming/img/header-bg[1].webp');">-->
<!--                <div class="py-48 bg-zinc-900/20 hue-rotate">-->
<!--                    <div class="container mx-auto">-->
<!--                        <h1 class="text-3xl text-white text-center font-bold mb-10 uppercase">Ultimate game guides</h1>-->
<!--                        <h2 class="text-2xl text-white text-center font-bold">Best In Class Gaming Tutorials by EliteGamerInsights</h2>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="block text-gray-200 container mx-auto mt-10">

            <div class="grid mb-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-5">

                <?php


                while(have_rows('game_link', 'options')): the_row(); ?>

                    <a onclick="fathom.trackGoal('2LHMN6MF', 0);" href="<?php echo get_sub_field('link') ?>" class="p-3 bg-zinc-800 rounded-md hover:bg-nd-500 transition-all duration-200">
                        <img src="<?php echo get_sub_field('image') ?>" alt="Game logo" class="h-40 w-w-full mb-3 object-cover">
                        <div class="block leading-relaxed w-full text-center font-bold"><?php echo get_sub_field('text') ?></div>
                    </a>

                <?php endwhile; ?>
            </div>
        </div>

        <div class="atmosphere">
            <div class="container text-gray-200 mx-auto">
                <div class="relative mb-3 ">
                    <p class="text-4xl font-display text-zinc-200 mb-3 font-bold uppercase">Minecraft</p>
                </div>
                <?php get_template_part('template-parts/post-collection', '', [
                        'collection' => $mcPosts
                ]); ?>
            </div>
        </div>

        <div class="atmosphere-2">
            <div class="container text-gray-200 mx-auto">



                <div class="relative mb-3">
                    <p class="text-4xl font-display text-zinc-200 mb-3 font-bold uppercase">Call of Duty</p>

                </div>
                <?php get_template_part('template-parts/post-collection', '', [
                    'collection' => $codPosts,
                ]); ?>
            </div>
        </div>


        <div class="container mx-auto">
            <div class=" mb-10 rounded-3xl mt-8 pt-10 px-10 font-display bg-gradient-to-bl from-nd-600 to-nd-400 text-white text-2xl lg:text-5xl">
                <div class="grid lg:grid-cols-5">
                    <div class="lg:col-span-3 mb-8 lg:mb-32 relative">
                        <span class="float header-message shadow-none"><?php echo $headerMessage ?></span>
                        <span class="mb-3 font-bold ">Elite insights, news and tutorials.</span>
                        <p class="text-lg font-normal">Become an elite gamer with our help.</p>
                        <!--            <form action="">-->
                        <!--                <input type="text" name="s" placeholder="Search for tips.." class="p-3 text-lg placeholder:text-white/50 focus:bg-white focus:text-black duration-300 hover:bg-white hover:placeholder:text-black rounded-md border border-gray-300 bg-transparent">-->
                        <!--            </form>-->
                    </div>
                    <div class="lg:col-span-2 relative">
                        <img class="absolute pt-7 h-56 hidden lg:block lg:h-96 -bottom-16"
                             src="/wp-content/themes/gaming/img/header.png"
                             alt="Minecraft Elitegamerinsights homepage character">
                    </div>
                </div>
            </div>
        </div>

        <?php
        //        if (have_posts()) :
        //
        //            if (is_home() && !is_front_page()) :
        //                ?>
        <!--                <header>-->
        <!--                    <h1 class="page-title screen-reader-text">--><?php //single_post_title(); ?><!--</h1>-->
        <!--                </header>-->
        <!--            --><?php
        //            endif;
        //
        //            /* Start the Loop */
        //            while (have_posts()) :
        //                the_post();
        //
        //                /*
        //                 * Include the Post-Type-specific template for the content.
        //                 * If you want to override this in a child theme, then include a file
        //                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
        //                 */
        //                get_template_part('template-parts/content', get_post_type());
        //            endwhile;
        //            the_posts_navigation();
        //        else :
        ////            get_template_part('template-parts/content', 'none');
        //        endif;
        ?>

    </main><!-- #main -->


    <script>
        const mobile = new Swiper('.swiper-mobile', {
            // Optional parameters
            direction: 'horizontal',
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1.2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1300: {
                    slidesPerView: 3.2,
                    spaceBetween: 10
                }
            }
        });
    </script>

<?php
get_footer();

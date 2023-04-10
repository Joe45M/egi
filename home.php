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


$args = [
    'post_type' => 'games',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'game',
            'field'    => 'slug',
            'terms'    => 'minecraft',
        ],
    ],
    'limit' => 10,
];

$mcPosts = new WP_Query($args);

$args = [
    'post_type' => 'games',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'game',
            'field'    => 'slug',
            'terms'    => 'call-of-duty',
        ],
    ],
    'limit' => 10,
];

$codPosts = new WP_Query($args);


?>

    <main id="primary" class="site-main">

        <div class="py-20 mb-10 lg:py-32 font-display bg-gradient-to-bl from-nd-600 to-nd-400 text-center text-white text-2xl lg:text-5xl">
            <h1 class="mb-3 font-bold ">Level up your game.</h1>
            <p class="text-lg font-normal">Tutorials, tips and tricks for gamers.</p>
            <form action="">
                <input type="text" name="s" placeholder="Search for tips.." class="p-3 text-lg placeholder:text-white/50 focus:bg-white focus:text-black duration-300 hover:bg-white hover:placeholder:text-black rounded-md border border-gray-300 bg-transparent">
            </form>
        </div>

        <div class="container mx-auto relative">
            <div class="grid gap-5 md:grid-cols-2">
                <a href="/game/minecraft" class="rounded-lg cursor-pointer text-green-900 h-40 group relative bg-gradient-to-bl from-green-400 hover:scale-105 z-50 duration-300 via-green-200 to-green-400">
                    <p class="text-4xl font-display font-bold p-5">Minecraft </p>
                    <p class="text-lg lg:text-2xl font-display font-bold group-hover:opacity-0 group-hover:absolute p-5">Latest & greatest Minecraft guides </p>
                    <p class="text-lg lg:text-2xl font-display font-bold opacity-0 group-hover:opacity-100  p-5 flex gap-2 items-center">Go to Minecraft guides
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </p>
                    <img class="card-mc absolute scale-0 group-hover:scale-100 h-56 bottom-0 right-0 duration-300 origin-bottom-right" src="<?php echo get_template_directory_uri() ?>/img/mc.png" alt="MC character">
                </a>
                <a href="/game/call-of-duty" class="rounded-lg cursor-pointer text-white h-40 group relative bg-gradient-to-bl from-nd-700 hover:scale-105 z-50 duration-300 via-nd-700 to-nd-600">
                    <p class="text-4xl font-display font-bold p-5">Call of Duty </p>
                    <p class="text-lg lg:text-2xl font-display font-bold group-hover:opacity-0 group-hover:absolute p-5">Become a Call of Duty pro </p>
                    <p class="text-lg lg:text-2xl font-display font-bold opacity-0 group-hover:opacity-100  p-5 flex gap-2 items-center">Go to guides
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </p>
                    <img class="card-mc absolute scale-0 group-hover:scale-100 h-56 bottom-0 right-0 duration-300 origin-bottom-right" src="<?php echo get_template_directory_uri() ?>/img/wz.png" alt="MC character">
                </a>
            </div>
        </div>

        <div class="container mx-auto">
            <div class="relative mb-3">
                <p class="text-3xl font-bold z-50 py-3 pr-5 bg-white relative inline-block">Minecraft</p>
                <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
            </div>
            <div class="grid lg:grid-cols-3 gap-10 mb-10">
                <?php

                $i = 0;
                if ($mcPosts->have_posts()) {
                    while ($mcPosts->have_posts()) {
                        $mcPosts->the_post();

                        if ($i === 0): ?>

                            <a href="<?php the_permalink() ?>" class="lg:col-span-3 group">
                                <div class="grid lg:grid-cols-2 gap-10">
                                    <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                         class="aspect-video rounded-xl group-hover:scale-105 duration-300">

                                    <div class="flex">
                                        <div class="justify-between">
                                            <p class="text-3xl mb-3 font-bold"><?php the_title(); ?></p>
                                            <div class="leading-7 mb-5"><?php the_excerpt() ?></div>
                                            <div class="flex w-full gap-5">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                                    </svg>
                                                    <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        <?php else: ?>

                            <a href="<?php the_permalink(); ?>" class="group">
                                <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                     class="w-full aspect-video object-cover rounded-md mb-5 group-hover:scale-105 duration-300">

                                <div class="flex">
                                    <div class="self-end">
                                        <p class="text-xl mb-3 font-bold"><?php the_title(); ?></p>
                                        <div class="flex w-full gap-5">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                                </svg>
                                                <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php

                        endif;

                        $i++;
                    }
                } else {
                    // no posts found
                }

                ?>
            </div>


            <div class="relative mb-3">
                <p class="text-3xl font-bold z-50 py-3 pr-5 bg-white relative inline-block">Call of Duty</p>
                <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
            </div>
            <div class="grid lg:grid-cols-3 gap-10">
                <?php

                $i = 0;
                if ($codPosts->have_posts()) {
                    while ($codPosts->have_posts()) {
                        $codPosts->the_post();

                        if ($i === 0): ?>

                            <a href="<?php the_permalink() ?>" class="lg:col-span-3 group">
                                <div class="grid lg:grid-cols-2 gap-10">
                                    <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                         class="aspect-video rounded-xl group-hover:scale-105 duration-300">

                                    <div class="flex">
                                        <div class="justify-between">
                                            <p class="text-3xl mb-3 font-bold"><?php the_title(); ?></p>
                                            <div class="leading-7 mb-5"><?php the_excerpt() ?></div>
                                            <div class="flex w-full gap-5">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                                    </svg>
                                                    <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        <?php else: ?>

                            <a href="<?php the_permalink(); ?>" class="group">
                                <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                     class="w-full aspect-video object-cover rounded-md mb-5 group-hover:scale-105 duration-300">

                                <div class="flex">
                                    <div class="self-end">
                                        <p class="text-xl mb-3 font-bold"><?php the_title(); ?></p>
                                        <div class="flex w-full gap-5">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                                </svg>
                                                <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php

                        endif;

                        $i++;
                    }
                } else {
                    // no posts found
                }

                ?>
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

<?php
get_footer();

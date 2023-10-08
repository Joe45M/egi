<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */

get_header();
?>

    <main id="primary" class="site-main">


        <div class="py-10">
            <div class="container mx-auto">


                <div class="mb-3 text-sm text-zinc-200">
                    <?php

                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    ?>
                </div>
                <h1 class="text-4xl font-display text-zinc-200 mb-1 font-bold uppercase"><?php echo str_replace('game: ', '', get_the_archive_title()) ?></h1>
                <div class="text-xl text-zinc-400 font-lighter"><?php
                    the_archive_description(); ?></div>
            </div>


            <?php

            $term = get_term_by('term_taxonomy_id', get_queried_object()->term_id);


            $tags = get_field('tags', $term);

            ?>

            <div class="container mx-auto mb-5 pt-5">
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-5">
                    <?php

                    if (!isset($_GET['tags'])):
                        foreach ($tags as $tag): ?>

                        <a class="p-5 rounded-md text-white text-center bg-zinc-800 border border-gray-600" href="?getby=tag&tags=<?php echo $tag->slug ?>">
                            <?php echo $tag->name ?>
                        </a>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php if (have_posts()) : ?>
        <div class="container mx-auto">
            <div class="grid lg:grid-cols-3 gap-10">
                <?php
                /* Start the Loop */
                $i = 0;
                while (have_posts()) :
                    the_post();

                if ($i === 3 || $i === 9): ?>

                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
                            crossorigin="anonymous"></script>
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="fluid"
                         data-ad-layout-key="-62+ct+5-46+cv"
                         data-ad-client="ca-pub-6764478945960117"
                         data-ad-slot="2770254447"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                <?php endif;

                    if ($i === 0): ?>



                        <a href="<?php the_permalink() ?>" class="lg:col-span-3 group">
                            <div class="grid lg:grid-cols-2 gap-10">
                                <img src="<?php the_post_thumbnail_url(get_the_ID()) ?>" alt="Post image"
                                     class="aspect-video rounded-md group-hover:scale-105 duration-300">

                                <div class="flex">
                                    <div class="justify-between">
                                        <p class="text-3xl mb-3 font-bold text-brand-500"><?php the_title(); ?></p>
                                        <div class="leading-7 text-zinc-200 mb-5"><?php the_excerpt() ?></div>
                                        <div class="flex w-full gap-5">
                                            <div class="flex items-center text-gray-400">
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
                                            <div class="flex items-center text-gray-400">
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
                            <img src="<?php the_post_thumbnail_url('medium') ?>" alt="Post image"
                                 class="w-full aspect-video object-cover rounded-md mb-5 group-hover:scale-105 duration-300">

                            <div class="flex">
                                <div class="self-end">
                                    <p class="text-xl mb-3 font-bold text-brand-500"><?php the_title(); ?></p>
                                    <p class="text-xs mb-3 text-zinc-200"><?php echo wp_trim_words(get_the_excerpt(), 22, '...') ?></p>

                                    <div class="flex w-full gap-5">
                                        <div class="flex items-center text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                            </svg>
                                            <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                        </div>
                                        <div class="flex items-center text-gray-400">
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

                endwhile;
                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </div>
        </div>

        <div class="flex justify-center w-full">
            <?php

            the_posts_pagination()

            ?></div>

    </main><!-- #main -->

<?php
get_footer();

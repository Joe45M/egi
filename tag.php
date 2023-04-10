<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php

$args = [
    'posts_per_page' => 100,
    'post_type' => 'games',
    'tag' => get_queried_object()->slug,
];

$posts = new WP_Query($args);

?>


<div class="py-20 mb-10 lg:py-32 font-display bg-gradient-to-bl from-nd-600 to-nd-400 text-center text-white text-2xl lg:text-5xl">
    <h1 class="mb-3 font-bold "><?php echo single_tag_title('', true); ?></h1>
</div>


<section id="primary" class="site-content">
    <div id="content" role="main">

        <?php if ($posts->have_posts()) : ?>
            <header class="archive-header">
                <?php if (tag_description()) : // Show an optional tag description. ?>
                    <div class="archive-meta"><?php echo tag_description(); ?></div>
                <?php endif; ?>
            </header><!-- .archive-header -->

            <div class="container mx-auto">
                <div class="grid lg:grid-cols-3 gap-5">
                    <?php
                    // Start the Loop.
                    while ($posts->have_posts()) :
                        $posts->the_post();

                        /*
                         * Include the post format-specific template for the content. If you want
                         * to use this in a child theme then include a file called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        ?>

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

                    endwhile;
                    ?>
                </div>
            </div>

        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>

    </div><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

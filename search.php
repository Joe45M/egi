<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gaming
 */

get_header();
?>

	<main id="primary" class="site-main">

        <div class="bg-nd py-32 mb-10">
            <div class="container">
                <p class="lg:text-4xl text-white font-bold mb-3">Results for "<?php  the_search_query() ?>"</p>
                <form action="">
                    <input type="text" name="s" placeholder="Search for tips.." class="p-3 text-lg placeholder:text-white/50 focus:bg-white focus:text-black duration-300 hover:bg-white hover:placeholder:text-black rounded-md border border-gray-300 bg-transparent">
                </form>
            </div>
        </div>

		<div class="container">
            <?php if ( have_posts() ) : ?>

            <!--			<header class="page-header">-->
            <!--				<h1 class="page-title">-->
            <!--					--><?php
            //					/* translators: %s: search query. */
            //					printf( esc_html__( 'Search Results for: %s', 'gaming' ), '<span>' . get_search_query() . '</span>' );
            //					?>
            <!--				</h1>-->
            <!--			</header><!-- .page-header -->

            <div class="grid lg:grid-cols-3 gap-10">

                <?php
                $i = 0;
                /* Start the Loop */#
                while ( have_posts() ) :
                    the_post();

                    ?>

                    <a href="<?php the_permalink(); ?>" class="group">
                        <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                             class="w-full aspect-video object-cover rounded-md mb-5 group-hover:scale-105 duration-300">

                        <div class="flex">
                            <div class="self-end">
                                <p class="text-xl mb-3 font-bold text-nd-500"><?php the_title(); ?></p>
                                <div class="flex w-full gap-5">
                                    <div class="flex text-white items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                        </svg>
                                        <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                    </div>
                                    <div class="flex text-white items-center">
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
                    $i++;
                    ?>

                <?php

                endwhile;

                the_posts_navigation();

                else :

                ?>

                <p class="text-2xl">No results... try again?</p>

                <?php
                endif;
                ?>
        </div>

            </div>

	</main><!-- #main -->

<?php
get_footer();

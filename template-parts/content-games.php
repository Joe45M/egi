<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="relative bg-nd text-white pt-20 pb-10">
            <div class="container mx-auto">
                <h1 class="text-4xl tracking-wider font-display text-center font-bold mb-5"><?php the_title() ?></h1>
            </div>
            <div class="flex gap-3 font-bold text-white justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                <?php echo get_the_date('d F Y') ?>
            </div>
            <img id="post-header-image" class="mx-auto block -mb-14 pt-10 rounded-2xl aspect-video object-cover " src="<?php echo get_the_post_thumbnail_url() ?>"
                 alt="">
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content mt-20">
        <div class="container mx-auto mb-32">
            <div class="grid lg:grid-cols-4 gap-14">
                <div class="lg:col-span-3 text-lg lg:pl-64 leading-relaxed">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'gaming'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );
                    ?>

                </div>
                <div>
                    <?php echo get_template_part('template-parts/author') ?>

<!--                    <div class="bg-gray-300 rounded-md p-3">-->
<!--                        <div class="bg-white rounded-md p-3">-->
<!--                            <p class="text-2xl text-brand font-display mb-1">Join our Newsletter</p>-->
<!--                            <p class="mb-5 text-gray-500">No junk, just news.</p>-->
<!--                            <form action="">-->
<!--                                <input type="text" placeholder="awesome@sauce.com"-->
<!--                                       class="p-2 border border-gray-300 w-full mb-3">-->
<!--                                <button class="px-5 py-3 bg-brand-500 text-white rounded-md">Sign up</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        <?php

//        wp_link_pages(
//            array(
//                'before' => '<div class="page-links">' . esc_html__('Pages:', 'gaming'),
//                'after' => '</div>',
//            )
//        );
        ?>
    </div><!-- .entry-content -->


    <?php

    $slugs = get_the_terms(get_the_ID(), 'game');



    $args = array(
        'post_type' => 'games',
        'post__not_in' => [get_the_ID()],
        'tax_query' => [
//            [
//                'taxonomy' => 'game',
//                'field'    => 'slug',
//                'terms'    => 'get_the_terms()',
//            ],
        ],
    );

    $relatedPosts = new WP_Query($args);

    ?>

    <div class="container">
    </div>

    <div class="container mx-auto">

        <div class="relative mb-3">
            <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-white relative inline-block">Related </h3>
            <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <?php
            if ($relatedPosts->have_posts()) {
                while ($relatedPosts->have_posts()) {
                    $relatedPosts->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="group">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="group-hover:scale-105 duration-300 rounded-md aspect-auto mb-3" alt="Post image">
                        <p class="text-xl text-brand font-bold"><?php the_title() ?></p>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        // Mobile scroll effect
        if (window.innerWidth < 768) {
            let element = document.querySelector('.entry-header');

            document.addEventListener("scroll", (event) => {
                lastKnownScrollPosition = window.scrollY;

                window.requestAnimationFrame(() => {
                    console.log(this.scrollY / 1000)
                    element.style.opacity = `${1 - (this.scrollY / 500)}`;
                });
            });
        }
    </script>

</article><!-- #post-<?php the_ID(); ?> -->

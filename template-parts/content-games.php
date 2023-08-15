<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */


$howToArgs = [
        'post_type' => 'games',
    'tax_query'  => array(
        array(
            'taxonomy'  => 'post_tag',
            'field'     => 'slug',
            'terms'     =>  array(
                'how-to',
            ),
        ),
    ),
];


$howToGuides = (new WP_Query($howToArgs))->get_posts();

if (isset($_GET['dev'])) {
    die(var_dump($howToGuides));
}

?>

<script defer>
    window.onload = () => {
        fathom.trackGoal('PSYVASDO', 0.0001);
        console.log('PSYVASDO')
    };

    function isScrolledIntoView(el) {
        var rect = el.getBoundingClientRect();
        var elemTop = rect.top;
        var elemBottom = rect.bottom;

        // Only completely visible elements return true:
        var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
        // Partially visible elements return true:
        //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
        return isVisible;
    }

    let triggered = false;

    document.addEventListener("scroll", (event) => {

        if (!triggered) {
            if(isScrolledIntoView(document.querySelector('#article-finished'))) {

                triggered = true;
                fathom.trackGoal('CTEAYQAO', 0.001);
                console.log('CTEAYQAO')
            }
        }
    });
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class('text-zinc-200'); ?>>
    <?php get_template_part('template-parts/header') ?>

    <div class="entry-content mt-20">
        <div class="container mx-auto mb-32">
            <div class="grid lg:grid-cols-5 gap-14">
                <div class="lg:border-r border-r-gray-100 relative">
                    <div class="sticky">
                        <p class="font-bold uppercase text-sm">Content</p>
                        <div class="rounded-md mb-5 text-sm" x-data="{show: true}">
                            <div x-show="show" id="quick-links-container" x-transition></div>
                        </div>
                    </div>

                    <script defer>
                        document.onload
                        document.addEventListener("DOMContentLoaded", () => {
                            const kebabCase = string => string
                                .replace(/([a-z])([A-Z])/g, "$1-$2")
                                .replace(/[\s_]+/g, '-')
                                .toLowerCase();


                            let tags = [];
                            let ul = document.createElement('ul');

                            document.querySelectorAll('.entry-content h3').forEach((e) => {

                            let id = kebabCase(e.innerHTML);


                            let li = document.createElement('li');
                            let a = document.createElement('a');
                            a.setAttribute('href', "#" + id);
                            e.setAttribute('id', id);
                                e.setAttribute('class', 'hasAnchor');
                                a.setAttribute('class', 'hasAnchor text-gray-500 hover:text-nd-500');
                            a.innerHTML = e.innerHTML;

                            li.appendChild(a);
                            ul.appendChild(li);

                        });


                        document.querySelector('#quick-links-container').appendChild(ul);
                        });
                    </script>
                </div>
                <div class="lg:col-span-3 text-lg leading-relaxed">
                    <p class="text-xs text-zinc-200">Published: <?php the_date('jS F g:iA') ?></p>
                    <div class="text-zinc-200">
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
                    <div id="article-finished"></div>
                </div>
                <div>
                    <div class="wrap mb-5">
                    </div>
                    <?php echo get_template_part('template-parts/author') ?>

                    <?php

                    $tags = get_the_terms(get_the_ID(), 'game');

                    $show = false;
                    if ($tags) {
                        $show = true;
                        $tag  = $tags[0];
                    }

                    ?>

                    <?php if ($show): ?>

                        <a class="flex gap-5 mt-3 hover:shadow-lg w-full items-center rounded-lg p-3 mb-3"
                           href="<?php echo get_term_link($tag) ?>"
                           style="background-color: <?php the_field('game_colour',
                               $tag); ?>; color: <?php the_field('text_colour', $tag); ?>;">
                            <span class="mb-0">More <?php echo $tag->name ?> articles </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>

                        </a>

                    <?php endif ?>

                    <h3 class="mt-5 mb-3">How To:</h3>
                    <?php foreach ($howToGuides as $guide): ?>
                    <a href="<?php the_permalink($guide); ?>" class="flex gap-3 items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                        </svg>

                        <span><?php echo $guide->post_title ?></span>
                    </a>
                    <?php endforeach; ?>

                    <script async
                            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
                            crossorigin="anonymous"></script>
                    <!-- author column -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6764478945960117"
                         data-ad-slot="7474381249"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                    <!--                    <div class="bg-gray-300 rounded-md p-3">-->
                    <!--                        <div class="bg-zinc-900 text-zinc-200 rounded-md p-3">-->
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

    <div class="container mx-auto my-5">
        <script async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
                crossorigin="anonymous"></script>
        <!-- Blog tags ads -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="autorelaxed"
             data-ad-client="ca-pub-6764478945960117"
             data-ad-slot="2866624574"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>

    <div class="container mx-auto c">


        <div class="relative mb-3">
            <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-zinc-900 text-zinc-200 relative inline-block">Discussion </h3>
            <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
        </div>
        <?php
        comments_template();
        ?>
    </div>

    <div class="container mx-auto">

        <div class="relative mb-3">
            <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-zinc-900 text-zinc-200 relative inline-block">Tags </h3>
            <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
        </div>

        <div class="flex gap-2 mb-5">
            <?php

            $tags = get_the_tags();

            if ($tags) {

                foreach ($tags as $tag) { ?>

                    <a href="<?php echo get_tag_link($tag) ?>"
                       class="px-5 py-1 hover:bg-nd-600 duration-75 text-white hover:text-white rounded-full bg-nd-500"><?php echo $tag->name ?></a>

                <?php }
            } ?>
        </div>
    </div>


    <?php

    $slugs = get_the_terms(get_the_ID(), 'game');


    $args = array(
        'post_type'    => 'games',
        'post__not_in' => [get_the_ID()],
        'tax_query'    => [
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
            <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-zinc-900 text-zinc-200 relative inline-block">Related </h3>
            <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <?php
            $i = 0;
            if ($relatedPosts->have_posts()) {
                while ($relatedPosts->have_posts()) {
                    $relatedPosts->the_post();

                if ($i === 3): ?>

                    <script async
                            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
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

                ?>
                    <a href="<?php the_permalink(); ?>" class="group">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>"
                             class="group-hover:scale-105 duration-300 rounded-md aspect-auto object-cover mb-3"
                             alt="Post image">
                        <p class="text-xl text-brand font-bold"><?php the_title() ?></p>
                        <p class="text-xs mb-3"><?php echo wp_trim_words(get_the_excerpt(), 22, '...') ?></p>

                    </a>
                    <?php
                    $i++;
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
                    element.style.opacity = `${1 - (this.scrollY / 500)}`;
                });
            });
        }
    </script>

</article><!-- #post-<?php the_ID(); ?> -->

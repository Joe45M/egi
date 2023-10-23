<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */

?>

<?php

$posts = (new WP_Query([
    'post_type'      => 'guns',
    'posts_per_page' => 6,
]))->get_posts();

$gun = get_the_title();
$class = get_the_terms(get_the_ID(), 'gun-type')[0]->name;
$mag_size = get_field('mag_size');
$reserve = get_field('reserve');
$season = get_field('season');
$real_gun = get_field('real_gun');

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
            if (isScrolledIntoView(document.querySelector('#article-finished'))) {

                triggered = true;
                fathom.trackGoal('CTEAYQAO', 0.001);
                console.log('CTEAYQAO')
            }
        }
    });
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class('text-zinc-200'); ?>>
    <?php get_template_part('template-parts/header') ?>

    <div class="entry-content mt-5">
        <div class="container mx-auto mb-32">
            <div class="grid lg:grid-cols-4 gap-14 relative">
                <div class="lg:col-span-3 text-lg leading-relaxed">


                    <div class="lg:flex justify-between">
                        <div class="-ml-5">
                            <?php yoast_breadcrumb() ?>
                        </div>
                        <p class="text-xs text-zinc-200">Published: <?php the_date('jS F g:iA') ?></p>
                    </div>
                    <div class="text-zinc-200">
                        <h1>Call of Duty MWIII <?php echo get_the_title() ?></h1>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="">

                        <?php  echo "
                        
                        <p>The {$gun} is a weapon in Call of Duty MWIII (Modern Warfare 3) 2023. The {$gun} is a {$class} in the game.</p>

<p><b>Available in Call of Duty season {$season}, the {$gun} has a mag size of {$mag_size} and an ammo reserve size {$reserve}.</b> </p>

<p>Though it is a fictional gun, it is based on the {$real_gun}, where it takes inspiration from the handling and design.</p>

<p>On this page you can see all the important stats of the MWIII {$gun}, whether it is currently meta, loadouts for the gun, and all of the attachments & Blueprints within the Call of Duty MWIII.</p>
                        
                        "?>
                        <div class="my-3">
                            <?php echo do_shortcode('[ad_5]') ?>
                        </div>
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
                        <div class="text-center p-2 mb-3 bg-nd-500">
                            <h3 class="text-2xl font-bold mb-0"><?php the_title() ?> gun information</h3>
                        </div>
                        <p><?php echo get_the_title() ?> is an <?php echo $class ?></p>
                        <table class="w-full table-auto text-left">
                            <tr class="w-full">
                                <th>Key</th>
                                <th>Value</th>
                            </tr>
                            <tr class="w-full">
                                <td>Name</td>
                                <td><?php the_title(1) ?></td>
                            </tr>
                            <tr class="w-full">
                                <td>Date released</td>
                                <td>Base launch</td>
                            </tr>
                            <tr class="w-full">
                                <td>Gun inspiration</td>
                                <td><?php echo $real_gun ?></td>
                            </tr>
                            <tr class="w-full">
                                <td>Magazine ammo</td>
                                <td><?php echo $mag_size ?></td>
                            </tr>
                            <tr class="w-full">
                                <td>Reserve ammo</td>
                                <td><?php echo $reserve ?></td>
                            </tr>
                            <tr class="w-full">
                                <td>Meta</td>
                                <td><?php echo $gun ?> is not meta</td>
                            </tr>
                        </table>
                        <div class="my-3">
                            <?php echo do_shortcode('[ad_2]') ?>
                        </div>

                        <div class="bg-nd-500 rounded-md p-5 flex gap-5 mb-5 mt-5">
                            <div class="p-3 flex items-center rounded-md bg-nd-600 flex-grow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold"><?php echo $gun ?> details</p>
                                <p class="-mt-5"><?php the_field('details') ?></p>
                            </div>
                        </div>

                        <div class="mb-10">
                            <div class="text-center p-2 mb-3 bg-nd-500">
                                <h3 class="text-2xl font-bold mb-0"><?php the_title() ?> MWIII Blueprints list</h3>
                            </div>

                            <p>Below is the complete list of Blueprints for the <?php echo $gun ?> in Call of Duty MWIII. The <?php echo $gun ?> Blueprints are usually released in the game store, unlockable by the battlepass or awarded by challenges.</p>

                            <p>Blueprints typically change the appearance of the gun by changing how attachments look and by adding tracers or finishing moves.</p>

                            <p>There's no Blueprints for the <?php echo $gun ?>. Check back when they are released.</p>
                        </div>

                        <div class="text-center p-2 mb-3 bg-nd-500">
                            <h3 class="text-2xl font-bold mb-0">How to unlock <?php the_title() ?> Attachments </h3>
                        </div>

                        <p>The <?php echo $gun ?> attachments are weapon-shared attachments that must be unlocked with this gun, and then can be used on all other guns.</p>

                        <p>Here is a list of all <?php echo $gun ?> attachments and how to unlock them.</p>

                        <p>- Once attachments are shown, they will display them here.</p>
                    </div>
                    <div id="article-finished"></div>
                    <div class="live-updates">
                        <?php if (have_rows('updates')): ?>
                            <h3 class="text-3xl mb-3">Live updates</h3>
                            <?php while (have_rows('updates')): the_row() ?>
                                <div class="mb-3">
                                    <div class="bg-zinc-800 py-2 rounded-r-md mb-3">
                                        <span class="p-3 bg-zinc-600 font-bold  rounded-md">
                                            <?php the_sub_field('time') ?>
                                        </span>
                                    </div>
                                    <div class="text-zinc-200 p-2 mb-3">
                                        <?php the_sub_field('content') ?>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="sticky top-0">
                    <h3 class="text-2xl font-bold">More MWIII Guns</h3>
                    <?php foreach ($posts as $post): ?>
                        <a href="<?php the_permalink($post) ?>" class="mb-3">
                            <div class="flex gap-3">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail'); ?>"
                                     alt="Call of Duty <?php echo $post->post_title ?>"
                                     class="w-24 h-auto object-cover">
                                <p class="text-xl font-bold"><?php echo $post->post_title ?></p>
                            </div>
                        </a>

                    <?php endforeach; ?>
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
</article><!-- #post-<?php the_ID(); ?> -->

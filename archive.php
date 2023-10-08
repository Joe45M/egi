<?php


get_header();

?>
<div class="font-display text-white bg-cover"  style="background-image: url(&quot;/wp-content/themes/gaming/img/header-bg[1].webp&quot;);">
    <div class="bg-zinc-500/20 py-10 mb-10 lg:pb-16 lg:pt-28">
        <div class="container mx-auto">
            <div class="mb-16">
                <h1 class="mb-3 font-bold text-2xl lg:text-3xl"><?php echo str_replace('Archives:', '', get_the_archive_title()) ?></h1>
                <p class="lg:w-1/3"><?php echo str_replace('Archives:', '', get_the_archive_description()) ?></p>
            </div>


            <div class="">

                <div class="mb-3">
                    <?php

                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--            <form action="">-->
    <!--                <input type="text" name="s" placeholder="Search for tips.." class="p-3 text-lg placeholder:text-white/50 focus:bg-white focus:text-black duration-300 hover:bg-white hover:placeholder:text-black rounded-md border border-gray-300 bg-transparent">-->
    <!--            </form>-->
</div>
<div class="container mx-auto mt-10">
    <div class="flex flex-wrap mb-10 gap-5">
        <?php //die(var_dump(get_queried_object()->name)); ?>
        <?php while(have_rows('links', 'options')): the_row() ?>
            <?php if (get_queried_object()->name === get_sub_field('post_type')): ?>
                <a class="py-2 hover:bg-nd-500 hover:text-white duration-200 transition-all border-4 border-transparent hover:border-pink-500 rounded-full bg-zinc-700 text-white block px-10" href="<?php the_sub_field('link'); ?>"> <?php the_sub_field('title'); ?> </a>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
    <div class="grid lg:grid-cols-3 gap-10">
        <?php
        $i = 0;
        if (have_posts()) {
            while (have_posts()) {
                the_post();

                if ($i === 0): ?>

                    <a href="<?php the_permalink() ?>" class="lg:col-span-3 group text-white">
                        <div class="grid lg:grid-cols-2 gap-10">
                            <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                 class="aspect-video rounded-xl group-hover:scale-105 duration-300">

                            <div class="flex">
                                <div class="justify-between">
                                    <p class="text-3xl mb-3 font-bold"><?php the_title(); ?></p>
                                    <div class="leading-7 text-gray-400 mb-5"><?php the_excerpt() ?></div>
                                    <div class="flex w-full gap-5">
                                        <div class="flex items-center">
                                            <svg width="28" height="28" class="mr-2" viewBox="0 0 27 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="13" cy="5" r="4" stroke="#FF49B6" stroke-width="2"/>
                                                <path d="M1 23.5C2.93452 21.6667 8.14286 18 13.5 18" stroke="#A449FF" stroke-width="2"/>
                                                <path d="M26 23.5C24.0655 21.6667 18.8571 18 13.5 18" stroke="#A449FF" stroke-width="2"/>
                                            </svg>
                                            <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg width="28" height="28" viewBox="0 0 35 35" class="mr-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="17.0856" cy="17.5566" r="12.1216" transform="rotate(44.7356 17.0856 17.5566)" stroke="#AF2AEE" stroke-width="2"/>
                                                <path d="M17 9V19H23" stroke="#FC59FF" stroke-width="2"/>
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

                        <div class="flex text-white">
                            <div class="self-end">
                                <p class="text-xl mb-3 font-bold"><?php the_title(); ?></p>
                                <p class="text-xs mb-3"><?php echo wp_trim_words(get_the_excerpt(), 22, '...') ?></p>

                                <div class="flex w-full gap-5">
                                    <div class="flex items-center">
                                        <svg width="28" height="28" class="mr-2" viewBox="0 0 27 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="13" cy="5" r="4" stroke="#FF49B6" stroke-width="2"/>
                                            <path d="M1 23.5C2.93452 21.6667 8.14286 18 13.5 18" stroke="#A449FF" stroke-width="2"/>
                                            <path d="M26 23.5C24.0655 21.6667 18.8571 18 13.5 18" stroke="#A449FF" stroke-width="2"/>
                                        </svg>
                                        <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg width="28" height="28" viewBox="0 0 35 35" class="mr-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="17.0856" cy="17.5566" r="12.1216" transform="rotate(44.7356 17.0856 17.5566)" stroke="#AF2AEE" stroke-width="2"/>
                                            <path d="M17 9V19H23" stroke="#FC59FF" stroke-width="2"/>
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

        } ?>
    </div>
    <div class="flex justify-center w-full">
        <?php
        the_posts_pagination()

        ?></div>

    <div class="relative mb-3">
        <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-zinc-900 text-white relative inline-block">All tags </h3>
        <div class="absolute h-2 bg-nd-500 w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
    </div>
    <div class="flex flex-wrap gap-5">
        <?php

        $tags = get_tags(array(
            'hide_empty' => false
        ));

        if ($tags) {

            foreach ($tags as $tag) { ?>

                <a href="<?php echo get_tag_link($tag) ?>"
                   class="px-5 py-1 hover:bg-nd-600 duration-75 text-white hover:text-white rounded-full bg-nd-500"><?php echo $tag->name ?></a>

            <?php }
        } ?>
    </div>
</div>

<?php

get_footer();

?>

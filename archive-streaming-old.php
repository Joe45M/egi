<?php


get_header();

?>
<div class="py-10 mb-10 lg:py-32 font-display bg-gradient-to-bl from-nd-600 to-nd-400 text-center text-white text-2xl lg:text-5xl">
    <h1 class="mb-3 font-bold "><?php the_archive_title(); ?></h1>
    <p class="text-lg font-normal">Elite gamer guides and insights for Minecraft and Call of Duty: Warzone.</p>


    <div class="flex justify-center">

        <div class="mb-3">
            <?php

            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            ?>
        </div>
    </div>
    <!--            <form action="">-->
    <!--                <input type="text" name="s" placeholder="Search for tips.." class="p-3 text-lg placeholder:text-white/50 focus:bg-white focus:text-black duration-300 hover:bg-white hover:placeholder:text-black rounded-md border border-gray-300 bg-transparent">-->
    <!--            </form>-->
</div>
<div class="container mx-auto mt-10">
    <div class="grid lg:grid-cols-3 gap-10">
        <?php
        $i = 0;
        if (have_posts()) {
            while (have_posts()) {
                the_post();

                if ($i === 0): ?>

                    <a href="<?php the_permalink() ?>" class="lg:col-span-3 group">
                        <div class="grid lg:grid-cols-2 gap-10">
                            <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                 class="aspect-video rounded-xl group-hover:scale-105 duration-300">

                            <div class="flex">
                                <div class="justify-between">
                                    <p class="text-3xl mb-3 text-zinc-200 font-bold"><?php the_title(); ?></p>
                                    <p class="text-xs mb-3 text-zinc-200"><?php echo wp_trim_words(get_the_excerpt(), 22, '...') ?></p>
                                    <div class="leading-7 mb-5 text-zinc-200"><?php the_excerpt() ?></div>
                                    <div class="flex w-full gap-5">
                                        <div class="flex items-center text-gray-200">
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
                                        <div class="flex text-gray-200 items-center">
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
                                <p class="text-xl text-zinc-200 mb-3 font-bold"><?php the_title(); ?></p>
                                <p class="text-xs text-zinc-200 mb-3"><?php echo wp_trim_words(get_the_excerpt(), 22, '...') ?></p>

                                <div class="flex w-full gap-5">
                                    <div class="flex text-gray-200 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6  mr-2 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                        </svg>
                                        <span>
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </span>
                                    </div>
                                    <div class="flex text-zinc-200 items-center">
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

        } ?>
    </div>
    <div class="flex justify-center w-full">
        <?php

        the_posts_pagination()

        ?></div>

    <div class="relative mb-3">
        <h3 class="text-3xl font-bold z-50 py-3 pr-5 bg-zinc-900 text-zinc-200 relative inline-block">All tags </h3>
        <div class="absolute h-2 bg-brand w-full top-1/2 left-0 z-10 -translate-y-1/2"></div>
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

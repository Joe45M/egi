<div class="">


    <div class="grid lg:grid-cols-4 gap-10 mb-20">
        <?php

        $i = 0;
        if ($args['collection']->have_posts()) {
            while ($args['collection']->have_posts()) {
                $args['collection']->the_post();


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

            <?php endif; ?>




                <a href="<?php the_permalink(); ?>" class="group">
                    <img src="<?php the_post_thumbnail_url('medium') ?>" alt="Post image"
                         class="w-full aspect-video object-cover mb-5 group-hover:scale-105 duration-300">

                    <div class="flex">
                        <div class="self-end">
                            <p class="text-xl mb-3 font-bold"><?php the_title(); ?></p>
                            <p class="text-xs mb-3"><?php echo wp_trim_words(get_the_excerpt(), 22,
                                    '...') ?></p>

                            <div class="flex w-full gap-5 text-gray-400">
                                <div class="flex items-center gap-3">


                                    <?php echo get_the_author_meta('display_name'); ?>
                                </div>
                                <div class="flex items-center">
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
                $i++;
            }
        } else {
            // no posts found
        }

        ?>
    </div>
</div>

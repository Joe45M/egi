<div class="w-full">
    <div class="rounded-lg border border-gray-600 text-sm bg-zinc-800 p-3 mb-3">
        <div class="flex gap-5">
            <img src="<?php the_field('profile_image', 'user_' . get_the_author_meta('ID')); ?>"
                 alt="Author profile image" class="w-20 h-20 self-center rounded-lg object-contain" id="author-img" style="margin-bottom: 0 !important;">
            <div>
                <span href="" id="author-text" class="text-sm uppercase mb-3">Authored by <br> <?php the_author_posts_link(); ?></span>
            </div>
        </div>
    </div>
    <?php do_shortcode('[author_ad]') ?>
</div>

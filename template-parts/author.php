<div class="w-full bg-nd-500 rounded-lg p-2">
    <div class="rounded-lg bg-white p-3">
        <div class="flex gap-5">
            <img src="<?php the_field('profile_image', 'user_' . get_the_author_meta('ID')); ?>"
                 alt="Author profile image" class="w-20 h-20 self-center rounded-lg object-contain" id="author-img">
            <div>
                <p id="author-text" class="text uppercase mb-3">Created by <br> <span id="author-name" class="font-bold"><?php echo get_the_author_meta('first_name') ?></span></p>
            </div>
        </div>
    </div>
</div>
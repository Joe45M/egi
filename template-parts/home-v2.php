<?php

$latest_posts = (new WP_Query([
        'post_type' => ['games'],
        'posts_per_page' => 20,
]))->get_posts();

?>


<div class="container mx-auto">
    <div class="grid lg:grid-cols-4 mt-16">
        <div class="lg:col-span-3">
            <?php foreach ($latest_posts as $post): ?>
                <div class="flex gap-5 bg-zinc-800 mb-3">
                    <img class="lg:w-72 object-cover" src="<?php echo get_the_post_thumbnail_url($post) ?>" alt="<?php echo $post->post_title ?>">
                    <div class="text-white p-3 flex-grow w-full">
                        <h3 class="text-3xl mb-3"><a href="<?php the_permalink($post); ?>"><?php echo $post->post_title ?></a></h3>
                        <div class="flex mb-3 gap-3">
                            <div class="flex px-4 py-1 text-sm bg-zinc-700 rounded-full">
                                <?php echo get_the_author_meta('nicename', $post->post_author) ?>
                            </div>
                            <div class="flex px-4 py-1 text-sm bg-zinc-700 rounded-full">
                                <?php echo get_the_date('d / m / y', $post) ?>
                            </div>
                        </div>
                        <p class="text-sm"><?php the_excerpt($post); ?></p>
                        <div class="flex justify-end">
                            <a href="<?php the_permalink($post); ?>" class="px-5 py-2 bg-nd-500 rounded-md inline-block">Read more</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div>
            <h3 class="text-3xl">Call of Duty news</h3>
        </div>
    </div>
</div>

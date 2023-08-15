<?php get_header(); ?>

<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$posts = get_posts([
    'author'         => $curauth->ID,
    'orderby'        => 'post_date',
    'post_type'      => 'games',
    'order'          => 'ASC',
    'posts_per_page' => 32
]);
?>
<div id="content" class="narrowcolumn">

    <!-- This sets the $curauth variable -->

    <div class="container mx-auto mt-10">
        <div class="grid lg:grid-cols-3 gap-5">
            <div>
                <h1 class="mb-3 font-bold text-2xl text-white"><?php echo $curauth->display_name ?></h1>
                <img src="<?php echo the_field('profile_image', 'user_'.$curauth->ID) ?>" alt="Profile image"
                     class="block w-44 object-cover rounded-md">
                <p><?php echo $curauth->user_description; ?></p>
            </div>
            <div class="lg:col-span-2">

                <!-- The Loop -->

                <div class="grid gap-3 lg:grid-cols-3">
                    <?php foreach ($posts as $post) { ?>

                        <a href="<?php the_permalink() ?>" class="lg:col-span-3 group mb-20 text-white">
                            <div class="grid lg:grid-cols-2 gap-10">
                                <img src="<?php the_post_thumbnail_url('small') ?>" alt="Post image"
                                     class="aspect-video rounded-xl group-hover:scale-105 duration-300">

                                <div class="flex">
                                    <div class="justify-between">
                                        <p class="text-3xl mb-3 font-bold text-white"><?php the_title(); ?></p>
                                        <div class="leading-7 mb-5 text-white"><?php the_excerpt() ?></div>
                                        <div class="flex w-full gap-5">
                                            <div class="flex items-center">
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
                                            <div class="flex items-center">
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


                    <?php } ?>
                </div>

                <!-- End Loop -->

                </ul>
            </div>
        </div>
    </div>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

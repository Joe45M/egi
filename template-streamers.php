<?php
/**
 * Template Name: Streamers
 */

get_header();

$games = get_terms([
    'taxonomy' => 'game',
]);

if (isset($_POST['username'])) {
    $p = wp_insert_post([
        'post_author'  => 1,
        'post_status'  => 'draft',
        'post_type'    => 'streamers',
        'post_content' => $_POST['bio'],
        'post_title'   => $_POST['username'],
        'tax_input'    => array(
            'game' => [$_POST['game']]
        ),
    ]);

    wp_mail('contact@elitegamerinsights.com', 'New submission',
        'New streamer submission on the website. Please review now.');

    $p ? wp_redirect('?stored=true') : '';


}

$args = [
    'post_type'      => 'streamers',
    // 'post_status' => 'published',
    'posts_per_page' => 50,
];

if (isset($_GET['game'])) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'game',
            'field'    => 'id',
            'terms'    => [$_POST['game']],
        ],
    ];
}

$streamers = new WP_Query($args);

?>

    <main id="primary" class="site-main">

        <div class="py-32 mb-10 lg:py-16 font-display bg-gradient-to-bl from-nd-600 to-nd-400 text-center">

            <?php if (isset($_GET['stored']) && $_GET['stored']): ?>
                <div class="container mx-auto mb-10 pt-32">
                    <div class="bg-white rounded-md p-3 text-green-600">
                        <div class="flex justify-center">
                            <div class="w-28 rounded-lg h-28 p-10 bg-green-200 text-green-600 mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-10 h-10">
                                    <path fill-rule="evenodd"
                                          d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
                                          clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </div>
                        <p class="font-bold text-2xl text-center">You're in! 🥳</p>
                        <p class="font-bold text-2xl text-center mb-5">We're just reviewing your request, it'll be up
                            soon, while you wait, read:</p>
                        <a onclick="fathom.trackGoal('N2B7ZRX4', 1);"
                           href="https://elitegamerinsights.com/news/streamers"
                           class="rounded-lg w-full bg-nd-400 text-white">
                            <p class="text-2xl font-display p-5">Top 5 tips to gain followers on Twitch</p>
                            <p class="rounded-b-lg bg-nd-600 px-5 pb-5 pt-5">
                                Read our top 5 tips to help you grow your channel.
                            </p>
                        </a>
                    </div>
                </div>
            <?php endif; ?>


            <h1 class="mb-3 font-bold text-2xl lg:text-5xl text-white pt-32">Find your fans, or become one.</h1>
            <p class="text-lg font-normal mb-5 text-white">Share your stream & start finding fans.</p>
            <div class="container mx-auto">
                <form action="" x-data="{step: 'name'}" method="post">
                    <div>
                        <div class="w-full block" x-show="step === 'name'">
                            <label for="username" class="block text-white text-left mb-2">Your Twitch Username</label>
                            <input type="text" name="username" required placeholder="roisin545"
                                   class="w-full rounded-md p-5 block bg-transparent text-white border border text-2xl">
                            <div class="mt-3 flex justify-center">
                                <button @click="step = 'game'"
                                        class="flex items-center gap-2 hover:scale-105 duration-75 bg-white rounded-md px-4 py-2 hover:shadow-lg">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="w-full block" x-show="step === 'game'">
                            <label for="url" class="block text-white text-left mb-2">What do you stream?</label>
                            <select type="text" name="game" required
                                    class="w-full p-5 block rounded-md text-white focus:text-black bg-transparent border border text-2xl">
                                <?php foreach ($games as $game): ?>
                                    <option value="<?php echo $game->term_id ?>"><?php echo $game->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="mt-3">
                                <div class="mt-3 flex justify-center gap-5">
                                    <button @click="step = 'name'"
                                            class="flex items-center gap-2 hover:scale-105 text-white rounded-md px-4 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                                        </svg>
                                        Back
                                    </button>
                                    <button @click="step = 'bio'"
                                            class="flex items-center gap-2 hover:scale-105 duration-75 bg-white rounded-md px-4 py-2 hover:shadow-lg">
                                        Next
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full block" x-show="step === 'bio'">
                            <label for="username" class="block text-white text-left mb-2">Write a 'lil about
                                yourself.</label>
                            <input type="text" name="bio" required placeholder="5.5 KD demon streaming out of Tulsa..."
                                   class="w-full rounded-md p-5 block bg-transparent border border text-2xl">
                            <div class="mt-3 flex justify-center">
                                <button @click="step = 'game'"
                                        class="flex items-center gap-2 hover:scale-105 text-white rounded-md px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="submit"
                                        onclick="fathom.trackGoal('XG5FB3BB', 1);"
                                        class="flex items-center gap-2 hover:scale-105 duration-75 bg-white rounded-md px-4 py-2 hover:shadow-lg">
                                    Add to directory
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="container mx-auto">
            <p class="text-3xl font-display mb-3">All Streamers</p>
            <div class="mb-3">
            </div>
            <div class="grid gap-5">

                <?php

                $i = 1;

                foreach ($streamers->get_posts() as $streamer) {

                    $i++;

                    ?>

                    <?php $term = get_the_terms($streamer->ID, 'game')[0] ?>
                    <a href="https://twitch.tv/<?php echo $streamer->post_title ?>" target="_blank"
                       class="hover:scale-105 duration-75 grid grid-cols-4 gap-10 mb-5 px-5 lg:px-0 bg-gray-100">
                        <img src="<?php echo get_the_post_thumbnail_url($streamer) ?>" alt="User image"
                             class="w-full font-bold text-display h-64 object-cover rounded-md">
                        <div class="relative lg:col-span-3 py-5">
                            <?php if (get_the_terms($streamer->ID, 'game')): ?>
                                <div class="absolute right-10 top-10 px-2 py-1 text-black font-uppercase h-9 bottom-3 font-display rounded-md right-3"
                                     style="background-color: <?php the_field('game_colour',
                                         $term); ?>; color: <?php the_field('text_colour', $term) ?>;">
                                    <?php echo get_the_terms($streamer->ID, 'game')[0]->name ?>
                                </div>
                            <?php endif; ?>
                            <p class="text-2xl font-display font-bold"><?php echo $streamer->post_title ?></p>
                            <p class="text-gray-500 mt-10 lg:w-1/2 mb-5"><?php echo strip_tags($streamer->post_content) ?></p>
                        </div>

                    </a>

                <?php if ($i === 3 || $i === 6 || $i === 9 || $i === 12): ?>

                    <script async
                            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
                            crossorigin="anonymous"></script>
                    <!-- Streamer header -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6764478945960117"
                         data-ad-slot="3024124055"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                <?php endif ?>
                <?php } ?>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();

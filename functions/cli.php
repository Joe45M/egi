<?php


function update_default_image($args) {

    if (!$args) {
        WP_CLI::line('no args. try again :) Thumbnail id required. found in media URL');

        return 1;
    }


    $id = explode(' ', $args[0]);


    $id = $id[array_rand($id)];

    $args = array(
        'post_type' => 'games',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'value' => '?',
                'compare' => 'NOT EXISTS'
            )
        ),
    );

    $new_query = new WP_Query( $args );

    var_dump($new_query->post_count);

    foreach ($new_query->posts as $post) {
        set_post_thumbnail($post->ID, $id);
        WP_CLI::line('set image for ' . $post->post_title);
    }

}

try {
    add_action('cli_init', function () {
        WP_CLI::add_command('img', 'update_default_image');
    });

} catch (Exception $e) {

}


?>

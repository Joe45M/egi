<?php

function taxes()
{
    // Add new "games" taxonomy to Posts
    register_taxonomy('game', 'games', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        'show_in_rest' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels'       => array(
            'name'              => _x('games', 'taxonomy general name'),
            'singular_name'     => _x('game', 'taxonomy singular name'),
            'search_items'      => __('Search games'),
            'all_items'         => __('All games'),
            'parent_item'       => __('Parent game'),
            'parent_item_colon' => __('Parent game:'),
            'edit_item'         => __('Edit game'),
            'update_item'       => __('Update game'),
            'add_new_item'      => __('Add New game'),
            'new_item_name'     => __('New game Name'),
            'menu_name'         => __('games'),
        ),
        // Control the slugs used for this taxonomy
    ));


    register_taxonomy('gun-type', 'guns', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        'show_in_rest' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'name'              => _x('Gun Types', 'taxonomy general name'),
        'labels'       => array(
            'singular_name'     => _x('Gun Type', 'taxonomy singular name'),
            'search_items'      => __('Search Gun Types'),
            'all_items'         => __('All Gun Types'),
            'parent_item'       => __('Parent Gun Type'),
            'parent_item_colon' => __('Parent Gun Type:'),
            'edit_item'         => __('Edit Gun Type'),
            'update_item'       => __('Update Gun Type'),
            'add_new_item'      => __('Add New Gun Type'),
            'new_item_name'     => __('New Gun Type Name'),
            'menu_name'         => __('Gun Types'),
        ),
        // Control the slugs used for this taxonomy
    ));

    // Add new "Cultural" taxonomy to Posts
    register_taxonomy('cultural', 'culture', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        'show_in_rest' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels'       => array(
            'name'              => _x('Cultural', 'taxonomy general name'),
            'singular_name'     => _x('Culture', 'taxonomy singular name'),
            'search_items'      => __('Search Cultural'),
            'all_items'         => __('All Cultural'),
            'parent_item'       => __('Parent Culture'),
            'parent_item_colon' => __('Parent Culture:'),
            'edit_item'         => __('Edit Culture'),
            'update_item'       => __('Update Culture'),
            'add_new_item'      => __('Add New Culture'),
            'new_item_name'     => __('New Culture Name'),
            'menu_name'         => __('Cultural'),
        ),
        // Control the slugs used for this taxonomy
    ));
}

add_action('init', 'taxes', 0);

?>

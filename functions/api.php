<?php

function addUserEndpoint(WP_REST_Request $request) {
    if (!wp_get_current_user()) {
        return false;
    }

    $user = wp_get_current_user();

    return [
        wp_get_current_user(),
    ];
};

add_action('rest_api_init', function () {
    register_rest_route('api/v1', 'user', [
        'callback' => 'addUserEndpoint',
        'methods' => WP_REST_Server::READABLE,
    ]);
});

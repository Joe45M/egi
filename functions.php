<?php

add_filter( 'wp_is_application_passwords_available', '__return_true' );

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key'                   => 'group_641d999c36caa',
        'title'                 => 'Profiles',
        'fields'                => array(
            array(
                'key'               => 'field_641d999cf0b25',
                'label'             => 'Profile image',
                'name'              => 'profile_image',
                'aria-label'        => '',
                'type'              => 'image',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'return_format'     => 'url',
                'library'           => 'all',
                'min_width'         => '',
                'min_height'        => '',
                'min_size'          => '',
                'max_width'         => '',
                'max_height'        => '',
                'max_size'          => '',
                'mime_types'        => '',
                'preview_size'      => 'medium',
            ),
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'user_form',
                    'operator' => '==',
                    'value'    => 'edit',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'acf_after_title',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => '',
        'show_in_rest'          => 0,
    ));

endif;

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */


require get_template_directory().'/functions/types.php';

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
}

add_action('init', 'taxes', 0);


/**
 * gaming functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gaming
 */

if ( ! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gaming_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on gaming, use a find and replace
        * to change 'gaming' to the name of your theme in all the template files.
        */
    load_theme_textdomain('gaming', get_template_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one game.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'gaming'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support('comments');

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'gaming_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'gaming_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gaming_content_width()
{
    $GLOBALS['content_width'] = apply_filters('gaming_content_width', 640);
}

add_action('after_setup_theme', 'gaming_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gaming_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'gaming'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'gaming'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}

add_action('widgets_init', 'gaming_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gaming_scripts()
{
    wp_enqueue_style('gaming-style2', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('gaming-style', 'rtl', 'replace');

    wp_enqueue_script('gaming-navigation', get_template_directory_uri().'/js/navigation.js', array(), _S_VERSION, true);

    wp_enqueue_script('gaming-script', get_template_directory_uri().'/js/script.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'gaming_scripts');


function customize_customtaxonomy_archive_display($query)
{
    if (($query->is_main_query()) && (is_tax('game'))) {
        $query->set('post_type', 'games');
    }
}

function quick_links_shortcode()
{
    if (is_single()) {

        return '';

        return '<div class="bg-gray-100 rounded-md p-3 mb-5" x-data="{show: false}">
                <button class="mb-2 flex items-center gap-2 w-full" @click="show = !show">
                    Quick links
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>
        
        
                </button>
                <div x-show="show" id="quick-links-container" x-transition></div>
            </div>
        
            <script defer>
                document.onload
                document.addEventListener("DOMContentLoaded", () => {
                    const kebabCase = string => string
                        .replace(/([a-z])([A-Z])/g, "$1-$2")
                        .replace(/[\s_]+/g, \'-\')
                        .toLowerCase();
        
        
                    let tags = [];
                    let ul = document.createElement(\'ul\');
        
                    document.querySelectorAll(\'.entry-content h3\').forEach((e) => {
        
                        let id = kebabCase(e.innerHTML);
        
        
                        let li = document.createElement(\'li\');
                        let a = document.createElement(\'a\');
                        a.setAttribute(\'href\', "#" + id);
                        e.setAttribute(\'id\', id);
                        e.setAttribute(\'class\', \'hasAnchor\');
                        a.innerHTML = e.innerHTML;
        
                        li.appendChild(a);
                        ul.appendChild(li);
        
                    });
        
        
                    document.querySelector(\'#quick-links-container\').appendChild(ul);
                });
        </script>';
    }
}

add_shortcode('quicklinks', 'quick_links_shortcode');

add_action('pre_get_posts', 'customize_customtaxonomy_archive_display');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory().'/inc/jetpack.php';
}




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


// Article short codes

add_shortcode('pe_image', function () {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Pocket_Edition_1.1.5.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/1958fac6-abf0-11ed-b444-02420a000134.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Pocket_Edition_0.9.0.webp'
    ];

    $url = $list[array_rand($list)];

    return "<img src='$url' alt='Minecraft PE Pocket Edition EGI'>";
});


add_shortcode('wifi_img', function ($atts = []) {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/isp-1.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/Hyperoptic-VW-Crafters.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/About-us-desktop-image-2-1.jpg'
    ];

    $url = $list[array_rand($list)];

    if ($atts) {
        $url = $atts['url'];
    }

    return "<img src='$url' alt='Image Alt Elite Gaming Insights, call of duty & guides'>";
});

add_shortcode('cod_image', function () {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Call-of-Duty-Warzone-Mobile-release-date-19c2f9e.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/4-11-cod-hub_wz-tac-sm-tout.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/cod-news.jpeg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/call-of-duty-modern-warfare-button-01-1559237615728.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/d2e74bfc-22e1-4985-860f-dc76d69e5b8f.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/CODMS3patchnotesinsidemode.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/call-of-duty-modern-warfare-2-key-art-1663249948.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/CoD-2023-Jupiter.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/cod-redeem-codes-2.jpg',
    ];

    $url = $list[array_rand($list)];

    return "<img src='$url' alt='Call of Duty Image, EGI Elite gamer insights'>";
});

// Native google ad, bidvertiser rejected us =(
add_shortcode('bidvertiser', function () {
    return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="7641940191"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});


// Native add
add_shortcode('ad', function () {
    return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="7641940191"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

add_shortcode('author_ad', function () {
    return '<!-- Author ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="3384451209"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_2' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="2742820353"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_3' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="5063530238"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_4' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="3429731355"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});
// article ad
add_shortcode('ad_5' , function () {
    return '<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="5923769426"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

/**
 * WIFI article imports
 */

require 'functions/api.php';

/**
 * Custom ACF Blocks
 */

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {

    $blocks = ['kd', 'search'];

    foreach ($blocks as $block) {
        register_block_type( __DIR__ . '/blocks/' . $block );
    }

}


/**
 * @param $query
 *
 * @return mixed|void
 *
 * Apply tag filters to any archive using ?getby=tags&tags=[tag_slug]
 *
 */
function filter_by_tag_on_taxonomy( $query ) {

    if ( is_admin() ) {
        return;
    }
    if ( is_archive() ) {

        $by = isset($_GET['getby']) ? $_GET['getby'] : false;
        $tags = isset($_GET['tags']) ? $_GET['tags'] : false;

        if ( 'tag' === $by ) {


            $query->set( 'tag', $tags );
        }
    }
    return $query;
}
add_action( 'pre_get_posts', 'filter_by_tag_on_taxonomy');


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

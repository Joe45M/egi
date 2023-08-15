<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gaming
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <script src="https://cdn.usefathom.com/script.js" data-site="GLDDKPKM" defer></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
            crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-zinc-900'); ?>>


<style>
    [x-cloak] {
        display: none !important;
    }

    .nav-close {
        display: none;
    }
</style>

<?php wp_body_open(); ?>
<div id="page" class="site relative">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gaming' ); ?></a>

	<header id="masthead" class="site-header w-full top-0 z-20 text-white left-0 bg-zinc-900">
		<div>
            <div class="container mx-auto">
                <div class="site-branding py-3 uppercase flex gap-5 flex-grow-0 justify-between">
                    <a href="/" class="flex gap-5 font-bold">
                        <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" class="w-20 object-cover" alt="Website logo">
                        <span class="2xl:text-2xl hidden self-center font-display tracking-wide">EliteGamerInsights</span>
                    </a>
                    <form action="" class="flex justify-between bg-zinc-800 self-center ">
                        <input type="text" name="s" class="bg-transparent px-3 py-3 text-white placeholder:text-gray-300 flex-grow w-full" placeholder="Search news & tutorials">
                        <button aria-label="Search" class="bg-transparent p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>

                    </form>
                </div><!-- .site-branding -->

            </div>
        </div>
        <div class="bg-zinc-800">
            <div class="container mx-auto">
                <nav x-data="{open: false}" id="site-navigation" class="main-navigation items-center self-center">
                    <!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'gaming' ); ?><!--</button>-->
                    <!--			-->
                    <div class="flex lg:hidden justify-center">
                        <button aria-label="nav toggle" @click="open = !open" class="block text-white py-5 lg:hidden">
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div x-cloak :class="open ? 'nav-open' : 'nav-closed'" class="nav lg:flex">
                        <button x-show="open" class="nav-close nav-close-toggle" @click="open = false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </div>
                </nav><!-- #site-navigation -->
            </div>
        </div>
	</header><!-- #masthead -->

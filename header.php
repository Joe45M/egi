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

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.usefathom.com/script.js" data-site="GLDDKPKM" defer></script>
    <meta charset="<?php bloginfo('charset'); ?>">
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


<?php

if ( ! isset($_COOKIE['popup'])) {
    ?>
    <div class="hidden fixed z-50 w-full h-full bg-zinc-900/30 flex justify-center text-white" id="popup">
        <div class="bg-zinc-800 rounded-md self-center lg:w-2/3 p-5">
            <button class="flex justify-end" id="close">
                <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.03122 1.03122L25 25" stroke="#FF49B6" stroke-width="2"/>
                    <path d="M25 1.03122L1.03125 25" stroke="#EA2AEE" stroke-width="2"/>
                </svg>


            </button>
            <div class="w-2/3 block mx-auto">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://lottie.host/8b9af709-b078-46df-bd4b-f8baffc06103/rFSrbTPhWF.json"
                               background="" speed="1" style="width: 100%; height: 200px" loop autoplay direction="1"
                               mode="normal"></lottie-player>
            </div>
            <p class="text-3xl text-center font-bold mb-5">
                <?php the_field('title', 'options'); ?>
            </p>
            <?php the_field('content', 'options'); ?>
        </div>
    </div>

    <script>

        setTimeout(function () {
            document.querySelector('#popup').classList.remove('hidden')
            fathom.trackGoal('C7UYE3LK', 0);

            document.querySelector('#close').addEventListener('click', (e) => {
                fathom.trackGoal('OT0SW8MK', 0);

                document.querySelector('#popup').classList.add('hidden')
                fathom.trackGoal('OT0SW8MK', 0);
                document.cookie = "popup=true";

            })
        }, 12000)

    </script>


<?php } ?>


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
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'gaming'); ?></a>

    <header id="masthead"
            class="site-header fixed w-full top-0 z-20 text-white left-0  bg-zinc-800/70 backdrop-blur-xl">
        <div>
        </div>
        <div class="">
            <div class="container mx-auto">
                <nav x-data="{open: false}" id="site-navigation"
                     class="main-navigation justify-between flex self-center">
                    <a href="/" class="flex gap-5 font-bold p=5">
                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'),
                            'full')[0]); ?>" class="w-20 h-20 p-3 object-cover" alt="Website logo">
                        <span class="2xl:text-2xl hidden self-center font-display tracking-wide">EliteGamerInsights</span>
                    </a>
                    <!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">-->
                    <?php //esc_html_e( 'Primary Menu', 'gaming' ); ?><!--</button>-->
                    <!--			-->
                    <div class="flex lg:hidden self-stretch">
                        <button aria-label="nav toggle" @click="open = !open" class="block text-white py-5 lg:hidden">
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            </svg>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div x-cloak :class="open ? 'nav-open' : 'nav-closed'" class="nav self-stretch lg:flex">
                        <button x-show="open" class="nav-close nav-close-toggle" @click="open = false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-9 h-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'walker'         => new Nav_Walker(),
                            )
                        );
                        ?>

                    </div>
                    <form x-data="{open: false}" action="/" class="flex justify-between self-center ">
                        <input x-cloak x-show="open" type="text" id="search-box" name="s"
                               class="bg-zinc-800 rounded-md px-3 py-3 text-white placeholder:text-gray-300 flex-grow w-full"
                               placeholder="Search news & tutorials">
                        <button id="search" x-show="!open" @click="open = true" type="button" aria-label="Search"
                                class="bg-transparent p-2">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0247 13.2404L20.1283 20.2788" stroke="#EA2AEE" stroke-width="2"/>
                                <circle cx="8.0522" cy="8.31359" r="7" transform="rotate(44.7356 8.0522 8.31359)"
                                        stroke="#FF49B6" stroke-width="2"/>
                            </svg>

                        </button>
                        <button x-cloak x-show="open" aria-label="Search" class="bg-transparent p-2">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0247 13.2404L20.1283 20.2788" stroke="#EA2AEE" stroke-width="2"/>
                                <circle cx="8.0522" cy="8.31359" r="7" transform="rotate(44.7356 8.0522 8.31359)"
                                        stroke="#FF49B6" stroke-width="2"/>
                            </svg>
                        </button>
                        <script>
                            document.querySelector('#search').addEventListener('click', function () {
                                setTimeout(() => {
                                    document.querySelector('#search-box').focus();
                                }, 10)
                            })
                        </script>
                    </form>
                </nav><!-- #site-navigation -->
            </div>
        </div>
        <?php if (is_home()): ?>
            <a href="https://cdkeys.pxf.io/LX44NO" onclick="fathom.trackGoal('WNDFQQ3Q', 0);"
               class="bg-purple-900 uppercase text-white block hover:bg-purple-800 text-center p-4">
                <p>Buy Call of Duty MWIII for $52.99</p>
            </a>
        <?php endif; ?>
    </header><!-- #masthead -->


    <script defer>
        document.addEventListener("DOMContentLoaded", () => {
            let bg = document.createElement('div')
            bg.classList.add('nav-bg');

            document.querySelector('.nav-menu').appendChild(bg);
        });
    </script>



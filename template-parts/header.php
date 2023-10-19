<?php

$title = get_field('title') ?? get_the_title();

$description = get_field('description') ?? false;

$image = get_field('image') ?? false;

$show_header = get_field('show_header') ?? false;



?>

<?php

if ($show_header) { ?>

    <header class="bg-cover bg-center" style="background-image: url(<?php echo $image ?>);">
        <div class=" bg-black/20">
            <div class="container mx-auto">

                <div class="mb-3 text-white mb-16 pt-10">
                    <?php
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                    ?>
                </div>
                <h1 class="text-4xl font-bold text-white  <?php echo $description ?: 'mb-16' ?>"><?php echo $title ?></h1>

                <?php

                if ($description) { ?>
                    <div class="h-[2px] w-32 bg-white my-5"></div>
                    <p class="text-lg text-white mb-16"><?php echo $description ?></p>
                    <?php
                }

                ?>
                <div class="flex gap-3 items-center text-white mb-5 pb-5">

                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.0856" cy="17.5566" r="12.1216" transform="rotate(44.7356 17.0856 17.5566)" stroke="#AF2AEE" stroke-width="2"/>
                        <path d="M17 9V19H23" stroke="#FC59FF" stroke-width="2"/>
                    </svg>


                    <?php echo get_the_date('d F Y') ?>
                </div>
            </div>
        </div>
    </header>

    <?php
} else {

    if (in_array(get_post_type(), ['games',  'news', 'streaming'])) { ?>

        <header class="relative lg:pl-64 pt-10 px-10 bg-zinc-800">
            <div class="mb-3">
                <?php
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                ?>
            </div>
            <h1 class="text-xl lg:text-3xl mt-10 tracking-normal lg:tracking-wider font-display font-bold mb-5"><?php the_title() ?></h1>
            <div class="flex gap-3 items-center mb-5 pb-5">

                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17.0856" cy="17.5566" r="12.1216" transform="rotate(44.7356 17.0856 17.5566)" stroke="#AF2AEE" stroke-width="2"/>
                    <path d="M17 9V19H23" stroke="#FC59FF" stroke-width="2"/>
                </svg>


                <?php echo get_the_date('d F Y') ?>
            </div>
        </header>

<?php }

}

?>

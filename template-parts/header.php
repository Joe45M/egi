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

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <?php echo get_the_date('d F Y') ?>
                </div>
            </div>
        </div>
    </header>

    <?php
} else {

    if (in_array(get_post_type(), ['games',  'news', 'streaming'])) { ?>

        <header class="relative lg:pl-64 pt-10">
            <div class="mb-3">
                <?php
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                ?>
            </div>
            <h1 class="text-3xl tracking-wider font-display font-bold mb-5"><?php the_title() ?></h1>
            <div class="flex gap-3 items-center mb-5 pb-5">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <?php echo get_the_date('d F Y') ?>
            </div>
        </header>

<?php }

}

?>

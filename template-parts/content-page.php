<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gaming
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
        get_template_part('template-parts/header');
    ?>

	<div class="entry-content">
		<div class="container mx-auto">
            <?php
            the_content();
            ?>
        </div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

		<footer class="entry-footer">

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

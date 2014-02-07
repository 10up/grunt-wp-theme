<?php
/**
 * The Front Page template file
 *
 * @package {%= title %}
 * @since 0.1.0
 */
 
 get_header(); ?>

<main>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', '' ); ?>
	<?php endwhile; endif; ?>
</main>

<?php get_footer();?>
<?php
/**
 * The archive content template file
 *
 * @package {%= title %}
 * @since 0.1.0
 */
 ?>

<article>
	<?php if(has_post_thumbnail()){the_post_thumbnail('medium', array('class'=>'alignleft'));}?>
	<header>
		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		<h6>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' );?></a> on <time datetime="<?php the_date('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></h6>
	</header>
	<?php the_excerpt(); ?>
</article>
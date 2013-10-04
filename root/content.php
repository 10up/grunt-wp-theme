<?php
/**
 * The content template file
 *
 * @package {%= title %}
 * @since 0.1.0
 */
 ?>

<article>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php the_content(); ?>
</article>
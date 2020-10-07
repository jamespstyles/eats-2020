<?php
/**
 * A very simple index.php.
 */

get_header();
?>

<div class="l-container">

	<?php

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			the_title( '<h2>', '</h2>' );

		endwhile;
	else :
		_e( 'Sorry, no posts matched your criteria.', 'eats' );
	endif;

	?>

</div>

<?php


get_footer();
?>

<?php
/**
 * A very simple index.php.
 */

get_header();
?>

<main id="main-content" role="main">

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

</main><!-- #main-content -->

<?php


get_footer();
?>

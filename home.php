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
			while ( have_posts() ) : the_post(); ?>

				<article class="teaser" id="post-<?php the_ID(); ?>">
					<?php
					if (has_post_thumbnail() ) :
						the_post_thumbnail('', array(
							'class' => 'teaser__image'
							));
					endif; ?>
					<div class="teaser__copy">
						<p class="teaser__date"><?php echo get_the_date('F j, Y'); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php
							the_title( '<h2 class="teaser__title">', '</h2>' );
							?>
						</a>
						<div class="teaser__content">
							<?php the_content(); ?>
						</div>
						<a class="link--read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							Read more
							<svg class="svg-icon svg-icon--cheveron-right">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-cheveron-right"></use>
							</svg>
						</a>
					</div><!-- .teaser__copy -->
				</article><!-- .teaser -->

			<?php

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

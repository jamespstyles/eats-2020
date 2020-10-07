<?php
/**
 * The searchform.php template.
 */
?>

<form role="search" method="get" class="header__search-form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form__label" for="search-input">
		<span class="u-screenreader"><?php _e( 'Search for:', 'eats' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="search-input" class="search-form__input" placeholder="<?php echo esc_attr_x( 'e.g. delicious sandwiches', 'placeholder', 'eats' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-form__submit" value="<?php echo esc_attr_x( 'Search', 'Search submit button', 'eats' ); ?>">
		<svg class="svg-icon svg-icon--search">
			<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-search"></use>
		</svg>
	</button>
</form>


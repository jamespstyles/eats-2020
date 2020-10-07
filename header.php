<?php
/**
 * Header file for the eats theme.
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>

	</head>

	<body>
		<a class="link--skip" href="#main-content">Skip to main content</a>

		<header class="header" role="banner">
			<div class="header__top l-container">
				<button aria-label="Main Menu"  class="toggle toggle--menu js-toggle-menu">
					<svg class="svg-icon svg-icon--menu">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-menu"></use>
					</svg>
					<svg class="svg-icon svg-icon--close">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-close"></use>
					</svg>
				</button>

				<h1 class="header-logo">
					<a class="header-logo__link" href="/" title="Home" rel="home">
						<svg class="svg-icon svg-icon--logo">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-eats-logo"></use>
						</svg>
						<span class="header-logo__link-title">Eats.</span>
					</a>
				</h1>
				<button aria-label="search" class="toggle toggle--search js-toggle-search">
					<svg class="svg-icon svg-icon--search">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-search"></use>
					</svg>
					<svg class="svg-icon svg-icon--close">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri(); ?>/images/svg-sprite.svg#icon-close"></use>
					</svg>
				</button>
			</div><!-- header__top l-container -->

			<div class="header__bottom">

				<div class="l-container">
					<?php

					get_search_form(
						array(
							'label' => __( 'Search for:', 'eats' ),
						)
					);

					?>

					<?php

					if ( has_nav_menu( 'primary' ) ) {

					?>

						<nav class="header__primary-menu" role="navigation">

							<ul class="primary-menu">

							<?php
							if ( has_nav_menu( 'primary' ) ) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);

							}
							?>

							</ul>

						</nav><!-- .primary-menu__wrapper -->

					<?php

					} else {

					?>

						<p>Please add a Primary menu.</p>

					<?php

					}

					?>
					</div><!-- l-container -->

			</div><!-- header__bottom -->

		</header><!-- .header -->


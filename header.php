<!doctype html>
<html <?php language_attributes(); ?> class="no-js dark">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href="<?php echo get_template_directory_uri()	?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); $frontPageID = get_option('page_on_front'); ?>
	</head>
	<body class="font-montserrat">
    <div class="preloader">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>

    <header class="absolute z-10 top-2.5 text-white px-5 py-2.5 mx-auto w-full">
			<div class="container mx-auto flex items-center justify-between">
				<?php
					$logotipo = get_field( 'logotipo', $frontPageID );
					if ( $logotipo ) :
				?>
					<a href="<?php echo home_url( '/' ); ?>">
						<img src="<?php echo $logotipo['url']; ?>" />
					</a>
				<?php endif; ?>

				<nav class="flex items-center">
					<div class="hamburguer">
						<div class="menu__line--one"></div>
						<div class='menu__line--two'></div>
					</div>

					<?php
						wp_nav_menu([
							'menu'            => 'principal',
							'container'       => 'ul',
							'theme_location'  => 'top',
							'menu_class'			=> 'menu__header flex items-center gap-16'
						]);
					?>
					<a
						href="#"
						class=""
						id="js-search-nav"
					>
						<i class="sprite search search__fif"></i>
					</a>
				</nav>
			</div>
		</header>
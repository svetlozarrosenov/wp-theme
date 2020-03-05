<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
	$overlay = [
		'color' => carbon_get_theme_option('crb_header_overlay_color'),
		'opacity' => carbon_get_theme_option('crb_header_overlay_opacity'),
	];
	?>
	<div class="wrapper">
		<div class="wrapper__inner">
			<header class="header">
				<span class="header__bg" style="background-color: <?php echo $overlay['color']; ?>; opacity: <?php echo $overlay['opacity']; ?>;"></span>

				<div class="logo-holder">
					<a href="<?php echo home_url('/'); ?>" class="logo">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo.jpg" alt="" />
					</a>
				</div><!-- /.logo-holder -->
				
				<nav class="nav">
					<span class="nav__bg" style="background-color: <?php echo $overlay['color']; ?>; opacity: <?php echo $overlay['color']; ?>;"></span>
					
					<?php 
					if ( has_nav_menu('header-menu-left') ) {
						wp_nav_menu( array(
							'theme_location' => 'header-menu-left',
							'container' => ''
						) );
					}

					if ( has_nav_menu('header-menu-right') ) {
						wp_nav_menu( array(
							'theme_location' => 'header-menu-right',
							'container' => ''
						) );
					}
					?>
				</nav><!-- /.nav -->

				<button class="btn-menu" type="button">
					<span></span>
				</button><!-- /.btn-menu -->
			</header><!-- /.header -->

			<div class="main">

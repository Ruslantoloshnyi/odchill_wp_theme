<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package odessachill
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="theme-color" content="#fff">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body>
	<!-- header -->
	<div class="background">
		<header class="header">
			<div class="header_container">
				<div class="header__body">
					<a class="header__logo" href="<?php echo home_url(); ?>">
						<div><?php bloginfo('name'); ?></div>
					</a>
					<div class="header__burger">
						<span></span>
					</div>
					<nav class="header__menu">

						<?php
						wp_nav_menu([
							'theme_location'  => 'menu-1',
							'menu'            => '',
							'container'       => 'ul',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'header__list',

						]);
						?>

					</nav>
				</div>
			</div>
		</header>
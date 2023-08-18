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

	<?php wp_head(); ?>
</head>

<body>
	<!-- header -->
	<div class="background">
		<header class="header">
			<div class="header_container">
				<div class="header__body">
					<a class="header__logo" href="">
						<div>Odessa</div>
					</a>
					<div class="header__burger">
						<span></span>
					</div>
					<nav class="header__menu">
						<ul class="header__list">
							<li>
								<a class="header__link" href="">Home</a>
							</li>
							<li>
								<a class="header__link" href="">Categories<span class="dropdown-arrow">▼</span></a>
								<ul>
									<li><a href="">пляжі</a></li>
									<li><a href="">парки</a></li>
								</ul>
							</li>
							<li>
								<a class="header__link" href="">About us</a>
							</li>
							<li>
								<a class="header__link" href="">contscts</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
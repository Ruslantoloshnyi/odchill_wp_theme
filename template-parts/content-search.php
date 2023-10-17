<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package odessachill
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="wrapper">
		<div class="content">
			<div class="content__image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-large'); ?></a>

				<h2 class="content__head image__head"><?php the_title(); ?></h2>
				<div class="content_author">

					<div>
						<div class="content_author__name author__text"></div>
						<div class="content_author__date author__text"></div>
					</div>
				</div>
			</div>
			<div class="content__text text">
				<div><?php the_excerpt(); ?></div>
				<div class="content__link text"><a href="<?php the_permalink(); ?>">Читати більше &#8594;</a></div>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
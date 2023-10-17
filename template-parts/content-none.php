<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package odessachill
 */

?>

<section class="no-results not-found">
	<div class="container">
		<header class="page-header">
			<h1 class="page-title image__head"><?php esc_html_e('Нічого не знайдено', 'odchill'); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if (is_home() && current_user_can('publish_posts')) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'odchill'),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url(admin_url('post-new.php'))
				);

			elseif (is_search()) :
			?>

				<p class="footer_content"><?php esc_html_e('Вибачте, але нічого не відповідає вашим умовам пошуку. Спробуйте ще раз із іншими ключовими словами.', 'odchill'); ?></p>
			<?php
			// get_search_form();

			else :
			?>

				<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'odchill'); ?></p>
			<?php
			// get_search_form();

			endif;
			?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
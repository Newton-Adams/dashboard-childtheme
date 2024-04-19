<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
				<div class="inside-article">
					<?php
					/**
					 * generate_before_content hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_featured_page_header_inside_single - 10
					 */
					do_action( 'generate_before_content' );

					/**
					 * generate_after_entry_header hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_post_image - 10
					 */
					do_action( 'generate_after_entry_header' );

					$itemprop = '';

					if ( 'microdata' === generate_get_schema_type() ) {
						$itemprop = ' itemprop="text"';
					}
					?>

					<div class="entry-content"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>

					<?php 

						include( get_stylesheet_directory() . "/inc/page-templates/dashboard-vehicle.php");

						// the_content();

						// wp_link_pages(
						// 	array(
						// 		'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
						// 		'after'  => '</div>',
						// 	)
						// );
						/**
						 * generate_after_content hook.
						 *
						 * @since 0.1
						 */
						do_action( 'generate_after_content' );
					?>
				</div>
			</article>

			<?php

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();

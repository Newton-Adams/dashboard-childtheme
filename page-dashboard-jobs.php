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
			<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
				<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
					<h2 class="wp-block-heading mb-0">Job list</h2>
				</div>
				<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
					<div class="wp-block-buttons justified-md-end is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
						<div class="wp-block-button">
							<a href="/job/" class="wp-block-button__link wp-element-button popup-btn">+ New Job</a>
						</div>
					</div>
				</div>
			</div>

			<?php

			include( get_stylesheet_directory() . "/inc/page-templates/dashboard-jobs.php");   

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

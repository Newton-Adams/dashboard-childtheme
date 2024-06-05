<?php
/* Template Name: Dashboard Page */
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

			// Welcome Section
			include( get_stylesheet_directory() . "/inc/templates/welcome-section.php" ); 

			// Snapshot 
			include( get_stylesheet_directory() . "/inc/templates/snapshot.php" );

			// Jobs List 
			$jobs = get_posts( array(
				'post_type' => 'jobs',
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'author' => get_current_user_id()
			) );

			if( count($jobs) > 0 ) {
				include( get_stylesheet_directory() . "/inc/page-templates/dashboard-jobs.php");   
			} 

			echo '<div style="height:8px" aria-hidden="true" class="wp-block-spacer mb-0"></div>';

			// Get Started Guide
			include( get_stylesheet_directory() . "/inc/templates/get-started-guide.php" ); 

			include( get_stylesheet_directory() . "/inc/templates/popups/ajax-in-progress.php");   
			

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

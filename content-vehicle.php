<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
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

			include( get_stylesheet_directory() . "/inc/templates/vehicle/vehicles-list.php");

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

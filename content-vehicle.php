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

			<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
				<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
					<h2 class="wp-block-heading mb-0">Vehicle list</h2>
				</div>
				<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
					<div class="wp-block-buttons justified-md-end is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
						<div class="wp-block-button">
							<a data-popup="add-vehicle-popup" class="wp-block-button__link wp-element-button popup-btn">+ Add New Vehicle</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Vehicle list -->
			<?php 

			$tableColumns = array( 
				"customer" => "Customer", 
				"make" => "Make",
				"model" => "Model",
				"registration" => "Registration",
				"vin" => "VIN",
				"actions" => "Actions"
			);

			echo '<form id="" class="table-filters" >';

			echo '<div class="filter-dropdowns" >';
			echo '<label for="">Filter <input class="search" type="text" value="" placeholder="Sort by customer, vehicle, VIN or registration"></label>';
			echo '</div>';
			
			echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/FIlter-handles.svg" ).'</span>';
			
			datatableFilters($tableColumns);

			echo '</form>';

			echo '<div class="datatable-wrapper">';

			echo '<table id="vehicleTable" class="">';

			echo '<thead>';
			echo '<tr>';
			echo '<th>Customer</th>';
			echo '<th>Make</th>';
			echo '<th>Model</th>';
			echo '<th>Registration</th>';
			echo '<th>VIN</th>';
			echo '<th>Actions</th>';
			echo '</tr>';
			echo '</thead>';

			echo '<tbody></tbody>';

			echo '</table>';

			echo '</div>'; 

			// the_content();

			// wp_link_pages(
			// 	array(
			// 		'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
			// 		'after'  => '</div>',
			// 	)
			// );

			include( get_stylesheet_directory() . "/inc/templates/popups/add-vehicle-popup.php");
			echo '</div>';
			/**
			 * generate_after_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_content' );
		?>
	</div>
</article>

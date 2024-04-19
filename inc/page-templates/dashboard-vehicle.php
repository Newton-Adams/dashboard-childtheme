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
<?php include( get_stylesheet_directory() . "/inc/templates/vehicle/vehicle-table.php"); ?>

<!-- Add Vehicle Popup -->
<?php  include( get_stylesheet_directory() . "/inc/templates/popups/add-vehicle-popup.php" ); ?>


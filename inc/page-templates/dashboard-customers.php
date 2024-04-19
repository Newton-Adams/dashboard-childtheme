<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
    <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
        <h2 class="wp-block-heading mb-0">Customer list</h2>
    </div>
    <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
        <div class="wp-block-buttons justified-md-end is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
            <div class="wp-block-button">
                <a href="/customer" class="wp-block-button__link wp-element-button">+ Add New Customer</a>
            </div>
        </div>
    </div>
</div>

<!-- Customer Table Filter -->
<?php include( get_stylesheet_directory() . "/inc/templates/customers/customer-table-filter.php"); ?>

<!-- Customer Table --> 
<?php include( get_stylesheet_directory() . "/inc/templates/customers/customer-table.php"); ?>
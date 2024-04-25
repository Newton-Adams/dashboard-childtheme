<?php
$status_options = array(
     "Complete" => "complete",
     "Draft" => "draft",
     "Pending" => "pending"
); 
$date_options = array(
    "Last 7 days" => 7,
    "Last 14 days" => 14,
    "Last 21 days" => 21, 
    "Last 28 days" => 28,
);
?>
<form id="" class="table-filters" >

    <?php 
        echo '<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex mb-1">';
            echo ' <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow mb-1">';
                if( !is_front_page() ) { 
                    echo '<h2 class="wp-block-heading mb-0">Job list</h2>'; 
                } else {
                    echo '<h3 class="wp-block-heading mb-0">Job list</h3>';
                }
                echo '</div>';
                    echo '<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow mb-1">';
                        echo '<div class="wp-block-buttons justified-md-end is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">';
                            echo ' <div class="wp-block-button">';
                        echo '<a href="/workshoppro/job/" class="wp-block-button__link wp-element-button popup-btn">+ New Job</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';

        // Filters not needed on the front page
        if( !is_front_page() ) {

            echo '<div class="filter-dropdowns" >';
            echo '<label for="filter-customer">';
            echo 'Filter';
            echo '<input id="filter-customer" class="search" type="text" value="" placeholder="Filter by customer">';
            echo '</label>      ';
            include( get_stylesheet_directory() . "/inc/templates/jobs/status-drop-down.php");
            include( get_stylesheet_directory() . "/inc/templates/global/date-range-drop-down.php"); 
            echo '</div>';

        }
    ?>
    

    <?php echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/Filter-handles.svg" ).'</span>'; ?>

    <div class="column-states columns-8">
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-customer" name="hide-customer" value="0">
            <label for="hide-customer">Customer</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-date" name="hide-date" value="1">
            <label for="hide-date">Date</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-jobno" name="hide-jobno" value="2">
            <label for="hide-jobno">Job No.</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-vehicle" name="hide-vehicle" value="3">
            <label for="hide-vehicle">Vehicle</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-registration" name="hide-registration" value="4">
            <label for="hide-registration">Registration</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-status" name="hide-status" value="5">
            <label for="hide-status">Status</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-notes" name="hide-notes" value="6">
            <label for="hide-notes">Notes</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-total" name="hide-total" value="7">
            <label for="hide-total">Total</label>
        </div>
    </div>
</form>
<div class="datatable-wrapper">
<table id="jobs-table" class="dt-table">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Date</th>
            <th>Job No.</th>
            <th>Vehicle</th>
            <th>Registration</th>
            <th>Status</th>
            <th>Notes</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
    </thead>
    <body>
    
    </body>
</table>
</div>

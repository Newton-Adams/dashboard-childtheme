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

<form id="" class="table-filters" > 
    <div class="filter-dropdowns" > 
        <label for="">Filter <input class="search" type="text" value="" placeholder="Sort by customer, vehicle, VIN or registration"></label> 
    </div>
    <?php 
        echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/Filter-handles.svg" ).'</span>';

        $tableColumns = array( 
            "customer" => "Customer", 
            "make" => "Make",
            "model" => "Model",
            "registration" => "Registration",
            "vin" => "VIN",
            "actions" => "Actions"
        );

        $index = 0;

        echo '<div class="column-states columns-' . count($tableColumns) . '" >';
        foreach($tableColumns as $key => $value) {
            echo '<div class="custom-checkbox">';
            echo '<input checked="true" type="checkbox" id="hide-'.$key.'" name="hide-'.$key.'" value="'.$index.'" >';
            echo '<label for="hide-'.$key.'">'.$value.'</label>';
            echo '</div>';
            $index++;
        } 
        echo '</div>';
    ?>  
</form> 
<div class="datatable-wrapper"> 
    <table id="vehicleTable" class="dt-table"> 
        <thead> 
            <tr>
                <?php 
                    foreach($tableColumns as $key => $value) {
                        echo '<th>'.$value.'</th>';
                    }
                ?> 
            </tr> 
        </thead> 
        <tbody></tbody> 
    </table> 
</div>

<?php  include( get_stylesheet_directory() . "/inc/templates/popups/add-vehicle-popup.php" ); ?>

<?php 

$tableColumns = array( 
    "customer" => "Customer", 
    "contact" => "Contact", 
    "email" => "Email", 
    "vehicles" => "Vehicle(s)", 
    "address" => "Address", 
    "actions" => "Actions" 
);
?>

<form id="" class="table-filters" > 
    <div class="filter-dropdowns" > 
        <label for="">Filter <input class="search" type="text" value="" placeholder="Sort by customer, vehicle, VIN or registration"></label> 
    </div>
    <?php 
        echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/Filter-handles.svg" ).'</span>';

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
    <table id="customerTable" class="dt-table"> 
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

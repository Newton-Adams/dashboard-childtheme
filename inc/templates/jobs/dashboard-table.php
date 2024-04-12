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
$tableColumns = array( 
    "customer" => "Customer", 
    "date" => "Date",
    "jobno" => "Job No.", 
    "vehicle" => "Vehicle", 
    "registration" => "Registration", 
    "status" => "Status", 
    "notes" => "Notes", 
    "total" => "Total",
);

?>
<form id="" class="table-filters" >
    <div class="filter-dropdowns" >
        <label for="">
            Search
            <input class="search" type="text" value="" >
        </label>        
        <?php include( get_stylesheet_directory() . "/inc/templates/jobs/status-drop-down.php"); ?>
        <?php include( get_stylesheet_directory() . "/inc/templates/global/date-range-drop-down.php"); ?>
    </div>

    <?php 
    
    echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/Filter-handles.svg" ).'</span>'; 
    datatableFilters($tableColumns);

    ?>
</form>
<div class="datatable-wrapper">
<table id="jobs-table" >
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

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
    <div class="filter-dropdowns" >
        <label for="">
            Search
            <input class="search" type="text" value="" >
        </label>        
        <?php include( get_stylesheet_directory() . "/inc/templates/global/status-drop-down.php"); ?>
        <?php include( get_stylesheet_directory() . "/inc/templates/global/date-range-drop-down.php"); ?>
    </div>

    <div class="column-states" >
        <label for="hide-customer">
            <input checked="true" type="checkbox" id="hide-customer" name="hide-customer" value="0" >
            Customer
        </label>
        <label for="hide-date">
            <input checked="true" type="checkbox" id="hide-date" name="hide-date" value="1" >
            Date
        </label>
        <label for="hide-jobno">
            <input checked="true" type="checkbox" id="hide-jobno" name="hide-jobno" value="2" >
            Job No.
        </label>
        <label for="hide-vehicle" >
            <input checked="true" type="checkbox" id="hide-vehicle" name="hide-vehicle" value="3" >
            Vehicle
        </label>
        <label for="hide-registration" >
            <input checked="true" type="checkbox" id="hide-registration" name="hide-registration" value="4" >
            Registration
        </label>
        <label for="hide-status" >
            <input checked="true" type="checkbox" id="hide-status" name="hide-status" value="5" >
            Status
        </label>
        <label for="hide-notes" >
            <input checked="true" type="checkbox" id="hide-notes" name="hide-notes" value="6" >
            Notes
        </label>
        <label for="hide-total" >
            <input checked="true" type="checkbox" id="hide-total" name="hide-total" value="7" >
            Total
        </label>
    </div>
</form>

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

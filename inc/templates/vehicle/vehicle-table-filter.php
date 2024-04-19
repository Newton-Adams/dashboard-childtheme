<form id="" class="table-filters" > 
    <div class="filter-dropdowns" > 
        <label for="">Filter <input class="search" type="text" value="" placeholder="Sort by customer, vehicle, VIN or registration"></label> 
    </div>
    <?php echo '<span class="hide-columns" >'.file_get_contents( get_stylesheet_directory() . "/assets/images/Filter-handles.svg" ).'</span>'; ?> 
    <div class="column-states columns-6" >
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-customer" name="hide-customer" value="0" >
            <label for="hide-customer">Customer</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-make" name="hide-make" value="1" >
            <label for="hide-make">Make</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-model" name="hide-model" value="2" >
            <label for="hide-model">Model</label>
        </div> 
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-registration" name="hide-registration" value="3" >
            <label for="hide-registration">Registration</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-vin" name="hide-vin" value="4" >
            <label for="hide-vin">VIN</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-actions" name="hide-actions" value="5" >
            <label for="hide-actions">Actions</label>
        </div>
    </div>
</form> 
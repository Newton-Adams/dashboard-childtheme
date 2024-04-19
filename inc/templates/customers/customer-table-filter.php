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
            <input checked="true" type="checkbox" id="hide-contact" name="hide-contact" value="1" >
            <label for="hide-contact">Contact</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-email" name="hide-email" value="2" >
            <label for="hide-email">Email</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-vehicles" name="hide-vehicles" value="3" >
            <label for="hide-vehicles">Vehicle(s)</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-address" name="hide-address" value="4" >
            <label for="hide-address">Address</label>
        </div>
        <div class="custom-checkbox">
            <input checked="true" type="checkbox" id="hide-actions" name="hide-actions" value="5" >
            <label for="hide-actions">Actions</label>
        </div>
    </div>
</form> 
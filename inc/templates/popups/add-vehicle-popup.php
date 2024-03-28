<?php 
function add_vehicle_popup() {
    ?>
    <!-- Popup -->
    <div id="add-vehicle-popup" class="popup">

        <div class="popup-overlay"></div>

        <div class="popup-content">

            <!-- Popup Content -->
            <form id="add-vehicle-form" class="" method="post" enctype="multipart/form-data">

                <div class="d-flex flex-align-center justified-between">
                    <h2 class="mb-0">Add Vehicle</h2>
                    <div class="close-popup"> 
                        Close
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.808058 0.593215C1.05214 0.349137 1.44786 0.349137 1.69194 0.593215L5 3.90127L8.30806 0.593215C8.55214 0.349137 8.94786 0.349137 9.19194 0.593215C9.43602 0.837292 9.43602 1.23302 9.19194 1.4771L5.88388 4.78516L9.19194 8.09321C9.43602 8.33729 9.43602 8.73302 9.19194 8.9771C8.94786 9.22118 8.55214 9.22118 8.30806 8.9771L5 5.66904L1.69194 8.9771C1.44786 9.22118 1.05214 9.22118 0.808058 8.9771C0.563981 8.73302 0.563981 8.33729 0.808058 8.09321L4.11612 4.78516L0.808058 1.4771C0.563981 1.23302 0.563981 0.837292 0.808058 0.593215Z" fill="#7A7A9D"/> 
                        </svg> 
                    </div>
                </div>

                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

                <!-- Customer -->
                <h5 class="mb-0">Customer</h5>

                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

                <div class="form-row" >
                    <div class="input-label-wrapper" >
                            <input type="text" name="vehicle_customer" id="vehicle_customer" value="" placeholder="Find a customer by name, vehicle or registration" class="required" />
                    </div>
                </div>

                <!-- Customer -->
                <h5 class="mb-0">Vehicle Details</h5>

                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

                <div class="form-row" >
                    <div class="input-label-wrapper" >
                            <label for="vehicle_make" >Make</label>
                            <input type="text" name="vehicle_make" id="vehicle_make" value="" placeholder="Make" class="required"  />
                    </div>
                    <div class="input-label-wrapper" >
                            <label for="model" >Model</label>
                            <input type="text" name="vehicle_model" id="vehicle_model" value="" placeholder="Model" class="required" />               
                    </div>
                    <div class="input-label-wrapper" >
                            <label for="vehicle_year" >Year</label>
                            <input type="text" name="vehicle_year" id="vehicle_year" value="" placeholder="Year" class="required" />
                    </div>
                </div>

                <div class="form-row" >
                    <div class="input-label-wrapper" > 
                        <label for="vehicle_colour" >Colour</label> 
                        <input type="text" name="vehicle_colour" id="vehicle_colour" value="" placeholder="Colour" class="required" />
                    </div>
                    <div class="input-label-wrapper" > 
                        <label for="vehicle_mileage" >Mileage</label>  
                        <input type="text" name="vehicle_mileage" id="vehicle_mileage" value="" placeholder="Mileage" class="required" />
                    </div>
                </div>
                
                <div class="form-row" >
                    <div class="input-label-wrapper" >
                            <label for="vehicle_registration" >Registration</label>
                            <input type="text" name="vehicle_registration" id="vehicle_registration" value="" placeholder="Registration" class="required" />
                    </div>
                    <div class="input-label-wrapper" >
                        <label for="vehicle_vin" >VIN</label>
                        <input type="text" name="vehicle_vin" id="vehicle_vin" value="" placeholder="VIN" class="required" />
                    </div>
                </div>

                <div class="form-row" > 
                    <div class="input-label-wrapper" > 
                        <label for="vehicle_attachments">Attachments</label>
                        <label for="vehicle_attachments" class="attachments">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5072 2.46243C6.6397 1.48573 8.21698 0.785156 10 0.785156C13.3628 0.785156 16.1541 3.28445 16.4571 6.50889C18.4476 6.79029 20 8.45586 20 10.5011C20 12.747 18.1279 14.5352 15.8594 14.5352H12.5C12.1548 14.5352 11.875 14.2553 11.875 13.9102C11.875 13.565 12.1548 13.2852 12.5 13.2852H15.8594C17.4741 13.2852 18.75 12.0207 18.75 10.5011C18.75 8.98144 17.4741 7.71697 15.8594 7.71697H15.2344V7.09197C15.2344 4.31716 12.9091 2.03516 10 2.03516C8.54697 2.03516 7.25316 2.60731 6.32358 3.40902C5.37788 4.22462 4.88281 5.20803 4.88281 5.97834V6.53841L4.3261 6.5996C2.57964 6.79156 1.25 8.22598 1.25 9.93288C1.25 11.7663 2.78824 13.2852 4.72656 13.2852H7.5C7.84518 13.2852 8.125 13.565 8.125 13.9102C8.125 14.2553 7.84518 14.5352 7.5 14.5352H4.72656C2.13442 14.5352 0 12.4926 0 9.93288C0 7.72905 1.58233 5.90405 3.67778 5.4414C3.85599 4.36228 4.54981 3.28811 5.5072 2.46243Z" fill="#7A7A9D"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55806 5.96821C9.80214 5.72414 10.1979 5.72414 10.4419 5.96821L14.1919 9.71821C14.436 9.96229 14.436 10.358 14.1919 10.6021C13.9479 10.8462 13.5521 10.8462 13.3081 10.6021L10.625 7.91904V18.9102C10.625 19.2553 10.3452 19.5352 10 19.5352C9.65482 19.5352 9.375 19.2553 9.375 18.9102V7.91904L6.69194 10.6021C6.44786 10.8462 6.05214 10.8462 5.80806 10.6021C5.56398 10.358 5.56398 9.96229 5.80806 9.71821L9.55806 5.96821Z" fill="#7A7A9D"/>
                            </svg> 
                            <h6>Upload attachments</h6>
                            <div class="text-center">
                                <p class="mb-0">Formats: Jpg, Png, Pdf, Word, Excel</p>
                                <p class="mb-0">Max size: 4Mb</p> 
                            </div>
                            <input type="file" name="vehicle_attachments" id="vehicle_attachments" value="" placeholder="Attachments" class="required" accept=".jpg,.png,.pdf" />
                        </label>
                    </div> 
                </div>

                <div class="form-row" >
                    <div class="input-label-wrapper" >
                            <label for="vehicle-description" >Vehicle Description</label> 
                            <textarea name="vehicle-description" id="vehicle-description" value="" placeholder="Vehicle Description" ></textarea>
                    </div>
                </div>


                <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>

                <!-- Save button -->
                <div class="form-row" >
                    <div class="input-label-wrapper" >
                        <div class="d-flex flex-align-center justified-between"> 
                            <div class="cancel-popup">Cancel</div> 
                            <div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
                                <div class="wp-block-button">
                                    <button type="submit" class="wp-block-button__link wp-element-button">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
add_action( 'wp_footer', 'add_vehicle_popup', 100 );


?>





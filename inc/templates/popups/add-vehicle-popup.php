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
                <div class="form-row" >
                    <div class="input-label-wrapper" >
                        <?php include( get_stylesheet_directory() . "/inc/templates/jobs/customer-select.php"); ?>
                    </div> 
                </div>

                <h5 class="mb-0">Vehicle Details</h5>

                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

                <div class="form-row" >
                    <div class="input-label-wrapper" >
                        <label for="vehicle_make" >Make</label>
                        <input type="text" name="vehicle_make" id="vehicle_make" value="" placeholder="Make" class="required"  />
                    </div>
                    <div class="input-label-wrapper" >
                        <label for="vehicle_model" >Model</label>
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

                <div class="form-row attachments" >
                    <div class="input-label-wrapper" >
                        <div class="d-flex flex-column fw-100" >
                            <p>Attachments</p>
                            <div class="fw-100" >
                                <label for="attachment" >
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5072 1.67727C6.6397 0.70057 8.21698 0 10 0C13.3628 0 16.1541 2.4993 16.4571 5.72373C18.4476 6.00513 20 7.6707 20 9.71591C20 11.9619 18.1279 13.75 15.8594 13.75H12.5C12.1548 13.75 11.875 13.4702 11.875 13.125C11.875 12.7798 12.1548 12.5 12.5 12.5H15.8594C17.4741 12.5 18.75 11.2355 18.75 9.71591C18.75 8.19629 17.4741 6.93182 15.8594 6.93182H15.2344V6.30682C15.2344 3.532 12.9091 1.25 10 1.25C8.54697 1.25 7.25316 1.82216 6.32358 2.62386C5.37788 3.43946 4.88281 4.42287 4.88281 5.19318V5.75325L4.3261 5.81444C2.57964 6.0064 1.25 7.44082 1.25 9.14773C1.25 10.9811 2.78824 12.5 4.72656 12.5H7.5C7.84518 12.5 8.125 12.7798 8.125 13.125C8.125 13.4702 7.84518 13.75 7.5 13.75H4.72656C2.13442 13.75 0 11.7075 0 9.14773C0 6.94389 1.58233 5.1189 3.67778 4.65625C3.85599 3.57713 4.54981 2.50296 5.5072 1.67727Z" fill="#7A7A9D"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55806 5.18306C9.80214 4.93898 10.1979 4.93898 10.4419 5.18306L14.1919 8.93306C14.436 9.17714 14.436 9.57286 14.1919 9.81694C13.9479 10.061 13.5521 10.061 13.3081 9.81694L10.625 7.13388V18.125C10.625 18.4702 10.3452 18.75 10 18.75C9.65482 18.75 9.375 18.4702 9.375 18.125V7.13388L6.69194 9.81694C6.44786 10.061 6.05214 10.061 5.80806 9.81694C5.56398 9.57286 5.56398 9.17714 5.80806 8.93306L9.55806 5.18306Z" fill="#7A7A9D"/>
                                    </svg>
                                    <p class="upload-title mb-0 small-text" >Upload attachments</p>
                                    <p class="mb-0 extra-small-text" >Formats: Jpg, Png, Pdf, Word, Excel</p>
                                    <p class="mb-0 extra-small-text" >Max size: 4Mb</p>
                                </label>
                                <input type="file" id="attachment" accept=".jpg,.png,.pdf" class="d-none" >                
                                <input type="hidden" id="attachments-obj" class="d-none" value='<?php echo isset($attachments) ? $attachments : ""; ?>' >                
                                <input type="hidden" id="delete-attachments" class="d-none" value="" >                
                            </div>
                        </div>
                        <table id="attachment-files" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if( isset($attchments_decoded) ) {
                                        foreach ($attchments_decoded as $key => $attachment) {
                                            echo '<tr>';
                                            echo '<td><a href="'.$attachment[2].'" target="_blank" >'.$key.'</a></td>';
                                            echo '<td class="delete" attachment_id="'.$key.'" >';
                                            echo '<svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http:www.w3.org/2000/svg">
                                                    <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path>
                                                    <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path>
                                                    <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path>';
                                            echo '</svg>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }        
                                    }
                                ?>
                            </tbody>
                        </table>
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





<div class="job-select-wrapper customer" >
    <h3>Customer</h3>
    <div class="customer-select" style="<?php echo isset($customer_data_decoded->{"customer-name"}) ? "display: none;" : ""; ?>" >
        <input type="text" class="selected-value" placeholder="Find a customer by name, vehicle or registraion" >
        <ul class="options" >
            <?php if(isset($customer_data_decoded->{"customer-name"})) : ?>
            <li class="add-new-customer" >
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="46" height="46" rx="23" fill="#EDFFEB"/>
                    <mask id="mask0_2_12674" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="14" width="18" height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 18.5C23.3107 18.5 23.5625 18.7518 23.5625 19.0625V22.4375H26.9375C27.2482 22.4375 27.5 22.6893 27.5 23C27.5 23.3107 27.2482 23.5625 26.9375 23.5625H23.5625V26.9375C23.5625 27.2482 23.3107 27.5 23 27.5C22.6893 27.5 22.4375 27.2482 22.4375 26.9375V23.5625H19.0625C18.7518 23.5625 18.5 23.3107 18.5 23C18.5 22.6893 18.7518 22.4375 19.0625 22.4375H22.4375V19.0625C22.4375 18.7518 22.6893 18.5 23 18.5Z" fill="black"/>
                    </mask>
                    <g mask="url(#mask0_2_12674)">
                    <rect x="14" y="14" width="18" height="18" fill="#009026"/>
                    </g>
                </svg>
                Add new customer
            </li>
            <li 
                data-company-name='<?php echo isset($customer_data_decoded->{"company-name"}) ? $customer_data_decoded->{"company-name"} : "";  ?>' 
                data-address='<?php echo isset($customer_data_decoded->{"address"}) ? $customer_data_decoded->{"address"} : "";  ?>' 
                data-name='<?php echo isset($customer_data_decoded->{"customer-name"}) ? $customer_data_decoded->{"customer-name"} : "";  ?>' 
                data-email='<?php echo isset($customer_data_decoded->{"email"}) ? $customer_data_decoded->{"email"} : "";  ?>' 
                data-vin="<?php echo isset($vehicle["VIN"]) ? $vehicle["VIN"] : "";  ?>" 
                data-make="<?php echo isset($vehicle["make"]) ? $vehicle["make"] : "";  ?>"
                data-model="<?php echo isset($vehicle["model"]) ? $vehicle["model"] : "";  ?>"
                data-registration="<?php echo isset($vehicle["registration"]) ? $vehicle["registration"] : "";  ?>"
                data-mileage="<?php echo isset($vehicle["mileage"]) ? $vehicle["mileage"] : "";  ?>"
                data-colour="<?php echo isset($vehicle["colour"]) ? $vehicle["colour"] : "";  ?>"
                data-vehicle-all="<?php echo isset($vehicle_json) ? $vehicle_json : ""; ?>"
            >
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="46" height="46" rx="23" fill="#F0F6FF"/>
                    <mask id="mask0_2_12688" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="14" width="18" height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 30.875C27.3492 30.875 30.875 27.3492 30.875 23C30.875 18.6508 27.3492 15.125 23 15.125C18.6508 15.125 15.125 18.6508 15.125 23C15.125 27.3492 18.6508 30.875 23 30.875ZM23 32C27.9706 32 32 27.9706 32 23C32 18.0294 27.9706 14 23 14C18.0294 14 14 18.0294 14 23C14 27.9706 18.0294 32 23 32Z" fill="black"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8204 24.7631C19.0893 24.6075 19.4334 24.6994 19.589 24.9683C20.2706 26.1467 21.5433 26.9375 23 26.9375C24.4568 26.9375 25.7294 26.1467 26.4111 24.9683C26.5667 24.6994 26.9108 24.6075 27.1797 24.7631C27.4486 24.9187 27.5405 25.2627 27.3849 25.5317C26.5104 27.0434 24.8746 28.0625 23 28.0625C21.1255 28.0625 19.4896 27.0434 18.6151 25.5317C18.4596 25.2627 18.5515 24.9187 18.8204 24.7631Z" fill="black"/>
                    <path d="M21.875 21.3125C21.875 22.2445 21.3713 23 20.75 23C20.1287 23 19.625 22.2445 19.625 21.3125C19.625 20.3805 20.1287 19.625 20.75 19.625C21.3713 19.625 21.875 20.3805 21.875 21.3125Z" fill="black"/>
                    <path d="M26.375 21.3125C26.375 22.2445 25.8713 23 25.25 23C24.6287 23 24.125 22.2445 24.125 21.3125C24.125 20.3805 24.6287 19.625 25.25 19.625C25.8713 19.625 26.375 20.3805 26.375 21.3125Z" fill="black"/>
                    </mask>
                    <g mask="url(#mask0_2_12688)">
                    <rect x="14" y="14" width="18" height="18" fill="#18181A"/>
                    </g>
                </svg>
                <?php echo isset($customer_data_decoded->{"customer-name"}) ? $customer_data_decoded->{"customer-name"} : "";  ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="selected-customer-outer" style="<?php echo isset($customer_data_decoded->{"customer-name"}) ? "" : "display: none;"; ?>" >
        <div class="customer-name-outer" >
            <span class="customer-name" >
                <p class="customer-name-val" ><?php echo isset($customer_data_decoded->{"customer-name"}) ? $customer_data_decoded->{"customer-name"} : ""; ?></p>
                <span class="close" >
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16Z" fill="#425466"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64645 4.64645C4.84171 4.45118 5.15829 4.45118 5.35355 4.64645L8 7.29289L10.6464 4.64645C10.8417 4.45118 11.1583 4.45118 11.3536 4.64645C11.5488 4.84171 11.5488 5.15829 11.3536 5.35355L8.70711 8L11.3536 10.6464C11.5488 10.8417 11.5488 11.1583 11.3536 11.3536C11.1583 11.5488 10.8417 11.5488 10.6464 11.3536L8 8.70711L5.35355 11.3536C5.15829 11.5488 4.84171 11.5488 4.64645 11.3536C4.45118 11.1583 4.45118 10.8417 4.64645 10.6464L7.29289 8L4.64645 5.35355C4.45118 5.15829 4.45118 4.84171 4.64645 4.64645Z" fill="#425466"/>
                    </svg>
                </span>
            </span>
            <span class="change-customer" >Change customer</span>
        </div>
        <div class="customer-details" >
            <span class="company-name" >
                <p>Company Name</p>
                <p class="company-name-val" ><?php echo isset($customer_data_decoded->{"company-name"}) ? $customer_data_decoded->{"customer-name"} : ""; ?></p>
            </span>
            <span class="contact" >
                <p>Contact</p>
                <p class="contact-val" ><?php echo isset($customer_data_decoded->{"email"}) ? $customer_data_decoded->{"email"} : ""; ?></p>
            </span>
            <span class="address" >
                <p>Address</p>
                <p class="address-val" ><?php echo isset($customer_data_decoded->{"address"}) ? $customer_data_decoded->{"address"} : ""; ?></p>
            </span>
        </div>
    </div>
    <!-- //Hidden fields -->
    <input type="hidden" name="customer-data" value="<?php echo isset($customer_data) ? $customer_data : ""; ?>" >    
</div>
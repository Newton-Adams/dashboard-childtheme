<form id="customer-details" >
    <div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex mb-0">
        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow d-flex flex-wrap justified-between mb-2">
            <h3 class="mb-3 fw-100">Customer Details</h3>
            <div class="form-row d-flex flex-wrap" >
                <div class="input-label-wrapper fw-50" >
                    <label for="first-name-1" >First Name</label>
                    <input type="text" id="first-name-1" name="first-name-1" value="<?= isset($customer_details["first-name-1"]) ? $customer_details["first-name-1"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-50" >
                    <label for="last-name-1" >Last Name</label>
                    <input type="text" id="last-name-1" name="last-name-1" value="<?= isset($customer_details["last-name-1"]) ? $customer_details["last-name-1"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-50" >
                    <label for="cell-number-1" >Cell number</label>
                    <input type="tel" id="cell-number-1" name="cell-number-1" value="<?= isset($customer_details["cell-number-1"]) ? $customer_details["cell-number-1"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-50" >
                    <label for="additional-number-1" >Additional cell number (Whatsapp)</label>
                    <input type="text" id="additional-number-1" name="additional-number-1" value="<?= isset($customer_details["additional-number-1"]) ? $customer_details["additional-number-1"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-100" >
                    <label for="email-1" >Email</label>
                    <input type="email" id="email-1" name="email-1" value="<?= isset($customer_details["email-1"]) ? $customer_details["email-1"] : ''; ?>" >
                </div>
            </div>
       
            <span class="alternate-contact <?= !isset($customer_details["first-name-2"]) && $customer_details["first-name-2"] != "" ? '' : 'open'; ?>" >
                <h3 class="mb-0 fw-100 title-button">Add Alternate Contact</h3>
                <div class="form-row flex-wrap justified-start alternate-contact-form mt-3" style="<?= !isset($customer_details["first-name-2"]) ? 'display:none' : ''; ?>" >
                    <div class="input-label-wrapper fw-50" >
                        <label for="first-name-2" >First Name</label>
                        <input type="text" id="first-name-2" name="first-name-2" value="<?= isset($customer_details["first-name-2"]) ? $customer_details["first-name-2"] : ''; ?>" >
                    </div>
                    <div class="input-label-wrapper fw-50" >
                        <label for="last-name-2" >Last Name</label>
                        <input type="text" id="last-name-2" name="last-name-2" value="<?= isset($customer_details["last-name-2"]) ? $customer_details["last-name-2"] : ''; ?>" >
                    </div>
                    <div class="input-label-wrapper fw-50" >
                        <label for="cell-number-2" >Cell number</label>
                        <input type="tel" id="cell-number-2" name="cell-number-2" value="<?= isset($customer_details["cell-number-2"]) ? $customer_details["cell-number-2"] : ''; ?>" >
                    </div>
                    <div class="input-label-wrapper fw-50" >
                        <label for="additional-number-2" >Additional cell number (Whatsapp)</label>
                        <input type="text" id="additional-number-2" name="additional-number-2" value="<?= isset($customer_details["additional-number-2"]) ? $customer_details["additional-number-2"] : ''; ?>" >
                    </div>
                    <div class="input-label-wrapper fw-100" >
                        <label for="email-2" >Email</label>
                        <input type="email" id="email-2" name="email-2" value="<?= isset($customer_details["email-2"]) ? $customer_details["email-2"] : ''; ?>" >
                    </div>
                </div>
            </span>
        </div>
        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
            <h3 class="mb-3 fw-100">Address</h3>
            <div class="form-row d-flex flex-wrap" >
                <div class="input-label-wrapper fw-50" >
                    <label for="physical-address" >Physical address</label>
                    <input type="text" id="physical-address" name="physical-address" value="<?= isset($customer_details["physical-address"]) ? $customer_details["physical-address"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-50" >
                    <label for="suburb" >Suburb</label>
                    <input type="text" id="suburb" name="suburb" value="<?= isset($customer_details["suburb"]) ? $customer_details["suburb"] : ''; ?>" >
                </div>                
                <div class="input-label-wrapper fw-50" >
                    <label for="city" >City</label>
                    <input type="text" id="city" name="city" value="<?= isset($customer_details["city"]) ? $customer_details["city"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-50" >
                    <label for="province" >Province</label>
                    <input type="text" id="province" name="province" value="<?= isset($customer_details["province"]) ? $customer_details["province"] : ''; ?>" >
                </div>
                <div class="input-label-wrapper fw-25" >
                    <label for="postal-code" >Postal code</label>
                    <input type="text" id="postal-code" name="postal-code" value="<?= isset($customer_details["postal-code"]) ? $customer_details["postal-code"] : ''; ?>" >
                </div>
            </div>
        </div>        
    </div>

</form>
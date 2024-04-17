<h3>Customer details</h3>
<form id="customer-fields" >
    <div class="form-row d-flex flex-wrap" >
        <div class="fw-100 input-label-wrapper" >
            <label for="company-name" >Company name (Optional)</label>
            <input type="text" id="company-name" name="company-name" value="<?= isset($details["company-name"]) ? $details["company-name"] : ''; ?>" >
        </div>
    
        <div class="fw-50 input-label-wrapper" >
            <label for="payment-terms" >Payment terms</label>
            <input type="text" id="payment-terms" name="payment-terms" value="<?= isset($details["payment-terms"]) ? $details["payment-terms"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="preferred-terms" >Preferred method of contact</label>
            <input type="text" id="preferred-terms" name="preferred-terms" value="<?= isset($details["preferred-terms"]) ? $details["preferred-terms"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="physical-address" >Physical address</label>
            <input type="text" id="physical-address" name="physical-address" value="<?= isset($details["physical-address"]) ? $details["physical-address"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="suburb" >Suburb</label>
            <input type="text" id="suburb" name="suburb" value="<?= isset($details["suburb"]) ? $details["suburb"] : ''; ?>" >
        </div>
        
        <div class="fw-33 input-label-wrapper" >
            <label for="city" >City</label>
            <input type="text" id="city" name="city" value="<?= isset($details["city"]) ? $details["city"] : ''; ?>" >
        </div>
        
        <div class="fw-33 input-label-wrapper" >
            <label for="province" >Province</label>
            <input type="text" id="province" name="province" value="<?= isset($details["province"]) ? $details["province"] : ''; ?>" >
        </div>
        
        <div class="fw-33 input-label-wrapper" >
            <label for="postal-code" >Postal code</label>
            <input type="text" id="postal-code" name="postal-code" value="<?= isset($details["postal-code"]) ? $details["postal-code"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="vat-number" >VAT number (Optional)</label>
            <input type="text" id="vat-number" name="vat-number" value="<?= isset($details["vat-number"]) ? $details["vat-number"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="company-registration" >Company registration number (Optional)</label>
            <input type="text" id="company-registration" name="company-registration" value="<?= isset($details["company-registration"]) ? $details["company-registration"] : ''; ?>" >
        </div>    
    </div>
</form>
<h3>Company Details</h3>
<form id="company-fields" >
    <div class="form-row d-flex flex-wrap" >
        <div class="fw-100 input-label-wrapper" >
            <label for="company-name" >Company name (Optional)</label>
            <input type="text" id="company-name" name="company-name" value="<?= isset($company_details["company-name"]) ? $company_details["company-name"] : ''; ?>" >
        </div>
    
        <div class="fw-50 input-label-wrapper" >
            <label for="payment-terms" >Payment terms</label>
            <input type="text" id="payment-terms" name="payment-terms" value="<?= isset($company_details["payment-terms"]) ? $company_details["payment-terms"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="preferred-terms" >Preferred method of contact</label>
            <input type="text" id="preferred-terms" name="preferred-terms" value="<?= isset($company_details["preferred-terms"]) ? $company_details["preferred-terms"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="vat-number" >VAT number (Optional)</label>
            <input type="text" id="vat-number" name="vat-number" value="<?= isset($company_details["vat-number"]) ? $company_details["vat-number"] : ''; ?>" >
        </div>
        
        <div class="fw-50 input-label-wrapper" >
            <label for="company-registration" >Company registration number (Optional)</label>
            <input type="text" id="company-registration" name="company-registration" value="<?= isset($company_details["company-registration"]) ? $company_details["company-registration"] : ''; ?>" >
        </div>    
    </div>
</form>
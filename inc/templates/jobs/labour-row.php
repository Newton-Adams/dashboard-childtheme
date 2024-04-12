
<form id="job-fields" >
    <?php 
    if(isset($labour)) {
        $loop_count = 0;
        foreach ($labour as $key => $row) { 
            ?>
        <div class="form-row" >
            <div class="input-label-wrapper labour-name-wrapper" >
                <label for="labour-name" >Labour Name</label>
                <input type="text" class="labour-name" name="labour-name-0" value="<?= $row[0]->{"labour-name-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper description-wrapper" >
                <label for="description" >Description</label>
                <input type="text" class="description" name="description-0" value="<?= $row[1]->{"description-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper unit-price-wrapper" >
                <label for="unit-price" >Unit price</label>
                <input type="text" class="unit-price" name="unit-price-0" value="<?= $row[2]->{"unit-price-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper quantity-wrapper" >
                <label for="qty" >Qty</label>
                <input type="text" class="qty" name="qty-0" value="<?= $row[3]->{"qty-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper vat-wrapper" >
                <label for="vat" >Vat</label>
                <input type="text" class="vat" name="vat-0" value="<?= $row[4]->{"vat-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper line-total-wrapper" >
                <label for="line-total" >Line Total</label>
                <input type="text" class="line-total" name="line-total-0" value="<?= $row[5]->{"line-total-{$loop_count}"}; ?>" >
            </div>
            <div class="input-label-wrapper delete-row" >
                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"/>
                <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"/>
                <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"/>
                </svg>
            </div>
        </div>
        
    <?php 
        $loop_count++;
        }
    } else { ?>
        <div class="form-row" >
            <div class="input-label-wrapper labour-name-wrapper" >
                <label for="labour-name" >Labour Name</label>
                <input type="text" class="labour-name" name="labour-name-0" >
            </div>
            <div class="input-label-wrapper description-wrapper" >
                <label for="description" >Description</label>
                <input type="text" class="description" name="description-0" >
            </div>
            <div class="input-label-wrapper unit-price-wrapper" >
                <label for="unit-price" >Unit price</label>
                <input type="text" class="unit-price" name="unit-price-0" >
            </div>
            <div class="input-label-wrapper quantity-wrapper" >
                <label for="qty" >Qty</label>
                <input type="text" class="qty" name="qty-0" >
            </div>
            <div class="input-label-wrapper vat-wrapper" >
                <label for="vat" >Vat</label>
                <input type="text" class="vat" name="vat-0" >
            </div>
            <div class="input-label-wrapper line-total-wrapper" >
                <label for="line-total" >Line Total</label>
                <input type="text" class="line-total" name="line-total-0" >
            </div>
            <div class="input-label-wrapper delete-row" >
                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"/>
                <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"/>
                <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"/>
                </svg>
            </div>
        </div>
<?php } ?>
</form>
<div class="add-row-button-outer" >
    <button class="add-row-button" type="button" >
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16Z" fill="#009026"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4C8.27614 4 8.5 4.22386 8.5 4.5V7.5H11.5C11.7761 7.5 12 7.72386 12 8C12 8.27614 11.7761 8.5 11.5 8.5H8.5V11.5C8.5 11.7761 8.27614 12 8 12C7.72386 12 7.5 11.7761 7.5 11.5V8.5H4.5C4.22386 8.5 4 8.27614 4 8C4 7.72386 4.22386 7.5 4.5 7.5H7.5V4.5C7.5 4.22386 7.72386 4 8 4Z" fill="#009026"/>
        </svg>
        <span>Add Labour Row</span>
    </button>
</div>
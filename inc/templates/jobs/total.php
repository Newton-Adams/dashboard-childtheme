<div class="total-outer" >
    <p class="total-vat" >Total VAT <span class="value" >R0.00</span></p>
    <p class="grand-total" >Grand Total <span class="value" ><?= isset($grand_total) ? $grand_total : 'R0.00'; ?></span></p>
    <input type="hidden" id="grand-total-value" value="<?= isset($grand_total) ? $grand_total : ''; ?>" >
</div>
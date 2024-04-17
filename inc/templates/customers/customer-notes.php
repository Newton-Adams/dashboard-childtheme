<form id="customer-notes" >
    <h3>Customer notes</h3>
    <div class="form-row d-flex flex-wrap" >
        <div class="fw-100 input-label-wrapper" >
            <label for="notes" >Notes</label>
            <textarea id="notes" name="notes" ><?php echo isset($notes) ? $notes : ''; ?></textarea>
        </div>     
    </div>
</form>
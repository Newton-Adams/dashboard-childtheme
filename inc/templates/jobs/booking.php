<form id="booking-fields" >
    <div class="form-row" >
        <div class="input-label-wrapper" >
            <label for="booking-date" >Booking date</label>
            <input type="text" id="booking-date" name="booking-date" value="<?php echo isset($booking_notes) ? $booking_notes["booking-date"] : ""; ?>" >
        </div>
        <div class="input-label-wrapper" >
            <label for="due-by" >Due by</label>
            <input type="text" id="due-by" name="due-by" value="<?php echo isset($booking_notes) ? $booking_notes["due-by"] : ""; ?>" >
        </div>
        <div class="input-label-wrapper" >
            <label for="reference" >Reference</label>
            <input type="text" id="reference" name="reference" value="<?php echo isset($booking_notes) ? $booking_notes["reference"] : ""; ?>" >
        </div>
        <div class="input-label-wrapper" >
            <label for="order-number" >Order number</label>
            <input type="text" id="order-number" name="order-number" value="<?php echo isset($booking_notes) ? $booking_notes["order-number"] : ""; ?>" >
        </div>
    </div>
    <div class="form-row" >
        <div class="input-label-wrapper" >
            <label for="booking-description" >Booking description</label>
            <textarea id="booking-description" name="booking-description" >
                <?php echo isset($booking_notes) ? $booking_notes["booking-description"] : ""; ?>
            </textarea>
        </div>
    </div>
</form>
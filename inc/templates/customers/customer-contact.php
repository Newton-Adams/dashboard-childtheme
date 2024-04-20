<form id="contact-fields" >
    <div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex mb-0">
        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
            <h3 class="mb-3">Contact 1</h3>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="first-name-1" >First Name</label>
                    <input type="text" id="first-name-1" name="first-name-1" value="<?= isset($contacts["first-name-1"]) ? $contacts["first-name-1"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="last-name-1" >Last Name</label>
                    <input type="text" id="last-name-1" name="last-name-1" value="<?= isset($contacts["last-name-1"]) ? $contacts["last-name-1"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="email-1" >Email</label>
                    <input type="email" id="email-1" name="email-1" value="<?= isset($contacts["email-1"]) ? $contacts["email-1"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="cell-number-1" >Cell number</label>
                    <input type="tel" id="cell-number-1" name="cell-number-1" value="<?= isset($contacts["cell-number-1"]) ? $contacts["cell-number-1"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="additional-number-1" >Additional cell number (Whatsapp)</label>
                    <input type="text" id="additional-number-1" name="additional-number-1" value="<?= isset($contacts["additional-number-1"]) ? $contacts["additional-number-1"] : ''; ?>" >
                </div>
            </div>
        </div>
        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
            <h3 class="mb-3">Contact 2</h3>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="first-name-2" >First Name</label>
                    <input type="text" id="first-name-2" name="first-name-2" value="<?= isset($contacts["first-name-2"]) ? $contacts["first-name-2"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="last-name-2" >Last Name</label>
                    <input type="text" id="last-name-2" name="last-name-2" value="<?= isset($contacts["last-name-2"]) ? $contacts["last-name-2"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="email-2" >Email</label>
                    <input type="email" id="email-2" name="email-2" value="<?= isset($contacts["email-2"]) ? $contacts["email-2"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="cell-number-2" >Cell number</label>
                    <input type="tel" id="cell-number-2" name="cell-number-2" value="<?= isset($contacts["cell-number-2"]) ? $contacts["cell-number-2"] : ''; ?>" >
                </div>
            </div>
            <div class="form-row" >
                <div class="input-label-wrapper fw-100" >
                    <label for="additional-number-2" >Additional cell number (Whatsapp)</label>
                    <input type="text" id="additional-number-2" name="additional-number-2" value="<?= isset($contacts["additional-number-2"]) ? $contacts["additional-number-2"] : ''; ?>" >
                </div>
            </div>
        </div>
    </div>
</form>
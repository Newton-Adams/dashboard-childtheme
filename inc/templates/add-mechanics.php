<?php
// do_action( 'generate_before_main_content' ); 

?>
<div class="add-staff-outer" >
    <h3>Add staff members</h3>
    <form id="add-staff" >
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="name-0" >Staff member name</label>
                <input type="text" id="name-0" name="name-0" >
            </div>
            <div class="input-label-wrapper" >
                <label for="contact-number-0" >Contact number</label>
                <input type="text" id="contact-number-0" name="contact-number-0" >
            </div>
            <div class="input-label-wrapper" >
                <label for="role-0" >Role</label>
                <input type="text" id="role-0" name="role-0" >
            </div>
        </div>
    </form>
    <div class="add-row-button-outer" >
        <button class="add-row-button" type="button" >
            <span>Add New Technician</span>
        </button>
    </div>
</div>
<div class="forms-container" >
    <button id="save-post" class="technicians-save" >Save</button>
    <?php 
    //Get existing mechanics
    $existing_mechanics = json_decode(get_user_meta( um_profile_id(),  'mechanics' )[0]);
    echo '<pre>',print_r($existing_mechanics,1),'</pre>';
    echo '<pre>',print_r(get_user_meta( um_profile_id(), 'mechanics' ),1),'</pre>'; 
    ?>
</div>

<?php
//Save form shortcode
add_shortcode('post_form','save_form_callback');
function save_form_callback() {
    ob_start();
    echo '<form name="job-fields" >
            <input type="text" name="Title" placeholder="Give Title" >
            <input type="text" name="Customer" placeholder="Give Customer" >
         </form>
         
         <button id="save-button" >Save</button>
         <br>
         <select id="select-customer" >
            <option class="default" >Select Customer</option>
         </select>';
    return ob_get_clean();
}
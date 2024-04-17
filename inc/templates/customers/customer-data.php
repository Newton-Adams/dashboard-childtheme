<?php
//Conrol object
$Controls = array(
   "save" => true,
   "job_number" => true,
   "status" => true,
   "invoice" => true,
   "send" => true,
   "cancel" => true,
   "change_warning" => true
);

$user_id = get_current_user_id();

//Url param - edit id & edit status
isset($_GET['edit']) ? $customer_edit_id = $_GET['edit'] : $customer_edit_id = "";
$editing = "";
    
if(isset($customer_edit_id)) {

    $editing = "editing";

    
    !empty(get_post_meta($customer_edit_id, 'notes', true) ) && $notes = json_decode(get_post_meta($customer_edit_id, 'notes', true)); 

    !empty(get_post_meta($customer_edit_id, 'details', true) ) && parse_str(get_post_meta($customer_edit_id, 'details', true),$details); 

    !empty(get_post_meta($customer_edit_id, 'vehicles', true) ) && parse_str(get_post_meta($customer_edit_id, 'vehicles', true),$vehicles); 

    !empty(get_post_meta($customer_edit_id, 'contacts', true) ) && parse_str(get_post_meta($customer_edit_id, 'contacts', true),$contacts); 

} 


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

    !empty(get_post_meta($customer_edit_id, 'customer_notes', true) ) && $notes = json_decode(get_post_meta($customer_edit_id, 'customer_notes', true)); 

    !empty(get_post_meta($customer_edit_id, 'customer_details', true) ) && parse_str(get_post_meta($customer_edit_id, 'customer_details', true),$customer_details); 

    !empty(get_post_meta($customer_edit_id, 'customer_vehicles', true) ) && parse_str(get_post_meta($customer_edit_id, 'customer_vehicles', true),$customer_vehicles); 

    !empty(get_post_meta($customer_edit_id, 'company_details', true) ) && parse_str(get_post_meta($customer_edit_id, 'company_details', true),$company_details); 

} 


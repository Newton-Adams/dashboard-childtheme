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
    
    //Vehicle Data
    // if(!empty( get_post_meta($job_edit_id, 'vehicle-data', true) )) {
    //     $vehicle_json = get_post_meta($job_edit_id, 'vehicle-data', true);
    //     $vehicle = json_decode($vehicle_json);
    // } 

    // !empty(get_post_meta($job_edit_id, 'parts', true) ) && $parts = json_decode(get_post_meta($job_edit_id, 'parts', true)); 

    // !empty(get_post_meta($job_edit_id, 'notes', true) ) && parse_str(get_post_meta($job_edit_id, 'notes', true),$job_notes); 

} 


<?php
$status_options = array( 
   "draft" => "Draft",
   "complete" => "Complete",
   "invoice" => "Invoice",
   "quote" => "Quote",  
);

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
$job_count = get_user_meta($user_id, 'job_number', true) !== null ? (int)esc_attr(get_user_meta($user_id, 'job_number', true)) + 1 : 0; 

//Url param - edit id & edit status
isset($_GET['edit']) ? $job_edit_id = $_GET['edit'] : $job_edit_id = "";
$editing = "";
    
//Url param - edit id & edit status
get_user_meta($user_id, 'mechanics', true) && $mechanic_options = json_decode(get_user_meta($user_id, 'mechanics', true));
// $mechanic_options = array();
    
if(isset($job_edit_id)) {

    $editing = "editing";
    
    //Job Attachments
    !empty(get_post_meta($job_edit_id, 'attachments', true) ) && $attachments = get_post_meta($job_edit_id, 'attachments', true); 
    if(!empty($attachments)) {
        $attchments_decoded = json_decode($attachments);
        $existingAttachments = array();
        foreach ($attchments_decoded as $key => $attachment) {
            array_push($existingAttachments,$attachment);
        }
    }
    
    //Customer Name & Data    
    if(!empty(get_post_meta($job_edit_id, 'customer-data', true) )) { 
        $customer_data = get_post_meta($job_edit_id, 'customer-data', true); 
        $customer_data_decoded = json_decode( $customer_data );
    }
    
    //Vehicle Data
    if(!empty( get_post_meta($job_edit_id, 'vehicle-data', true) )) {
        $vehicle_json = get_post_meta($job_edit_id, 'vehicle-data', true);
        $vehicle = json_decode($vehicle_json);
    } 

    !empty(get_post_meta($job_edit_id, 'parts', true) ) && $parts = json_decode(get_post_meta($job_edit_id, 'parts', true)); 

    !empty(get_post_meta($job_edit_id, 'labour', true) ) && $labour = json_decode(get_post_meta($job_edit_id, 'labour', true));

    if( !empty(get_post_meta($job_edit_id, 'mechanics', true) ) )  {
        $mechanics = get_post_meta( $job_edit_id, 'mechanics', true );
        $mechanics_decoded = explode( ",", json_decode( $mechanics ) );
    }

    !empty(get_post_meta($job_edit_id, 'notes', true) ) && parse_str(get_post_meta($job_edit_id, 'notes', true),$job_notes); 

    !empty(get_post_meta($job_edit_id, 'booking-notes', true) ) && parse_str(get_post_meta($job_edit_id, 'booking-notes', true),$booking_notes); 

    !empty(get_post_meta($job_edit_id, 'status', true) ) && $status = get_post_meta($job_edit_id, 'status', true); 

    !empty(get_post_meta($job_edit_id, 'grand-total', true) ) && $grand_total = get_post_meta($job_edit_id, 'grand-total', true); 

} 


<?php
$status_options =array( 
   "draft" => "Draft",
   "complete" => "Complete",
   "invoice" => "Invoice",
   "quote" => "Quote",  
);

//Conrol object
$Controls = array(
   "save" => true,
   "status" => true,
   "invoice" => true,
   "send" => true,
   "cancel" => true,
   "change_warning" => true
);

//Url param - edit id
isset($_GET['edit']) ? $job_edit_id = $_GET['edit'] :  $job_edit_id = "";


if(isset($job_edit_id)) {
    
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
    !empty(get_post_meta($job_edit_id, 'customer-data', true) ) && $customer_data = get_post_meta($job_edit_id, 'customer-data', true); 
    $customer_data_decoded = json_decode( $customer_data );
    echo '<pre>',print_r($customer_data_decoded->{'customer-name'},1),'</pre>';
    foreach ($customer_data_decoded as $key => $data) {        
        echo '<pre>',print_r($data,1),'</pre>';
    }
    
    !empty(get_post_meta($job_edit_id, 'vehicle-data', true) ) && $vehicle = json_decode(get_post_meta($job_edit_id, 'vehicle-data', true)); 
    echo '<pre>',print_r($vehicle,1),'</pre>';
    
    !empty(get_post_meta($job_edit_id, 'parts', true) ) && $parts = json_decode(get_post_meta($job_edit_id, 'parts', true)); 
    echo '<pre>',print_r($parts,1),'</pre>';

    !empty(get_post_meta($job_edit_id, 'labour', true) ) && $labour = json_decode(get_post_meta($job_edit_id, 'labour', true)); 
    echo '<pre>',print_r($labour,1),'</pre>';

    !empty(get_post_meta($job_edit_id, 'booking-notes', true) ) && parse_str(get_post_meta($job_edit_id, 'booking-notes', true),$booking_notes); 
    echo '<pre>',print_r($booking_notes,1),'</pre>';

} 


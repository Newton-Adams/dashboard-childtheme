<?php
//Save & update job posts
add_action('wp_ajax_post_jobs', 'handle_job_ajax_form');
add_action('wp_ajax_nopriv_post_jobs', 'handle_job_ajax_form');
function handle_job_ajax_form() {    
    
    //Job number & related posts
    isset($_POST['job_number']) && $job_number = strip_tags($_POST['job_number']);

    //Labour Data
    isset($_POST['labour_data']) && $labour_data = strip_tags( json_encode($_POST['labour_data']) );

    //Parts Data
    isset($_POST['parts_data']) && $parts_data = strip_tags( json_encode($_POST['parts_data']) );
    
    //Parts Data
    isset($_POST['job_notes']) && $job_notes = strip_tags( $_POST['job_notes'] );
  
    //Add/update the post
    $job_args = array(
        'post_type' => 'jobs',
        'post_title'    => $job_number,
        'post_status'   => 'publish',
        'post_author'   => 1,
    );
    
    //Create or edit post
    $job_id = (int)wp_insert_post( $job_args );

    // Check if the post was successfully inserted
    if ( !is_wp_error($post_id) && $job_id > 0 ) {
        
        //Create/update job labour meta
        add_post_meta($job_id, 'labour', $labour_data, true);

        //Create/update job labour meta
        add_post_meta($job_id, 'parts', $parts_data, true);
      
        //Create/update job labour meta
        add_post_meta($job_id, 'attachments_notes', $job_notes, true);

    } 

    if(wp_doing_ajax()) die();
}

//Save & update customer posts
add_action('wp_ajax_post_customers', 'handle_customer_ajax_form');
add_action('wp_ajax_nopriv_post_customers', 'handle_customer_ajax_form');
function handle_customer_ajax_form() {   
    
    //Customer Name
    isset($_POST['customer-name']) && $customer_name = strip_tags($_POST['customer-name']);

    //Details Data
    isset($_POST['customer-details']) && $details = strip_tags( json_encode($_POST['customer-details']) );
 
    //Contact Data
    isset($_POST['customer-contacts']) && $contacts = strip_tags( json_encode($_POST['customer-contacts']) );
    //Add/update the post
    $customer_args = array(
        'post_type' => 'customers',
        'post_title'    => $customer_name,
        'post_status'   => 'publish',
        'post_author'   => 1,
    );
    
    //Create or edit post
    $customer_id = (int)wp_insert_post( $customer_args );

    // Check if the post was successfully inserted
    if ( !is_wp_error($post_id) && $customer_id > 0 ) {
        
        //Create/update customer details meta
        add_post_meta($customer_id, 'details', $details, true);
        
        //Create/update customer contact meta
        add_post_meta($customer_id, 'contacts', $contacts, true);

    } 

    if(wp_doing_ajax()) die();
}


//Update custome post type with csv upload
add_action('wp_ajax_insert_csv_customers', 'insert_csv_customers');
add_action('wp_ajax_nopriv_insert_csv_customers', 'insert_csv_customers');
function insert_csv_customers() {   
    
    //Customer Name
    isset($_POST['csv-customer-data']) && $customer_data = $_POST['csv-customer-data'];
   
    foreach ($customer_data as $key => $row) {  
  
        // Add/update the post
        $customer_args = array(
            'post_type' => 'customers',
            'post_title'    => $row[0],
            'post_status'   => 'publish',
            'post_author'   => 1,
        );
        //Create or edit post
        $customer_id = (int)wp_insert_post( $customer_args );
    }
    
    if(wp_doing_ajax()) die();
}

//Update Mechanics
add_action('wp_ajax_insert_mechanics', 'insert_mechanics');
add_action('wp_ajax_nopriv_insert_mechanics', 'insert_mechanics');
function insert_mechanics() {   
    //Get existing mechanics
    $existing_mechanics = json_decode(get_user_meta( um_profile_id(),  'mechanics' )[0]);
    
    //Mechanics Data
    isset($_POST['mechanics-data']) && $mechanics_data = strip_tags( json_encode($_POST['mechanics-data']) );
    
    //Combine existing & new mechanics
    $updated_mechanics = array();
    foreach ($existing_mechanics as $key => $mechanic) {
        array_push($updated_mechanics,$mechanic);
    }
    foreach (json_decode($mechanics_data) as $key => $mechanic) {
        array_push($updated_mechanics,$mechanic);
    }
   
    update_user_meta( um_profile_id(), 'mechanics', json_encode($updated_mechanics) );    

    if(wp_doing_ajax()) die();
}

add_action('wp_ajax_upload_attachment', 'upload_attachment');
add_action('wp_ajax_nopriv_upload_attachment', 'upload_attachment');
//Upload Attachments
function upload_attachment() {
    
    //Attachment Data
    if (isset($_FILES['attachment'])) {
        global $wpdb;
        $attachment = $_FILES['attachment'];

        $upload = wp_upload_bits($attachment['name'], null, file_get_contents($attachment['tmp_name']));
        $attachment_url = $upload['file'];
        $attachment_tmp_name = json_encode(base64_encode(file_get_contents($attachment['tmp_name'])));
        $attachmentJSONNew = json_encode(array(
            array($attachment['name'], $attachment_tmp_name, $attachment_url)
        ));
        echo $attachmentJSONNew;
        // echo '<tr>
        // <td>
        // <a href="'.$upload['url'].'" target="_blank" >'.$attachment['name'].'</a>
        //         <input type="hidden" class="hidden-attachment-values" name="hidden-attachment" value="'.json_encode($attachmentJSONNew).'" >
        //         </td>
        //         <td class="delete" attachment_id="'.$attachment_url.'" >
        //             <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        //                 <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path>
        //                 <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path>
        //                 <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path>
        //                 <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path>
        //             </svg>
        //         </td>
        //       </tr>';
    } else {
        wp_send_json_error(array('message' => 'No file uploaded'));
    }
    
    wp_die();
}

//Update Mechanics
add_action('wp_ajax_delete_file', 'delete_file');
add_action('wp_ajax_nopriv_delete_file', 'delete_file');
function delete_file() {   
    
    //Mechanics Data
    isset($_POST['file_url']) && $file_url = strip_tags( $_POST['file_url'] ); 
    unlink($file_url);
 
    if(wp_doing_ajax()) die();
}
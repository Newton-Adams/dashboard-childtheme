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
        echo '<table id="attachment-files" >
                <thead><tr><th>Name</th><th>Delete</th></tr></thead>
                <tbody>
                    <tr><td attachment_id="'.$attachment_url.'" >'.$attachment['name'].'</td><td class="delete" >Bin</td></tr>
                </tbody>
            </table>';
            unlink('C:\Users\webworx\Local Sites\workshop-pro\app\public/wp-content/uploads/2024/02/Logo-test.png');
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
    isset($_POST['file_url']) && $file_url = strip_tags( json_encode($_POST['file_url']) ); 
    unlink($file_url);

    if(wp_doing_ajax()) die();
}
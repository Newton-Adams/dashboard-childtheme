<?php
//Save & update job posts
add_action('wp_ajax_post_jobs', 'handle_job_ajax_form');
add_action('wp_ajax_nopriv_post_jobs', 'handle_job_ajax_form');
function handle_job_ajax_form() {    
    
    //Existing Job ID
    isset($_POST['existing-job-id']) && $existing_job_id = (int)strip_tags($_POST['existing-job-id']);

    //Job number & related posts
    isset($_POST['job-number']) && $job_number = strip_tags($_POST['job-number']);

    //Labour Data
    isset($_POST['labour-data']) && $labour_data = strip_tags( json_encode($_POST['labour-data']) );

    //Parts Data
    isset($_POST['parts-data']) && $parts_data = strip_tags( json_encode($_POST['parts-data']) );
    
    //Notes
    isset($_POST['job-notes']) && $job_notes = strip_tags( $_POST['job-notes'] );
    
    //Attachments
    isset($_POST['attachments']) && $attachments = strip_tags( $_POST['attachments'] );
    
    //Customer
    isset($_POST['customer-data']) && $customer_data = strip_tags( $_POST['customer-data'] );
    
    //VIN
    isset($_POST['vin']) && $vin = strip_tags( $_POST['vin'] );
    
    //Registration
    isset($_POST['registration']) && $registration = strip_tags( $_POST['registration'] );
    
    //Vehicle
    isset($_POST['vehicle-data']) && $vehicle_data = strip_tags( $_POST['vehicle-data'] );

    //Booking Fields
    isset($_POST['booking-fields']) && $booking_fields = strip_tags( $_POST['booking-fields'] );
     
    //Add/update the post
    $job_args = array(
        'post_type' => 'jobs',
        'post_title'    => $job_number,
        'post_status'   => 'publish',
        'post_author'   => 1,
    );
   
    //Create or edit post
    echo $existing_job_id;
    if($existing_job_id == 0) {
        $job_id = (int)wp_insert_post( $job_args );
    }
    
    // Check if the post was successfully inserted
    if ( !is_wp_error($post_id) && $job_id > 0 ) {
        echo 'inserted';
        //Create/update job labour meta
        add_post_meta($job_id, 'labour', $labour_data, true);
        
        //Create/update job part meta
        add_post_meta($job_id, 'parts', $parts_data, true);
        
        //Create/update job note meta
        add_post_meta($job_id, 'notes', $job_notes, true);
        
        //Create/update job attachments meta
        add_post_meta($job_id, 'attachments', $attachments, true);
        
        //Create/update job vin meta
        add_post_meta($job_id, 'customer-data', $customer_data, true);
        
        //Create/update job vin meta
        add_post_meta($job_id, 'vin', $vin, true);
        
        //Create/update job vin meta
        add_post_meta($job_id, 'vehicle-data', $vehicle_data, true);
        
        //Create/update job registration meta
        add_post_meta($job_id, 'registration', $registration, true);
        
        //Create/update job registration meta
        add_post_meta($job_id, 'booking-notes', $booking_fields, true);
        
    } 
    if( $existing_job_id != 0 ) {
        echo 'update';
        //Create/update job labour meta
        update_post_meta($existing_job_id, 'labour', $labour_data);

        //Create/update job part meta
        update_post_meta($existing_job_id, 'parts', $parts_data);
      
        //Create/update job note meta
        update_post_meta($existing_job_id, 'notes', $job_notes);
        
        //Create/update job attachments meta
        update_post_meta($existing_job_id, 'attachments', $attachments);
        
        //Create/update job vin meta
        update_post_meta($existing_job_id, 'customer-data', $customer_data);
        
        //Create/update job vin meta
        update_post_meta($existing_job_id, 'vin', $vin);
        
        //Create/update job vin meta
        update_post_meta($existing_job_id, 'vehicle-data', $vehicle_data);
        
        //Create/update job registration meta
        update_post_meta($existing_job_id, 'registration', $registration);
        
        //Create/update job registration meta
        add_post_meta($existing_job_id, 'booking-notes', $booking_fields);

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

    //Vehicle Data
    isset($_POST['customer-vehicles']) && $vehicles = strip_tags( json_encode($_POST['customer-vehicles']) );
    
    //Notes Data
    isset($_POST['customer-notes']) && $notes = strip_tags( json_encode($_POST['customer-notes']) );

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
        
        //Create/update customer vehicles meta
        add_post_meta($customer_id, 'vehicles', $vehicles, true);
        
        //Create/update customer notes meta
        add_post_meta($customer_id, 'notes', $notes, true);
        
        echo '<pre>',print_r($note,1),'</pre>';
    } 

    if(wp_doing_ajax()) die();
}


//Update customer post type with csv upload
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
        $attachmentJSONNew = json_encode(array(
            array($attachment['name'], $attachment['tmp_name'], $attachment_url)
        ));
        echo $attachmentJSONNew;
    } else {
        wp_send_json_error(array('message' => 'No file uploaded'));
    }
    
    if(wp_doing_ajax()) die();
}

//Delete File
add_action('wp_ajax_delete_file', 'delete_file');
add_action('wp_ajax_nopriv_delete_file', 'delete_file');
function delete_file() {   
    
    isset($_POST['file_url']) && $file_urls = explode(',',strip_tags( $_POST['file_url'] )); 
    foreach ($file_urls as $key => $file_url) {
        unlink($file_url);
    }
 
    if(wp_doing_ajax()) die();
}

//Get Jobs for Jobs Dashboard
add_action('wp_ajax_get_all_jobs', 'get_all_jobs');
add_action('wp_ajax_nopriv_get_all_jobs', 'get_all_jobs');
function get_all_jobs() {

    //Current USer
    $loggedInUser = get_current_user();

    $args = array(
        'post_type' => 'jobs',
        'numberposts' => -1,
        'author' => $loggedInUser,
    );
    $jobs = get_posts($args);

    $job_data = array();

    foreach ($jobs as $key => $job) {
        $job_data[$key] = array(
            "name" => "Customer name",
            "date" => "03/0".($key + 2)."/2024",
            "job_no" => $job->post_title,
            "vehicle" => "Mazda",
            "registration" => "CAA 123 456",
            "status" => "<span class='status-light' ></span>Complete",
            "notes" => get_post_meta($job->ID, 'notes', true),
            "total" => "R1234",
            "actions" => "<span class='action-ellipses' ><span></span><span></span><span></span></span>
                          <ul style='display:none;' >
                              <li><a href=".home_url()."/jobs/?edit=".$job->ID." >Edit</a></li>
                              <li>Delete</li>
                              <li>Send Quote</li>
                              <li>Send Invoice</li>
                          </ul>",
        );
    };

    // Send JSON response
    echo json_encode($job_data);

    wp_die();
}

//Get Jobs Content
add_action('wp_ajax_get_job_content', 'get_job_content');
add_action('wp_ajax_nopriv_get_job_content', 'get_job_content');
function get_job_content() {
    
    //Current USer
    $loggedInUser = get_current_user();
    $notes = "";

    if(isset($_POST['job_id'])) { 
        $notes = get_post_meta((int)$_POST['job_id'] , 'notes', true);
        $vehicle_data = get_post_meta((int)$_POST['vehicle_data'] , 'vehicles', true);
    }
    echo '<pre>',print_r($vehicle_data),'</pre>';
    $expanded_content = '
        <div>
            <div class="address" > 
                <p>
                    101 Beach Paradise Way
                    Durban, 10118
                </p>
            </div>
            <div class="contacts" >
                <p>
                    082 345 6789
                    lance@domain.com
                </p> 
            </div>
            <p class="vin" ><strong>VIN</strong>1234567890123</p>
            <p class="vehicle" ><strong>VEHICLE YR:</strong> BMW Z5 2015</p>
            <div>
                <div>
                    <p>Customer Notes</p>
                    <p>'.$notes.'</p>
                </div>
                <div>
                    <p>Job History</p>
                </div>
            </div>
        </div>        
    ';
    
    echo $expanded_content;

    wp_die();
}


// Profile Form
function profile_form() {
    
    $user = wp_get_current_user();
    $user_avatar = get_avatar_url( $user->ID, array( 'size' => 48 ) );
    $user_name = $user->display_name;
    $user_id = get_current_user_id();
    $company_name = esc_attr(get_user_meta($user_id, 'company_name', true));
    $firstname = esc_attr(get_user_meta($user_id, 'first_name', true));
    $lastname = esc_attr(get_user_meta($user_id, 'last_name', true));
    $user_email = esc_attr( wp_get_current_user()->user_email );
    $user_phone = esc_attr(get_user_meta($user_id, 'cell_number', true));
    $userWhatsAppNumber = esc_attr(get_user_meta($user_id, 'whatsapp_number', true));
    $userAddress = esc_attr(get_user_meta($user_id, 'address', true));
    $vatNumber = esc_attr(get_user_meta($user_id, 'vat_number', true));
    $companyRegistrationNumber = esc_attr(get_user_meta($user_id, 'company_registration_number', true));


    // todo: handle profile picture upload
    // if (isset($_FILES['profile_picture'])) {
    //     $user_id = get_current_user_id();
    //     $file = $_FILES['profile_picture'];

    //     if (!empty($file['name'])) {
    //         $upload_overrides = array('test_form' => false);
    //         $uploaded_file = wp_handle_upload($file, $upload_overrides);

    //         if (isset($uploaded_file['url'])) {
    //             // Add the image to the media library
    //             $file_path = $uploaded_file['file'];
    //             $file_name = basename($file_path);
    //             $attachment = array(
    //                 'guid'           => $uploaded_file['url'],
    //                 'post_mime_type' => $uploaded_file['type'],
    //                 'post_title'     => preg_replace('/\.[^.]+$/', '', $file_name),
    //                 'post_content'   => '',
    //                 'post_status'    => 'inherit'
    //             );
    //             $attach_id = wp_insert_attachment($attachment, $file_path);

    //             // Set user's avatar to the uploaded image
    //             if (!is_wp_error($attach_id)) {
    //                 update_user_meta($user_id, 'profile_picture_attachment_id', $attach_id);
    //                 set_post_thumbnail($attach_id, $attach_id);
    //             }
    //         }
    //     }
    // }

    if ( isset($_POST['formData']) ) {
        parse_str($_POST['formData'], $form_data);
        
        foreach ($form_data as $key => $value) {
            if ( isset($value) ) {
                update_user_meta($user_id, $key, $value);
            }
        }
        echo 'success';
    }

    ?>

    <form id="profile-form" class="form" action="" method="post">
    
        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- Profile Image and Company name -->
        <div class="form-row">
            <div class="input-label-wrapper" >
                <div class="profile-form-header d-flex flex-align-center">
                    <div class="d-flex flex-align-center">
                        <div class="profile-image">
                            <?php 
                            if ( $user_avatar ) {
                                echo '<img src="' . esc_url( $user_avatar ) . '" />';
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/default-avatar.png" />';
                            }
                            ?>
                        </div>
                        <div class="">
                            <div class="profile-name"><?php echo $company_name; ?></div>
                            <div class="upload-note">PNG or JPG no bigger than 1000px wide and tall.</div>
                        </div>
                    </div>

                    <div class="image-uploader">
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/png, image/jpeg">
                        <label for="profile_picture" class="custom-file-upload d-flex flex-align-center">
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.375 6.55984C0.582107 6.55984 0.75 6.71289 0.75 6.90169V9.29466C0.75 9.67226 1.08579 9.97837 1.5 9.97837H10.5C10.9142 9.97837 11.25 9.67226 11.25 9.29466V6.90169C11.25 6.71289 11.4179 6.55984 11.625 6.55984C11.8321 6.55984 12 6.71289 12 6.90169V9.29466C12 10.0499 11.3284 10.6621 10.5 10.6621H1.5C0.671573 10.6621 0 10.0499 0 9.29466V6.90169C0 6.71289 0.167893 6.55984 0.375 6.55984Z" fill="#18181A"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.74999 4.40859C3.89644 4.5421 4.13388 4.5421 4.28032 4.40859L5.99999 2.84093L7.71967 4.40861C7.86611 4.54211 8.10355 4.54211 8.24999 4.40861C8.39644 4.27511 8.39644 4.05866 8.24999 3.92516L6.26516 2.11575C6.11871 1.98225 5.88128 1.98225 5.73483 2.11575L3.74999 3.92514C3.60355 4.05864 3.60355 4.27509 3.74999 4.40859Z" fill="#18181A"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2.4576C6.20711 2.4576 6.375 2.61066 6.375 2.79946V8.2691C6.375 8.4579 6.20711 8.61095 6 8.61095C5.79289 8.61095 5.625 8.4579 5.625 8.2691V2.79946C5.625 2.61066 5.79289 2.4576 6 2.4576Z" fill="#18181A"/>
                            </svg> 
                            <div class="caption mb-0">Upload</div>
                        </label>
                    </div>
                </div>

            </div> 
        </div>

        <h5 class="mb-0">Business information</h5>

        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- First name -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="company_name" >Company name</label>
                <input type="text" name="company_name" id="company_name" value="<?= $company_name; ?>" class="required" />
            </div>
        </div>

        <!-- Last name -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="first_name" >First name</label>
                <input type="text" name="first_name" id="first_name" value="<?= $firstname; ?>" placeholder="Firstname" class="required"  />
            </div>
            <div class="input-label-wrapper" >
                <label for="last_name" >Last name</label>
                <input type="text" name="last_name" id="last_name" value="<?= $lastname ?>" placeholder="Lastname" class="required"  />
            </div>
        </div>

        <!-- Email, Cell number, Whatsapp number -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="email" >Email</label>
                <input type="email" name="email" id="email" value="<?= $user_email ?>" placeholder="Placeholder" class="required"  />
            </div>
            <div class="input-label-wrapper" >
                <label for="cellnumber" >Cell number</label>
                <input type="text" name="cell_number" id="cell_number" value="<?= $user_phone ?>" class="required" />
            </div>
            <div class="input-label-wrapper" >
                <label for="whatsapp_number" >WhatsApp number</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" value="<?= $userWhatsAppNumber ?>" class="required" />
            </div>
        </div>

        <!-- Address -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="address" >Address</label>
                <input type="text" name="address" id="address" value="<?= $userAddress ?>" placeholder="Placeholder" class="required" />
            </div>
        </div>

        <!-- VAT number, Company registration number -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="vat_number" >VAT number (Optional)</label> 
                <input type="text" name="vat_number" id="vat_number" value="<?= $vatNumber ?>" placeholder="Placeholder" /> 
            </div>
            <div class="input-label-wrapper" >
                <label for="company_registration_number" >Company registration number (Optional)</label>
                <input type="text" name="company_registration_number" id="company_registration_number" value="<?= $companyRegistrationNumber ?>" placeholder="Placeholder" /> 
            </div>
        </div>
    
        <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- Save button -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
                    <div class="wp-block-button">
                        <input type="submit" name="update_info" value="Save changes" class="wp-block-button__link wp-element-button" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php 
    
    if(wp_doing_ajax()) {
        die();
    };

}
add_action('wp_ajax_update_profile', 'profile_form');
add_action('wp_ajax_nopriv_update_profile', 'profile_form');

//Fetch Searched Customers
add_action('wp_ajax_fetch_customers', 'fetch_customers');
add_action('wp_ajax_nopriv_fetch_customers', 'fetch_customers');
function fetch_customers() {
    //Fetch Customers based off of search
    if(isset($_POST['fetch_customers'])) { 
        $search_value = $_POST['fetch_customers'];
    } else {
        $search_value = '';
    }

    $args = array(
        'post_type' => 'customers',
        'numberposts' => -1,
        's' => $search_value
    );

    $customers = get_posts($args);
    
    //Sort data to pass back to JS
    $customer_data = array();
    foreach ($customers as $key => $customer) {
        $details = json_decode( get_post_meta($customer->ID, 'details', true) );
        $contacts = json_decode( get_post_meta($customer->ID, 'contacts', true) );

        $vehicles = get_object_vars( json_decode( get_post_meta($customer->ID, 'vehicles', true) ));

        //Vehicle data
        $VIN = key($vehicles);
        $vehicle_values = $vehicles[$VIN];

        $customer_data[$customer->ID] = array(
            "name" => $customer->post_title,
            "company-name" => $details[0]->{"company-name"},
            "email" => $contacts[2]->{"email-1"},
            "address" => $details[3]->{"email-1"} .','. $details[4]->{"suburb"} .','. $details[5]->{"city"},
            "address" => $details[3]->{"email-1"} .','. $details[4]->{"suburb"} .','. $details[5]->{"city"},
            "vin" => $VIN,
            "make" => $vehicle_values->make,
            "model" => $vehicle_values->model,
            "registration" => $vehicle_values->registration,
            "mileage" => $vehicle_values->mileage,
            "colour" => $vehicle_values->colour,
            "all-vehicle-values" => $vehicle_values,
        );
    }
    
    $customer_data = json_encode($customer_data);
    echo $customer_data;

    wp_die();
}

// Save Vehicle Data
add_action('wp_ajax_save_vehicle_data', 'save_vehicle_data');
add_action('wp_ajax_nopriv_save_vehicle_data', 'save_vehicle_data');


function save_vehicle_data() {
    if (isset($_POST['formData'])) {
        parse_str($_POST['formData'], $formFields); // Convert serialized form data to array

        if (isset($formFields['vehicle_make'])) {
            //Add/update the post
            $vehicle_args = array(
                'post_type' => 'vehicles',
                'post_title' => $formFields['vehicle_make'] . '-' . $formFields['vehicle_model'],
                'post_status' => 'publish',
                'post_author' => 1,
            );

            //Create or edit post
            $vehicle_id = (int) wp_insert_post($vehicle_args);

            // Check if the post was successfully inserted
            if (!is_wp_error($vehicle_id) && $vehicle_id > 0) {
                // Update post meta
                add_post_meta($vehicle_id, 'data', json_encode($formFields));
                add_post_meta($vehicle_id, 'attachments', json_encode($formFields['vehicle_attachments']));

                // Handle file upload
                // if (!empty($formFields['vehicle_attachments'])) {
                //     $attachment_id = vehicle_upload_attachment('vehicle_attachments', $vehicle_id);
                //     if ($attachment_id) {
                //         // Get attachment URL
                //         $attachment_url = wp_get_attachment_url($attachment_id);
                //         // Add attachment URL to meta field
                //         add_post_meta($vehicle_id, 'attachment_url', $attachment_url);
                //     }
                // }
            }
        }
    }

    if (wp_doing_ajax()) {
        die();
    }
}

<?php
add_action('wp_ajax_post_ajax_form', 'handle_post_ajax_form');
add_action('wp_ajax_nopriv_post_ajax_form', 'handle_post_ajax_form');
function handle_post_ajax_form() {
    $title = '';
    $customer = '';

    if(isset($_POST['form_data'])) {
        foreach ($_POST['form_data'] as $key => $meta) {
            foreach ($meta as $key => $value) {
               switch ($value) {
                case 'Title':
                    $title = $meta['value'];
                    break;
                case 'Customer':
                    $customer = $meta['value'];
                    break;                
                default:
                    break;
               }
            }
        }
    }
   
    //Add/update the post
    $job_args = array(
        'post_type' => 'reviews',
        'post_title'    => $title,
        'post_status'   => 'publish',
        'post_author'   => 1,
    );
    $job_id = (int)wp_insert_post( $job_args );

    // Check if the post was successfully inserted
    if (!is_wp_error($post_id) && $job_id > 0) {
        echo gettype($job_id);
        add_post_meta($job_id, 'customer', $customer, true);
    } 

    if(wp_doing_ajax()) die();
}

//Fetch jobs
add_action('wp_ajax_fetch_jobs', 'handle_fetch_jobs');
add_action('wp_ajax_nopriv_fetch_jobs', 'handle_fetch_jobs');
function handle_fetch_jobs() {
    $args= array(
        'numberposts' => -1,
        'post_status' => 'publish',
        'post_type' => 'reviews',
        'meta_key' => 'customer',
        'meta_value' => 'Chelsea',
        'meta_query' => array(
            array(
              'key'     => 'customer',
              'value'   => 'Chelsea',
            )
          ),
        );
    
    $customers = get_posts($args);
    foreach ($customers as $key => $value) {
        echo '<option>'.$value->post_title.'</option>';
    }

    if(wp_doing_ajax()) die();
}
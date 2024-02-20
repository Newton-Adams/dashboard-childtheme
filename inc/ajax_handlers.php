<?php
add_action('wp_ajax_post_jobs', 'handle_post_ajax_form');
add_action('wp_ajax_nopriv_post_jobs', 'handle_post_ajax_form');
function handle_post_ajax_form() {    
    
    //Job number & related posts
    isset($_POST['job_number']) && $job_number = strip_tags($_POST['job_number']);

    //Labour
    isset($_POST['form_data']) && $labour_data = strip_tags( json_encode($_POST['form_data']) );
  
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
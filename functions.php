<?php

include "inc/enqueue.php";
include "inc/shortcodes.php";
include "inc/post_types.php";
include "inc/ajax_handlers.php";

//Allow Shortcodes In Menus
add_filter( 'the_title', function( $title, $item_id ) {
    if ( 'nav_menu_item' === get_post_type( $item_id ) ) {
        return do_shortcode( $title );
    }
    return $title;
}, 10, 2 );

//Wrap Header Content
add_action('generate_after_header_content','header_content_wrap_before',10);
function header_content_wrap_before() {
    echo '<div class="header-scroll-content-outer" ><div class="header-scroll-content" >';
}
add_action('generate_after_header_content','header_content_wrap_after',100);
function header_content_wrap_after() {
    echo '</div>';
}

function custom_user_profile_fields( $user_contactmethods ) {
	$user_contactmethods['mechanics'] = 'Custom Field Label';
	return $user_contactmethods;
}
add_filter( 'user_contactmethods', 'custom_user_profile_fields' );

function display_custom_user_profile_fields( $user ) {
	?>
	<h3>Custom Fields</h3>
	<table class="form-table">
		<tr>
			<th><label for="custom_field_name">Mechanics</label></th>
			<td>
				<input type="text" name="custom_field_name" id="custom_field_name" value="<?php echo esc_attr( get_the_author_meta( 'mechanics', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Enter your custom field value.</span>
			</td>
		</tr>
        <tr>
            <th><label for="company_name">Company Name</label></th>
            <td><input type="text" name="company_name" id="company_name" value="<?php echo esc_attr(get_user_meta($user->ID, 'company_name', true)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="cell_number">Cell Number</label></th>
            <td><input type="tel" name="cell_number" id="cell_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'cell_number', true)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="whatsapp_number">Whatsapp Number</label></th>
            <td><input type="text" name="whatsapp_number" id="whatsapp_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'whatsapp_number', true)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="address">Address</label></th>
            <td><input type="text" name="address" id="address" value="<?php echo esc_attr(get_user_meta($user->ID, 'address', true)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="vat_number">VAT Number</label></th>
            <td><input type="text" name="vat_number" id="vat_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'vat_number', true)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="company_registration_number">Company Registration Number</label></th>
            <td><input type="text" name="company_registration_number" id="company_registration_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'company_registration_number', true)); ?>" class="regular-text" /></td>
        </tr>
	</table>
	<?php
}
add_action( 'show_user_profile', 'display_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'display_custom_user_profile_fields' );

function save_custom_user_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	update_user_meta( $user_id, 'mechanics', sanitize_text_field( $_POST['mechanics'] ) );
	update_user_meta($user_id, 'company_name', sanitize_text_field( $_POST['company_name']) ); 
	update_user_meta($user_id, 'cell_number', sanitize_text_field( $_POST['cell_number']) );
	update_user_meta($user_id, 'whatsapp_number', sanitize_text_field( $_POST['whatsapp_number']) );
	update_user_meta($user_id, 'address', sanitize_text_field( $_POST['address']) ); 
	update_user_meta($user_id, 'vat_number', sanitize_text_field( $_POST['vat_number']) );
	update_user_meta($user_id, 'company_registration_number', sanitize_text_field( $_POST['company_registration_number']) );

}
add_action( 'personal_options_update', 'save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_user_profile_fields' );



//Haynes Pro API
// function get_authentication_vrid() {

//     $url = 'https://www.haynespro-services.com/workshopServices3/rest/jsonendpoint/getAuthenticationVrid';
//     $username = 'webworx_dx_demo';
//     $password = 'ZVJwu3U6A00Q4zgu';
//     $unique_identifier = 'workshop-pro';

//     // Construct the query string
//     $query_string = http_build_query(array(
//         'distributorUsername' => $username,
//         'distributorPassword' => $password,
//         'username' => $unique_identifier
//     ));

//     try {
//         // Initialize cURL session
//         $ch = curl_init();

//         // Set cURL options
//         curl_setopt($ch, CURLOPT_URL, $url . '?' . $query_string);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//         // Execute the cURL request
//         $response = curl_exec($ch);

//         // Check for errors
//         if($response === false) {
//             throw new Exception('Error fetching data: ' . curl_error($ch));
//         }

//         // Decode the JSON response
//         $result = json_decode($response, true);

// 		//Fetch test data
// 		//Get request
// 		$url_test = 'http://www.haynespro-services.com/workshopServices3/rest/jsonendpoint/getMaintenanceTasksV7?vrid='.$result["vrid"].'&descriptionLanguage=en&carTypeId=319001025&repairtimesTypeId=120226&rtTypeCategory=CAR&systemId=319003435&periodId=319062051&includeSmartLinks=true&includeServiceTimes=true&maintenanceBasedType=SUBJECT_BASED';
// 		$username_test = 'webworx_dx_demo';
// 		$password_test = 'ZVJwu3U6A00Q4zgu';
// 		$unique_identifier_test = 'workshop-pro';
	
// 		// Construct the query string
// 		$query_string_test = http_build_query(array(
// 			'distributorUsername' => $username_test,
// 			'distributorPassword' => $password_test,
// 			'username' => $unique_identifier_test
// 		));
// 		//  Set cURL options
// 		 curl_setopt($ch, CURLOPT_URL, $url_test . '?' . $query_string_test);
// 		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
// 		 $response_test = curl_exec($ch);
	
// 		 // Check for errors
// 		 if($response_test === false) {
// 			throw new Exception('Error fetching data: ' . curl_error($ch));
// 		}
// 		echo '<pre>',print_r(json_decode($response_test),1),'</pre>';

//         // Close cURL session
//         curl_close($ch);
		
//         return $result['vrid']; // Assuming 'vrid' is the key for the VRID in the JSON response
//     } catch (Exception $e) {
//         return 'Error: ' . $e->getMessage(); // Handle errors appropriately
//     }
// }

// add_action('wp_ajax_nopriv_get_authentication_vrid', 'get_authentication_vrid');
// add_action('wp_ajax_get_authentication_vrid', 'get_authentication_vrid');

remove_action( 'um_main_profile_fields', 'um_add_profile_fields', 100 );

function um_add_profile_fields_replace( $args ) {

	echo UM()->fields()->display( 'profile', $args );

}
add_action( 'um_main_profile_fields', 'um_add_profile_fields_replace', 100 );

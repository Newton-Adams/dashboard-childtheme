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
			<th><label for="custom_field_name">Custom Field Label</label></th>
			<td>
				<input type="text" name="custom_field_name" id="custom_field_name" value="<?php echo esc_attr( get_the_author_meta( 'mechanics', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Enter your custom field value.</span>
			</td>
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
}
add_action( 'personal_options_update', 'save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_user_profile_fields' );
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
    echo '<div class="header-scroll-content" >';
}
add_action('generate_after_header_content','header_content_wrap_after',100);
function header_content_wrap_after() {
    echo '</div>';
}
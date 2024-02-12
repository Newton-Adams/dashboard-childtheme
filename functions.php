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
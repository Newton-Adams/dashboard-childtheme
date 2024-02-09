<?php
//enqueue js
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'workshop_pro', get_stylesheet_directory_uri(). '/js/min/build.min.js' , array('jquery'), true );
	wp_localize_script(
		'workshop_pro',
		'workshop_pro_obj',
		array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
	);
} );

//admin styles
add_action( "admin_enqueue_scripts", function(){
    wp_register_style( 'workshop_pro_admin_styles', get_stylesheet_directory_uri() . '/editor-style.css', array(), '1.0.0' );
    wp_enqueue_style( 'workshop_pro_admin_styles' );	
} );


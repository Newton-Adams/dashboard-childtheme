<?php
//enqueue js
add_action( 'wp_enqueue_scripts', function() {
	
	wp_enqueue_script( 'jspdf', 'https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js', array(), false, true );
	wp_enqueue_script( 'chart', get_stylesheet_directory_uri(). '/js/min/chart.umd.min.js', array(), false, true );
	wp_enqueue_script( 'dashboard', get_stylesheet_directory_uri(). '/js/min/build.min.js' , array('jquery'), true );
	wp_localize_script(
		'dashboard',
		'dashboard_obj',
		array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
	);
} );

//admin styles
add_action( "admin_enqueue_scripts", function(){
    wp_register_style( 'dashboard_admin_styles', get_stylesheet_directory_uri() . '/editor-style.css', array(), '1.0.0' );
    wp_enqueue_style( 'dashboard_admin_styles' );	
} );


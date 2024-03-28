<?php
// Register Custom Post Type
function workshop_pro_post_types() {

	//Jobs
	$review_labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'workshop-pro' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'workshop-pro' ),
		'menu_name'             => __( 'Jobs', 'workshop-pro' ),
		'name_admin_bar'        => __( 'Job', 'workshop-pro' ),
		'archives'              => __( 'Job Archives', 'workshop-pro' ),
		'attributes'            => __( 'Job Attributes', 'workshop-pro' ),
		'parent_item_colon'     => __( 'Parent Job:', 'workshop-pro' ),
		'all_items'             => __( 'All Jobs', 'workshop-pro' ),
		'add_new_item'          => __( 'Add New Job', 'workshop-pro' ),
		'add_new'               => __( 'Add Job', 'workshop-pro' ),
		'new_item'              => __( 'New Job', 'workshop-pro' ),
		'edit_item'             => __( 'Edit Job', 'workshop-pro' ),
		'update_item'           => __( 'Update Job', 'workshop-pro' ),
		'view_item'             => __( 'View Job', 'workshop-pro' ),
		'view_items'            => __( 'View Jobs', 'workshop-pro' ),
		'search_items'          => __( 'Search Jobs', 'workshop-pro' ),
		'not_found'             => __( 'Not found', 'workshop-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'workshop-pro' ),
		'featured_image'        => __( 'Featured Image', 'workshop-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'workshop-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'workshop-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'workshop-pro' ),
		'insert_into_item'      => __( 'Insert into item', 'workshop-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'workshop-pro' ),
		'items_list'            => __( 'Items list', 'workshop-pro' ),
		'items_list_navigation' => __( 'Items list navigation', 'workshop-pro' ),
		'filter_items_list'     => __( 'Filter items list', 'workshop-pro' ),
	);
	$review_args = array(
		'label'                 => __( 'Jobs', 'workshop-pro' ),
		'labels'                => $review_labels,
		'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields'),
		'taxonomies' => array('job_categories'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'          => true,
        'rewrite'               => array('slug' => "jobs", 'with_front' => false),
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	register_post_type( 'jobs', $review_args );


	//Register Jobss Taxonomies
	$job_categories_args = array(
		'labels' => array(
		  'name'              => _x( 'Job Categories', 'taxonomy general name', 'generatepress' ),
		  'singular_name'     => _x( 'Job Category', 'taxonomy singular name', 'generatepress' ),
		  'search_items'      => __( 'Search Job Categories', 'generatepress' ),
		  'all_items'         => __( 'All Job Categories', 'generatepress' ),
		  'parent_item'       => __( 'Parent Job Category', 'generatepress' ),
		  'parent_item_colon' => __( 'Parent Job Category:', 'generatepress' ),
		  'edit_item'         => __( 'Edit Job Category', 'generatepress' ),
		  'update_item'       => __( 'Update Job Category', 'generatepress' ),
		  'add_new_item'      => __( 'Add New Job Category', 'generatepress' ),
		  'new_item_name'     => __( 'New Job Category Name', 'generatepress' ),
		  'menu_name'         => __( 'Categories', 'generatepress' ),
	  ),
		'description' => __( '', 'generatepress' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'rewrite'               => array('with_front' => false),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);	
	
	register_taxonomy( 'job_categories', array('jobs'), $job_categories_args );

	//Customers
	$review_labels = array(
		'name'                  => _x( 'Customers', 'Post Type General Name', 'workshop-pro' ),
		'singular_name'         => _x( 'Customer', 'Post Type Singular Name', 'workshop-pro' ),
		'menu_name'             => __( 'Customers', 'workshop-pro' ),
		'name_admin_bar'        => __( 'Customer', 'workshop-pro' ),
		'archives'              => __( 'Customer Archives', 'workshop-pro' ),
		'attributes'            => __( 'Customer Attributes', 'workshop-pro' ),
		'parent_item_colon'     => __( 'Parent Customer:', 'workshop-pro' ),
		'all_items'             => __( 'All Customers', 'workshop-pro' ),
		'add_new_item'          => __( 'Add New Customer', 'workshop-pro' ),
		'add_new'               => __( 'Add Customer', 'workshop-pro' ),
		'new_item'              => __( 'New Customer', 'workshop-pro' ),
		'edit_item'             => __( 'Edit Customer', 'workshop-pro' ),
		'update_item'           => __( 'Update Customer', 'workshop-pro' ),
		'view_item'             => __( 'View Customer', 'workshop-pro' ),
		'view_items'            => __( 'View Customers', 'workshop-pro' ),
		'search_items'          => __( 'Search Customers', 'workshop-pro' ),
		'not_found'             => __( 'Not found', 'workshop-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'workshop-pro' ),
		'featured_image'        => __( 'Featured Image', 'workshop-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'workshop-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'workshop-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'workshop-pro' ),
		'insert_into_item'      => __( 'Insert into item', 'workshop-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'workshop-pro' ),
		'items_list'            => __( 'Items list', 'workshop-pro' ),
		'items_list_navigation' => __( 'Items list navigation', 'workshop-pro' ),
		'filter_items_list'     => __( 'Filter items list', 'workshop-pro' ),
	);
	$review_args = array(
		'label'                 => __( 'Customers', 'workshop-pro' ),
		'labels'                => $review_labels,
		'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields'),
		'taxonomies' => array('customer_categories'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'          => true,
        'rewrite'               => array('slug' => "customers", 'with_front' => false),
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	register_post_type( 'customers', $review_args );


	//Register Jobs Taxonomies
	$customer_categories_args = array(
		'labels' => array(
		  'name'              => _x( 'Customer Categories', 'taxonomy general name', 'generatepress' ),
		  'singular_name'     => _x( 'Customer Category', 'taxonomy singular name', 'generatepress' ),
		  'search_items'      => __( 'Search Customer Categories', 'generatepress' ),
		  'all_items'         => __( 'All Customer Categories', 'generatepress' ),
		  'parent_item'       => __( 'Parent Customer Category', 'generatepress' ),
		  'parent_item_colon' => __( 'Parent Customer Category:', 'generatepress' ),
		  'edit_item'         => __( 'Edit Customer Category', 'generatepress' ),
		  'update_item'       => __( 'Update Customer Category', 'generatepress' ),
		  'add_new_item'      => __( 'Add New Customer Category', 'generatepress' ),
		  'new_item_name'     => __( 'New Customer Category Name', 'generatepress' ),
		  'menu_name'         => __( 'Categories', 'generatepress' ),
	  ),
		'description' => __( '', 'generatepress' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'rewrite'               => array('with_front' => false),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);	
	
	register_taxonomy( 'job_categories', array('jobs'), $customer_categories_args );

	// Vehicles 
	$review_labels = array(
		'name'                  => _x( 'Vehicles', 'Post Type General Name', 'workshop-pro' ),
		'singular_name'         => _x( 'Vehicle', 'Post Type Singular Name', 'workshop-pro' ),
		'menu_name'             => __( 'Vehicles', 'workshop-pro' ),
		'name_admin_bar'        => __( 'Vehicle', 'workshop-pro' ),
		'archives'              => __( 'Vehicle Archives', 'workshop-pro' ),
		'attributes'            => __( 'Vehicle Attributes', 'workshop-pro' ),
		'parent_item_colon'     => __( 'Parent Vehicle:', 'workshop-pro' ),
		'all_items'             => __( 'All Vehicles', 'workshop-pro' ),
		'add_new_item'          => __( 'Add New Vehicle', 'workshop-pro' ),
		'add_new'               => __( 'Add Vehicle', 'workshop-pro' ),
		'new_item'              => __( 'New Vehicle', 'workshop-pro' ),
		'edit_item'             => __( 'Edit Vehicle', 'workshop-pro' ),
		'update_item'           => __( 'Update Vehicle', 'workshop-pro' ),
		'view_item'             => __( 'View Vehicle', 'workshop-pro' ),
		'view_items'            => __( 'View Vehicles', 'workshop-pro' ),
		'search_items'          => __( 'Search Vehicles', 'workshop-pro' ),
		'not_found'             => __( 'Not found', 'workshop-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'workshop-pro' ),
		'featured_image'        => __( 'Featured Image', 'workshop-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'workshop-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'workshop-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'workshop-pro' ),
		'insert_into_item'      => __( 'Insert into item', 'workshop-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'workshop-pro' ),
		'items_list'            => __( 'Items list', 'workshop-pro' ), 
		'items_list_navigation' => __( 'Items list navigation', 'workshop-pro' ), 
		'filter_items_list'     => __( 'Filter items list', 'workshop-pro' ), 
	); 
	$review_args = array(
		'label'                 => __( 'Vehicles', 'workshop-pro' ),
		'labels'                => $review_labels,
		'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields'),
		'taxonomies' => array('vehicle_categories'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-car',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'          => true,
		'rewrite'               => array('slug' => "vehicles", 'with_front' => false),
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	); 

	register_post_type( 'vehicles', $review_args ); 

	
}
add_action( 'init', 'workshop_pro_post_types', 0 );
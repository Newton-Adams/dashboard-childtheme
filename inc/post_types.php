<?php
// Register Custom Post Type
// function dashboard_post_types() {

// 	//Jobs
// 	$review_labels = array(
// 		'name'                  => _x( 'Jobs', 'Post Type General Name', 'dashboard' ),
// 		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'dashboard' ),
// 		'menu_name'             => __( 'Jobs', 'dashboard' ),
// 		'name_admin_bar'        => __( 'Job', 'dashboard' ),
// 		'archives'              => __( 'Job Archives', 'dashboard' ),
// 		'attributes'            => __( 'Job Attributes', 'dashboard' ),
// 		'parent_item_colon'     => __( 'Parent Job:', 'dashboard' ),
// 		'all_items'             => __( 'All Jobs', 'dashboard' ),
// 		'add_new_item'          => __( 'Add New Job', 'dashboard' ),
// 		'add_new'               => __( 'Add Job', 'dashboard' ),
// 		'new_item'              => __( 'New Job', 'dashboard' ),
// 		'edit_item'             => __( 'Edit Job', 'dashboard' ),
// 		'update_item'           => __( 'Update Job', 'dashboard' ),
// 		'view_item'             => __( 'View Job', 'dashboard' ),
// 		'view_items'            => __( 'View Jobs', 'dashboard' ),
// 		'search_items'          => __( 'Search Jobs', 'dashboard' ),
// 		'not_found'             => __( 'Not found', 'dashboard' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'dashboard' ),
// 		'featured_image'        => __( 'Featured Image', 'dashboard' ),
// 		'set_featured_image'    => __( 'Set featured image', 'dashboard' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'dashboard' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'dashboard' ),
// 		'insert_into_item'      => __( 'Insert into item', 'dashboard' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'dashboard' ),
// 		'items_list'            => __( 'Items list', 'dashboard' ),
// 		'items_list_navigation' => __( 'Items list navigation', 'dashboard' ),
// 		'filter_items_list'     => __( 'Filter items list', 'dashboard' ),
// 	);
// 	$review_args = array(
// 		'label'                 => __( 'Jobs', 'dashboard' ),
// 		'labels'                => $review_labels,
// 		'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields', 'author'),
// 		'taxonomies' => array('job_categories'),
// 		'hierarchical'          => true,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'menu_icon'             => 'dashicons-admin-tools',
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'show_in_rest'          => true,
//         'rewrite'               => array('slug' => "jobs-single", 'with_front' => false),
// 		'can_export'            => true,
// 		'has_archive'           => false,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'page',
// 	);

// 	register_post_type( 'jobs', $review_args );


// 	//Register Jobss Taxonomies
// 	$job_categories_args = array(
// 		'labels' => array(
// 		  'name'              => _x( 'Job Categories', 'taxonomy general name', 'generatepress' ),
// 		  'singular_name'     => _x( 'Job Category', 'taxonomy singular name', 'generatepress' ),
// 		  'search_items'      => __( 'Search Job Categories', 'generatepress' ),
// 		  'all_items'         => __( 'All Job Categories', 'generatepress' ),
// 		  'parent_item'       => __( 'Parent Job Category', 'generatepress' ),
// 		  'parent_item_colon' => __( 'Parent Job Category:', 'generatepress' ),
// 		  'edit_item'         => __( 'Edit Job Category', 'generatepress' ),
// 		  'update_item'       => __( 'Update Job Category', 'generatepress' ),
// 		  'add_new_item'      => __( 'Add New Job Category', 'generatepress' ),
// 		  'new_item_name'     => __( 'New Job Category Name', 'generatepress' ),
// 		  'menu_name'         => __( 'Categories', 'generatepress' ),
// 	  ),
// 		'description' => __( '', 'generatepress' ),
// 		'hierarchical' => true,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'rewrite'               => array('with_front' => false),
// 		'show_ui' => true,
// 		'show_in_menu' => true,
// 		'show_in_nav_menus' => true,
// 		'show_tagcloud' => false,
// 		'show_in_quick_edit' => true,
// 		'show_admin_column' => true,
// 		'show_in_rest' => true,
// 	);	
	
// 	register_taxonomy( 'job_categories', array('jobs'), $job_categories_args );
	
// }
// add_action( 'init', 'dashboard_post_types', 0 );
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
		'menu_icon'             => 'dashicons-format-quote',
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
}
add_action( 'init', 'workshop_pro_post_types', 0 );
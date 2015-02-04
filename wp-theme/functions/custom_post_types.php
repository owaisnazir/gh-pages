<?php
// http://codex.wordpress.org/Function_Reference/register_post_type

function register_CPTs()
{

	/*

	// Duplicate this for each CPT.

	$labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio'),
		'add_new_item' => __('Add New Portfolio Item'),
		'edit_item' => __('Edit Portfolio Item'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('View Portfolio Item'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('No Portfolio Items found'),
		'not_found_in_trash' => __('No Portfolio Items found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolios'

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => Array('slug'=>'project'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'supports' => array('title','page-attributes')
	);

	register_post_type('portfolio',$args);


	*/



	$labels = array(
		'name' => _x('Attorney', 'post type general name'),
		'singular_name' => _x('Attorney', 'post type singular name'),
		'add_new' => _x('Add New', 'Attorney'),
		'add_new_item' => __('Add New Attorney'),
		'edit_item' => __('Edit Attorney'),
		'new_item' => __('New Attorney'),
		'view_item' => __('View Attorney'),
		'search_items' => __('Search Attorneys'),
		'not_found' =>  __('No Attorney Items found'),
		'not_found_in_trash' => __('No Attorney Items found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Attorneys'

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => Array('slug'=>'attorney'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'supports' => array('title','page-attributes')
	);

	register_post_type('attorney',$args);


	$labels = array(
		'name' => _x('Practice Area', 'post type general name'),
		'singular_name' => _x('Practice Area', 'post type singular name'),
		'add_new' => _x('Add New', 'Practice Area'),
		'add_new_item' => __('Add New Practice Area'),
		'edit_item' => __('Edit Practice Area'),
		'new_item' => __('New Practice Area'),
		'view_item' => __('View Practice Area'),
		'search_items' => __('Search Practice Areas'),
		'not_found' =>  __('No Practice Area Items found'),
		'not_found_in_trash' => __('No Practice Area Items found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Practice Areas'

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => Array('slug'=>'practice-area'),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 21,
		'supports' => array('title','page-attributes')
	);

	register_post_type('practice-area',$args);


	$labels = array(
		'name' => _x('Office', 'post type general name'),
		'singular_name' => _x('Office', 'post type singular name'),
		'add_new' => _x('Add New', 'Office'),
		'add_new_item' => __('Add New Office'),
		'edit_item' => __('Edit Office'),
		'new_item' => __('New Office'),
		'view_item' => __('View Office'),
		'search_items' => __('Search Offices'),
		'not_found' =>  __('No Office Items found'),
		'not_found_in_trash' => __('No Office Items found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Offices'

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => Array('slug'=>'office'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'supports' => array('title','page-attributes')
	);

	register_post_type('office',$args);


	$labels = array(
		'name' => _x('Case Result', 'post type general name'),
		'singular_name' => _x('Case Result', 'post type singular name'),
		'add_new' => _x('Add New', 'Case Result'),
		'add_new_item' => __('Add New Case Result'),
		'edit_item' => __('Edit Case Result'),
		'new_item' => __('New Case Result'),
		'view_item' => __('View Case Result'),
		'search_items' => __('Search Case Results'),
		'not_found' =>  __('No Case Result Items found'),
		'not_found_in_trash' => __('No Case Result Items found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Case Results'

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => Array('slug'=>'case-result'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'supports' => array('title','page-attributes')
	);

	register_post_type('case-result',$args);

}

add_action('init', 'register_CPTs');
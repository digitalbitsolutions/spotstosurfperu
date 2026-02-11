<?php
/**
 * Plugin Name: Spots to Surf Peru - Core Framework
 * Description: Registers Custom Post Types and Taxonomies for the headless architecture.
 * Version: 1.0.0
 * Author: Spots to Surf Peru
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function sts_register_post_types() {

    // 1. Package (Público)
    $labels_package = array(
        'name'                  => _x('Packages', 'Post Type General Name', 'sts'),
        'singular_name'         => _x('Package', 'Post Type Singular Name', 'sts'),
        'menu_name'             => __('Packages', 'sts'),
        'all_items'             => __('All Packages', 'sts'),
        'add_new_item'          => __('Add New Package', 'sts'),
        'edit_item'             => __('Edit Package', 'sts'),
        'view_item'             => __('View Package', 'sts'),
        'search_items'          => __('Search Packages', 'sts'),
        'menu_icon'             => 'dashicons-palmtree',
    );
    $args_package = array(
        'label'                 => __('Package', 'sts'),
        'description'           => __('Tour packages for sale.', 'sts'),
        'labels'                => $labels_package,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_graphql'       => true,
        'graphql_single_name'   => 'package',
        'graphql_plural_name'   => 'packages',
    );
    register_post_type('package', $args_package);

    // 2. Service (Público)
    $labels_service = array(
        'name'                  => _x('Services', 'Post Type General Name', 'sts'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'sts'),
        'menu_name'             => __('Services', 'sts'),
        'all_items'             => __('All Services', 'sts'),
        'add_new_item'          => __('Add New Service', 'sts'),
        'edit_item'             => __('Edit Service', 'sts'),
        'view_item'             => __('View Service', 'sts'),
        'menu_icon'             => 'dashicons-info',
    );
    $args_service = array(
        'label'                 => __('Service', 'sts'),
        'description'           => __('Individual services.', 'sts'),
        'labels'                => $labels_service,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_graphql'       => true,
        'graphql_single_name'   => 'service',
        'graphql_plural_name'   => 'services',
    );
    register_post_type('service', $args_service);

    // 3. Custom Trip Request (Interno - Leads)
    $labels_request = array(
        'name'                  => _x('Trip Requests', 'Post Type General Name', 'sts'),
        'singular_name'         => _x('Trip Request', 'Post Type Singular Name', 'sts'),
        'menu_name'             => __('Trip Requests', 'sts'),
        'all_items'             => __('All Requests', 'sts'),
        'add_new_item'          => __('Add New Request', 'sts'),
        'edit_item'             => __('Edit Request', 'sts'),
        'view_item'             => __('View Request', 'sts'),
        'menu_icon'             => 'dashicons-email',
    );
    $args_request = array(
        'label'                 => __('Trip Request', 'sts'),
        'description'           => __('Custom trip requests from frontend.', 'sts'),
        'labels'                => $labels_request,
        'supports'              => array('title', 'editor', 'custom-fields', 'comments'), // Comments for internal log
        'hierarchical'          => false,
        'public'                => false, // Internal
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_graphql'       => true, // To allow mutation (create)
        'graphql_single_name'   => 'tripRequest',
        'graphql_plural_name'   => 'tripRequests',
    );
    register_post_type('custom_trip_request', $args_request);

}
add_action('init', 'sts_register_post_types', 0);

// Register Taxonomies
function sts_register_taxonomies() {
    // Package Category
    $labels_cat = array(
        'name'              => _x('Package Categories', 'taxonomy general name', 'sts'),
        'singular_name'     => _x('Package Category', 'taxonomy singular name', 'sts'),
        'search_items'      => __('Search Categories', 'sts'),
        'all_items'         => __('All Categories', 'sts'),
        'parent_item'       => __('Parent Category', 'sts'),
        'parent_item_colon' => __('Parent Category:', 'sts'),
        'edit_item'         => __('Edit Category', 'sts'),
        'update_item'       => __('Update Category', 'sts'),
        'add_new_item'      => __('Add New Category', 'sts'),
        'new_item_name'     => __('New Category Name', 'sts'),
        'menu_name'         => __('Categories', 'sts'),
    );
    $args_cat = array(
        'hierarchical'      => true,
        'labels'            => $labels_cat,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'package-category'),
        'show_in_graphql'   => true,
        'graphql_single_name' => 'packageCategory',
        'graphql_plural_name' => 'packageCategories',
    );
    register_taxonomy('package_category', array('package'), $args_cat);

    // Destination
    $labels_dest = array(
        'name'              => _x('Destinations', 'taxonomy general name', 'sts'),
        'singular_name'     => _x('Destination', 'taxonomy singular name', 'sts'),
        'search_items'      => __('Search Destinations', 'sts'),
        'all_items'         => __('All Destinations', 'sts'),
        'edit_item'         => __('Edit Destination', 'sts'),
        'update_item'       => __('Update Destination', 'sts'),
        'add_new_item'      => __('Add New Destination', 'sts'),
        'menu_name'         => __('Destinations', 'sts'),
    );
    $args_dest = array(
        'hierarchical'      => true,
        'labels'            => $labels_dest,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'destination'),
        'show_in_graphql'   => true,
        'graphql_single_name' => 'destination',
        'graphql_plural_name' => 'destinations',
    );
    register_taxonomy('destination', array('package'), $args_dest);

    // Trip Status
    $labels_status = array(
        'name'              => _x('Trip Statuses', 'taxonomy general name', 'sts'),
        'singular_name'     => _x('Trip Status', 'taxonomy singular name', 'sts'),
        'search_items'      => __('Search Statuses', 'sts'),
        'all_items'         => __('All Statuses', 'sts'),
        'edit_item'         => __('Edit Status', 'sts'),
        'update_item'       => __('Update Status', 'sts'),
        'add_new_item'      => __('Add New Status', 'sts'),
        'menu_name'         => __('Status', 'sts'),
    );
    $args_status = array(
        'hierarchical'      => true,
        'labels'            => $labels_status,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'trip-status'),
        'show_in_graphql'   => true,
        'graphql_single_name' => 'tripStatus',
        'graphql_plural_name' => 'tripStatuses',
    );
    register_taxonomy('trip_status', array('custom_trip_request'), $args_status);
}
add_action('init', 'sts_register_taxonomies', 0);

<?php
/**
 * Plugin Name: STSP Logistic
 * Description: Backoffice logistic module (Services & Providers).
 * Version: 1.0.0
 * Author: Spots to Surf Peru
 * Text Domain: stsp-logistic
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Services CPT (stores only name/title).
 */
function stsp_register_services_cpt() {
    $labels = array(
        'name'               => _x('Services', 'Post Type General Name', 'stsp-logistic'),
        'singular_name'      => _x('Service', 'Post Type Singular Name', 'stsp-logistic'),
        'menu_name'          => __('Services', 'stsp-logistic'),
        'name_admin_bar'     => __('Service', 'stsp-logistic'),
        'add_new_item'       => __('Add New Service', 'stsp-logistic'),
        'new_item'           => __('New Service', 'stsp-logistic'),
        'edit_item'          => __('Edit Service', 'stsp-logistic'),
        'view_item'          => __('View Service', 'stsp-logistic'),
        'all_items'          => __('All Services', 'stsp-logistic'),
        'search_items'       => __('Search Services', 'stsp-logistic'),
        'not_found'          => __('No services found.', 'stsp-logistic'),
        'not_found_in_trash' => __('No services found in Trash.', 'stsp-logistic'),
    );

    $args = array(
        'label'               => __('Service', 'stsp-logistic'),
        'description'         => __('Logistic services list.', 'stsp-logistic'),
        'labels'              => $labels,
        'supports'            => array('title'),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_admin_bar'   => false,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'show_in_rest'        => true,
        'capability_type'     => 'post',
    );

    register_post_type('stsp_service', $args);
}
add_action('init', 'stsp_register_services_cpt');

/**
 * Register Providers CPT (stores only name/title + linked service).
 */
function stsp_register_providers_cpt() {
    $labels = array(
        'name'               => _x('Providers', 'Post Type General Name', 'stsp-logistic'),
        'singular_name'      => _x('Provider', 'Post Type Singular Name', 'stsp-logistic'),
        'menu_name'          => __('Providers', 'stsp-logistic'),
        'name_admin_bar'     => __('Provider', 'stsp-logistic'),
        'add_new_item'       => __('Add New Provider', 'stsp-logistic'),
        'new_item'           => __('New Provider', 'stsp-logistic'),
        'edit_item'          => __('Edit Provider', 'stsp-logistic'),
        'view_item'          => __('View Provider', 'stsp-logistic'),
        'all_items'          => __('All Providers', 'stsp-logistic'),
        'search_items'       => __('Search Providers', 'stsp-logistic'),
        'not_found'          => __('No providers found.', 'stsp-logistic'),
        'not_found_in_trash' => __('No providers found in Trash.', 'stsp-logistic'),
    );

    $args = array(
        'label'               => __('Provider', 'stsp-logistic'),
        'description'         => __('Logistic providers list.', 'stsp-logistic'),
        'labels'              => $labels,
        'supports'            => array('title'),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_admin_bar'   => false,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'show_in_rest'        => true,
        'capability_type'     => 'post',
    );

    register_post_type('stsp_provider', $args);
}
add_action('init', 'stsp_register_providers_cpt');

/**
 * Provider meta: linked service.
 */
function stsp_register_provider_meta() {
    register_post_meta(
        'stsp_provider',
        'stsp_service_id',
        array(
            'type'              => 'integer',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'absint',
            'auth_callback'     => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('init', 'stsp_register_provider_meta');

/**
 * Create STSP Logistic menu below Comments.
 */
function stsp_register_logistic_menu() {
    add_menu_page(
        'STSP Logistic',
        'STSP Logistic',
        'manage_options',
        'stsp-logistic',
        'stsp_logistic_redirect',
        'dashicons-admin-tools',
        26
    );

    add_submenu_page(
        'stsp-logistic',
        'Services',
        'Services',
        'manage_options',
        'edit.php?post_type=stsp_service'
    );

    add_submenu_page(
        'stsp-logistic',
        'Providers',
        'Providers',
        'manage_options',
        'edit.php?post_type=stsp_provider'
    );

    remove_submenu_page('stsp-logistic', 'stsp-logistic');
}
add_action('admin_menu', 'stsp_register_logistic_menu');

function stsp_logistic_redirect() {
    if (!current_user_can('manage_options')) {
        return;
    }
    wp_safe_redirect(admin_url('edit.php?post_type=stsp_service'));
    exit;
}

/**
 * Provider: Service select metabox.
 */
function stsp_add_provider_service_metabox() {
    add_meta_box(
        'stsp_provider_service_metabox',
        'Service',
        'stsp_render_provider_service_metabox',
        'stsp_provider',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'stsp_add_provider_service_metabox');

function stsp_render_provider_service_metabox($post) {
    wp_nonce_field('stsp_provider_service_metabox', 'stsp_provider_service_nonce');

    $selected = (int) get_post_meta($post->ID, 'stsp_service_id', true);
    $services = get_posts(array(
        'post_type'      => 'stsp_service',
        'post_status'    => 'publish',
        'numberposts'    => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'suppress_filters' => false,
    ));

    echo '<select name="stsp_service_id" style="width:100%;">';
    echo '<option value="">Selecciona un servicio...</option>';
    foreach ($services as $service) {
        $value = (int) $service->ID;
        echo '<option value="' . esc_attr($value) . '" ' . selected($selected, $value, false) . '>';
        echo esc_html($service->post_title);
        echo '</option>';
    }
    echo '</select>';
}

function stsp_save_provider_service_metabox($post_id) {
    if (!isset($_POST['stsp_provider_service_nonce']) || !wp_verify_nonce($_POST['stsp_provider_service_nonce'], 'stsp_provider_service_metabox')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) !== 'stsp_provider') {
        return;
    }

    $service_id = isset($_POST['stsp_service_id']) ? absint($_POST['stsp_service_id']) : 0;
    if ($service_id > 0) {
        update_post_meta($post_id, 'stsp_service_id', $service_id);
    } else {
        delete_post_meta($post_id, 'stsp_service_id');
    }
}
add_action('save_post_stsp_provider', 'stsp_save_provider_service_metabox');

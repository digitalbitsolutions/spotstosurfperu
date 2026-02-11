<?php
/**
 * Headless WordPress Configuration
 * Optimized for Astro frontend consumption
 */

// Disable Gutenberg editor completely
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Remove Gutenberg CSS
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}, 100);

// Disable theme support for block editor
add_action('after_setup_theme', function() {
    remove_theme_support('custom-header');
    remove_theme_support('custom-background');
    remove_theme_support('core-block-patterns');
});

// Disable frontend scripts and styles
add_action('wp_enqueue_scripts', function() {
    global $wp_scripts, $wp_styles;
    $wp_scripts->queue = [];
    $wp_styles->queue = [];
}, 999);

// Clean up WordPress head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable REST API for non-authenticated users (optional security)
// Uncomment if you want to restrict REST API access
// add_filter('rest_authentication_errors', function($result) {
//     if (!is_user_logged_in()) {
//         return new WP_Error('rest_not_logged_in', 'You are not logged in.', ['status' => 401]);
//     }
//     return $result;
// });

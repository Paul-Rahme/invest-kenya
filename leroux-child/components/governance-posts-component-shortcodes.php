<?php
/**
 * GOVERNANCE POSTS COMPONENT SHORTCODES + ASSETS
 * File: /leroux-child/components/governance-posts-component-shortcodes.php
 *
 * Remember to require this file in functions.php:
 * require_once get_stylesheet_directory() . '/components/governance-posts-component-shortcodes.php';
 */

/* ============================================================
   HELPER: RENDER GOVERNANCE COMPONENT WITH CUSTOM QUERY + MODE
============================================================ */
function kenya_render_governance_component($custom_query_args = [], $mode = '') {

    // Pass mode + query to the component via query vars
    if (!empty($mode)) {
        set_query_var('gpc_mode', $mode); // 'row' or ''
    } else {
        set_query_var('gpc_mode', null);
    }

    if (!empty($custom_query_args)) {
        set_query_var('gpc_custom_query', $custom_query_args);
    } else {
        set_query_var('gpc_custom_query', null);
    }

    ob_start();
    include get_stylesheet_directory() . '/components/governance-posts-component.php';
    return ob_get_clean();
}

/* ============================================================
   1) GRID — BOARD MEMBERS
   Shortcode: [governance_board_grid]
============================================================ */
function kenya_governance_board_grid_shortcode() {

    // Adjust 'board-members' if your slug is different
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'board-members',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    return kenya_render_governance_component($args, ''); // grid (default)
}
add_shortcode('governance_board_grid', 'kenya_governance_board_grid_shortcode');

/* ============================================================
   2) GRID — SENIOR MANAGEMENT
   Shortcode: [governance_senior_grid]
============================================================ */
function kenya_governance_senior_grid_shortcode() {

    // Adjust 'senior-managment' slug if needed
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'senior-managment',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    return kenya_render_governance_component($args, ''); // grid (default)
}
add_shortcode('governance_senior_grid', 'kenya_governance_senior_grid_shortcode');

/* ============================================================
   3) ROW — BOARD MEMBERS
   Shortcode: [governance_board_row]
============================================================ */
function kenya_governance_board_row_shortcode() {

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => 'board-members',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    // Exclude current post when on single
    if (is_single()) {
        $args['post__not_in'] = [ get_the_ID() ];
    }

    return kenya_render_governance_component($args, 'row');
}
add_shortcode('governance_board_row', 'kenya_governance_board_row_shortcode');

/* ============================================================
   4) ROW — SENIOR MANAGEMENT
   Shortcode: [governance_senior_row]
============================================================ */
function kenya_governance_senior_row_shortcode() {

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => 'senior-managment',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    // Exclude current post when on single
    if (is_single()) {
        $args['post__not_in'] = [ get_the_ID() ];
    }

    return kenya_render_governance_component($args, 'row');
}

add_shortcode('governance_senior_row', 'kenya_governance_senior_row_shortcode');

/* ============================================================
   LOAD CSS FILE FOR GOVERNANCE COMPONENT
============================================================ */
function kenya_governance_posts_component_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'governance-posts-component-css',
        $base_uri . 'governance-posts-component.css',
        [],
        filemtime($base_dir . 'governance-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_governance_posts_component_assets');

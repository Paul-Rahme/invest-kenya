<?php
/**
 * TENDERS POSTS COMPONENT SHORTCODE + ASSETS
 */

function kenya_tenders_posts_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/tenders-posts-component.php';
    return ob_get_clean();
}
add_shortcode('kenya_tenders_posts', 'kenya_tenders_posts_shortcode');

/* LOAD CSS */
function kenya_tenders_posts_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'tenders-posts-component-css',
        $base_uri . 'tenders-posts-component.css',
        [],
        filemtime($base_dir . 'tenders-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_tenders_posts_assets');

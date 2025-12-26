<?php
/**
 * NEWS POSTS COMPONENT SHORTCODES + ASSETS
 * File: /leroux-child/components/news-posts-component-shortcodes.php
 *
 * Remember to require this file in functions.php:
 * require_once get_stylesheet_directory() . '/components/news-posts-component-shortcodes.php';
 */

/* ============================================================
   MAIN NEWS POSTS COMPONENT SHORTCODE (GRID)
   [kenya_news_posts]
============================================================ */
function kenya_news_posts_component_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/news-posts-component.php';
    return ob_get_clean();
}
add_shortcode('kenya_news_posts', 'kenya_news_posts_component_shortcode');

/* ============================================================
   ROW VARIANT (ONE ROW OF NEWS)
   [kenya_news_row]
============================================================ */
add_shortcode('kenya_news_row', function() {

    // Tell component to render row style
    set_query_var('npc_mode', 'row');

    // Exclude current post if we are on a single post page
    $exclude_ids = [];
    if (is_singular('post')) {
        $exclude_ids[] = get_the_ID();
    }

    // Custom query: 4 latest news posts
    set_query_var('npc_custom_query', [
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => 'news',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => $exclude_ids,
    ]);

    ob_start();
    include get_stylesheet_directory() . '/components/news-posts-component.php';
    return ob_get_clean();
});


/* ============================================================
   LOAD CSS FILE FOR NEWS COMPONENT
============================================================ */
function kenya_news_posts_component_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'news-posts-component-css',
        $base_uri . 'news-posts-component.css',
        [],
        filemtime($base_dir . 'news-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_news_posts_component_assets');

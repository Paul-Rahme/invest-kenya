<?php
/* ============================================================
   MAIN GRID SHORTCODE
   [kenya_opportunities_posts]
============================================================ */
function kenya_opportunities_posts_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/opportunities-posts-component.php';
    return ob_get_clean();
}
add_shortcode('kenya_opportunities_posts', 'kenya_opportunities_posts_shortcode');

/* ============================================================
   ROW VARIANT
   [kenya_opportunities_row]
============================================================ */
add_shortcode('kenya_opportunities_row', function() {

    set_query_var('opc_mode', 'row');

    set_query_var('opc_custom_query', [
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => 'opportunities',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    ob_start();
    include get_stylesheet_directory() . '/components/opportunities-posts-component.php';
    return ob_get_clean();
});

/* ============================================================
   ROW VARIANT WITH TAG FILTER
   Usage: [kenya_opportunities_row_tag tag="agriculture"]
============================================================ */
add_shortcode('kenya_opportunities_row_tag', function($atts) {

    $atts = shortcode_atts([
        'tag' => '',   // tag slug
        'limit' => 4   // optional override
    ], $atts);

    if (empty($atts['tag'])) {
        return "<p>No tag provided.</p>";
    }

    set_query_var('opc_mode', 'row');

    set_query_var('opc_custom_query', [
        'post_type'      => 'post',
        'posts_per_page' => intval($atts['limit']),
        'category_name'  => 'opportunities',
        'tag'            => sanitize_title($atts['tag']),
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    ob_start();
    include get_stylesheet_directory() . '/components/opportunities-posts-component.php';
    return ob_get_clean();
});


/* ============================================================
   ENQUEUE CSS
============================================================ */
function kenya_opportunities_posts_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'opportunities-posts-component-css',
        $base_uri . 'opportunities-posts-component.css',
        [],
        filemtime($base_dir . 'opportunities-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_opportunities_posts_assets');

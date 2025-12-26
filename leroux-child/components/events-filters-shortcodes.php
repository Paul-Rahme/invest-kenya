<?php
/* ============================================================
   EVENTS FILTERS SHORTCODE (FRONT-END FILTERING ONLY)
============================================================ */
function kenya_events_filters_bar_shortcode() {

    // Get all event posts (only published)
    $event_posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'events',
        'post_status'    => 'publish',
    ]);

    $locations = [];

    foreach ($event_posts as $post) {
        $loc = get_post_meta($post->ID, 'location', true);
        if (!empty(trim($loc))) {
            $locations[] = trim($loc);
        }
    }

    $locations = array_unique($locations);

    // Pass to JS
    echo "<script>window.eventFilterLocations = " . json_encode(array_values($locations)) . ";</script>";

    ob_start();
    include get_stylesheet_directory() . '/components/events-filters.php';
    return ob_get_clean();
}

add_shortcode("kenya_events_filters", "kenya_events_filters_bar_shortcode");


/* ============================================================
   ENQUEUE CSS ONLY
============================================================ */
function kenya_events_filters_assets_new() {

    wp_enqueue_style(
        'events-filters-css',
        get_stylesheet_directory_uri() . '/components/events-filters.css',
        [],
        filemtime(get_stylesheet_directory() . '/components/events-filters.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_events_filters_assets_new');

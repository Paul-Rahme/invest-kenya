<?php
/**
 * EVENTS SLIDER SHORTCODE FILE
 * Shortcode: [kenya_events_slider]
 */

/* ============================================================
   ENQUEUE CSS ONLY WHEN SHORTCODE EXISTS ON PAGE
============================================================ */
function kenya_events_slider_enqueue_assets() {
    // Register CSS
    wp_register_style(
        'kenya-events-slider-css',
        get_stylesheet_directory_uri() . '/components/events-slider.css',
        [],
        filemtime(get_stylesheet_directory() . '/components/events-slider.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_events_slider_enqueue_assets');

/* ============================================================
   SHORTCODE — LOAD RENDER FILE + OUTPUT SLIDER
============================================================ */
add_shortcode('kenya_events_slider', function() {

    // Enqueue CSS now that shortcode is used
    wp_enqueue_style('kenya-events-slider-css');

    // Include render template file ONCE
    require_once get_stylesheet_directory() . '/components/events-slider.php';

    // Call function from render file
    if (function_exists('kenya_events_slider_render')) {
        return kenya_events_slider_render();
    }

    return '';
});

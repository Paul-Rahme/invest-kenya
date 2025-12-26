<?php
/**
 * NEWS SLIDER SHORTCODES + ASSETS LOADER
 *
 * File: /leroux-child/components/news-slider-shortcodes.php
 */

// Load main News Slider component (shortcode + HTML + JS)
require_once get_stylesheet_directory() . '/components/news-slider.php';

/* ============================================================
   ENQUEUE NEWS SLIDER CSS
============================================================ */
function kenya_news_slider_styles() {
    wp_enqueue_style(
        'kenya-news-slider',
        get_stylesheet_directory_uri() . '/components/news-slider.css',
        [],
        filemtime(get_stylesheet_directory() . '/components/news-slider.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_news_slider_styles');

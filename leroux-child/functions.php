<?php

if ( ! function_exists( 'leroux_child_theme_enqueue_scripts' ) ) {
    function leroux_child_theme_enqueue_scripts() {
        $main_style = 'leroux-main';
        wp_enqueue_style( 'leroux-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
    }
    add_action( 'wp_enqueue_scripts', 'leroux_child_theme_enqueue_scripts' );
}




// SECURITY
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Shortcode: [footer_social_icons]
| Location: functions.php
|--------------------------------------------------------------------------
*/

add_shortcode( 'footer_social_icons', function () {

    // Always points to child theme, language-safe
    $base_url = get_stylesheet_directory_uri();

    ob_start();
    ?>

    <div style="display:flex; align-items:center; gap:22px;">

        <p style="
            color:#ffffff;
            font-size:16px;
            font-weight:300;
            letter-spacing:0.3px;
            margin:0;
            font-family:'DM Sans', sans-serif !important;
        ">
            Follow us on
        </p>

        <!-- FACEBOOK -->
        <a href="https://www.facebook.com/InvestKenya" target="_blank" rel="noopener">
            <img 
                src="<?php echo esc_url( $base_url ); ?>/assets/icons/facebook-icon.svg"
                onmouseover="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/facebook-icon-hover.svg'"
                onmouseout="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/facebook-icon.svg'"
                alt="Facebook"
                style="width:22px; height:auto; opacity:0.85; cursor:pointer; transition:0.2s;"
            >
        </a>

        <!-- X -->
        <a href="https://x.com/InvestKenya_" target="_blank" rel="noopener">
            <img 
                src="<?php echo esc_url( $base_url ); ?>/assets/icons/x-icon.svg"
                onmouseover="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/x-icon-hover.svg'"
                onmouseout="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/x-icon.svg'"
                alt="X"
                style="width:22px; height:auto; opacity:0.85; cursor:pointer; transition:0.2s;"
            >
        </a>

        <!-- LINKEDIN -->
        <a href="https://ke.linkedin.com/company/investkenya" target="_blank" rel="noopener">
            <img 
                src="<?php echo esc_url( $base_url ); ?>/assets/icons/linkedin-icon.svg"
                onmouseover="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/linkedin-icon-hover.svg'"
                onmouseout="this.src='<?php echo esc_url( $base_url ); ?>/assets/icons/linkedin-icon.svg'"
                alt="LinkedIn"
                style="width:22px; height:auto; opacity:0.85; cursor:pointer; transition:0.2s;"
            >
        </a>

    </div>

    <?php
    return ob_get_clean();
});











/**
 * Restrict next/previous posts to the same primary category
 */
add_filter('get_next_post_join', 'kenya_restrict_adjacent_to_same_category');
add_filter('get_previous_post_join', 'kenya_restrict_adjacent_to_same_category');
add_filter('get_next_post_where', 'kenya_restrict_adjacent_to_same_category');
add_filter('get_previous_post_where', 'kenya_restrict_adjacent_to_same_category');

function kenya_restrict_adjacent_to_same_category($where) {
    global $post, $wpdb;

    // get categories of the current post
    $categories = get_the_category($post->ID);
    if (!$categories) {
        return $where; // no category → default behavior
    }

    // use the FIRST category (primary)
    $cat_id = $categories[0]->term_id;

    // restrict next/prev query to SAME category
    $where .= $wpdb->prepare(
        " AND p.ID IN (
            SELECT object_id FROM {$wpdb->term_relationships}
            WHERE term_taxonomy_id = %d
        )",
        $cat_id
    );

    return $where;
}





function kenya_move_related_news_section() {
    if ( is_single() && get_post_type() === 'post' ) : ?>
        <script>
        jQuery(function($){

            var $related = $('#fullwidth-sectionId');              // Related News section
            var $second  = $('#footer-section');         // Your NEW section under it
            var $nav     = $('#qodef-single-post-navigation');     // Prev/Next

            if ($related.length && $nav.length) {

                // Find Elementor root wrapper of current post
                var $originalRoot = $related.closest('.elementor');

                if (!$originalRoot.length) return;

                // Copy Elementor wrapper classes
                var rootClasses = $originalRoot.attr('class');

                // Create a new wrapper
                var $wrapper = $('<div>', {
                    'class': rootClasses + ' kenya-related-wrapper'
                });

                // Move Related News inside
                $wrapper.append($related);

                // If second section exists, move it right under Related
                if ($second.length) {
                    $wrapper.append($second);
                }

                // Insert after Prev/Next
                $nav.after($wrapper);
            }

        });
        </script>
    <?php endif;
}
add_action('wp_footer', 'kenya_move_related_news_section', 50);




/* ==========================================================================
   SHORTCODE: CAREER META FOR CAREERS DETAILS PAGE
   Usage inside Elementor:
   [kenya_career_meta]
=========================================================================== */

add_shortcode('kenya_career_meta', function () {

    if (!is_singular('post')) return '';

    $post_id = get_the_ID();

    // meta fields
    $job_classification = get_post_meta($post_id, 'job_classification', true);
    $location           = get_post_meta($post_id, 'location', true);

    // nothing to show
    if (!$job_classification && !$location) return '';

    ob_start();
    ?>

    <div class="event-meta-details">

        <?php if ($job_classification): ?>
        <span class="event-meta-item-details">
            <img src="<?php echo esc_url( ik_upload_url( '2025/11/handbag.svg' ) ); ?>" class="event-meta-icon-details">
            <?php echo esc_html($job_classification); ?>
        </span>
        <?php endif; ?>

        <?php if ($job_classification && $location): ?>
            <span class="event-separator-details"></span>
        <?php endif; ?>

        <?php if ($location): ?>
        <span class="event-meta-item-details">
            <img src="<?php echo esc_url( ik_upload_url( '2025/11/Map_Pin.svg' ) ); ?>" class="event-meta-icon-details">
            <?php echo esc_html($location); ?>
        </span>
        <?php endif; ?>

    </div>

    <?php
    return ob_get_clean();
});







/* ==========================================================================
   SHORTCODE: EVENT META FOR EVENTS DETAILS PAGE
   Usage inside Elementor:
   [kenya_event_meta]
=========================================================================== */

add_shortcode('kenya_event_meta', function () {

    if (!is_singular('post')) return '';

    $post_id = get_the_ID();

    // meta fields
    $location   = get_post_meta($post_id, 'location', true);
    $start_raw  = get_post_meta($post_id, 'start_date', true);
    $end_raw    = get_post_meta($post_id, 'end_date', true);

    // use already-existing formatter
    if (!function_exists('kenya_format_event_range')) return '';

    $date_range = kenya_format_event_range($start_raw, $end_raw);

    // nothing to show
    if (!$location && !$date_range) return '';

    ob_start();
    ?>

    <div class="event-meta-details">

        <?php if ($location): ?>
        <span class="event-meta-item-details">
            <img src="<?php echo esc_url( ik_upload_url( '2025/11/Map_Pin.svg' ) ); ?>" class="event-meta-icon-details">
            <?php echo esc_html($location); ?>
        </span>
        <?php endif; ?>

        <?php if ($location && $date_range): ?>
            <span class="event-separator-details"></span>
        <?php endif; ?>

        <?php if ($date_range): ?>
        <span class="event-meta-item-details">
            <img src="<?php echo esc_url( ik_upload_url( '2025/11/calendar-blank-light-1.svg' ) ); ?>" class="event-meta-icon-details">
            <?php echo esc_html($date_range); ?>
        </span>
        <?php endif; ?>

    </div>

    <?php
    return ob_get_clean();
});


add_action('template_redirect', function () {
    if (is_404()) {
        wp_redirect(home_url('/page-not-found'), 301);
        exit;
    }
});




require_once get_stylesheet_directory() . '/components/news-slider.php';
require_once get_stylesheet_directory() . '/components/events-slider.php';
require_once get_stylesheet_directory() . '/components/events-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/events-slider-shortcodes.php';
require_once get_stylesheet_directory() . '/components/news-slider-shortcodes.php';
require_once get_stylesheet_directory() . '/components/news-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/resources-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/governance-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/events-filters-shortcodes.php';
require_once get_stylesheet_directory() . '/components/news-filters-shortcodes.php';
require_once get_stylesheet_directory() . '/components/resources-filters-shortcodes.php';
require_once get_stylesheet_directory() . '/components/opportunities-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/opportunities-filters-shortcodes.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-manufacturing.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-construction-building.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-agriculture.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-manufacturing.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-agriculture.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-construction-building.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-blue-economy.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-blue-economy.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-creative-economy.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-creative-economy.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-environment-forestry.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-environment-forestry.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-ict-bpo.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-ict-bpo.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-tourism-hospitality.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-tourism-hospitality.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-mining.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-mining.php';
require_once get_stylesheet_directory() . '/components/vision-mission-values-block-about-invest-kenya.php';
require_once get_stylesheet_directory() . '/components/history-block-about-invest-kenya.php';
require_once get_stylesheet_directory() . '/components/partners-showcase-block-about-invest-kenya.php';
require_once get_stylesheet_directory() . '/components/governance-block-about-invest-kenya.php';
require_once get_stylesheet_directory() . '/components/tabs-block-benefits-protections-shortcodes.php';
require_once get_stylesheet_directory() . '/components/second-section-block-benefits-protections.php';
require_once get_stylesheet_directory() . '/components/tabs-block-laws-regulations-shortcodes.php';
require_once get_stylesheet_directory() . '/components/second-section-block-laws-regulations.php';
require_once get_stylesheet_directory() . '/components/first-section-block-how-we-support-investors.php';
require_once get_stylesheet_directory() . '/components/second-section-block-how-we-support-investors.php';
require_once get_stylesheet_directory() . '/components/first-section-block-why-kenya.php';
require_once get_stylesheet_directory() . '/components/second-section-block-why-kenya.php';
require_once get_stylesheet_directory() . '/components/fourth-section-block-why-kenya.php';
require_once get_stylesheet_directory() . '/components/third-section-block-why-kenya.php';
require_once get_stylesheet_directory() . '/components/fifth-section-block-why-kenya.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-opportunities.php';
require_once get_stylesheet_directory() . '/components/tab-block-investing-in-kenya.php';
require_once get_stylesheet_directory() . '/components/tabs-block-home-page.php';
require_once get_stylesheet_directory() . '/components/page-banner-block.php';
require_once get_stylesheet_directory() . '/components/why-kenya-home-page.php';
require_once get_stylesheet_directory() . '/components/get-started-home-page.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-public-private-partnership.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-public-private-partnership.php';
require_once get_stylesheet_directory() . '/helpers/media-helpers.php';
require_once get_stylesheet_directory() . '/components/opportunities-loader.php';
require_once get_stylesheet_directory() . '/components/careers-first-section.php';
require_once get_stylesheet_directory() . '/components/careers-second-section.php';
require_once get_stylesheet_directory() . '/components/tenders-posts-component-shortcodes.php';
require_once get_stylesheet_directory() . '/components/newsletter-subscribe.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-infrastructure.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-infrastructure.php';
require_once get_stylesheet_directory() . '/components/tabs-block-investment-trends.php';
require_once get_stylesheet_directory() . '/components/sector-overview-block-other-sectors.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-block-other-sectors.php';
require_once get_stylesheet_directory() . '/components/second-section-investment-trends.php';

/* ============================================================
   DEBUG: SHOW ALL META FIELDS ON ANY PAGE (ADMIN ONLY)
============================================================ */
// function kenya_show_all_meta_debug() {

//     // Only for logged-in admins
//     if ( !is_user_logged_in() || !current_user_can('administrator') ) {
//         return;
//     }

//     // Detect post ID on frontend AND backend (more reliable than get_the_ID alone)
//     $post_id = get_queried_object_id();
//     if ( !$post_id ) {
//         $post_id = get_the_ID();
//     }
//     if ( !$post_id ) return;

//     // Get all post meta
//     $meta = get_post_meta($post_id);

//     if ( empty($meta) ) {
//         echo '<div style="padding:20px;background:#fff;border:2px solid #027337;border-radius:10px;font-family:monospace;">';
//         echo 'No meta found for Post ID: ' . $post_id;
//         echo '</div>';
//         return;
//     }

//     echo '<div style="
//         background:#fff;
//         padding:20px;
//         margin:20px;
//         border:2px solid #027337;
//         border-radius:10px;
//         font-family:monospace;
//         font-size:13px;
//         max-width:1200px;
//         overflow:auto;
//         z-index:999999;
//     ">';

//     echo '<h3 style="margin-top:0;">🔍 META DEBUG — Post ID: '. $post_id .'</h3>';
//     echo '<ul style="list-style:none;padding:0;margin:0;">';

//     foreach ( $meta as $key => $values ) {

//         // always get the first value
//         $raw = $values[0];

//         // attempt to unserialize
//         $value = maybe_unserialize($raw);

//         echo '<li style="margin-bottom:10px;">';
//         echo '<strong style="color:#027337;">' . esc_html($key) . ':</strong><br>';

//         // If array, print formatted
//         if ( is_array($value) || is_object($value) ) {
//             echo '<pre style="background:#f7f7f7;padding:10px;">' . esc_html(print_r($value, true)) . '</pre>';
//         } else {
//             echo esc_html($value);
//         }

//         echo '</li>';
//     }

//     echo '</ul>';
//     echo '</div>';
// }
// add_action('wp_footer', 'kenya_show_all_meta_debug');

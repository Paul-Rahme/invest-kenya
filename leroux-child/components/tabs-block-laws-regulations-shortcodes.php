<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function ik_parse_inline_link($text) {
    if (!$text) return '';

    return preg_replace_callback('/\{([^|]+)\|([^}]+)\}/', function($matches) {
        $label = esc_html(trim($matches[1]));
        $url   = esc_url(trim($matches[2]));

        return '<a href="' . $url . '" class="laws-inline-link" target="_blank" rel="noopener">' . $label . '</a>';
    }, esc_html($text));
}


/*
|--------------------------------------------------------------------------
| Shortcode: [laws_regulations_tabs_block]
|--------------------------------------------------------------------------
*/

function shortcode_laws_regulations_tabs_block() {

    // UNIQUE ID
    $uid = uniqid('laws-tabs-');

    /*
    |--------------------------------------------------------------------------
    | GLOBAL FIELDS
    |--------------------------------------------------------------------------
    */
    $raw_title_first_section = get_field('title_first_section');

    $tab_1_label = get_field('tab_1');
    $tab_2_label = get_field('tab_2');

    // Split title into two parts using "//"
    $title_primary   = '';
    $title_secondary = '';

    if ( ! empty( $raw_title_first_section ) ) {
        $parts = explode('//', $raw_title_first_section, 2);
        $title_primary = trim( $parts[0] );
        if ( isset($parts[1]) ) {
            $title_secondary = trim( $parts[1] );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | TAB 1 FIELDS
    |--------------------------------------------------------------------------
    */
    $first_text_first_tab               = get_field('first_text_first_tab');
    $first_red_title_first_tab          = get_field('first_red_title_first_tab');

    $first_information_title_first_tab  = get_field('first_information_title_first_tab');
    $second_information_title_first_tab = get_field('second_information_title_first_tab');
    $third_information_title_first_tab  = get_field('third_information_title_first_tab');
    $fourth_information_title_first_tab = get_field('fourth_information_title_first_tab');
    $fifth_information_title_first_tab  = get_field('fifth_information_title_first_tab');
    $sixth_information_title_first_tab  = get_field('sixth_information_title_first_tab');

    $first_information_text_first_tab   = get_field('first_information_text_first_tab');
    $second_information_text_first_tab  = get_field('second_information_text_first_tab');
    $third_information_text_first_tab   = get_field('third_information_text_first_tab');
    $fourth_information_text_first_tab  = get_field('fourth_information_text_first_tab');
    $fifth_information_text_first_tab   = get_field('fifth_information_text_first_tab');
    $sixth_information_text_first_tab   = get_field('sixth_information_text_first_tab');

    $bottom_text_first_tab              = get_field('bottom_text_first_tab');
    $button_text_first_tab              = get_field('button_text_first_tab');
    $button_link_first_tab              = get_field('button_link_first_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 2 FIELDS
    |--------------------------------------------------------------------------
    */
    $first_text_second_tab               = get_field('first_text_second_tab');
    $first_red_title_second_tab          = get_field('first_red_title_second_tab');

    $first_information_title_second_tab  = get_field('first_information_title_second_tab');
    $second_information_title_second_tab = get_field('second_information_title_second_tab');
    $third_information_title_second_tab  = get_field('third_information_title_second_tab');
    $fourth_information_title_second_tab = get_field('fourth_information_title_second_tab');
    $fifth_information_title_second_tab  = get_field('fifth_information_title_second_tab');
    $sixth_information_title_second_tab  = get_field('sixth_information_title_second_tab');

    $first_information_text_second_tab   = get_field('first_information_text_second_tab');
    $second_information_text_second_tab  = get_field('second_information_text_second_tab');
    $third_information_text_second_tab   = get_field('third_information_text_second_tab');
    $fourth_information_text_second_tab  = get_field('fourth_information_text_second_tab');
    $fifth_information_text_second_tab   = get_field('fifth_information_text_second_tab');
    $sixth_information_text_second_tab   = get_field('sixth_information_text_second_tab');

    $bottom_text_second_tab              = get_field('bottom_text_second_tab');
    $button_text_second_tab              = get_field('button_text_second_tab');
    $button_link_second_tab              = get_field('button_link_second_tab');

    // BUTTON ICON URL (SAME FOR BOTH TABS)
    $button_icon_url = ik_upload_url('2025/12/System-Icons-1.svg');

    /*
    |--------------------------------------------------------------------------
    | RENDER
    |--------------------------------------------------------------------------
    */
    ob_start();

    include get_stylesheet_directory() . '/components/tabs-block-laws-regulations-html.php';
    include get_stylesheet_directory() . '/components/tabs-block-laws-regulations-styles.php';
    include get_stylesheet_directory() . '/components/tabs-block-laws-regulations-script.js';

    return ob_get_clean();
}

add_shortcode('laws_regulations_tabs_block', 'shortcode_laws_regulations_tabs_block');

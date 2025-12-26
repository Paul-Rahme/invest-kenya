<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [incentives_tabs_block]
|--------------------------------------------------------------------------
*/

function shortcode_incentives_tabs_block() {

    // UNIQUE ID
    $uid = uniqid('incentives-tabs-');

    /*
    |--------------------------------------------------------------------------
    | GLOBAL FIELDS
    |--------------------------------------------------------------------------
    */
    $raw_title_first_section   = get_field('title_first_section');
    $first_text_first_section  = get_field('first_text_first_section');

    $tab_1_label = get_field('tab_1');
    $tab_2_label = get_field('tab_2');
    $tab_3_label = get_field('tab_3');

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
    $first_text_first_tab                 = get_field('first_text_first_tab');

    $first_red_title_first_tab           = get_field('first_red_title_first_tab');

    $first_information_title_first_tab   = get_field('first_information_title_first_tab');
    $second_information_title_first_tab  = get_field('second_information_title_first_tab');
    $third_information_title_first_tab   = get_field('third_information_title_first_tab');
    $fourth_information_title_first_tab  = get_field('fourth_information_title_first_tab');

    $first_information_text_first_tab    = get_field('first_information_text_first_tab');
    $second_information_text_first_tab   = get_field('second_information_text_first_tab');
    $third_information_text_first_tab    = get_field('third_information_text_first_tab');
    $fourth_information_text_first_tab   = get_field('fourth_information_text_first_tab');

    $second_red_title_first_tab          = get_field('second_red_title_first_tab');

    $first_step_number_first_tab         = get_field('first_step_number_first_tab');
    $second_step_number_first_tab        = get_field('second_step_number_first_tab');

    $first_step_title_first_tab          = get_field('first_step_title_first_tab');
    $second_step_title_first_tab         = get_field('second_step_title_first_tab');

    $first_step_text_first_tab           = get_field('first_step_text_first_tab');
    $second_step_text_first_tab          = get_field('second_step_text_first_tab');

    $button_text_first_tab               = get_field('button_text_first_tab');
    $button_link_first_tab               = get_field('button_link_first_tab');

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

    $first_information_text_second_tab   = get_field('first_information_text_second_tab');
    $second_information_text_second_tab  = get_field('second_information_text_second_tab');
    $third_information_text_second_tab   = get_field('third_information_text_second_tab');
    $fourth_information_text_second_tab  = get_field('fourth_information_text_second_tab');

    $second_red_title_second_tab         = get_field('second_red_title_second_tab');

    $first_step_number_second_tab        = get_field('first_step_number_second_tab');
    $second_step_number_second_tab       = get_field('second_step_number_second_tab');

    $first_step_title_second_tab         = get_field('first_step_title_second_tab');
    $second_step_title_second_tab        = get_field('second_step_title_second_tab');

    $first_step_text_second_tab          = get_field('first_step_text_second_tab');
    $second_step_text_second_tab         = get_field('second_step_text_second_tab');

    $button_text_second_tab              = get_field('button_text_second_tab');
    $button_link_second_tab              = get_field('button_link_second_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 3 FIELDS
    |--------------------------------------------------------------------------
    */
    $first_text_third_tab                = get_field('first_text_third_tab');

    $first_red_title_third_tab           = get_field('first_red_title_third_tab');

    $first_information_title_third_tab   = get_field('first_information_title_third_tab');
    $second_information_title_third_tab  = get_field('second_information_title_third_tab');
    $third_information_title_third_tab   = get_field('third_information_title_third_tab');
    $fourth_information_title_third_tab  = get_field('fourth_information_title_third_tab');

    $first_information_text_third_tab    = get_field('first_information_text_third_tab');
    $second_information_text_third_tab   = get_field('second_information_text_third_tab');
    $third_information_text_third_tab    = get_field('third_information_text_third_tab');
    $fourth_information_text_third_tab   = get_field('fourth_information_text_third_tab');

    $second_red_title_third_tab          = get_field('second_red_title_third_tab');

    $first_step_number_third_tab         = get_field('first_step_number_third_tab');
    $second_step_number_third_tab        = get_field('second_step_number_third_tab');

    $first_step_title_third_tab          = get_field('first_step_title_third_tab');
    $second_step_title_third_tab         = get_field('second_step_title_third_tab');

    $first_step_text_third_tab           = get_field('first_step_text_third_tab');
    $second_step_text_third_tab          = get_field('second_step_text_third_tab');

    $button_text_third_tab               = get_field('button_text_third_tab');
    $button_link_third_tab               = get_field('button_link_third_tab');

    // BUTTON ICON URL (SAME FOR ALL TABS)
    $button_icon_url = ik_upload_url('2025/12/System-Icons-1.svg');

    /*
    |--------------------------------------------------------------------------
    | RENDER: HTML + CSS + JS
    |--------------------------------------------------------------------------
    */

    ob_start();

    // HTML structure
    include get_stylesheet_directory() . '/components/tabs-block-benefits-protections-html.php';

    // Styles (contains <style> ... </style> with PHP for $uid)
    include get_stylesheet_directory() . '/components/tabs-block-benefits-protections-styles.php';

    // Script (contains <script> ... </script> with PHP for $uid)
    include get_stylesheet_directory() . '/components/tabs-block-benefits-protections-script.js';

    return ob_get_clean();
}

add_shortcode('incentives_tabs_block', 'shortcode_incentives_tabs_block');

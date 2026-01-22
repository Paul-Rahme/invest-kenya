<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: tab-block-investing-in-kenya.php
| Shortcode: [tab_block_investing_in_kenya]
|--------------------------------------------------------------------------
| Main loader file:
| - Loads functions, HTML, CSS, JS
| - Registers shortcode
| - Collects ALL ACF fields
| - Passes structured data to HTML template
|--------------------------------------------------------------------------
*/

include_once __DIR__ . '/tab-block-investing-in-kenya-functions.php';
include_once __DIR__ . '/tab-block-investing-in-kenya-html.php';
include_once __DIR__ . '/tab-block-investing-in-kenya-styles.php';
include_once __DIR__ . '/tab-block-investing-in-kenya-scripts.php';

/*
|--------------------------------------------------------------------------
| Shortcode Output Function
|--------------------------------------------------------------------------
*/
function shortcode_tab_block_investing_in_kenya() {

    // ---------------------------------------------
    // MAIN TITLE & DESCRIPTION
    // ---------------------------------------------
    $main_title_raw = get_field('main_title');
    $main_title = kn_split_title_investing($main_title_raw); // split using //

    $description = get_field('description_investing_in_kenya');

    // ---------------------------------------------
    // TAB LABELS
    // ---------------------------------------------
    $tabs = [
        get_field('first_tab_investing_in_kenya'),
        get_field('second_tab_investing_in_kenya'),
        get_field('third_tab_investing_in_kenya'),
        get_field('fourth_tab_investing_in_kenya'),
        get_field('fifth_tab_investing_in_kenya'),
        get_field('sixth_tab_investing_in_kenya'),
    ];

    // ---------------------------------------------
    // TAB 1 DATA
    // ---------------------------------------------
    $tab1 = [
        'number'      => get_field('number_first_tab_investing_in_kenya'),
        'title'       => get_field('title_number_first_tab_investing_in_kenya'),
        'description' => get_field('description_number_first_tab_investing_in_kenya'),
        'button_text' => get_field('button_text_first_tab_investing_in_kenya'),
        'button_link' => get_field('button_link_first_tab_investing_in_kenya'),
    ];

    // ---------------------------------------------
    // TAB 2 DATA
    // ---------------------------------------------
    $tab2 = [
        'number'      => get_field('number_second_tab_investing_in_kenya'),
        'title'       => get_field('title_number_second_tab_investing_in_kenya'),
        'description' => get_field('description_number_second_tab_investing_in_kenya'),
        'button_text' => get_field('button_text_second_tab_investing_in_kenya'),
        'button_link' => get_field('button_link_second_tab_investing_in_kenya'),
    ];

    // ---------------------------------------------
    // TAB 3 DATA
    // ---------------------------------------------
    $tab3 = [
        'number'      => get_field('number_third_tab_investing_in_kenya'),
        'title'       => get_field('title_number_third_tab_investing_in_kenya'),
        'description' => get_field('description_number_third_tab_investing_in_kenya'),
        'subtitle'    => get_field('subtitle_third_tab_investing_in_kenya'),

        'images' => [
            [
                'img'  => get_field('first_image_third_tab_investing_in_kenya'),
                'text' => get_field('first_image_text_third_tab_investing_in_kenya'),
				'link' => get_field('first_card_link_third_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('second_image_third_tab_investing_in_kenya'),
                'text' => get_field('second_image_text_third_tab_investing_in_kenya'),
				'link' => get_field('second_card_link_third_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('third_image_third_tab_investing_in_kenya'),
                'text' => get_field('third_image_text_third_tab_investing_in_kenya'),
				'link' => get_field('third_card_link_third_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('fourth_image_third_tab_investing_in_kenya'),
                'text' => get_field('fourth_image_text_third_tab_investing_in_kenya'),
				'link' => get_field('fourth_card_link_third_tab_investing_in_kenya')
            ],
        ]
    ];

    // ---------------------------------------------
    // TAB 4 — EXTREMELY LARGE DATASET
    // ---------------------------------------------
    $tab4 = [
        'number'      => get_field('number_fourth_tab_investing_in_kenya'),
        'title'       => get_field('title_number_fourth_tab_investing_in_kenya'),
        'description' => get_field('description_number_fourth_tab_investing_in_kenya'),

        // First Block
        'first_big_title'  => get_field('first_big_title_fourth_tab_investing_in_kenya'),
        'first_subtitle'   => get_field('first_subtitle_fourth_tab_investing_in_kenya'),
        'first_block_images' => [
            [
                'img'  => get_field('first_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('first_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('first_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('second_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('second_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('second_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('third_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('third_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('third_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('fourth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('fourth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('fourth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('fifth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('fifth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('fifth_card_link_fourth_tab_investing_in_kenya')
            ],
        ],

        // Second Block
        'second_big_title'  => get_field('second_big_title_fourth_tab_investing_in_kenya'),
        'second_subtitle'   => get_field('second_subtitle_fourth_tab_investing_in_kenya'),
        'second_block_images' => [
            [
                'img'  => get_field('sixth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('sixth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('sixth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('seventh_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('seventh_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('seventh_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('eighth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('eighth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('eighth_card_link_fourth_tab_investing_in_kenya')
            ],
        ],

        // Third Block
        'third_subtitle' => get_field('third_subtitle_fourth_tab_investing_in_kenya'),
        'third_block_images' => [
            [
                'img'  => get_field('ninth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('ninth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('ninth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('tenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('tenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('tenth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('eleventh_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('eleventh_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('eleventh_card_link_fourth_tab_investing_in_kenya')
            ],
        ],

        // Fourth Block
        'fourth_subtitle' => get_field('fourth_subtitle_fourth_tab_investing_in_kenya'),
        'fourth_block_images' => [
            [
                'img'  => get_field('twelfth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('twelfth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('twelfth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('thirteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('thirteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('thirteenth_card_link_fourth_tab_investing_in_kenya')
            ],
        ],

        // Fifth Block
        'fifth_subtitle' => get_field('fifth_subtitle_fourth_tab_investing_in_kenya'),
        'fifth_block_images' => [
            [
                'img'  => get_field('fourteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('fourteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('fourteenth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('fifteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('fifteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('fifteenth_card_link_fourth_tab_investing_in_kenya')
            ],
        ],

        // Sixth Block
        'sixth_subtitle' => get_field('sixth_subtitle_fourth_tab_investing_in_kenya'),
        'sixth_block_images' => [
            [
                'img'  => get_field('sixteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('sixteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('sixteenth_link_fourth_tab_investing_in_kenya')
            ]
        ],

        // Seventh Block (final)
        'third_big_title' => get_field('third_big_title_fourth_tab_investing_in_kenya'),
        'seventh_block_images' => [
            [
                'img'  => get_field('seventeenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('seventeenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('seventeenth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('eighteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('eighteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('eighteenth_card_link_fourth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('nineteenth_image_fourth_tab_investing_in_kenya'),
                'text' => get_field('nineteenth_image_text_fourth_tab_investing_in_kenya'),
				'link' => get_field('nineteenth_card_link_fourth_tab_investing_in_kenya')
            ],
        ],
    ];

    // ---------------------------------------------
    // TAB 5 DATA
    // ---------------------------------------------
    $tab5 = [
        'number'      => get_field('number_fifth_tab_investing_in_kenya'),
        'title'       => get_field('title_number_fifth_tab_investing_in_kenya'),
        'description' => get_field('description_number_fifth_tab_investing_in_kenya'),
        'subtitle'    => get_field('subtitle_fifth_tab_investing_in_kenya'),

        'images' => [
            [
                'img'  => get_field('first_image_fifth_tab_investing_in_kenya'),
                'text' => get_field('first_image_text_fifth_tab_investing_in_kenya'),
				'link' => get_field('first_card_link_fifth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('second_image_fifth_tab_investing_in_kenya'),
                'text' => get_field('second_image_text_fifth_tab_investing_in_kenya'),
				'link' => get_field('second_card_link_fifth_tab_investing_in_kenya')
            ],
            [
                'img'  => get_field('third_image_fifth_tab_investing_in_kenya'),
                'text' => get_field('third_image_text_fifth_tab_investing_in_kenya'),
				'link' => get_field('third_card_link_fifth_tab_investing_in_kenya')
            ],
        ]
    ];

    // ---------------------------------------------
    // TAB 6 DATA
    // ---------------------------------------------
    $tab6 = [
        'number'      => get_field('number_sixth_tab_investing_in_kenya'),
        'title'       => get_field('title_number_sixth_tab_investing_in_kenya'),
        'description' => get_field('description_number_sixth_tab_investing_in_kenya'),
        'subtitle'    => get_field('subtitle_sixth_tab_investing_in_kenya'),

        'image' => [
            'img'  => get_field('image_sixth_tab_investing_in_kenya'),
            'text' => get_field('image_text_sixth_tab_investing_in_kenya'),
			'link' => get_field('card_link_sixth_tab_investing_in_kenya')
        ],
    ];

    // ---------------------------------------------
    // RENDER FINAL HTML
    // ---------------------------------------------
    return kn_render_investing_tabs_html([
        'main_title' => $main_title,
        'description' => $description,
        'tabs' => $tabs,
        'tab1' => $tab1,
        'tab2' => $tab2,
        'tab3' => $tab3,
        'tab4' => $tab4,
        'tab5' => $tab5,
        'tab6' => $tab6
    ]);
}
add_action('wp_head', function() {
    echo kn_render_investing_tabs_styles();
});

add_action('wp_footer', function() {
    echo kn_render_investing_tabs_scripts();
});


add_shortcode('tab_block_investing_in_kenya', 'shortcode_tab_block_investing_in_kenya');

<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: third-section-block-why-kenya.php
| Shortcode: [third_section_block_why_kenya]
| Description:
| - Zero padding / zero background (handled by parent Elementor container)
| - 1530px safe area with no inner left/right padding
| - ONE unified grid (13 items) that wraps naturally on all breakpoints
| - Desktop: 5 columns
| - <1200: 3 columns
| - <900: 2 columns
| - <480: 1 column
| - Separator lines auto placed between rows depending on breakpoint
|--------------------------------------------------------------------------
*/

if (!function_exists('shortcode_third_section_block_why_kenya')) {

    function shortcode_third_section_block_why_kenya() {

        /* ---------------------------------------------
           MAIN TEXTS
        --------------------------------------------- */
        $main_title = get_field('main_title_third_section');
        $subtitle   = get_field('text_under_title_third_section');

        /* ---------------------------------------------
           BLOCKS — ORDER CONFIRMED (13 ITEMS)
           - ONLY first block has description
        --------------------------------------------- */

        $blocks = [
            [
                'icon'        => get_field('icon_first_block_third_section_'),
                'value'       => get_field('value_first_block_third_section'),
                'label'       => get_field('label_first_block_third_section'),
                'description' => get_field('description_first_block_third_section'),
            ],
            [
                'icon'        => get_field('icon_second_block_third_section'),
                'value'       => get_field('value_second_block_third_section'),
                'label'       => get_field('label_second_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_third_block_third_section'),
                'value'       => get_field('value_third_block_third_section'),
                'label'       => get_field('label_third_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_fourth_block_third_section'),
                'value'       => get_field('value_fourth_block_third_section'),
                'label'       => get_field('label_fourth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_fifth_block_third_section'),
                'value'       => get_field('value_fifth_block_third_section'),
                'label'       => get_field('label_fifth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_sixth_block_third_section'),
                'value'       => get_field('value_sixth_block_third_section'),
                'label'       => get_field('label_sixth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_seventh_block_third_section'),
                'value'       => get_field('value_seventh_block_third_section'),
                'label'       => get_field('label_seventh_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_eighth_block_third_section'),
                'value'       => get_field('value_eighth_block_third_section'),
                'label'       => get_field('label_eighth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_ninth_block_third_section'),
                'value'       => get_field('value_ninth_block_third_section'),
                'label'       => get_field('label_ninth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_tenth_block_third_section'),
                'value'       => get_field('value_tenth_block_third_section'),
                'label'       => get_field('label_tenth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_eleventh_block_third_section'),
                'value'       => get_field('value_eleventh_block_third_section'),
                'label'       => get_field('label_eleventh_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_twelveth_block_third_section'),
                'value'       => get_field('value_twelveth_block_third_section'),
                'label'       => get_field('label_twelveth_block_third_section'),
                'description' => '',
            ],
            [
                'icon'        => get_field('icon_thirteenth_block_third_section'),
                'value'       => get_field('value_thirteenth_block_third_section'),
                'label'       => get_field('label_thirteenth_block_third_section'),
                'description' => '',
            ],
        ];

        /* ---------------------------------------------
           RENDER ONE CARD
        --------------------------------------------- */
        $render_card = function ($block) {

            $icon        = $block['icon'] ?? '';
            $value       = $block['value'] ?? '';
            $label       = $block['label'] ?? '';
            $description = $block['description'] ?? '';

            // If everything empty, render nothing (keeps grid clean)
            if (!$icon && !$value && !$label && !$description) {
                return '';
            }

            ob_start(); ?>
            <div class="ik-third-section-card">
                <?php if ($icon): ?>
                    <div class="ik-third-section-card-icon">
                        <img src="<?php echo esc_url( ik_upload_url( $icon ) ); ?>" alt="" loading="lazy" />
                    </div>
                <?php endif; ?>

                <?php if ($value): ?>
                    <div class="ik-third-section-card-value">
                        <?php echo esc_html($value); ?>
                    </div>
                <?php endif; ?>

                <?php if ($label): ?>
                    <div class="ik-third-section-card-label">
                        <?php echo esc_html($label); ?>
                    </div>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="ik-third-section-card-description">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            return ob_get_clean();
        };

        $uid = uniqid('ik-third-section-');

        // Divider indices per breakpoint:
        // Desktop (5 cols): after 5, 10
        // <1200 (3 cols): after 3, 6, 9, 12
        // <900  (2 cols): after 2, 4, 6, 8, 10, 12
        $divider_after_indices = [2,3,4,5,6,8,9,10,12];

        ob_start(); ?>

        <div class="ik-third-section-wrapper" id="<?php echo esc_attr($uid); ?>">
            <div class="ik-third-section-safe">

                <?php if ($main_title || $subtitle): ?>
                    <div class="ik-third-section-header">
                        <?php if ($main_title): ?>
                            <h2 class="ik-third-section-title">
                                <?php echo esc_html($main_title); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($subtitle): ?>
                            <p class="ik-third-section-subtitle">
                                <?php echo esc_html($subtitle); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- ONE UNIFIED GRID -->
                <div class="ik-third-section-grid">
                    <?php
                    $i = 0;
                    foreach ($blocks as $block) {
                        $i++;
                        echo $render_card($block);

                        // Insert divider placeholders in DOM; CSS will show correct ones per breakpoint
                        if (in_array($i, $divider_after_indices, true)) {
                            echo '<div class="ik-third-divider ik-third-divider--after-' . esc_attr($i) . '"></div>';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>

        <style>
            /* -----------------------------------------
               WRAPPER & SAFE AREA
            ----------------------------------------- */

            .ik-third-section-wrapper {
                width: 100%;
            }

            .ik-third-section-safe {
                max-width: 1530px;
                margin-left: auto;
                margin-right: auto;
                padding-left: 0;
                padding-right: 0;
            }

            .ik-third-section-header {
                margin-bottom: 40px;
            }

            .ik-third-section-title {
                margin: 0 0 16px 0;
                color: #101110;
                font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 32px;
                line-height: 100%;
                letter-spacing: 0;
            }

            .ik-third-section-subtitle {
                margin: 0;
                color: #101110;
                font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 22px;
                line-height: 100%;
                letter-spacing: 0;
            }

            /* -----------------------------------------
               ONE GRID (DEFAULT DESKTOP: 5 COLUMNS)
            ----------------------------------------- */

            .ik-third-section-grid {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                column-gap: 48px;
                row-gap: 32px;
                width: 100%;
            }

            /* -----------------------------------------
               CARD
            ----------------------------------------- */

            .ik-third-section-card {
                display: flex;
                flex-direction: column;
            }

            .ik-third-section-card-icon {
                margin-bottom: 16px;
            }

            .ik-third-section-card-icon img {
                display: block;
                width: 32px;
                height: 32px;
                max-width: 32px;
                max-height: 32px;
            }

            .ik-third-section-card-value {
                color: #101110;
                font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 40px;
                line-height: 100%;
                letter-spacing: -0.02em;
                margin-bottom: 8px;
            }

            .ik-third-section-card-label {
                color: #101110;
                font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 16px;
                line-height: 100%;
                letter-spacing: 0;
                margin-bottom: 6px;
            }

            .ik-third-section-card-description {
                color: #101110;
                font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 14px;
                line-height: 100%;
                letter-spacing: 0;
            }

            /* -----------------------------------------
               DIVIDERS (FULL-WIDTH GRID ITEMS)
               - Present in DOM, but shown/hidden per breakpoint
            ----------------------------------------- */

            .ik-third-divider {
                grid-column: 1 / -1;
                height: 1px;
                background-color: #E6E6E6;
                margin: 8px 0; /* subtle breathing room between rows */
                display: none; /* default: hidden; enabled by breakpoint rules */
            }

            /* -----------------------------------------
               DESKTOP (>=1200px)
               5 columns => dividers after 5 and 10
            ----------------------------------------- */

            .ik-third-divider--after-5,
            .ik-third-divider--after-10 {
                display: block;
            }

            /* -----------------------------------------
               <1200px: 3 columns => dividers after 3,6,9,12
            ----------------------------------------- */

            @media (max-width: 1200px) {

                .ik-third-section-grid {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                .ik-third-section-card-value {
                    line-height: 1.1;
                }

                /* reset desktop dividers */
                .ik-third-divider {
                    display: none;
                }

                .ik-third-divider--after-3,
                .ik-third-divider--after-6,
                .ik-third-divider--after-9,
                .ik-third-divider--after-12 {
                    display: block;
                }
            }

            @media (max-width: 1024px) {
                .ik-third-section-safe {
                    padding-left: 30px;
                    padding-right: 30px;
                }
            }

            /* -----------------------------------------
               <900px: 2 columns => dividers after 2,4,6,8,10,12
            ----------------------------------------- */

            @media (max-width: 900px) {

                .ik-third-section-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                /* reset previous divider set */
                .ik-third-divider {
                    display: none;
                }

                .ik-third-divider--after-2,
                .ik-third-divider--after-4,
                .ik-third-divider--after-6,
                .ik-third-divider--after-8,
                .ik-third-divider--after-10,
                .ik-third-divider--after-12 {
                    display: block;
                }
            }

            @media (max-width: 768px) {

                .ik-third-section-header {
                    margin-bottom: 32px;
                }

                .ik-third-section-grid {
                    column-gap: 24px;
                    row-gap: 24px;
                }

                .ik-third-section-title {
                    font-size: 28px;
                }

                .ik-third-section-subtitle {
                    font-size: 20px;
                }

                .ik-third-section-card-value {
                    font-size: 32px;
                    line-height: 1.1;
                }
            }

            /* -----------------------------------------
               <480px: 1 column
               - Usually you don't need dividers; looks cleaner without lines
            ----------------------------------------- */

            @media (max-width: 480px) {

                .ik-third-section-grid {
                    grid-template-columns: 1fr;
                }

                .ik-third-section-safe {
                    padding-left: 30px;
                    padding-right: 30px;
                }

                .ik-third-divider {
                    display: none;
                }
            }
        </style>

        <?php
        return ob_get_clean();
    }

    add_shortcode('third_section_block_why_kenya', 'shortcode_third_section_block_why_kenya');
}

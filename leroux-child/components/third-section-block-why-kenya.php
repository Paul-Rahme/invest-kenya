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
| - Desktop: 1st row 5 blocks, 2nd & 3rd row 4 blocks (5th slot invisible for alignment)
| - Thin divider line between rows on desktop
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
        --------------------------------------------- */

        // Row 1 — 5 blocks (FDI inflows, FDI outflows, GDP growth, GDP contrib services, GDP contrib industry)
        $blocks_row1 = [
            [
                'icon'        => get_field('icon_first_block_third_section_'),
                'value'       => get_field('value_first_block_third_section'),
                'label'       => get_field('label_first_block_third_section'),
                // ONLY this one shows description
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
        ];

        // Row 2 — NOW 5 blocks (6th → 10th)
        $blocks_row2 = [
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
        ];

        // Row 3 — NOW last 3 blocks (11th → 13th) + 2 empty slots
        $blocks_row3 = [
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
            null, // invisible placeholder to keep 5 columns and alignment
            null, // invisible placeholder to keep 5 columns and alignment
        ];

        /* ---------------------------------------------
           RENDER ONE CARD / PLACEHOLDER
        --------------------------------------------- */
        $render_card = function ($block) {

            // placeholder (for 5th slot in rows 2 & 3)
            if ($block === null) {
                return '<div class="ik-third-section-card ik-third-section-card--empty"></div>';
            }

            $icon        = $block['icon'] ?? '';
            $value       = $block['value'] ?? '';
            $label       = $block['label'] ?? '';
            $description = $block['description'] ?? '';

            // if everything empty, treat like placeholder
            if (!$icon && !$value && !$label && !$description) {
                return '<div class="ik-third-section-card ik-third-section-card--empty"></div>';
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

                <div class="ik-third-section-rows">

                    <!-- ROW 1 -->
                    <div class="ik-third-row-wrapper ik-third-row-wrapper--top">
                        <div class="ik-third-section-row ik-third-section-row--top">
                            <?php foreach ($blocks_row1 as $block) echo $render_card($block); ?>
                        </div>
                    </div>

                    <!-- ROW 2 -->
                    <div class="ik-third-row-wrapper ik-third-row-wrapper--middle">
                        <div class="ik-third-section-row ik-third-section-row--middle">
                            <?php foreach ($blocks_row2 as $block) echo $render_card($block); ?>
                        </div>
                    </div>

                    <!-- ROW 3 -->
                    <div class="ik-third-row-wrapper ik-third-row-wrapper--bottom">
                        <div class="ik-third-section-row ik-third-section-row--bottom">
                            <?php foreach ($blocks_row3 as $block) echo $render_card($block); ?>
                        </div>
                    </div>

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

            .ik-third-section-rows {
                width: 100%;
            }

            /* -----------------------------------------
               ROW WRAPPERS (DIVIDER LINES)
            ----------------------------------------- */

            .ik-third-row-wrapper {
                position: relative;
                padding-bottom: 40px;
                margin-bottom: 40px;
            }

            .ik-third-row-wrapper:not(:last-child)::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 1px;
                background-color: #E6E6E6; /* thin light line like screenshot */
            }

            /* -----------------------------------------
               GRID LAYOUT — ALL ROWS 5 COLUMNS ON DESKTOP
               => PERFECT COLUMN ALIGNMENT
            ----------------------------------------- */

            .ik-third-section-row {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                column-gap: 48px;
                row-gap: 32px;
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

            /* Invisible placeholder card (keeps column but hides content) */
            .ik-third-section-card--empty {
                visibility: hidden;
            }

            /* -----------------------------------------
               RESPONSIVE
            ----------------------------------------- */

            @media (max-width: 1200px) {
                .ik-third-section-row {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                .ik-third-section-card-value {
                    line-height: 1.1;
                }
            }
			
			@media (max-width: 1024px) {
			.ik-third-section-safe {
                    padding-left: 30px;
                    padding-right: 30px;
                }
            }
			

            @media (max-width: 900px) {
                .ik-third-section-row {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .ik-third-row-wrapper::after {
                    display: none; /* no separators on mobile/tablet */
                }
            }

            @media (max-width: 768px) {

                .ik-third-section-header {
                    margin-bottom: 32px;
                }

                .ik-third-section-row {
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

            @media (max-width: 480px) {
                .ik-third-section-row {
                    grid-template-columns: 1fr;
                }

                .ik-third-section-safe {
                    padding-left: 30px;
                    padding-right: 30px;
                }
				
				.ik-third-row-wrapper {
    				margin-bottom: 0px;
					padding-bottom: 18px;
				}
            }
        </style>

        <?php
        return ob_get_clean();
    }

    add_shortcode('third_section_block_why_kenya', 'shortcode_third_section_block_why_kenya');
}

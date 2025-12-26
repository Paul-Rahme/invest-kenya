<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: fourth-section-block-why-kenya.php
| Shortcode: [fourth_section_block_why_kenya]
|--------------------------------------------------------------------------
*/

function shortcode_fourth_section_block_why_kenya() {

    // ACF FIELDS
    $main_title  = get_field('main_title_fourth_section');

    $subtitle_1  = get_field('first_subtitle_fourth_section');
    $subtitle_2  = get_field('second_subtitle_fourth_section');

    $value_1     = get_field('first_value_fourth_section');
    $value_2     = get_field('second_value_fourth_section');
    $value_3     = get_field('third_value_fourth_section');

    $label_1     = get_field('first_label_fourth_section');
    $label_2     = get_field('second_label_fourth_section');
    $label_3     = get_field('third_label_fourth_section');

    ob_start();
    ?>

    <div class="kn4s-wrapper">
        <div class="kn4s-safe">

            <div class="kn4s-columns">

                <!-- LEFT COLUMN — MAIN TITLE ONLY -->
                <div class="kn4s-left-col">
                    <?php if ($main_title): ?>
                        <h2 class="kn4s-main-title"><?php echo esc_html($main_title); ?></h2>
                    <?php endif; ?>
                </div>

                <!-- RIGHT COLUMN — RED LINES, SUBTITLES, VALUES -->
                <div class="kn4s-right-col">

                    <!-- FIRST RED LINE -->
                    <div class="kn4s-red-line"></div>

                    <!-- FIRST SUBTITLE -->
                    <?php if ($subtitle_1): ?>
                        <h3 class="kn4s-subtitle"><?php echo esc_html($subtitle_1); ?></h3>
                    <?php endif; ?>

                    <!-- FIRST VALUE ROW -->
                    <div class="kn4s-values-row">

                        <!-- ITEM 1 -->
                        <div class="kn4s-value-item">
                            <div class="kn4s-value"><?php echo esc_html($value_1); ?></div>
                            <div class="kn4s-label"><?php echo esc_html($label_1); ?></div>
                        </div>

                        <!-- SEPARATOR -->
                        <div class="kn4s-separator"></div>

                        <!-- ITEM 2 -->
                        <div class="kn4s-value-item">
                            <div class="kn4s-value"><?php echo esc_html($value_2); ?></div>
                            <div class="kn4s-label"><?php echo esc_html($label_2); ?></div>
                        </div>

                    </div>

                    <!-- BIG SEPARATOR BEFORE SECOND RED LINE -->
                    <div class="kn4s-full-separator"></div>

                    <!-- SECOND RED LINE -->
                    <div class="kn4s-red-line"></div>

                    <!-- SECOND SUBTITLE -->
                    <?php if ($subtitle_2): ?>
                        <h3 class="kn4s-subtitle"><?php echo esc_html($subtitle_2); ?></h3>
                    <?php endif; ?>

                    <!-- LAST VALUE (50+) -->
                    <div class="kn4s-last-value-row">
                        <div class="kn4s-value"><?php echo esc_html($value_3); ?></div>
                        <div class="kn4s-label"><?php echo esc_html($label_3); ?></div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <style>

        /* WRAPPER */
        .kn4s-wrapper { width: 100%; }

        /* SAFE AREA */
        .kn4s-safe {
            max-width: 1530px;
            margin: 0 auto;
            width: 100%;
        }

        /* TWO COLUMNS */
.kn4s-columns {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;   /* FIXES empty space on the right */
    gap: 120px;                    /* ADJUST horizontally without touching left */
    align-items: flex-start;
}

        .kn4s-left-col {
            width: 40%;
        }

        .kn4s-right-col {
            width: 60%;
        }

        /* MAIN TITLE */
        .kn4s-main-title {
            color: #101110;
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 32px;
            line-height: 100%;
            letter-spacing: 0%;
            margin: 0;
        }

        /* RED LINE */
        .kn4s-red-line {
            width: 50px;
            height: 5px;
            background-color: #DB2129;
            margin: 0 0 20px 0;
        }

        /* SUBTITLE */
        .kn4s-subtitle {
            color: #101110;
            font-family: "DM Sans";
            font-weight: 600;
            font-size: 22px;
            margin: 0 0 0 0;
        }

        /* VALUE TYPOGRAPHY */
        .kn4s-value {
            color: #101110;
            font-family: "DM Sans";
            font-weight: 600;
            font-size: 56px;
            line-height: 100px;
            letter-spacing: -2%;
        }

        /* LABELS */
        .kn4s-label {
            color: #101110;
            font-family: "DM Sans";
            font-weight: 400;
            font-size: 16px;
            margin-top: -10px;
        }

        /* VALUE ROW */
        .kn4s-values-row {
            display: flex;
            flex-direction: row;
            gap: 50px;
            align-items: flex-start;
            margin-bottom: 0px;
        }

        .kn4s-value-item { display: flex; flex-direction: column; }

        .kn4s-separator {
            width: 1px;
            height: 80px;
            background-color: #D1D1D1;
        }

        .kn4s-full-separator {
            width: 100%;
            height: 1px;
            background-color: #D1D1D1;
            margin: 18px 0;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .kn4s-safe {
                padding-left: 30px;
                padding-right: 30px;
            }
            .kn4s-columns {
                flex-direction: column;
                gap: 40px;
            }
            .kn4s-left-col, .kn4s-right-col {
                width: 100%;
            }
            .kn4s-values-row {
                flex-direction: column;
                gap: 25px;
            }
            .kn4s-separator {
                width: 100%;
                height: 1px;
            }
        }

        @media (max-width: 767px) {
            .kn4s-safe {
                padding-left: 30px;
                padding-right: 30px;
            }
        }
    </style>

    <?php
    return ob_get_clean();
}
add_shortcode('fourth_section_block_why_kenya', 'shortcode_fourth_section_block_why_kenya');

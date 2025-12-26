<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [how_we_support_investors]
| File: first-section-block-how-we-support-investors.php
|--------------------------------------------------------------------------
*/

function shortcode_how_we_support_investors() {

    /* -----------------------------------------------------------
       ACF FIELDS
    ----------------------------------------------------------- */
    $main_title_raw = get_field('main_title_first_section');
    $first_text     = get_field('first_text_first_section');

    $first_red_title  = get_field('first_red_title_first_section');
    $second_red_title = get_field('second_red_title_first_section');
    $third_red_title  = get_field('third_red_title_first_section');

    $first_icon  = get_field('first_icon_first_section');
    $second_icon = get_field('second_icon_first_section');
    $third_icon  = get_field('third_icon_first_section');

    $first_subtitle  = get_field('first_subtitle_first_section');
    $second_subtitle = get_field('second_subtitle_first_section');
    $third_subtitle  = get_field('third_subtitle_first_section');

    $first_bold  = get_field('first_bold_text_first_section');
    $second_bold = get_field('second_bold_text_first_section');
    $third_bold  = get_field('third_bold_text_first_section');

    // Subtexts mapping:
    $sub1 = get_field('first_subtext_first_section');
    $sub2 = get_field('second_subtext_first_section');
    $sub3 = get_field('third_subtext_first_section');
    $sub4 = get_field('fourth_subtext_first_section');
    $sub5 = get_field('fifth_subtext_first_section');

    /* -----------------------------------------------------------
       PROCESS MAIN TITLE SPLIT USING //
    ----------------------------------------------------------- */
    $title_part_1 = $main_title_raw;
    $title_part_2 = "";

    if (strpos($main_title_raw, '//') !== false) {
        $parts = explode('//', $main_title_raw);
        $title_part_1 = trim($parts[0]);
        $title_part_2 = trim($parts[1]);
    }

    ob_start();
    ?>

    <div class="how-support-safe-area">

        <!-- RED LINE -->
        <div class="how-support-red-line"></div>

        <!-- MAIN TITLE -->
        <h2 class="how-support-title">
            <span class="hs-title-part-1"><?php echo esc_html($title_part_1); ?></span>
            <span class="hs-title-part-2"><?php echo esc_html($title_part_2); ?></span>
        </h2>

        <!-- FIRST TEXT -->
        <p class="how-support-main-text">
            <?php echo esc_html($first_text); ?>
        </p>

        <!-- THREE COLUMN WRAPPER -->
        <div class="how-support-columns">

            <!-- COLUMN 1 -->
            <div class="hs-col">
                <div class="hs-red-title"><?php echo esc_html($first_red_title); ?></div>

                <div class="hs-icon-title-row">
                    <img src="<?php echo esc_url( ik_upload_url( $first_icon ) ); ?>" class="hs-icon" alt="">
                    <div class="hs-subtitle"><?php echo esc_html($first_subtitle); ?></div>
                </div>

                <div class="hs-bold-text"><?php echo esc_html($first_bold); ?></div>

                <p class="hs-subtext divider"><?php echo esc_html($sub1); ?></p>
                <p class="hs-subtext"><?php echo esc_html($sub2); ?></p>
            </div>

            <!-- COLUMN 2 -->
            <div class="hs-col">
                <div class="hs-red-title"><?php echo esc_html($second_red_title); ?></div>

                <div class="hs-icon-title-row">
                    <img src="<?php echo esc_url( ik_upload_url( $second_icon ) ); ?>" class="hs-icon" alt="">
                    <div class="hs-subtitle"><?php echo esc_html($second_subtitle); ?></div>
                </div>

                <div class="hs-bold-text"><?php echo esc_html($second_bold); ?></div>

                <p class="hs-subtext divider"><?php echo esc_html($sub3); ?></p>
                <p class="hs-subtext"><?php echo esc_html($sub4); ?></p>
            </div>

            <!-- COLUMN 3 -->
            <div class="hs-col">
                <div class="hs-red-title"><?php echo esc_html($third_red_title); ?></div>

                <div class="hs-icon-title-row">
                    <img src="<?php echo esc_url( ik_upload_url( $third_icon ) ); ?>" class="hs-icon" alt="">
                    <div class="hs-subtitle"><?php echo esc_html($third_subtitle); ?></div>
                </div>

                <div class="hs-bold-text"><?php echo esc_html($third_bold); ?></div>

                <p class="hs-subtext"><?php echo esc_html($sub5); ?></p>
            </div>

        </div>
    </div>

    <style>
        /* ============================================
           SAFE AREA
        ============================================ */
        .how-support-safe-area {
            max-width: 1530px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        @media (max-width: 1024px),
               (max-width: 767px) {
            .how-support-safe-area {
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        /* ============================================
           RED LINE
        ============================================ */
        .how-support-red-line {
            width: 70px;
            height: 6px;
            background: #DB2129;
            margin-bottom: 12px;
        }

        /* ============================================
           MAIN TITLE
        ============================================ */
        .how-support-title {
            margin: 0 0 10px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .hs-title-part-1 {
            font-family: "PT Serif", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 36px;
            line-height: 56px;
            color: #000000;
        }

        .hs-title-part-2 {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 36px;
            line-height: 56px;
            color: #6c6c6c;
        }

        /* ============================================
           FIRST TEXT
        ============================================ */
        .how-support-main-text {
            color: #101110;
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 100%;
            margin-bottom: 40px !important;
            max-width: 750px;
        }

        /* ============================================
           COLUMNS
        ============================================ */
        .how-support-columns {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            position: relative;
        }

        .how-support-columns .hs-col {
            position: relative;
        }

        /* VERTICAL DIVIDERS (desktop) */
        .how-support-columns .hs-col:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 0;
            right: -25px;
            width: 1px;
            height: 100%;
            background: #E5E5E5;
        }

        @media (max-width: 1024px) {
            .how-support-columns {
                grid-template-columns: 1fr;
            }

            /* remove vertical dividers */
            .how-support-columns .hs-col:not(:last-child)::after {
                display: none;
            }

            /* ADD HORIZONTAL DIVIDERS */
            .how-support-columns .hs-col:not(:last-child)::before {
                content: "";
                position: absolute;
                left: 0;
                bottom: -25px;
                width: 100%;
                height: 1px;
                background: #E5E5E5;
            }
        }

        /* ============================================
           RED TITLES
        ============================================ */
        .hs-red-title {
            color: #DB2129;
            font-family: "DM Sans", sans-serif;
            font-weight: 900;
            font-size: 16px;
            letter-spacing: 16%;
            text-transform: uppercase;
            margin-top: 12px;
            margin-bottom: 18px;
        }

        /* ============================================
           ICON + TITLE
        ============================================ */
        .hs-icon-title-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .hs-icon {
            width: 40px;
            height: 40px;
        }

        .hs-subtitle {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 26px;
            color: #101110;
            line-height: 100%;
        }

        /* ============================================
           BOLD TEXT
        ============================================ */
        .hs-bold-text {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 18px;
            line-height: 26px;
            color: #101110;
            margin-bottom: 10px;
        }

        /* ============================================
           SUBTEXTS
        ============================================ */
        .hs-subtext {
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 25px;
            color: #101110;
            margin-bottom: 14px;
            padding: 10px 0;
            position: relative;
            max-width: 600px;
        }

        .hs-subtext.divider::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 100%;
            height: 1px;
            background: #E5E5E5;
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('how_we_support_investors', 'shortcode_how_we_support_investors');

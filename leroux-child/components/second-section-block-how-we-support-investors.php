<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [how_we_support_investors_second_section]
|--------------------------------------------------------------------------
| Fully independent component — no padding, no background, 1530px safe area.
|--------------------------------------------------------------------------
*/

function shortcode_how_we_support_investors_second_section() {

    // ACF FIELDS (UPDATED FIELD NAMES)
    $red_title      = get_field('red_title_second_section');
    $icon           = get_field('icon_second_section');
    $main_title     = get_field('main_title_second_section');
    $bold_text      = get_field('bold_text_second_section');
    $normal_text    = get_field('normal_text_second_section');

    ob_start();
    ?>

    <div class="hws2-safe-area">

        <!-- RED TITLE -->
        <?php if ($red_title): ?>
            <div class="hws2-red-title">
                <?php echo esc_html($red_title); ?>
            </div>
        <?php endif; ?>

        <div class="hws2-flex">

            <!-- ICON + MAIN TITLE ON SAME ROW -->
            <div class="hws2-left">
                <div class="hws2-icon-title-row">

                    <?php if ($icon): ?>
                        <div class="hws2-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $icon ) ); ?>" alt="icon">
                        </div>
                    <?php endif; ?>

                    <?php if ($main_title): ?>
                        <h2 class="hws2-main-title">
                            <?php echo esc_html($main_title); ?>
                        </h2>
                    <?php endif; ?>

                </div>
            </div>

            <!-- RIGHT TEXT (BOLD + NORMAL) -->
            <div class="hws2-right">

                <?php if ($bold_text): ?>
                    <div class="hws2-bold-text">
                        <?php echo esc_html($bold_text); ?>
                    </div>
                <?php endif; ?>

                <?php if ($normal_text): ?>
                    <div class="hws2-normal-text">
                        <?php echo esc_html($normal_text); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

    <style>
        /* ---------------------------------------------
           SAFE AREA
        --------------------------------------------- */
        .hws2-safe-area {
            max-width: 1530px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        /* ---------------------------------------------
           RED TITLE
        --------------------------------------------- */
        .hws2-red-title {
            font-family: "DM Sans", sans-serif;
            font-weight: 900;
            font-style: Black;
            font-size: 16px;
            line-height: 100%;
            letter-spacing: 16%;
            text-transform: uppercase;
            color: #DB2129;
            margin-bottom: 35px;
        }

        /* ---------------------------------------------
           FLEX LAYOUT
        --------------------------------------------- */
        .hws2-flex {
            display: flex;
            align-items: flex-start;
            gap: 60px;
        }

        .hws2-left {
            flex: 0 0 480px;
        }

        .hws2-right {
            flex: 1;
        }

        /* ---------------------------------------------
           ICON + TITLE INLINE ROW (NEW)
        --------------------------------------------- */
        .hws2-icon-title-row {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* ---------------------------------------------
           ICON
        --------------------------------------------- */
        .hws2-icon img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            display: block;
        }

        /* ---------------------------------------------
           MAIN TITLE
        --------------------------------------------- */
        .hws2-main-title {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-style: SemiBold;
            font-size: 27px;
            line-height: 100%;
            letter-spacing: 0%;
            color: #101110;
            margin: 0;
            margin-top: 2px;
        }

        /* ---------------------------------------------
           RIGHT COLUMN TEXT WIDTH FIX (NEW)
        --------------------------------------------- */
        .hws2-right {
            max-width: 760px; /* ensures bold + normal text have same width */
        }

        /* ---------------------------------------------
           BOLD TEXT
        --------------------------------------------- */
        .hws2-bold-text {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-style: SemiBold;
            font-size: 20px;
            line-height: 26px;
            letter-spacing: 0%;
            color: #101110;
            margin-bottom: 22px;
        }

        /* ---------------------------------------------
           NORMAL TEXT
        --------------------------------------------- */
        .hws2-normal-text {
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-style: Regular;
            font-size: 18px;
            line-height: 26px;
            letter-spacing: 0%;
            color: #101110;
        }

        /* ---------------------------------------------
           RESPONSIVE (WITH 30PX SIDE PADDING)
        --------------------------------------------- */
        @media (max-width: 1024px) {

            .hws2-safe-area {
                padding-left: 30px !important;
                padding-right: 30px !important;
            }

            .hws2-flex {
                flex-direction: column;
                gap: 40px;
            }

            .hws2-left {
                flex: unset;
            }

            .hws2-right {
                max-width: 100%;
            }
        }

        @media (max-width: 767px) {

            .hws2-safe-area {
                padding-left: 30px !important;
                padding-right: 30px !important;
            }

            .hws2-main-title {
                font-size: 24px;
            }

            .hws2-bold-text {
                font-size: 18px;
                line-height: 24px;
            }

            .hws2-normal-text {
                font-size: 16px;
                line-height: 24px;
            }
        }

    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('how_we_support_investors_second_section', 'shortcode_how_we_support_investors_second_section');

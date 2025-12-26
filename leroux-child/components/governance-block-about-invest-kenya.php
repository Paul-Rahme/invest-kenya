<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [kenya_governance_block]
| Clean component – zero padding, no background, parent handles spacing.
|--------------------------------------------------------------------------
*/

function shortcode_kenya_governance_block() {

    // Detect Elementor edit mode (prevents crash)
    $in_editor = ( isset($_GET['action']) && $_GET['action'] === 'elementor' );

    // ACF FIELDS
    if ( !$in_editor ) {

        $main_title                 = get_field('title_section_4');

        $title_first_paragraph      = get_field('title_first_paragraph_section_4');
        $title_second_paragraph     = get_field('title_second_paragraph_section_4');

        $first_paragraph            = get_field('first_paragraph_section_4');
        $second_paragraph           = get_field('second_paragraph_section_4');

        $first_link_text            = get_field('first_link_text_section_4');
        $second_link_text           = get_field('second_link_text_section_4');

        $first_link_url             = get_field('first_link_url_section_4');
        $second_link_url            = get_field('second_link_url_section_4');

    } else {
        // Dummy values for Elementor preview mode
        $main_title                 = 'Sample Governance Title (Preview)';

        $title_first_paragraph      = 'Sample Subtitle 1';
        $title_second_paragraph     = 'Sample Subtitle 2';

        $first_paragraph            = 'Sample paragraph text for preview mode.';
        $second_paragraph           = 'Sample paragraph text for preview mode.';

        $first_link_text            = 'Read More';
        $second_link_text           = 'Explore More';

        $first_link_url             = '#';
        $second_link_url            = '#';
    }

    // Prevent empty output on frontend
    if (!$in_editor && (!$main_title && !$first_paragraph && !$second_paragraph)) {
        return '';
    }

    ob_start(); ?>

    <div class="kgb-safe-area">
        
        <?php if ($main_title): ?>
            <h2 class="kgb-title"><?php echo esc_html($main_title); ?></h2>
        <?php endif; ?>

        <div class="kgb-paragraph-row">

            <!-- LEFT COLUMN -->
            <div class="kgb-column">

                <?php if ($title_first_paragraph): ?>
                    <h3 class="kgb-subtitle"><?php echo esc_html($title_first_paragraph); ?></h3>
                <?php endif; ?>

                <?php if ($first_paragraph): ?>
                    <p class="kgb-text"><?php echo esc_html($first_paragraph); ?></p>
                <?php endif; ?>

                <?php if ($first_link_text && $first_link_url): ?>
                    <a href="<?php echo esc_url( home_url( $first_link_url ) ); ?>" class="kgb-readmore">
                        <?php echo esc_html($first_link_text); ?>
                        <span class="kgb-arrow-wrapper">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
    class="kgb-arrow kgb-arrow-default"
    alt="Arrow">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
    class="kgb-arrow kgb-arrow-hover"
    alt="Arrow">


                        </span>
                    </a>
                <?php endif; ?>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="kgb-column">

                <?php if ($title_second_paragraph): ?>
                    <h3 class="kgb-subtitle"><?php echo esc_html($title_second_paragraph); ?></h3>
                <?php endif; ?>

                <?php if ($second_paragraph): ?>
                    <p class="kgb-text"><?php echo esc_html($second_paragraph); ?></p>
                <?php endif; ?>

                <?php if ($second_link_text && $second_link_url): ?>
                    <a href="<?php echo esc_url( home_url( $second_link_url ) ); ?>" class="kgb-readmore">
                        <?php echo esc_html($second_link_text); ?>
                        <span class="kgb-arrow-wrapper">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
    class="kgb-arrow kgb-arrow-default"
    alt="Arrow">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
    class="kgb-arrow kgb-arrow-hover"
    alt="Arrow">


                        </span>
                    </a>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <style>
        /* ============================================
           SAFE AREA
        ============================================ */
        .kgb-safe-area {
            max-width: 1530px;
            margin: 0 auto;
            width: 100%;
        }

        /* ============================================
           MAIN TITLE
        ============================================ */
        .kgb-title {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 32px;
            line-height: 100%;
            color: #101110;
            margin: 0 0 40px 0;
        }

        /* ============================================
           COLUMN LAYOUT
        ============================================ */
        .kgb-paragraph-row {
            display: flex;
            flex-direction: row;
            gap: 60px;
        }

        .kgb-column {
            flex: 1;
        }

        /* ============================================
           SUBTITLE
        ============================================ */
        .kgb-subtitle {
            font-family: "DM Sans", sans-serif;
            font-size: 20px;
            font-weight: 600;
            line-height: 100%;
            margin: 0 0 15px 0;
            color: #101110;
        }

        /* ============================================
           PARAGRAPH
        ============================================ */
        .kgb-text {
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 22px;
            line-height: 28px;
            color: #101110;
            margin: 0 0 15px 0;
        }

        /* ============================================
           READ MORE (COPIED EXACTLY FROM NPC)
        ============================================ */
        .kgb-readmore {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            position: relative;
            padding-bottom: 4px;
            font-size: 17px;
            font-weight: 500;
            color: #DB2129 !important;
            text-decoration: none !important;
            width: fit-content;
        }

        .kgb-readmore::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: calc(100% - 1px);
            height: 1px;
            background: #DB2129;
            transition: 0.25s ease;
        }

        .kgb-arrow-wrapper {
            position: relative;
            width: 20px;
            height: 20px;
        }

        .kgb-arrow {
            position: absolute;
            inset: 0;
            width: 20px;
            height: 20px;
            object-fit: contain;
            transition: opacity .25s ease;
        }

        .kgb-arrow-default {
            opacity: 1;
        }

        .kgb-arrow-hover {
            opacity: 0;
        }

        .kgb-readmore:hover .kgb-arrow-default {
            opacity: 0 !important;
        }

        .kgb-readmore:hover .kgb-arrow-hover {
            opacity: 1 !important;
        }

        .kgb-readmore:hover {
            color: #292A29 !important;
        }

        .kgb-readmore:hover::before {
            background: #292A29;
        }

        /* ============================================
           RESPONSIVE
        ============================================ */
        @media (max-width: 1024px) {
            .kgb-safe-area {
                padding-left: 30px;
                padding-right: 30px;
            }

            .kgb-paragraph-row {
                flex-direction: column;
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .kgb-title { font-size: 26px; margin: 0 0 18px 0;}
            .kgb-text { font-size: 18px; }
            .kgb-subtitle { font-size: 18px; }
			.kgb-readmore { margin-bottom: 40px;}
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('kenya_governance_block', 'shortcode_kenya_governance_block');

<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [kenya_investment_history]
| Clean component – zero padding, no background, parent handles spacing.
|--------------------------------------------------------------------------
*/

function shortcode_kenya_investment_history() {

    // Detect Elementor edit mode (prevents crash)
    $in_editor = ( isset($_GET['action']) && $_GET['action'] === 'elementor' );

    // ACF FIELDS (safe fallback in editor mode)
    if ( !$in_editor ) {
        $main_title        = get_field('title_section_2');
        $first_paragraph   = get_field('first_paragraph_section_2');
        $second_paragraph  = get_field('second_paragraph_section_2');
    } else {
        // Dummy values for safe preview in Elementor
        $main_title        = 'Sample Title (Editor Preview)';
        $first_paragraph   = 'Sample paragraph text for preview mode.';
        $second_paragraph  = 'Sample paragraph text for preview mode.';
    }

    // Prevent shortcode from breaking frontend if ACF fields are missing
    if ( !$in_editor && (!$main_title && !$first_paragraph && !$second_paragraph) ) {
        return '';
    }

    ob_start(); ?>

    <div class="kih-safe-area">
        
        <?php if ($main_title): ?>
            <h2 class="kih-title"><?php echo esc_html($main_title); ?></h2>
        <?php endif; ?>

        <div class="kih-paragraph-row">

            <?php if ($first_paragraph): ?>
                <p class="kih-text"><?php echo esc_html($first_paragraph); ?></p>
            <?php endif; ?>

            <?php if ($second_paragraph): ?>
                <p class="kih-text"><?php echo esc_html($second_paragraph); ?></p>
            <?php endif; ?>

        </div>

    </div>

    <style>
        /* ============================================
           SAFE AREA (NO PADDING ON DESKTOP)
        ============================================ */
        .kih-safe-area {
            max-width: 1530px;
            margin: 0 auto;
            width: 100%;
        }

        /* ============================================
           TITLE TYPOGRAPHY
        ============================================ */
        .kih-title {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 32px;
            line-height: 100%;
            color: #101110;
            margin: 0 0 40px 0;
        }

        /* ============================================
           PARAGRAPH ROW (HORIZONTAL ON DESKTOP)
        ============================================ */
        .kih-paragraph-row {
            display: flex;
            flex-direction: row;
            gap: 60px;
        }

        .kih-paragraph-row .kih-text {
            flex: 1;
        }

        /* ============================================
           PARAGRAPH TYPOGRAPHY
        ============================================ */
        .kih-text {
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 22px;
            line-height: 28px;
            color: #101110;
            margin: 0;
        }

        /* ============================================
           RESPONSIVE BEHAVIOR
           + ADD 30PX LEFT/RIGHT PADDING
        ============================================ */
        @media (max-width: 1024px) {
            .kih-safe-area {
                padding-left: 30px;
                padding-right: 30px;
            }

            .kih-paragraph-row {
                flex-direction: column;
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .kih-title { font-size: 26px; margin: 0 0 16px 0; }
            .kih-text { font-size: 18px; }
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('kenya_investment_history', 'shortcode_kenya_investment_history');

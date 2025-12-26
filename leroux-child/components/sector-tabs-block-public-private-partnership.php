<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: sector-tabs-block-public-private-partnership.php
| Shortcode: [sector_tabs_ppp]
| Function: shortcode_sector_tabs_ppp
| - No padding, no background
| - Parent Elementor container handles spacing
| - Full safe-area max-width: 1530px (no left/right padding added)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_ppp() {

    // ACF FIELDS
    $title_tabs_section    = get_field('title_tabs_section');

    $first_value           = get_field('first_value_tabs_section');
    $second_value          = get_field('second_value_tabs_section');
    $third_value           = get_field('third_value_tabs_section');

    $first_label           = get_field('first_label_tabs_section');
    $second_label          = get_field('second_label_tabs_section');
    $third_label           = get_field('third_label_tabs_section');

    ob_start();
    ?>

    <div class="ppp-tabs-safe-area">

        <!-- TITLE -->
        <?php if ($title_tabs_section) : ?>
            <h2 class="ppp-tabs-title">
                <?php echo esc_html($title_tabs_section); ?>
            </h2>
        <?php endif; ?>

        <!-- VALUES ROW -->
        <div class="ppp-tabs-row">

            <!-- ITEM 1 -->
            <div class="ppp-tabs-item">
                <div class="ppp-value"><?php echo esc_html($first_value); ?></div>
                <div class="ppp-label"><?php echo esc_html($first_label); ?></div>
            </div>

            <!-- SEPERATOR -->
            <div class="ppp-separator"></div>

            <!-- ITEM 2 -->
            <div class="ppp-tabs-item">
                <div class="ppp-value"><?php echo esc_html($second_value); ?></div>
                <div class="ppp-label"><?php echo esc_html($second_label); ?></div>
            </div>

            <!-- SEPERATOR -->
            <div class="ppp-separator"></div>

            <!-- ITEM 3 -->
            <div class="ppp-tabs-item">
                <div class="ppp-value"><?php echo esc_html($third_value); ?></div>
                <div class="ppp-label"><?php echo esc_html($third_label); ?></div>
            </div>

        </div>

    </div>

    <style>
        /* SAFE AREA (NO PADDING ADDED) */
        .ppp-tabs-safe-area {
            max-width: 1530px;
            margin: 0 auto;
			   padding-top: 30px;      /* ADD */
    		   padding-bottom: 30px; 
        }

        /* TITLE STYLE */
        .ppp-tabs-title {
            color: #101110;
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 28px;
            line-height: 100%;
            margin: 0 0 50px 0;
        }

        /* ROW */
        .ppp-tabs-row {
            display: flex;
            align-items: flex-start;
            gap: 40px;
        }

        /* VALUES */
        .ppp-value {
            color: #101110;
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 42px;
            line-height: 52px;
            margin-bottom: 10px;
        }

        /* LABELS */
        .ppp-label {
            color: #101110;
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;
        }

        /* SEPERATORS */
.ppp-separator {
    width: 1px;
    background-color: #A6A6A6;
    align-self: stretch;   /* take full height of the row */
}


        /* ITEMS */
.ppp-tabs-item {
    width: 250px;
    flex: 0 0 250px; /* prevents stretching */
}
		/* RESPONSIVE SAFE AREA PADDING */
@media (max-width: 1024px) {
    .ppp-tabs-safe-area {
        padding-left: 30px;
        padding-right: 30px;
    }
}


        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .ppp-tabs-row {
                flex-direction: column;
                gap: 30px;
            }

            .ppp-separator {
                display: none;
            }
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('sector_tabs_ppp', 'shortcode_sector_tabs_ppp');

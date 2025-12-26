<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Component: Careers – First Section
| File: /leroux-child/components/careers-first-section.php
| Shortcode: [careers_first_section]
|
| Rules:
| - Zero padding
| - No background
| - Parent Elementor container controls spacing & background
| - Only enforces 1530px safe-area width
|--------------------------------------------------------------------------
*/

function careers_first_section_shortcode() {

    // =========================
    // ACF FIELDS (UPDATED)
    // =========================
    $title = get_field('main_title_first_section'); // supports "//"
    $text  = get_field('text_first_section');

    // =========================
    // SPLIT TITLE BY //
    // =========================
    $title_part_1 = '';
    $title_part_2 = '';

    if ( $title && strpos($title, '//') !== false ) {
        $parts = explode('//', $title, 2);
        $title_part_1 = trim($parts[0]);
        $title_part_2 = trim($parts[1]);
    } else {
        $title_part_1 = $title;
    }

    ob_start();
    ?>

    <!-- ===========================
         CAREERS – FIRST SECTION
    ============================ -->
    <div class="ik-careers-safe-area">

        <div class="ik-careers-grid">

            <!-- LEFT COLUMN -->
            <div class="ik-careers-left">

                <span class="ik-careers-line"></span>

                <h2 class="ik-careers-title">
                    <span class="ik-careers-title-primary">
                        <?php echo esc_html($title_part_1); ?>
                    </span>
                    <?php if ($title_part_2): ?>
                        <span class="ik-careers-title-secondary">
                            <?php echo esc_html($title_part_2); ?>
                        </span>
                    <?php endif; ?>
                </h2>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="ik-careers-right">
                <p class="ik-careers-text">
                    <?php echo esc_html($text); ?>
                </p>
            </div>

        </div>

    </div>

    <!-- ===========================
         STYLES (SELF-CONTAINED)
    ============================ -->
    <style>
        .ik-careers-safe-area {
            max-width: 1530px;
            margin-left: auto;
            margin-right: auto;
        }

        .ik-careers-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        /* RED LINE */
        .ik-careers-line {
            display: block;
            width: 70px;
            height: 6px;
            background-color: #DB2129;
            margin-bottom: 20px;
        }

        /* TITLE */
        .ik-careers-title {
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
			align-items: baseline; /* ← ADD THIS */
        }

        .ik-careers-title-primary {
            font-family: "PT Serif", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 36px;
            letter-spacing: 0px;
            color: #101110;
        }

        .ik-careers-title-secondary {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 36px;
            letter-spacing: 0px;
            color: #565A56;
        }
		.ik-careers-title-primary,
.ik-careers-title-secondary {
    line-height: 1.2;
}


        /* RIGHT TEXT */
        .ik-careers-text {
            margin: 0;
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 26px;
            letter-spacing: 0%;
            color: #101110;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .ik-careers-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('careers_first_section', 'careers_first_section_shortcode');

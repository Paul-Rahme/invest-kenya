<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [partners_showcase_block]
|--------------------------------------------------------------------------
*/

function shortcode_partners_showcase_block() {

    // ACF FIELDS
    $title = get_field('title_section_3');

    $img1  = get_field('first_image_section_3');
    $img2  = get_field('second_image_section_3');
    $img3  = get_field('third_image_section_3');
    $img4  = get_field('fourth_image_section_3');

    $img5  = get_field('fifth_image_section_3');
    $img6  = get_field('sixth_image_section_3');
    $img7  = get_field('seventh_image_section_3');
    $img8  = get_field('eighth_image_section_3');

    $img9  = get_field('ninth_image_section_3');
    $img10 = get_field('tenth_image_section_3');

    ob_start();
    ?>

    <div class="psb-wrapper">

        <!-- TITLE -->
        <?php if ($title) : ?>
            <h2 class="psb-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <!-- PARTNERS GRID -->
        <div class="psb-grid">

            <!-- ROW 1 (4 images) -->
            <?php foreach ([$img1, $img2, $img3, $img4] as $img) : ?>
                <?php if ($img) : ?>
                    <div class="psb-card">
                        <img src="<?php echo esc_url(ik_upload_url($img)); ?>" alt="">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- ROW 2 (4 images – EXACT SAME STRUCTURE) -->
            <?php foreach ([$img5, $img6, $img7, $img8] as $img) : ?>
                <?php if ($img) : ?>
                    <div class="psb-card">
                        <img src="<?php echo esc_url(ik_upload_url($img)); ?>" alt="">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- ROW 3 (ONLY 2 IMAGES – NO EXPAND) -->
            <?php if ($img9) : ?>
                <div class="psb-card">
                    <img src="<?php echo esc_url(ik_upload_url($img9)); ?>" alt="">
                </div>
            <?php endif; ?>

            <?php if ($img10) : ?>
                <div class="psb-card">
                    <img src="<?php echo esc_url(ik_upload_url($img10)); ?>" alt="">
                </div>
            <?php endif; ?>

        </div>

    </div>

    <style>
        /* ===============================================
           TYPOGRAPHY
        =============================================== */
        .psb-wrapper,
        .psb-wrapper * {
            font-family: "DM Sans", sans-serif !important;
            color: #101110;
        }

        /* ===============================================
           SAFE AREA + RESPONSIVE PADDING
        =============================================== */
        .psb-wrapper {
            max-width: 1530px;
            margin: 0 auto;
            padding: 0;
        }

        @media (max-width: 1024px) {
            .psb-wrapper {
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        @media (max-width: 600px) {
            .psb-wrapper {
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        /* ===============================================
           TITLE
        =============================================== */
        .psb-title {
            font-weight: 600;
            font-size: 32px;
            line-height: 1px;
            margin-bottom: 40px;
        }

        /* ===============================================
           GRID
        =============================================== */
        .psb-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 0;
            row-gap: 0; /* SAME LOGIC AS RESPONSIVE */
        }

        @media (max-width: 1100px) {
            .psb-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .psb-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        /* ===============================================
           PARTNER CARD
        =============================================== */
        .psb-card {
            border: 1px solid #E0E0E0;
            height: 230px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
        }

        .psb-card img {
            max-width: 70%;
            max-height: 70%;
            object-fit: contain;
        }
    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('partners_showcase_block', 'shortcode_partners_showcase_block');

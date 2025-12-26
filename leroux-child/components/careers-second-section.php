<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: careers-second-section.php
| Shortcode: [careers_second_section]
|--------------------------------------------------------------------------
*/

function shortcode_careers_second_section() {

    $careers_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'careers',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    // ICONS (using existing helper)
    $icon_handbag   = ik_upload_url('2025/11/handbag.svg');
    $icon_pin       = ik_upload_url('2025/11/Map_Pin.svg');
    $arrow_default  = ik_upload_url('2025/11/System-Icons-1-1.svg');
    $arrow_hover    = ik_upload_url('2025/11/System-Icons-2.svg');

    ob_start();
    ?>

    <div class="careers-second-section">

        <?php if ( $careers_query->have_posts() ) : ?>

            <?php while ( $careers_query->have_posts() ) : $careers_query->the_post();

                $job_classification = get_field('job_classification');
                $location           = get_field('location');
            ?>

                <div class="career-item">

                    <h3 class="career-title"><?php the_title(); ?></h3>

                    <div class="career-meta">

                        <?php if ( $job_classification ) : ?>
                            <span class="career-meta-item">
                                <img src="<?php echo esc_url($icon_handbag); ?>" class="career-icon" alt="" />
                                <span><?php echo esc_html($job_classification); ?></span>
                            </span>
                        <?php endif; ?>

                        <?php if ( $location ) : ?>
                            <span class="career-meta-item">
                                <img src="<?php echo esc_url($icon_pin); ?>" class="career-icon" alt="" />
                                <span><?php echo esc_html($location); ?></span>
                            </span>
                        <?php endif; ?>

                    </div>

                    <p class="career-description">
                        <?php echo wp_kses_post( get_the_excerpt() ); ?>
                    </p>

                    <a href="<?php the_permalink(); ?>" class="career-read-more">
                        <span class="career-read-more-text">Find out more</span>
                        <span class="career-arrow">
                            <img src="<?php echo esc_url($arrow_default); ?>" class="career-icon arrow-default" alt="" />
                            <img src="<?php echo esc_url($arrow_hover); ?>" class="career-icon arrow-hover" alt="" />
                        </span>
                    </a>

                </div>

                <div class="career-separator"></div>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <!-- Marker for CSS :has() when no careers exist -->
            <div class="no-results"></div>

        <?php endif; ?>

    </div>

    <style>
        .careers-second-section {
            max-width: 1530px;
            margin: 0 auto;
        }

        .career-title {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 24px;
            line-height: 100%;
            color: #101110;
            margin: 0 0 14px;
        }

        .career-meta {
            display: flex;
            gap: 18px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .career-meta-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-size: 14px;
            line-height: 100%;
            color: #101110;
        }

        .career-icon {
            width: 16px;
            height: 16px;
            opacity: 1;
        }

        .career-description {
            font-family: "DM Sans", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 26px;
            color: #101110;
            margin: 0 0 16px;
            max-width: 920px;
        }

        .career-read-more {
            font-family: "DM Sans", sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: #DB2129;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            position: relative;
        }

        .career-read-more::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 1px;
            background-color: currentColor;
        }

        .career-read-more:hover {
            color: #292A29;
        }

        .career-arrow {
            position: relative;
            width: 16px;
            height: 16px;
        }

        .career-arrow img {
            position: absolute;
            inset: 0;
            transition: opacity 0.2s ease;
        }

        .career-arrow .arrow-hover {
            opacity: 0;
        }

        .career-read-more:hover .arrow-default {
            opacity: 0;
        }

        .career-read-more:hover .arrow-hover {
            opacity: 1;
        }

        .career-separator {
            height: 1px;
            background: #A6A6A6;
            margin: 28px 0;
        }
		
		.careers-no-results { display: none !important; }

body:has(.careers-results .no-results) .careers-results {
    display: none !important;
}

body:has(.careers-results .no-results) .careers-no-results {
    display: flex !important;
}

    </style>

    <?php
    return ob_get_clean();
}

add_shortcode('careers_second_section', 'shortcode_careers_second_section');

<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: get-started-home-page.php
| Shortcode: [get_started_home_page]
| Notes:
| - No outer padding / no background
| - No safe-area / no max-width wrapper
| - Parent Elementor container controls spacing, padding, background
|--------------------------------------------------------------------------
*/

/**
 * Helper: Split main title into two parts using "//"
 * Example:
 *  "Begin your investment//with confidence"
 *    => [ "Begin your investment", "with confidence" ]
 */
if ( ! function_exists( 'ik_get_started_split_title_home' ) ) {
    function ik_get_started_split_title_home( $title ) {
        $title = (string) $title;

        if ( $title === '' ) {
            return array( '', '' );
        }

        $parts = explode( '//', $title, 2 );

        $part_one = isset( $parts[0] ) ? trim( $parts[0] ) : '';
        $part_two = isset( $parts[1] ) ? trim( $parts[1] ) : '';

        return array( $part_one, $part_two );
    }
}

/**
 * Shortcode callback
 */
if ( ! function_exists( 'shortcode_get_started_home_page' ) ) {
    function shortcode_get_started_home_page() {

        /* ---------------------------------------------
           ACF FIELDS — TEXTS
        --------------------------------------------- */
        $red_title       = get_field( 'red_title_get_started_section' );
        $main_title_raw  = get_field( 'main_title_get_started_section' );

        $first_number    = get_field( 'first_number_get_started_section' );
        $second_number   = get_field( 'second_number_get_started_section' );

        $first_subtitle  = get_field( 'first_subtitle_get_started_section' );
        $second_subtitle = get_field( 'second_subtitle_get_started_section' );

        $text_under_first_subtitle = get_field( 'text_under_first_subtitle_get_started_section' );

        $first_button_text = get_field( 'first_button_text_get_started_section' );
        $first_button_link = get_field( 'first_button_link_get_started_section' );

        $second_button_text = get_field( 'second_button_text_get_started_section' );
        $second_button_link = get_field( 'second_button_link_get_started_section' );

        /* ---------------------------------------------
           ACF FIELDS — ICONS & ICON TEXTS
        --------------------------------------------- */
        $first_icon       = get_field( 'first_icon_get_started_section' );
        $second_icon      = get_field( 'second_icon_get_started_section' );
        $third_icon       = get_field( 'third_icon_get_started_section' );
        $fourth_icon      = get_field( 'fourth_icon_get_started_section' );

        $first_icon_title  = get_field( 'first_icon_title_get_started_section' );
        $second_icon_title = get_field( 'second_icon_title_get_started_section' );
        $third_icon_title  = get_field( 'third_icon_title_get_started_section' );
        $fourth_icon_title = get_field( 'fourth_icon_title_get_started_section' );

        $first_icon_text  = get_field( 'first_icon_text_get_started_section' );
        $second_icon_text = get_field( 'second_icon_text_get_started_section' );
        $third_icon_text  = get_field( 'third_icon_text_get_started_section' );
        $fourth_icon_text = get_field( 'fourth_icon_text_get_started_section' );

        /* ---------------------------------------------
           Title split using "//"
        --------------------------------------------- */
        list( $main_title_part_one, $main_title_part_two ) = ik_get_started_split_title_home( $main_title_raw );

        // Static icon for buttons
        $button_icon_url = ik_upload_url('2025/12/System-Icons-1.svg');

        ob_start();
        ?>

        <div class="ik-get-started-wrapper">

            <?php if ( $red_title || $main_title_part_one || $main_title_part_two ) : ?>
                <div class="ik-get-started-header">
                    <?php if ( $red_title ) : ?>
                        <div class="ik-get-started-red-title">
                            <?php echo esc_html( $red_title ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $main_title_part_one || $main_title_part_two ) : ?>
                        <h2 class="ik-get-started-main-title">
                            <?php if ( $main_title_part_one ) : ?>
                                <span class="ik-get-started-main-title-part-one">
                                    <?php echo esc_html( $main_title_part_one ); ?>
                                </span>
                            <?php endif; ?>

                            <?php if ( $main_title_part_two ) : ?>
                                <span class="ik-get-started-main-title-part-two">
                                    <?php echo esc_html( $main_title_part_two ); ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="ik-get-started-main">
                <!-- LEFT COLUMN -->
                <div class="ik-get-started-column ik-get-started-column-left">
                    <div class="ik-get-started-number-row">
                        <?php if ( $first_number ) : ?>
                            <div class="ik-get-started-number-badge">
                                <span><?php echo esc_html( $first_number ); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ( $first_subtitle ) : ?>
                            <div class="ik-get-started-subtitle">
                                <?php echo esc_html( $first_subtitle ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $text_under_first_subtitle ) : ?>
                        <p class="ik-get-started-description">
                            <?php echo esc_html( $text_under_first_subtitle ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $first_button_text && $first_button_link ) : ?>
                        <a class="ik-get-started-btn" href="<?php echo esc_url( home_url( $first_button_link ) ); ?>">
                            <span class="ik-get-started-btn-text">
                                <?php echo esc_html( $first_button_text ); ?>
                            </span>
                            <span class="ik-get-started-btn-icon">
                                <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                            </span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- VERTICAL DIVIDER -->
                <div class="ik-get-started-divider" aria-hidden="true"></div>

                <!-- RIGHT COLUMN -->
                <div class="ik-get-started-column ik-get-started-column-right">
                    <div class="ik-get-started-number-row">
                        <?php if ( $second_number ) : ?>
                            <div class="ik-get-started-number-badge">
                                <span><?php echo esc_html( $second_number ); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_subtitle ) : ?>
                            <div class="ik-get-started-subtitle">
                                <?php echo esc_html( $second_subtitle ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="ik-get-started-icon-grid">

                        <?php if ( $first_icon_title || $first_icon_text || $first_icon ) : ?>
                            <div class="ik-get-started-icon-item">
                                <?php if ( $first_icon ) : ?>
                                    <div class="ik-get-started-icon-image">
                                        <img src="<?php echo esc_url( ik_upload_url( $first_icon ) ); ?>" alt="" />
                                    </div>
                                <?php endif; ?>
                                <div class="ik-get-started-icon-text-wrap">
                                    <?php if ( $first_icon_title ) : ?>
                                        <div class="ik-get-started-icon-title">
                                            <?php echo esc_html( $first_icon_title ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $first_icon_text ) : ?>
                                        <div class="ik-get-started-icon-text">
                                            <?php echo esc_html( $first_icon_text ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_icon_title || $second_icon_text || $second_icon ) : ?>
                            <div class="ik-get-started-icon-item">
                                <?php if ( $second_icon ) : ?>
                                    <div class="ik-get-started-icon-image">
                                        <img src="<?php echo esc_url( ik_upload_url( $second_icon ) ); ?>" alt="" />
                                    </div>
                                <?php endif; ?>
                                <div class="ik-get-started-icon-text-wrap">
                                    <?php if ( $second_icon_title ) : ?>
                                        <div class="ik-get-started-icon-title">
                                            <?php echo esc_html( $second_icon_title ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $second_icon_text ) : ?>
                                        <div class="ik-get-started-icon-text">
                                            <?php echo esc_html( $second_icon_text ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $third_icon_title || $third_icon_text || $third_icon ) : ?>
                            <div class="ik-get-started-icon-item">
                                <?php if ( $third_icon ) : ?>
                                    <div class="ik-get-started-icon-image">
                                        <img src="<?php echo esc_url( ik_upload_url( $third_icon ) ); ?>" alt="" />
                                    </div>
                                <?php endif; ?>
                                <div class="ik-get-started-icon-text-wrap">
                                    <?php if ( $third_icon_title ) : ?>
                                        <div class="ik-get-started-icon-title">
                                            <?php echo esc_html( $third_icon_title ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $third_icon_text ) : ?>
                                        <div class="ik-get-started-icon-text">
                                            <?php echo esc_html( $third_icon_text ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $fourth_icon_title || $fourth_icon_text || $fourth_icon ) : ?>
                            <div class="ik-get-started-icon-item">
                                <?php if ( $fourth_icon ) : ?>
                                    <div class="ik-get-started-icon-image">
                                        <img src="<?php echo esc_url( ik_upload_url( $fourth_icon ) ); ?>" alt="" />
                                    </div>
                                <?php endif; ?>
                                <div class="ik-get-started-icon-text-wrap">
                                    <?php if ( $fourth_icon_title ) : ?>
                                        <div class="ik-get-started-icon-title">
                                            <?php echo esc_html( $fourth_icon_title ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $fourth_icon_text ) : ?>
                                        <div class="ik-get-started-icon-text">
                                            <?php echo esc_html( $fourth_icon_text ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div><!-- .ik-get-started-icon-grid -->

                    <?php if ( $second_button_text && $second_button_link ) : ?>
                        <a class="ik-get-started-btn ik-get-started-btn-right" href="<?php echo esc_url( home_url( $second_button_link ) ); ?>">
                            <span class="ik-get-started-btn-text">
                                <?php echo esc_html( $second_button_text ); ?>
                            </span>
                            <span class="ik-get-started-btn-icon">
                                <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div><!-- .ik-get-started-main -->
        </div><!-- .ik-get-started-wrapper -->

        <style>
            .ik-get-started-wrapper {
                /* No outer padding / background here */
                color: #FFFFFF;
            }

            .ik-get-started-header {
                margin-bottom: 40px;
            }

            .ik-get-started-red-title {
                color: #DB2129;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 800;
                font-style: normal; /* ExtraBold weight is represented via 800 */
                font-size: 12px;
                line-height: 1;
                letter-spacing: 0.28em; /* 28% */
                text-transform: uppercase;
                margin-bottom: 16px;
            }

            .ik-get-started-main-title {
                margin: 0;
                font-size: 0; /* to avoid gaps between inline-block spans */
            }

            .ik-get-started-main-title-part-one,
            .ik-get-started-main-title-part-two {
                display: inline-block;
                font-size: 38px;
                line-height: 52px;
                letter-spacing: 0;
            }

            .ik-get-started-main-title-part-one {
                color: #FFFFFF;
                font-family: "PT Serif", "Times New Roman", serif;
                font-weight: 700;
                font-style: italic;
                margin-right: 8px;
            }

            .ik-get-started-main-title-part-two {
                color: #D1D5DB; /* light gray */
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
            }

            .ik-get-started-main {
                display: grid;
                grid-template-columns: minmax(0, 1.1fr) auto minmax(0, 1.3fr);
                column-gap: 72px;
                align-items: flex-start;
            }

            .ik-get-started-column {
                display: flex;
                flex-direction: column;
            }

            .ik-get-started-divider {
                width: 1px;
                background: rgba(148, 163, 184, 0.5); /* subtle vertical separator */
                align-self: stretch;
                min-height: 220px;
            }

            .ik-get-started-number-row {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-bottom: 24px;
            }

            .ik-get-started-number-badge {
                width: 30px;
                height: 30px;
                border-radius: 999px;
                background-color: #C71D24;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .ik-get-started-number-badge span {
                color: #FFFFFF;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 24px;
                line-height: 1;
                letter-spacing: 0;
            }

            .ik-get-started-subtitle {
                color: #FFFFFF;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 24px;
                line-height: 1;
                letter-spacing: 0;
            }

            .ik-get-started-description {
                margin: 0 0 32px;
                color: #F0F0F0;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 22px;
                line-height: 28px;
                letter-spacing: 0;
            }

            .ik-get-started-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 16px 32px;
                border-radius: 999px;
                background-color: #DB2129;
                text-decoration: none;
                transition: background-color 0.2s ease, transform 0.15s ease;
                margin-top: 8px;
				width: 170px;
            }

            .ik-get-started-btn-text {
                color: #FFFFFF;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 16px;
                line-height: 1;
                letter-spacing: 0;
                white-space: nowrap;
            }

            .ik-get-started-btn-icon img {
                display: block;
                width: 16px;
                height: 16px;
            }

            .ik-get-started-btn:hover {
                background-color: #565A56;
                transform: translateY(-1px);
            }

            .ik-get-started-column-right .ik-get-started-btn-right {
                margin-top: 32px;
            }

/* FIX GRID ALIGNMENT BETWEEN THE TWO ICON COLUMNS */
.ik-get-started-icon-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    column-gap: 36px;
    row-gap: 28px;
    margin-top: 16px;
    align-items: start; /* <-- REQUIRED FIX */
}


/* Ensure each icon-text item aligns consistently */
.ik-get-started-icon-item {
    display: flex;
    align-items: flex-start; /* keeps icons aligned from the top */
    gap: 16px;
}


/* FIX ICON SIZING: all icons become perfectly aligned */
.ik-get-started-icon-image {
    width: 26px;
    height: 26px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ik-get-started-icon-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

            .ik-get-started-icon-text-wrap {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .ik-get-started-icon-title {
                color: #FFFFFF;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 20px;
                line-height: 1;
                letter-spacing: 0;
            }

            .ik-get-started-icon-text {
                color: #F0F0F0;
                font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 18px;
                line-height: 26px;
                letter-spacing: 0;
            }

            /* RESPONSIVE */
            @media (max-width: 1100px) {
                .ik-get-started-main {
                    grid-template-columns: minmax(0, 1fr);
                    row-gap: 40px;
                }

                .ik-get-started-divider {
                    display: none;
                }
            }

            @media (max-width: 900px) {
                .ik-get-started-icon-grid {
                    grid-template-columns: minmax(0, 1fr);
                }

                .ik-get-started-column-right .ik-get-started-btn-right {
                    margin-top: 24px;
                }
            }

            @media (max-width: 600px) {
                .ik-get-started-header {
                    margin-bottom: 28px;
                }

                .ik-get-started-main-title-part-one,
                .ik-get-started-main-title-part-two {
                    font-size: 28px;
                    line-height: 38px;
                }

                .ik-get-started-description {
                    font-size: 18px;
                }

                .ik-get-started-subtitle {
                    font-size: 20px;
                }

                .ik-get-started-icon-title {
                    font-size: 18px;
                }

                .ik-get-started-icon-text {
                    font-size: 16px;
                    line-height: 24px;
                }

                .ik-get-started-btn {
                    padding: 14px 24px;
                }
            }
        </style>

        <?php
        return ob_get_clean();
    }

    add_shortcode( 'get_started_home_page', 'shortcode_get_started_home_page' );
}

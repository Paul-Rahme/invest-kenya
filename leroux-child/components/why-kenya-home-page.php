<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: why-kenya-home-page.php
| Shortcode: [why_kenya_home_page]
| Notes:
| - No outer padding / no background
| - Parent Elementor container handles spacing, padding, and background
| - Fully self-contained (HTML + CSS in this file)
|--------------------------------------------------------------------------
*/

/**
 * Helper: split main title into two parts using `//`
 * Example:
 *  - "6 reasons//you should invest in Kenya"
 *      => ["6 reasons", "you should invest in Kenya"]
 *  - "6 reasons" (no //)
 *      => ["6 reasons", ""]
 */
if ( ! function_exists( 'ik_split_main_title_why_kenya_home' ) ) {
    function ik_split_main_title_why_kenya_home( $text ) {
        $text = (string) $text;

        if ( $text === '' ) {
            return array( '', '' );
        }

        // Split into maximum 2 parts
        $parts  = explode( '//', $text, 2 );
        $first  = isset( $parts[0] ) ? trim( $parts[0] ) : '';
        $second = isset( $parts[1] ) ? trim( $parts[1] ) : '';

        return array( $first, $second );
    }
}

/**
 * Shortcode callback
 */
function shortcode_why_kenya_home_page() {

    // ACF FIELDS — TEXTS
    $red_title        = get_field( 'red_title_why_kenya_section' );
    $main_title_raw   = get_field( 'main_title_why_kenya_section' );

    $button_text      = get_field( 'button_text_why_kenya_section' );
    $button_link      = get_field( 'button_link_why_kenya_section' );

    // ACF FIELDS — ICONS (expecting image URLs as text)
    $icons = array(
        get_field( 'first_icon_why_kenya_section' ),
        get_field( 'second_icon_why_kenya_section' ),
        get_field( 'third_icon_why_kenya_section' ),
        get_field( 'fourth_icon_why_kenya_section' ),
        get_field( 'fifth_icon_why_kenya_section' ),
        get_field( 'sixth_icon_why_kenya_section' ),
    );

    // ACF FIELDS — TEXTS UNDER ICONS
    $texts = array(
        get_field( 'first_text_why_kenya_section' ),
        get_field( 'second_text_why_kenya_section' ),
        get_field( 'third_text_why_kenya_section' ),
        get_field( 'fourth_text_why_kenya_section' ),
        get_field( 'fifth_text_why_kenya_section' ),
        get_field( 'sixth_text_why_kenya_section' ),
    );

    // Split main title into two parts (before and after //)
    list( $main_title_first, $main_title_second ) = ik_split_main_title_why_kenya_home( $main_title_raw );

    // Unique ID for this instance (for scoped CSS)
    $uid = 'ik-why-kenya-home-' . uniqid();

    ob_start();
    ?>

    <style>
        /* Scoped styles for this component instance */
        #<?php echo esc_attr( $uid ); ?>.ik-why-kenya-home-wrapper {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            background: transparent;
            width: 100%;
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-header {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 40px;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-red-title {
            color: #DB2129;
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 800;
            font-style: normal;
            font-size: 12px;
            line-height: 100%;
            letter-spacing: 0.28em; /* 28% */
            text-transform: uppercase;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title {
            margin: 0;
            font-size: 0; /* so inline parts don't add extra spacing */
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part1 {
            display: inline-block;
            color: #101110;
            font-family: "PT Serif", "Times New Roman", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 38px;
            line-height: 46px;
            letter-spacing: -0.02em;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part2 {
            display: inline-block;
            color: #565A56; /* light gray tone */
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 38px;
            line-height: 46px;
            letter-spacing: -0.02em;
            margin-left: 8px;
        }

        /* Reasons grid */
        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reasons {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            column-gap: 48px;
            row-gap: 40px;
            margin-bottom: 48px;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reason {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-icon img {
            display: block;
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reason-text {
            color: #101110;
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 20px;
            line-height: 100%;
            letter-spacing: 0;
        }

        /* Button row */
        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-cta {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 18px 32px;
            border-radius: 999px;
            background-color: #DB2129;
            color: #FFFFFF;
            text-decoration: none;
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 16px;
            line-height: 100%;
            letter-spacing: 0;
            transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-button:hover {
            background-color: #292A29;
            transform: translateY(-1px);
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-button-icon {
            display: inline-flex;
            width: 16px;
            height: 16px;
        }

        #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-button-icon img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Responsive behavior */
        @media (max-width: 1200px) {
            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reasons {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 880px) {
            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reasons {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part1,
            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part2 {
                font-size: 30px;
                line-height: 38px;
            }
        }

        @media (max-width: 600px) {
            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-reasons {
                grid-template-columns: 1fr;
            }

            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-header {
                margin-bottom: 32px;
            }

            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part1,
            #<?php echo esc_attr( $uid ); ?> .ik-why-kenya-home-main-title-part2 {
                font-size: 26px;
                line-height: 34px;
            }
        }
    </style>

    <div id="<?php echo esc_attr( $uid ); ?>" class="ik-why-kenya-home-wrapper">

        <?php if ( $red_title || $main_title_first || $main_title_second ) : ?>
            <div class="ik-why-kenya-home-header">
                <?php if ( $red_title ) : ?>
                    <div class="ik-why-kenya-home-red-title">
                        <?php echo esc_html( $red_title ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $main_title_first || $main_title_second ) : ?>
                    <h2 class="ik-why-kenya-home-main-title">
                        <?php if ( $main_title_first ) : ?>
                            <span class="ik-why-kenya-home-main-title-part1">
                                <?php echo esc_html( $main_title_first ); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ( $main_title_second ) : ?>
                            <span class="ik-why-kenya-home-main-title-part2">
                                <?php echo esc_html( $main_title_second ); ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php
        // Render reasons only if at least one icon/text exists
        $has_reasons = false;
        foreach ( $icons as $index => $icon ) {
            if ( ! empty( $icon ) || ! empty( $texts[ $index ] ?? '' ) ) {
                $has_reasons = true;
                break;
            }
        }

        if ( $has_reasons ) : ?>
            <div class="ik-why-kenya-home-reasons">
                <?php for ( $i = 0; $i < 6; $i++ ) :
                    $icon_url = isset( $icons[ $i ] ) ? trim( (string) $icons[ $i ] ) : '';
                    $text     = isset( $texts[ $i ] ) ? trim( (string) $texts[ $i ] ) : '';

                    if ( $icon_url === '' && $text === '' ) {
                        continue;
                    }
                    ?>
                    <div class="ik-why-kenya-home-reason">
                        <?php if ( $icon_url !== '' ) : ?>
                            <div class="ik-why-kenya-home-icon">
                                <img src="<?php echo esc_url( ik_upload_url( $icon_url ) ); ?>" alt="" />
                            </div>
                        <?php endif; ?>

                        <?php if ( $text !== '' ) : ?>
                            <div class="ik-why-kenya-home-reason-text">
                                <?php echo esc_html( $text ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <?php if ( $button_text && $button_link ) : ?>
            <div class="ik-why-kenya-home-cta">
                <a class="ik-why-kenya-home-button" href="<?php echo esc_url( home_url( $button_link ) ); ?>">
                    <span><?php echo esc_html( $button_text ); ?></span>
                    <span class="ik-why-kenya-home-button-icon">
                        <img src="<?php echo esc_url( ik_upload_url('2025/12/System-Icons-1.svg') ); ?>" alt="" />
                    </span>
                </a>
            </div>
        <?php endif; ?>

    </div>

    <?php
    return ob_get_clean();
}
add_shortcode( 'why_kenya_home_page', 'shortcode_why_kenya_home_page' );

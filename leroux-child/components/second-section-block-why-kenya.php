<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: second-section-block-why-kenya.php
| Shortcode: [second_section_block_why_kenya]
| Description: "Invest in Kenya’s rapidly growing economy" section
| - No outer padding / no background
| - 1530px safe area
| - All spacing & background handled by parent Elementor container
|--------------------------------------------------------------------------
*/

/**
 * Helper: format text and convert {text} to bold on its own line.
 * Old behavior used //text// — now we ONLY use {text}.
 */
if ( ! function_exists( 'kn_format_text_with_double_slashes_why_kenya' ) ) {
    function kn_format_text_with_double_slashes_why_kenya( $text ) {
        if ( ! $text ) {
            return '';
        }

        // Convert line breaks first
        $text = nl2br( $text );

        // Replace {something} with <br><strong>something</strong><br>
        $text = preg_replace_callback(
            '#\{(.*?)\}#',
            function ( $matches ) {
                $inner = trim( $matches[1] );
                return '<br><strong>' . esc_html( $inner ) . '</strong><br>';
            },
            $text
        );

        // Allow only <strong> and <br> tags
        $allowed_tags = array(
            'br'     => array(),
            'strong' => array(),
        );

        return wp_kses( $text, $allowed_tags );
    }
}

/**
 * Shortcode callback
 */
function shortcode_second_section_block_why_kenya() {

    // ACF FIELDS
    $main_title = get_field( 'main_title_second_section' );

    $first_value_text   = get_field( 'first_value_text_second_section' );
    $second_value_text  = get_field( 'second_value_text_second_section' );
    $third_value_text   = get_field( 'third_value_text_second_section' );

    $first_value_desc   = get_field( 'first_value_description_second_section' );
    $second_value_desc  = get_field( 'second_value_description_second_section' );
    $third_value_desc   = get_field( 'third_value_description_second_section' );

    $text_under_separator = get_field( 'text_under_separator_second_section' );

    $first_icon   = get_field( 'first_icon_second_section' );
    $second_icon  = get_field( 'second_icon_second_section' );
    $third_icon   = get_field( 'third_icon_second_section' );
    $fourth_icon  = get_field( 'fourth_icon_second_section' );
    $fifth_icon   = get_field( 'fifth_icon_second_section' );

    $text_under_first_icon   = get_field( 'text_under_first_icon_second_section' );
    $text_under_second_icon  = get_field( 'text_under_second_icon_second_section' );
    $text_under_third_icon   = get_field( 'text_under_third_icon_second_section' );
    $text_under_fourth_icon  = get_field( 'text_under_fourth_icon_second_section' );
    $text_under_fifth_icon   = get_field( 'text_under_fifth_icon_second_section' );

    ob_start();
    ?>

    <div class="why-kenya-block">
        <div class="why-kenya-safe-area">

            <?php if ( $main_title ) : ?>
                <h2 class="why-kenya2-main-title">
                    <?php echo esc_html( $main_title ); ?>
                </h2>
            <?php endif; ?>

            <div class="why-kenya-values-row">

                <div class="why-kenya-value-item why-kenya-value-item--first">
                    <span class="why-kenya-red-line"></span>

                    <?php if ( $first_value_text ) : ?>
                        <div class="why-kenya-value-number why-kenya-value-number--small">
                            <?php echo esc_html( $first_value_text ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $first_value_desc ) : ?>
                        <div class="why-kenya-value-description">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $first_value_desc ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-value-item">
                    <span class="why-kenya-red-line"></span>

                    <?php if ( $second_value_text ) : ?>
                        <div class="why-kenya-value-number why-kenya-value-number--large">
                            <?php echo esc_html( $second_value_text ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_value_desc ) : ?>
                        <div class="why-kenya-value-description">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $second_value_desc ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-value-item">
                    <span class="why-kenya-red-line"></span>

                    <?php if ( $third_value_text ) : ?>
                        <div class="why-kenya-value-number why-kenya-value-number--large">
                            <?php echo esc_html( $third_value_text ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_value_desc ) : ?>
                        <div class="why-kenya-value-description">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $third_value_desc ); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div><!-- .why-kenya-values-row -->

            <div class="why-kenya-middle-block">
                <div class="why-kenya-middle-separator"></div>

                <?php if ( $text_under_separator ) : ?>
                    <div class="why-kenya-middle-text">
                        <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_separator ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="why-kenya-bottom-grid">

                <div class="why-kenya-bottom-card">
                    <?php if ( $first_icon ) : ?>
                        <div class="why-kenya-card-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $first_icon ) ); ?>" alt="" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_under_first_icon ) : ?>
                        <div class="why-kenya-card-text">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_first_icon ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-bottom-card">
                    <?php if ( $second_icon ) : ?>
                        <div class="why-kenya-card-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $second_icon ) ); ?>" alt="" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_under_second_icon ) : ?>
                        <div class="why-kenya-card-text">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_second_icon ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-bottom-card">
                    <?php if ( $third_icon ) : ?>
                        <div class="why-kenya-card-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $third_icon ) ); ?>" alt="" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_under_third_icon ) : ?>
                        <div class="why-kenya-card-text">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_third_icon ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-bottom-card">
                    <?php if ( $fourth_icon ) : ?>
                        <div class="why-kenya-card-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $fourth_icon ) ); ?>" alt="" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_under_fourth_icon ) : ?>
                        <div class="why-kenya-card-text">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_fourth_icon ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="why-kenya-bottom-card">
                    <?php if ( $fifth_icon ) : ?>
                        <div class="why-kenya-card-icon">
                            <img src="<?php echo esc_url( ik_upload_url( $fifth_icon ) ); ?>" alt="" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_under_fifth_icon ) : ?>
                        <div class="why-kenya-card-text">
                            <?php echo kn_format_text_with_double_slashes_why_kenya( $text_under_fifth_icon ); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div><!-- .why-kenya-bottom-grid -->

        </div><!-- .why-kenya-safe-area -->
    </div><!-- .why-kenya-block -->

    <style>
        .why-kenya-block {
            width: 100%;
            /* No padding, no background here.
               Parent Elementor container controls spacing & background. */
        }

        .why-kenya-safe-area {
            max-width: 1530px;
            margin: 0 auto;
        }

        .why-kenya2-main-title {
            margin: 0 0 48px 0;
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 32px;
            line-height: 100%;
            letter-spacing: 0;
            color: black;
        }

        .why-kenya-values-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 64px;
            margin-bottom: 18px;
        }

        .why-kenya-value-item {
            flex: 1 1 0;
            min-width: 260px;
            max-width: 460px;
        }

        .why-kenya-value-item--first {
            max-width: 420px;
        }

        .why-kenya-red-line {
            display: block;
            width: 50px;
            height: 5px;
            background-color: #F76467;
            opacity: 1;
            margin-bottom: 24px;
        }

        .why-kenya-value-number {
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 600;
            font-style: normal;
            color: black;
            letter-spacing: 0;
        }

        .why-kenya-value-number--small {
            font-size: 56px;
            line-height: 100%;
        }

        .why-kenya-value-number--large {
            font-size: 56px;
            line-height: 100%;
            letter-spacing: -0.02em;
        }

        .why-kenya-value-description {
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 26px;
            letter-spacing: 0;
            color: black;
            opacity: 1;
        }

        .why-kenya-value-description strong {
            font-weight: 600;
        }

        .why-kenya-middle-block {
            margin-top: 18px;
            margin-bottom: 32px;
        }

        .why-kenya-middle-separator {
            width: 100%;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.16);
            margin-bottom: 24px;
        }

        .why-kenya-middle-text {
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 20px;
            line-height: 100%;
            letter-spacing: 0;
            color: black;
        }

        .why-kenya-bottom-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 24px;
        }

        .why-kenya-bottom-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            min-height: 180px;
        }

        .why-kenya-card-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .why-kenya-card-icon img {
            width: 40px;
            height: 40px;
            display: block;
        }

        .why-kenya-card-text {
            font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0;
            color: black;
        }

        .why-kenya-card-text strong {
            font-weight: 700;
        }

        /* Tablet & mobile: safe-area side padding 30px, responsive layout */
        @media (max-width: 1024px) {
            .why-kenya-safe-area {
                padding: 0 30px;
            }

            .why-kenya-values-row {
                gap: 40px;
            }

            .why-kenya-bottom-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .why-kenya-values-row {
                flex-direction: column;
                gap: 32px;
            }

            .why-kenya2-main-title {
                margin-bottom: 32px;
            }

            .why-kenya-bottom-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <?php
    return ob_get_clean();
}
add_shortcode( 'second_section_block_why_kenya', 'shortcode_second_section_block_why_kenya' );

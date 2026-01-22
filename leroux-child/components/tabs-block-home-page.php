<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: tabs-block-home-page.php
| Shortcode: [tabs_home]
| Function: tabs_block_home_page
| Notes:
| - No safe area / no max-width
| - No outer padding / no background
| - Parent Elementor container handles spacing, padding, and background
|--------------------------------------------------------------------------
*/

/**
 * Helper: split numeric value and suffix.
 * Example:
 *  - "6.3Mn"  => ["6.3", "Mn"]
 *  - "2$"     => ["2", "$"]
 *  - "120 Kt" => ["120", "Kt"]
 */
if ( ! function_exists( 'ik_tabs_split_value_suffix_home' ) ) {
    function ik_tabs_split_value_suffix_home( $value ) {
        $value = trim( (string) $value );

        if ( $value === '' ) {
            return array( '', '' );
        }

        // Match initial numeric part (with optional decimal) and any suffix
        if ( preg_match( '/^([0-9]+(?:[.,][0-9]+)?)\s*(.*)$/u', $value, $matches ) ) {
            $number = $matches[1];
            $suffix = isset( $matches[2] ) ? $matches[2] : '';
        } else {
            // Fallback: treat the entire string as the number
            $number = $value;
            $suffix = '';
        }

        return array( $number, $suffix );
    }
}

if ( ! function_exists( 'ik_split_title_double_slash' ) ) {
    function ik_split_title_double_slash( $title ) {
        $parts = explode('//', $title, 2);

        $first  = trim($parts[0]);
        $second = isset($parts[1]) ? trim($parts[1]) : '';

        return array($first, $second);
    }
}


if ( ! function_exists( 'tabs_block_home_page' ) ) {
    function tabs_block_home_page() {

        // Unique ID for scoping CSS/JS
        $uid = 'ik-tabs-home-' . uniqid();

        // ---------------------------------------------------------------------
        // ACF FIELDS — SECTION HEADERS
        // ---------------------------------------------------------------------
        $small_title  = get_field( 'small_title_tabs_section' );
        $main_title   = get_field( 'main_title_tabs_section' );
        $button_text  = get_field( 'button_text_tabs_section' );
        $button_link  = get_field( 'button_link_tabs_section' );

        // Icon URLs (fixed from design)
$main_button_icon_default = ik_upload_url('2025/11/System-Icons-1-1.svg'); // new arrow
$main_button_icon_hover   = ik_upload_url('2025/12/System-Icons-1.svg');   // old icon


$tab_button_icon_default  = ik_upload_url('2025/12/System-Icons-1.svg');

        // ---------------------------------------------------------------------
        // ACF FIELDS — TAB LABELS
        // ---------------------------------------------------------------------
        $tab_labels = array(
            get_field( 'first_tab_tabs_section' ),
            get_field( 'second_tab_tabs_section' ),
            get_field( 'third_tab_tabs_section' ),
            get_field( 'fourth_tab_tabs_section' ),
            get_field( 'fifth_tab_tabs_section' ),
        );

        // ---------------------------------------------------------------------
        // ACF FIELDS — TABS CONTENT DATA
        // 5 tabs, each with description, image, 2 values, 2 labels, and button
        // ---------------------------------------------------------------------
        $tabs = array(
            array(
                'description'   => get_field( 'description_first_tab_tabs_section' ),
                'image'         => get_field( 'image_first_tab_tabs_section' ),
                'value1'        => get_field( 'first_value_first_tab_tabs_section' ),
                'value2'        => get_field( 'second_value_first_tab_tabs_section' ),
                'label1'        => get_field( 'first_label_first_tab_tabs_section' ),
                'label2'        => get_field( 'second_label_first_tab_tabs_section' ),
                'button_text'   => get_field( 'tab_button_text_first_tab_tabs_section' ),
                'button_link'   => get_field( 'tab_button_link_first_tab_tabs_section' ),
            ),
            array(
                'description'   => get_field( 'description_second_tab_tabs_section' ),
                'image'         => get_field( 'image_second_tab_tabs_section' ),
                'value1'        => get_field( 'first_value_second_tab_tabs_section' ),
                'value2'        => get_field( 'second_value_second_tab_tabs_section' ),
                'label1'        => get_field( 'first_label_second_tab_tabs_section' ),
                'label2'        => get_field( 'second_label_second_tab_tabs_section' ),
                'button_text'   => get_field( 'tab_button_text_second_tab_tabs_section' ),
                'button_link'   => get_field( 'tab_button_link_second_tab_tabs_section' ),
            ),
            array(
                'description'   => get_field( 'description_third_tab_tabs_section' ),
                'image'         => get_field( 'image_third_tab_tabs_section' ),
                'value1'        => get_field( 'first_value_third_tab_tabs_section' ),
                'value2'        => get_field( 'second_value_third_tab_tabs_section' ),
                'label1'        => get_field( 'first_label_third_tab_tabs_section' ),
                'label2'        => get_field( 'second_label_third_tab_tabs_section' ),
                'button_text'   => get_field( 'tab_button_text_third_tab_tabs_section' ),
                'button_link'   => get_field( 'tab_button_link_third_tab_tabs_section' ),
            ),
            array(
                'description'   => get_field( 'description_fourth_tab_tabs_section' ),
                'image'         => get_field( 'image_fourth_tab_tabs_section' ),
                'value1'        => get_field( 'first_value_fourth_tab_tabs_section' ),
                'value2'        => get_field( 'second_value_fourth_tab_tabs_section' ),
                'label1'        => get_field( 'first_label_fourth_tab_tabs_section' ),
                'label2'        => get_field( 'second_label_fourth_tab_tabs_section' ),
                'button_text'   => get_field( 'tab_button_text_fourth_tab_tabs_section' ),
                'button_link'   => get_field( 'tab_button_link_fourth_tab_tabs_section' ),
            ),
            array(
                'description'   => get_field( 'description_fifth_tab_tabs_section' ),
                'image'         => get_field( 'image_fifth_tab_tabs_section' ),
                'value1'        => get_field( 'first_value_fifth_tab_tabs_section' ),
                'value2'        => get_field( 'second_value_fifth_tab_tabs_section' ),
                'label1'        => get_field( 'first_label_fifth_tab_tabs_section' ),
                'label2'        => get_field( 'second_label_fifth_tab_tabs_section' ),
                'button_text'   => get_field( 'tab_button_text_fifth_tab_tabs_section' ),
                'button_link'   => get_field( 'tab_button_link_fifth_tab_tabs_section' ),
            ),
        );

        // ---------------------------------------------------------------------
        // OUTPUT START
        // ---------------------------------------------------------------------
        ob_start();
        ?>

        <div id="<?php echo esc_attr( $uid ); ?>" class="ik-tabs-home-root">
            <div class="ik-tabs-home-inner">

                <?php if ( $small_title || $main_title || $button_text ) : ?>
                    <div class="ik-tabs-home-header">
                        <div class="ik-tabs-home-header-text">
                            <?php if ( $small_title ) : ?>
                                <div class="ik-tabs-home-small-title">
                                    <?php echo esc_html( $small_title ); ?>
                                </div>
                            <?php endif; ?>

<?php if ( $main_title ) :
    list( $title_primary, $title_secondary ) = ik_split_title_double_slash( $main_title );
?>
    <h2 class="ik-tabs-home-main-title">
        <span class="ik-tabs-home-title-primary">
            <?php echo esc_html( $title_primary ); ?>
        </span>

        <?php if ( $title_secondary ) : ?>
            <span class="ik-tabs-home-title-secondary">
                <?php echo esc_html( $title_secondary ); ?>
            </span>
        <?php endif; ?>
    </h2>
<?php endif; ?>

                        </div>

                        <?php if ( $button_text && $button_link ) : ?>
                            <div class="ik-tabs-home-header-cta">
<a class="ik-tabs-home-main-button" href="<?php echo esc_url( home_url( $button_link ) ); ?>">
    <span class="ik-tabs-home-main-button-text">
        <?php echo esc_html( $button_text ); ?>
    </span>

    <!-- Default icon -->
    <span class="ik-tabs-home-main-button-icon ik-tabs-home-main-button-icon-default">
        <img src="<?php echo esc_url( $main_button_icon_default ); ?>" alt="" loading="lazy" />
    </span>

    <!-- Hover icon -->
    <span class="ik-tabs-home-main-button-icon ik-tabs-home-main-button-icon-hover">
        <img src="<?php echo esc_url( $main_button_icon_hover ); ?>" alt="" loading="lazy" />
    </span>
</a>

                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php
                // Check if we have at least one tab label
                $has_tabs = false;
                foreach ( $tab_labels as $lbl ) {
                    if ( ! empty( $lbl ) ) {
                        $has_tabs = true;
                        break;
                    }
                }

                if ( $has_tabs ) :
                ?>
                    <div class="ik-tabs-home-tabs-wrapper">
                        <div class="ik-tabs-home-tabs-scroll">
                            <?php
                            foreach ( $tab_labels as $index => $label ) :
                                if ( ! $label ) {
                                    // keep alignment – hidden tab
                                    echo '<div class="ik-tabs-home-tab ik-tabs-home-tab-hidden" data-tab="tab-' . esc_attr( $index ) . '"></div>';
                                    continue;
                                }
                                $is_active = ( $index === 0 ) ? ' ik-tabs-home-tab--active' : '';
                                ?>
                                <div
                                    class="ik-tabs-home-tab<?php echo esc_attr( $is_active ); ?>"
                                    data-tab="tab-<?php echo esc_attr( $index ); ?>">
                                    <span class="ik-tabs-home-tab-label">
                                        <?php echo esc_html( $label ); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="ik-tabs-home-tabs-underline"></div>
                    </div>

                    <div class="ik-tabs-home-panels">
                        <?php foreach ( $tabs as $index => $tab ) :

                            $is_active_panel = ( $index === 0 ) ? ' ik-tabs-home-panel--active' : '';

                            list( $value1_number, $value1_suffix ) = ik_tabs_split_value_suffix_home( $tab['value1'] );
                            list( $value2_number, $value2_suffix ) = ik_tabs_split_value_suffix_home( $tab['value2'] );

                            ?>
                            <div
                                class="ik-tabs-home-panel<?php echo esc_attr( $is_active_panel ); ?>"
                                data-panel="tab-<?php echo esc_attr( $index ); ?>"
                            >
                                <div class="ik-tabs-home-panel-inner">
                                    <div class="ik-tabs-home-panel-left">
                                        <?php if ( ! empty( $tab['description'] ) ) : ?>
                                            <p class="ik-tabs-home-description">
                                                <?php echo esc_html( $tab['description'] ); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if ( $value1_number || $value2_number || $tab['label1'] || $tab['label2'] ) : ?>
                                            <div class="ik-tabs-home-values">
                                                <?php if ( $value1_number || $tab['label1'] ) : ?>
                                                    <div class="ik-tabs-home-value-block">
                                                        <?php if ( $value1_number ) : ?>
                                                            <div class="ik-tabs-home-value">
                                                                <span class="ik-tabs-home-value-number">
                                                                    <?php echo esc_html( $value1_number ); ?>
                                                                </span>
                                                                <?php if ( $value1_suffix ) : ?>
                                                                    <span class="ik-tabs-home-value-suffix">
                                                                        <?php echo esc_html( $value1_suffix ); ?>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if ( ! empty( $tab['label1'] ) ) : ?>
                                                            <div class="ik-tabs-home-value-label">
                                                                <?php echo esc_html( $tab['label1'] ); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ( $value2_number || $tab['label2'] ) : ?>
                                                    <div class="ik-tabs-home-value-block">
                                                        <?php if ( $value2_number ) : ?>
                                                            <div class="ik-tabs-home-value">
                                                                <span class="ik-tabs-home-value-number">
                                                                    <?php echo esc_html( $value2_number ); ?>
                                                                </span>
                                                                <?php if ( $value2_suffix ) : ?>
                                                                    <span class="ik-tabs-home-value-suffix">
                                                                        <?php echo esc_html( $value2_suffix ); ?>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if ( ! empty( $tab['label2'] ) ) : ?>
                                                            <div class="ik-tabs-home-value-label">
                                                                <?php echo esc_html( $tab['label2'] ); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $tab['button_text'] ) && ! empty( $tab['button_link'] ) ) : ?>
                                            <a class="ik-tabs-home-panel-button" href="<?php echo esc_url( home_url( $tab['button_link'] ) ); ?>">
                                                <span class="ik-tabs-home-panel-button-text">
                                                    <?php echo esc_html( $tab['button_text'] ); ?>
                                                </span>
                                                <span class="ik-tabs-home-panel-button-icon">
                                                    <img src="<?php echo esc_url( $tab_button_icon_default ); ?>" alt="" loading="lazy" />
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="ik-tabs-home-panel-right">
                                        <?php if ( ! empty( $tab['image'] ) ) : ?>
                                            <div class="ik-tabs-home-image-wrap">
                                                <img src="<?php echo esc_url( ik_upload_url( $tab['image'] ) ); ?>" alt="" loading="lazy" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <style>
            /* -----------------------------------------------------------------
               GLOBAL ROOT / WRAPPER
               - No padding / no background / no safe area
               - All spacing & background controlled by parent container
            ----------------------------------------------------------------- */
            #<?php echo $uid; ?>.ik-tabs-home-root {
                margin: 0;
                padding: 0;
                background: transparent;
            }

            #<?php echo $uid; ?> .ik-tabs-home-inner {
                margin: 0;
                padding: 0;
                background: transparent;
                display: flex;
                flex-direction: column;
                gap: 32px;
            }

            /* -----------------------------------------------------------------
               HEADER (SMALL TITLE, MAIN TITLE, MAIN BUTTON)
            ----------------------------------------------------------------- */
            #<?php echo $uid; ?> .ik-tabs-home-header {
                display: flex;
                align-items: flex-end;
                justify-content: space-between;
                gap: 24px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-header-text {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            /* Small title (eyebrow) */
            #<?php echo $uid; ?> .ik-tabs-home-small-title {
                color: #DB2129;
                font-family: "DM Sans", sans-serif;
                font-weight: 800;
                font-style: normal; /* ExtraBold */
                font-size: 12px;
                line-height: 100%;
                letter-spacing: 0.28em; /* 28% */
                text-transform: uppercase;
            }

            /* Main title */
            #<?php echo $uid; ?> .ik-tabs-home-main-title {
                margin: 0;
                padding: 0;
                font-family: "PT Serif", serif;
                font-weight: 700;
                font-style: italic;
                font-size: 46px;
                line-height: 52px;
                letter-spacing: -1px;
            }
			#<?php echo $uid; ?> .ik-tabs-home-title-primary {
    font-family: "PT Serif", serif;
    font-weight: 700;
    font-style: italic;
    font-size: 46px;
    line-height: 52px;
    letter-spacing: -1px;
	color: black;
}

#<?php echo $uid; ?> .ik-tabs-home-title-secondary {
    display: inline;
    margin-left: 8px;

    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size: 38px;
    line-height: 52px;
    letter-spacing: 0%;
    color: #565A56;
}



            /* Main button */
            #<?php echo $uid; ?> .ik-tabs-home-header-cta {
                flex-shrink: 0;
                display: flex;
                align-items: flex-end;
            }

#<?php echo $uid; ?> .ik-tabs-home-main-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 20px;
    border-radius: 999px;
    border: 1px solid #DB2129;   /* old background color */
    background: transparent;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
}


            #<?php echo $uid; ?> .ik-tabs-home-main-button-text {
                color: #DB2129;
                font-family: "DM Sans", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 16px;
                line-height: 100%;
                letter-spacing: 0%;
                white-space: nowrap;
            }

            #<?php echo $uid; ?> .ik-tabs-home-main-button-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 20px;
                height: 20px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-main-button-icon img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: contain;
            }


            #<?php echo $uid; ?> .ik-tabs-home-main-button:hover {
                    background-color: #292A29;
    				border-color: #292A29;
            }

			/* Default icon visible */
#<?php echo $uid; ?> .ik-tabs-home-main-button-icon-default {
    display: inline-flex;
}

/* Hide hover icon by default */
#<?php echo $uid; ?> .ik-tabs-home-main-button-icon-hover {
    display: none;
}

/* Hover: swap icons */
#<?php echo $uid; ?> .ik-tabs-home-main-button:hover .ik-tabs-home-main-button-icon-default {
    display: none;
}

#<?php echo $uid; ?> .ik-tabs-home-main-button:hover .ik-tabs-home-main-button-icon-hover {
    display: inline-flex;
}

#<?php echo $uid; ?> .ik-tabs-home-main-button:hover .ik-tabs-home-main-button-text {
    color: #FFFFFF;
}



            /* -----------------------------------------------------------------
               TABS
            ----------------------------------------------------------------- */
            #<?php echo $uid; ?> .ik-tabs-home-tabs-wrapper {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            /* Scrollable row of tabs */
            #<?php echo $uid; ?> .ik-tabs-home-tabs-scroll {
                display: flex;
                flex-direction: row;
                align-items: stretch;
                gap: 24px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none; /* Firefox */
                position: relative;
                z-index: 2;
            }

            #<?php echo $uid; ?> .ik-tabs-home-tabs-scroll::-webkit-scrollbar {
                display: none;
            }

            /* TEXT-ONLY TABS (NO BG) */
            #<?php echo $uid; ?> .ik-tabs-home-tab {
                flex: 0 0 auto; /* prevents wrapping; scroll horizontally */
                position: relative;
                padding: 8px 0;
                border: none;
                cursor: pointer;
                background: transparent;
                color: #565A56; /* inactive text */
                font-family: "DM Sans", sans-serif;
                font-weight: 600;
                font-style: normal;
                font-size: 16px;
                line-height: 100%;
                letter-spacing: 0%;
                text-align: left;
                white-space: nowrap;
                transition: color 0.2s ease;
            }

            #<?php echo $uid; ?> .ik-tabs-home-tab-label {
                display: inline-block;
            }

            #<?php echo $uid; ?> .ik-tabs-home-tab-hidden {
                display: none !important;
            }

            /* Active tab – text only, no background */
            #<?php echo $uid; ?> .ik-tabs-home-tab--active {
                color: #C71D24;
            }
			
			
/* Base separator (lighter & thinner) */
#<?php echo $uid; ?> .ik-tabs-home-tabs-underline {
    position: relative;
    width: 100%;
    height: 1px;
    background: #E5E5E5; /* light grey baseline like screenshot */
}


/* Active indicator (stronger & thicker) */
#<?php echo $uid; ?> .ik-tabs-home-tabs-underline::before {
    content: "";
    position: absolute;
    left: var(--active-tab-left, 0px);
    bottom: -1px; /* sits visually on the line */
    width: var(--active-tab-width, 0px);
    height: 3px; /* 👈 makes it more visible */
    background-color: #C71D24;
    border-radius: 2px;
    transition: left 0.25s ease, width 0.25s ease;
}



            /* -----------------------------------------------------------------
               PANELS
            ----------------------------------------------------------------- */
            #<?php echo $uid; ?> .ik-tabs-home-panels {
                display: block;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel {
                display: none;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel--active {
                display: block;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-inner {
                display: grid;
                grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr);
                align-items: start;
                gap: 32px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-left {
                display: flex;
                flex-direction: column;
                gap: 24px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-right {
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }

            /* Description text */
            #<?php echo $uid; ?> .ik-tabs-home-description {
                margin: 0;
                color: black;
                font-family: "DM Sans", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 20px;
                line-height: 28px;
                letter-spacing: 0%;
            }

            /* Values */
            #<?php echo $uid; ?> .ik-tabs-home-values {
                display: flex;
                flex-wrap: wrap;
                gap: 24px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-value-block {
                display: flex;
                flex-direction: column;
                gap: 4px;
                min-width: 140px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-value {
                display: flex;
                align-items: baseline;
                gap: 4px;
                color: #FFFFFF;
            }

            #<?php echo $uid; ?> .ik-tabs-home-value-number {
                font-family: "DM Sans", sans-serif;
                font-weight: 500;
                font-style: normal;
                font-size: 50px;
                line-height: 52px;
                letter-spacing: 0px;
				color: black; 
            }

            #<?php echo $uid; ?> .ik-tabs-home-value-suffix {
                font-family: "DM Sans", sans-serif;
                font-weight: 500;
                font-style: normal;
                font-size: 30px;
                line-height: 52px;
                letter-spacing: 0px;
				color: black; 
            }

            #<?php echo $uid; ?> .ik-tabs-home-value-label {
                color: black;
                font-family: "DM Sans", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 18px;
                line-height: 26px;
                letter-spacing: 0%;
            }

            /* Panel button inside tab content */
            #<?php echo $uid; ?> .ik-tabs-home-panel-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 12px 18px;
                border-radius: 999px;
                border: none;
                text-decoration: none;
                cursor: pointer;
                background: #DB2129;
				    width: 100%;
    max-width: 400px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-button-text {
                color: white;
                font-family: "DM Sans", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 16px;
                line-height: 100%;
                letter-spacing: 0%;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-button-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 18px;
                height: 18px;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-button-icon img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            #<?php echo $uid; ?> .ik-tabs-home-panel-button:hover {
                background: #292A29;
				color: white
            }

            /* Image */
            #<?php echo $uid; ?> .ik-tabs-home-image-wrap {
                width: 100%;
                max-width: 480px; /* adjust if needed to match Figma */
                overflow: hidden;
            }

            #<?php echo $uid; ?> .ik-tabs-home-image-wrap img {
                display: block;
                width: 100%;
                height: auto;
                object-fit: cover;
            }
			#<?php echo $uid; ?> .ik-tabs-home-tabs-scroll {
    			overflow-x: auto;
    			overflow-y: hidden; /* prevent vertical scroll */
    			white-space: nowrap; /* helps prevent vertical scroll issues */
			}
			
			#<?php echo $uid; ?> .ik-tabs-home-root,
#<?php echo $uid; ?> .ik-tabs-home-inner {
    overflow-x: hidden;
}



            /* -----------------------------------------------------------------
               RESPONSIVE
            ----------------------------------------------------------------- */
            @media (max-width: 1024px) {
                #<?php echo $uid; ?> .ik-tabs-home-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 16px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-main-title {
                    font-size: 36px;
                    line-height: 42px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-panel-inner {
                    grid-template-columns: 1fr;
                    gap: 24px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-panel-right {
                    justify-content: flex-start;
                }

                #<?php echo $uid; ?> .ik-tabs-home-image-wrap {
                    max-width: 100%;
                }

                #<?php echo $uid; ?> .ik-tabs-home-values {
                    gap: 16px;
                }
            }

            @media (max-width: 768px) {
                #<?php echo $uid; ?> .ik-tabs-home-inner {
                    gap: 24px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-main-title {
                    font-size: 30px;
                    line-height: 36px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-description {
                    font-size: 18px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-value-number {
                    font-size: 40px;
                    line-height: 42px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-value-suffix {
                    font-size: 26px;
                    line-height: 42px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-value-label {
                    font-size: 16px;
                    line-height: 22px;
                }
            }

            @media (max-width: 480px) {
                #<?php echo $uid; ?> .ik-tabs-home-header {
                    gap: 12px;
                }

                #<?php echo $uid; ?> .ik-tabs-home-main-button {
                    width: 100%;
                    justify-content: center;
                }
            }
			
			@media (max-width: 480px) {
    #<?php echo $uid; ?> .ik-tabs-home-image-wrap {
        max-width: 100%;
    }

    #<?php echo $uid; ?> .ik-tabs-home-image-wrap img {
        width: 100%;
        height: auto;
    }
}
			
			/* ===============================
   MOBILE OVERFLOW FIX
=============================== */

#<?php echo $uid; ?> .ik-tabs-home-root,
#<?php echo $uid; ?> .ik-tabs-home-inner {
    overflow-x: hidden;
}

@media (max-width: 480px) {

    #<?php echo $uid; ?> .ik-tabs-home-panel-button {
        width: 100%;
        max-width: 100%;
    }

    #<?php echo $uid; ?> .ik-tabs-home-image-wrap {
        max-width: 100%;
    }

    #<?php echo $uid; ?> .ik-tabs-home-image-wrap img {
        width: 100%;
        height: auto;
    }
}


        </style>

        <script>
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var root = document.getElementById('<?php echo esc_js( $uid ); ?>');
        if (!root) return;

        var tabs   = root.querySelectorAll('.ik-tabs-home-tab');
        var panels = root.querySelectorAll('.ik-tabs-home-panel');
        var underline = root.querySelector('.ik-tabs-home-tabs-underline');
		var tabsScroll = root.querySelector('.ik-tabs-home-tabs-scroll');

        if (!tabs.length || !panels.length || !underline) return;

        /**
         * Update active indicator position & width
         * This paints the active segment on the separator line
         */
        function updateActiveIndicator(tab) {
            if (!tab) return;

            var tabRect  = tab.getBoundingClientRect();
            var tabsRect = tab.parentElement.getBoundingClientRect();

            underline.style.setProperty(
                '--active-tab-width',
                tabRect.width + 'px'
            );

            underline.style.setProperty(
                '--active-tab-left',
                (tabRect.left - tabsRect.left) + 'px'
            );
        }

        // -----------------------------------------------------
        // INIT: set indicator on initially active tab
        // -----------------------------------------------------
        var initialActiveTab = root.querySelector('.ik-tabs-home-tab--active');
        if (initialActiveTab) {
            updateActiveIndicator(initialActiveTab);
        }

        // -----------------------------------------------------
        // TAB CLICK HANDLER
        // -----------------------------------------------------
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                var target = tab.getAttribute('data-tab');
                if (!target) return;

                // Update active tab
                tabs.forEach(function(t) {
                    t.classList.remove('ik-tabs-home-tab--active');
                });
                tab.classList.add('ik-tabs-home-tab--active');

                // Move active indicator
                updateActiveIndicator(tab);

                // Update panels
                panels.forEach(function(panel) {
                    var panelKey = panel.getAttribute('data-panel');
                    if (panelKey === target) {
                        panel.classList.add('ik-tabs-home-panel--active');
                    } else {
                        panel.classList.remove('ik-tabs-home-panel--active');
                    }
                });
            });
        });

        // -----------------------------------------------------
        // OPTIONAL: realign indicator on window resize
        // (recommended for responsive accuracy)
        // -----------------------------------------------------
        window.addEventListener('resize', function() {
            var activeTab = root.querySelector('.ik-tabs-home-tab--active');
            if (activeTab) {
                updateActiveIndicator(activeTab);
            }
        });
		if (tabsScroll) {
    tabsScroll.addEventListener('scroll', function() {
        var activeTab = root.querySelector('.ik-tabs-home-tab--active');
        if (activeTab) {
            updateActiveIndicator(activeTab);
        }
    });
}

    });
})();
</script>


        <?php
        return ob_get_clean();
    }

    add_shortcode( 'tabs_home', 'tabs_block_home_page' );
}

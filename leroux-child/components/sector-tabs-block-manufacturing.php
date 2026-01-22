<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_overview]
| Tabbed sector cards (4 tabs) with snapshot, checklist & logos
|--------------------------------------------------------------------------
*/

/**
 * Includes (split files)
 * - sector-tabs-snapshots.php: snapshot rendering helpers
 * - sector-tabs-render-tabs.php: renders panels (tab 1-4)
 */
require_once get_stylesheet_directory() . '/components/sector-tabs-snapshots.php';
require_once get_stylesheet_directory() . '/components/sector-tabs-render-tabs.php';

function shortcode_sector_tabs_overview() {

    // ICONS
    $check_icon_url    = ik_upload_url('2025/12/check-circle.svg');
    $download_icon_url = ik_upload_url('2025/11/System-Icons-5.svg');

    // UNIQUE ID FOR THIS INSTANCE
    $uid = uniqid('sector-tabs-');

    // TAB TITLES
    $tab_title_1 = get_field('tab_title_1');
    $tab_title_2 = get_field('tab_title_2');
    $tab_title_3 = get_field('tab_title_3');
    $tab_title_4 = get_field('tab_title_4');
    $tab_title_5 = get_field('tab_title_5');

    /*
    |--------------------------------------------------------------------------
    | TAB 5 FIELDS (6 BLOCKS – AGRICULTURE TAB 3 STYLE)
    |--------------------------------------------------------------------------
    */

    // Titles
    $first_block_title_fifth_tab  = get_field('first_block_title_fifth_tab');
    $second_block_title_fifth_tab = get_field('second_block_title_fifth_tab');
    $third_block_title_fifth_tab  = get_field('third_block_title_fifth_tab');
    $fourth_block_title_fifth_tab = get_field('fourth_block_title_fifth_tab');
    $fifth_block_title_fifth_tab  = get_field('fifth_block_title_fifth_tab');
    $sixth_block_title_fifth_tab  = get_field('sixth_block_title_fifth_tab');

    // Block 1
    $first_block_snapshot_number_fifth_tab = get_field('first_block_snapshot_number_fifth_tab');
    $first_block_snapshot_label_fifth_tab  = get_field('first_block_snapshot_label_fifth_tab');
    $first_block_text_fifth_tab            = get_field('first_block_text_fifth_tab');
    $first_block_logo_title_fifth_tab      = get_field('first_block_logo_title_fifth_tab');
    $first_block_first_logo_fifth_tab      = get_field('first_block_first_logo_fifth_tab');
    $first_block_second_logo_fifth_tab     = get_field('first_block_second_logo_fifth_tab');

    // Block 2
    $second_block_snapshot_number_fifth_tab = get_field('second_block_snapshot_number_fifth_tab');
    $second_block_snapshot_label_fifth_tab  = get_field('second_block_snapshot_label_fifth_tab');
    $second_block_text_fifth_tab            = get_field('second_block_text_fifth_tab');
    $second_block_logo_title_fifth_tab      = get_field('second_block_logo_title_fifth_tab');
    $second_block_first_logo_fifth_tab      = get_field('second_block_first_logo_fifth_tab');
    $second_block_second_logo_fifth_tab     = get_field('second_block_second_logo_fifth_tab');

    // Block 3
    $third_block_snapshot_number_fifth_tab = get_field('third_block_snapshot_number_fifth_tab');
    $third_block_snapshot_label_fifth_tab  = get_field('third_block_snapshot_label_fifth_tab');
    $third_block_text_fifth_tab            = get_field('third_block_text_fifth_tab');
    $third_block_logo_title_fifth_tab      = get_field('third_block_logo_title_fifth_tab');
    $third_block_first_logo_fifth_tab      = get_field('third_block_first_logo_fifth_tab');
    $third_block_second_logo_fifth_tab     = get_field('third_block_second_logo_fifth_tab');

    // Block 4
    $fourth_block_snapshot_number_fifth_tab = get_field('fourth_block_snapshot_number_fifth_tab');
    $fourth_block_snapshot_label_fifth_tab  = get_field('fourth_block_snapshot_label_fifth_tab');
    $fourth_block_text_fifth_tab            = get_field('fourth_block_text_fifth_tab');
    $fourth_block_logo_title_fifth_tab      = get_field('fourth_block_logo_title_fifth_tab');
    $fourth_block_first_logo_fifth_tab      = get_field('fourth_block_first_logo_fifth_tab');
    $fourth_block_second_logo_fifth_tab     = get_field('fourth_block_second_logo_fifth_tab');

    // Block 5
    $fifth_block_snapshot_number_fifth_tab = get_field('fifth_block_snapshot_number_fifth_tab');
    $fifth_block_snapshot_label_fifth_tab  = get_field('fifth_block_snapshot_label_fifth_tab');
    $fifth_block_text_fifth_tab            = get_field('fifth_block_text_fifth_tab');
    $fifth_block_logo_title_fifth_tab      = get_field('fifth_block_logo_title_fifth_tab');
    $fifth_block_first_logo_fifth_tab      = get_field('fifth_block_first_logo_fifth_tab');
    $fifth_block_second_logo_fifth_tab     = get_field('fifth_block_second_logo_fifth_tab');

    // Block 6
    $sixth_block_snapshot_number_fifth_tab = get_field('sixth_block_snapshot_number_fifth_tab');
    $sixth_block_snapshot_label_fifth_tab  = get_field('sixth_block_snapshot_label_fifth_tab');
    $sixth_block_text_fifth_tab            = get_field('sixth_block_text_fifth_tab');
    $sixth_block_logo_title_fifth_tab      = get_field('sixth_block_logo_title_fifth_tab');
    $sixth_block_first_logo_fifth_tab      = get_field('sixth_block_first_logo_fifth_tab');
    $sixth_block_second_logo_fifth_tab     = get_field('sixth_block_second_logo_fifth_tab');
	
	// Block 7
$seventh_block_title_fifth_tab          = get_field('seventh_block_title_fifth_tab');
$seventh_block_snapshot_number_fifth_tab = get_field('seventh_block_snapshot_number_fifth_tab');
$seventh_block_snapshot_label_fifth_tab  = get_field('seventh_block_snapshot_label_fifth_tab');
$seventh_block_text_fifth_tab            = get_field('seventh_block_text_fifth_tab');
$seventh_block_logo_title_fifth_tab      = get_field('seventh_block_logo_title_fifth_tab');
$seventh_block_first_logo_fifth_tab      = get_field('seventh_block_first_logo_fifth_tab');
$seventh_block_second_logo_fifth_tab     = get_field('seventh_block_second_logo_fifth_tab');

// Block 8
$eighth_block_title_fifth_tab           = get_field('eighth_block_title_fifth_tab');
$eighth_block_snapshot_number_fifth_tab = get_field('eighth_block_snapshot_number_fifth_tab');
$eighth_block_snapshot_label_fifth_tab  = get_field('eighth_block_snapshot_label_fifth_tab');
$eighth_block_text_fifth_tab            = get_field('eighth_block_text_fifth_tab');
$eighth_block_logo_title_fifth_tab      = get_field('eighth_block_logo_title_fifth_tab');
$eighth_block_first_logo_fifth_tab      = get_field('eighth_block_first_logo_fifth_tab');
$eighth_block_second_logo_fifth_tab     = get_field('eighth_block_second_logo_fifth_tab');


    ob_start(); ?>

<style>
/* ============================================================
   SAFE AREA (1530px)
============================================================ */
#<?php echo esc_attr($uid); ?>.ike-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding-left: 0 !important;
    padding-right: 0 !important;
    box-sizing: border-box;
}

/* ============================================================
   SECTOR TABS — BASE
============================================================ */
#<?php echo esc_attr($uid); ?> {
    font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    color: #101110;
}

#<?php echo esc_attr($uid); ?> .sector-tabs-inner {
    width: 100%;
}

/* ============================================================
   TAB NAV
============================================================ */
#<?php echo esc_attr($uid); ?> .sector-tabs-nav {
    display: flex;
    gap: 40px;
    border-bottom: 1px solid #E5E7EB;
    margin-bottom: 32px;

    overflow-x: auto;
    overflow-y: hidden;        /* 🔥 kill vertical scroll */
    scrollbar-width: none;     /* Firefox */
}

#<?php echo esc_attr($uid); ?> .sector-tabs-nav::-webkit-scrollbar {
    display: none;             /* Chrome / Safari */
}


#<?php echo esc_attr($uid); ?> .sector-tab-trigger {
    position: relative;
    padding: 12px 0;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
    line-height: 1.3;
    font-weight: 500;
    color: #4B5563;
    white-space: nowrap;
    font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

#<?php echo esc_attr($uid); ?> .sector-tab-trigger:focus {
    outline: none;
}

#<?php echo esc_attr($uid); ?> .sector-tab-trigger::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -1px;
    width: 0;
    height: 3px;
    background: #DB2129;
    transition: width 0.25s ease;
}

#<?php echo esc_attr($uid); ?> .sector-tab-trigger.active {
    color: #DB2129;
}

#<?php echo esc_attr($uid); ?> .sector-tab-trigger.active::after {
    width: 100%;
}

/* ============================================================
   PANELS
============================================================ */
#<?php echo esc_attr($uid); ?> .sector-tab-panel {
    display: none;
}

#<?php echo esc_attr($uid); ?> .sector-tab-panel.active {
    display: block;
}

/* ============================================================
   LAYOUT (TABS 1–4)
============================================================ */
#<?php echo esc_attr($uid); ?> .sector-tab-layout {
    display: flex;
    gap: 60px;
    align-items: flex-start;
}

#<?php echo esc_attr($uid); ?> .sector-snapshot {
    flex: 0 0 220px;
}

#<?php echo esc_attr($uid); ?> .sector-middle {
    flex: 1;
    min-width: 200px;
}

#<?php echo esc_attr($uid); ?> .sector-logos {
    flex: 1.1;
    min-width: 260px;
}

/* Snapshot */
#<?php echo esc_attr($uid); ?> .sector-snapshot-number {
    font-size: 44px;
    font-weight: 600;
    line-height: 1.1;
    color: #101110;
}

#<?php echo esc_attr($uid); ?> .sector-snapshot-label {
    margin-top: 8px;
    font-size: 16px;
    font-weight: 400;
    color: #4B5563;
}

/* Stacked snapshots spacing */
#<?php echo esc_attr($uid); ?> .sector-snapshot-block + .sector-snapshot-block {
    margin-top: 32px;
}

/* Percent suffix uses same typo as number */
#<?php echo esc_attr($uid); ?> .sector-snapshot-percent {
    font-size: inherit;
    font-weight: inherit;
    line-height: inherit;
    margin-left: 2px;
}

/* Titles (checklist, logos) */
#<?php echo esc_attr($uid); ?> .sector-subtitle {
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 12px;
}

/* Checklist */
#<?php echo esc_attr($uid); ?> .sector-checklist {
    margin-top: 8px;
}

#<?php echo esc_attr($uid); ?> .sector-check-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 8px;
}

#<?php echo esc_attr($uid); ?> .sector-check-item img {
    width: 18px;
    height: 18px;
    margin-top: 2px;
    flex-shrink: 0;
}

#<?php echo esc_attr($uid); ?> .sector-check-text {
    font-size: 16px;
    font-weight: 400;
    color: #101110;
}

/* Logos */
#<?php echo esc_attr($uid); ?> .sector-logo-title {
    margin-bottom: 16px;
}

#<?php echo esc_attr($uid); ?> .sector-logo-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 24px;
}

#<?php echo esc_attr($uid); ?> .sector-logo-item {
    width: 145px;
    height: 82px;
    border-radius: 8px;
    background: #FFFFFF;
    box-shadow: 0 0 0 1px #E5E7EB;
    display: flex;
    align-items: center;
    justify-content: center;
}

#<?php echo esc_attr($uid); ?> .sector-logo-item img {
    max-width: 145px;
    max-height: 82px;
    width: 145px;
    height: 82px;
    object-fit: contain;
}

/* Bottom text areas */
#<?php echo esc_attr($uid); ?> .sector-bottom-text {
    margin-top: 40px;
    font-size: 16px;
    font-weight: 400;
    color: #101110;
}

#<?php echo esc_attr($uid); ?> .sector-bottom-text + .sector-bottom-text {
    margin-top: 16px;
}

/* Download button block */
#<?php echo esc_attr($uid); ?> .sector-download-wrap {
    margin-top: 32px;
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
}

#<?php echo esc_attr($uid); ?> .sector-download-wrap .sector-bottom-text {
    margin-top: 0;
}

#<?php echo esc_attr($uid); ?> .sector-download-text {
    font-size: 16px;
    font-weight: 400;
    color: #101110;
}

#<?php echo esc_attr($uid); ?> .sector-download-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 999px;
    border: none;
    background: #DB2129;
    color: #FFFFFF;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    white-space: nowrap;
}

#<?php echo esc_attr($uid); ?> .sector-download-btn img {
    width: 16px;
    height: 16px;
}

#<?php echo esc_attr($uid); ?> .sector-download-btn:hover {
    background: #292A29 !important;
    color: #ffffff !important;
}

@media (min-width: 1025px) {
    .sector-tab-layout > .sector-middle {
        flex: 1 1 auto !important;
        max-width: 20% !important;
        width: auto !important;
    }
}

/* ============================================================
   RESPONSIVE (TABS 1–4)
============================================================ */
@media (max-width: 1024px) {
    #<?php echo esc_attr($uid); ?> .sector-tab-layout {
        flex-direction: column;
        gap: 32px;
    }
    #<?php echo esc_attr($uid); ?> .sector-snapshot {
        flex: none;
    }
    #<?php echo esc_attr($uid); ?> .sector-logos {
        flex: none;
    }
}

@media (max-width: 640px) {
    #<?php echo esc_attr($uid); ?> .sector-tab-trigger {
        font-size: 18px;
    }
    #<?php echo esc_attr($uid); ?> .sector-snapshot-number {
        font-size: 36px;
    }
}

/* MOBILE SAFE-AREA FOR TABS */
@media (max-width: 1024px) {
    #<?php echo esc_attr($uid); ?>.ike-safe-area {
        padding-left: 30px !important;
        padding-right: 30px !important;
    }
}

/* ============================================================
   TAB 5 – TRUE 4-COLUMN GRID (4 + 2 + 2 EMPTY)
============================================================ */

#<?php echo esc_attr($uid); ?> .sector-tab-layout-fifth {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    column-gap: 0;
    row-gap: 32px;
}

#<?php echo esc_attr($uid); ?> .sector-fifth-block {
    padding: 0 24px 32px;
    box-sizing: border-box;
    border-right: 1px solid #E5E7EB;
}
	
#<?php echo esc_attr($uid); ?> .sector-fifth-block:nth-child(4n + 1) {
    padding-left: 0;
}


/* remove border on last column */
#<?php echo esc_attr($uid); ?> .sector-fifth-block:nth-child(4n) {
    border-right: none;
}

/* Block snapshot typo */
#<?php echo esc_attr($uid); ?> .sector-fifth-block .sector-block-snapshot-number {
    font-size: 32px;
    font-weight: 600;
    line-height: 1.1;
    color: #101110;
    margin-bottom: 4px;
}

#<?php echo esc_attr($uid); ?> .sector-fifth-block .sector-block-snapshot-label {
    font-size: 14px;
    color: #4B5563;
    margin-bottom: 4px;
    line-height: 1.2;
}

/* Extra text under label */
#<?php echo esc_attr($uid); ?> .sector-fifth-block .sector-block-snapshot-text {
    font-size: 14px;
    color: #4B5563;
    margin-bottom: 16px;
    line-height: 1.2;
}

/* Logo title – aligned */
#<?php echo esc_attr($uid); ?> .sector-logo-title-fifth {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0;
    color: #101110;
    margin-bottom: 12px;
    min-height: 36px;
    display: flex;
    align-items: flex-start;
}
	
/* ============================================================
   TAB 5 – NORMALIZE TOP CONTENT HEIGHT (KEY FIX)
============================================================ */

/* Wrap snapshot + label + text */
#<?php echo esc_attr($uid); ?> .sector-fifth-top {
    min-height: 96px;   /* adjust if needed, this is the magic */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
/* FORCE ALL FIFTH BLOCKS TO ALIGN LOGO TITLE */
#<?php echo esc_attr($uid); ?> .sector-fifth-block {
    display: flex;
    flex-direction: column;
}

/* This makes the logo title snap to same vertical baseline */
#<?php echo esc_attr($uid); ?> .sector-logo-title-fifth {
    margin-top: auto;
}
	
#<?php echo esc_attr($uid); ?> .sector-logo-row {
    display: grid;
    grid-template-columns: repeat(4, max-content);
    gap: 20px;
}
	
#<?php echo esc_attr($uid); ?> .sector-tab-panel[data-tab="5"] .sector-logo-row {
    grid-template-columns: repeat(2, max-content) !important;
}
	
/* Add this at the end of your existing CSS */
#<?php echo esc_attr($uid); ?> .sector-logo-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, min-content);
    gap: 20px; /* Adjust the gap as needed */
}


@media (max-width: 1450px) {
    #<?php echo esc_attr($uid); ?> .sector-logo-row {
        grid-template-columns: 1fr;
    }
	#<?php echo esc_attr($uid); ?> .sector-tab-layout-fifth {
    grid-template-columns: repeat(2, 1fr);
}
	
}

/* ============================================================
   TAB 5 – MOBILE
============================================================ */
@media (max-width: 1024px) {
    #<?php echo esc_attr($uid); ?> .sector-tab-layout-fifth {
        grid-template-columns: 1fr;
    }

    #<?php echo esc_attr($uid); ?> .sector-fifth-block {
        border-right: none;
        border-bottom: 1px solid #E5E7EB;
        padding: 0 0 24px 0;
    }

    #<?php echo esc_attr($uid); ?> .sector-fifth-block:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
}
	
/* ================================
   LOGOS – TABS 1–4 RESPONSIVE
================================ */

/* Default: 4 logos per row */
#<?php echo esc_attr($uid); ?> .sector-logo-row {
    display: grid;
    grid-template-columns: repeat(4, max-content);
    gap: 20px;
}

/* Below 1450px: force 2 logos per row (Tabs 1–4 only) */
@media (max-width: 1450px) {
    #<?php echo esc_attr($uid); ?> .sector-tab-panel:not([data-tab="5"]) .sector-logo-row {
        grid-template-columns: repeat(2, max-content);
    }
}

/* Tab 5: always 2 logos per row */
#<?php echo esc_attr($uid); ?> .sector-tab-panel[data-tab="5"] .sector-logo-row {
    grid-template-columns: repeat(2, max-content);
}


</style>


    <div id="<?php echo esc_attr($uid); ?>" class="sector-tabs-wrapper ike-safe-area">
        <div class="sector-tabs-inner">

            <!-- TAB HEADERS -->
            <div class="sector-tabs-nav">
                <?php if ( $tab_title_1 ) : ?>
                    <button class="sector-tab-trigger active" data-tab="1">
                        <?php echo esc_html( $tab_title_1 ); ?>
                    </button>
                <?php endif; ?>

                <?php if ( $tab_title_2 ) : ?>
                    <button class="sector-tab-trigger<?php echo !$tab_title_1 ? ' active' : ''; ?>" data-tab="2">
                        <?php echo esc_html( $tab_title_2 ); ?>
                    </button>
                <?php endif; ?>

                <?php if ( $tab_title_3 ) : ?>
                    <button class="sector-tab-trigger<?php echo ( !$tab_title_1 && !$tab_title_2 ) ? ' active' : ''; ?>" data-tab="3">
                        <?php echo esc_html( $tab_title_3 ); ?>
                    </button>
                <?php endif; ?>

                <?php if ( $tab_title_4 ) : ?>
                    <button class="sector-tab-trigger<?php echo ( !$tab_title_1 && !$tab_title_2 && !$tab_title_3 ) ? ' active' : ''; ?>" data-tab="4">
                        <?php echo esc_html( $tab_title_4 ); ?>
                    </button>
                <?php endif; ?>

                <?php if ( $tab_title_5 ) : ?>
                    <button class="sector-tab-trigger<?php echo ( !$tab_title_1 && !$tab_title_2 && !$tab_title_3 && !$tab_title_4 ) ? ' active' : ''; ?>" data-tab="5">
                        <?php echo esc_html( $tab_title_5 ); ?>
                    </button>
                <?php endif; ?>
            </div>

            <?php
            // Panels renderer (split file)
            render_sector_tabs_panels([
                'uid'              => $uid,
                'check_icon_url'   => $check_icon_url,
                'download_icon_url'=> $download_icon_url,
            ]);
            ?>

            <!-- ============================================================
                 TAB 5 – SIX BLOCKS (AGRICULTURE TAB 3 STYLE)
            ============================================================ -->
            <div class="sector-tab-panel<?php echo ( !$tab_title_1 && !$tab_title_2 && !$tab_title_3 && !$tab_title_4 && $tab_title_5 ) ? ' active' : ''; ?>" data-tab="5">

                <div class="sector-tab-layout-fifth">

                    <?php
                    $tab5_blocks = array(
                        array(
                            'title'      => $first_block_title_fifth_tab,
                            'num'        => $first_block_snapshot_number_fifth_tab,
                            'label'      => $first_block_snapshot_label_fifth_tab,
                            'text'       => $first_block_text_fifth_tab,
                            'logo_title' => $first_block_logo_title_fifth_tab,
                            'logos'      => array($first_block_first_logo_fifth_tab, $first_block_second_logo_fifth_tab),
                        ),
                        array(
                            'title'      => $second_block_title_fifth_tab,
                            'num'        => $second_block_snapshot_number_fifth_tab,
                            'label'      => $second_block_snapshot_label_fifth_tab,
                            'text'       => $second_block_text_fifth_tab,
                            'logo_title' => $second_block_logo_title_fifth_tab,
                            'logos'      => array($second_block_first_logo_fifth_tab, $second_block_second_logo_fifth_tab),
                        ),
                        array(
                            'title'      => $third_block_title_fifth_tab,
                            'num'        => $third_block_snapshot_number_fifth_tab,
                            'label'      => $third_block_snapshot_label_fifth_tab,
                            'text'       => $third_block_text_fifth_tab,
                            'logo_title' => $third_block_logo_title_fifth_tab,
                            'logos'      => array($third_block_first_logo_fifth_tab, $third_block_second_logo_fifth_tab),
                        ),
                        array(
                            'title'      => $fourth_block_title_fifth_tab,
                            'num'        => $fourth_block_snapshot_number_fifth_tab,
                            'label'      => $fourth_block_snapshot_label_fifth_tab,
                            'text'       => $fourth_block_text_fifth_tab,
                            'logo_title' => $fourth_block_logo_title_fifth_tab,
                            'logos'      => array($fourth_block_first_logo_fifth_tab, $fourth_block_second_logo_fifth_tab),
                        ),
                        array(
                            'title'      => $fifth_block_title_fifth_tab,
                            'num'        => $fifth_block_snapshot_number_fifth_tab,
                            'label'      => $fifth_block_snapshot_label_fifth_tab,
                            'text'       => $fifth_block_text_fifth_tab,
                            'logo_title' => $fifth_block_logo_title_fifth_tab,
                            'logos'      => array($fifth_block_first_logo_fifth_tab, $fifth_block_second_logo_fifth_tab),
                        ),
                        array(
                            'title'      => $sixth_block_title_fifth_tab,
                            'num'        => $sixth_block_snapshot_number_fifth_tab,
                            'label'      => $sixth_block_snapshot_label_fifth_tab,
                            'text'       => $sixth_block_text_fifth_tab,
                            'logo_title' => $sixth_block_logo_title_fifth_tab,
                            'logos'      => array($sixth_block_first_logo_fifth_tab, $sixth_block_second_logo_fifth_tab),
                        ),
						array(
    'title'      => $seventh_block_title_fifth_tab,
    'num'        => $seventh_block_snapshot_number_fifth_tab,
    'label'      => $seventh_block_snapshot_label_fifth_tab,
    'text'       => $seventh_block_text_fifth_tab,
    'logo_title' => $seventh_block_logo_title_fifth_tab,
    'logos'      => array($seventh_block_first_logo_fifth_tab, $seventh_block_second_logo_fifth_tab),
),
array(
    'title'      => $eighth_block_title_fifth_tab,
    'num'        => $eighth_block_snapshot_number_fifth_tab,
    'label'      => $eighth_block_snapshot_label_fifth_tab,
    'text'       => $eighth_block_text_fifth_tab,
    'logo_title' => $eighth_block_logo_title_fifth_tab,
    'logos'      => array($eighth_block_first_logo_fifth_tab, $eighth_block_second_logo_fifth_tab),
),

                    );

                    foreach ( $tab5_blocks as $b ) :
                    ?>
                        <div class="sector-fifth-block">

                            <?php if ( ! empty( $b['title'] ) ) : ?>
                                <div class="sector-subtitle">
                                    <?php echo esc_html( $b['title'] ); ?>
                                </div>
                            <?php endif; ?>

<div class="sector-fifth-top">

    <?php if ( ! empty( $b['num'] ) ) : ?>
        <div class="sector-block-snapshot-number">
            <?php echo esc_html( $b['num'] ); ?>
        </div>
    <?php endif; ?>

    <?php if ( ! empty( $b['label'] ) ) : ?>
        <div class="sector-block-snapshot-label">
            <?php echo esc_html( $b['label'] ); ?>
        </div>
    <?php endif; ?>

    <?php if ( ! empty( $b['text'] ) ) : ?>
        <div class="sector-block-snapshot-text">
            <?php echo esc_html( $b['text'] ); ?>
        </div>
    <?php endif; ?>

</div>


                            <?php if ( ! empty( $b['logo_title'] ) ) : ?>
                                <div class="sector-logo-title-fifth">
                                    <?php echo esc_html( $b['logo_title'] ); ?>
                                </div>
                            <?php endif; ?>

                            <div class="sector-logo-row">
                                <?php
                                foreach ( $b['logos'] as $logo_url ) :
                                    if ( ! empty( $logo_url ) ) : ?>
                                        <div class="sector-logo-item">
                                            <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                        </div>
                                    <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        </div><!-- /.sector-tabs-inner -->
    </div><!-- /#uid -->

    <script>
    (function() {
        var wrapper = document.getElementById('<?php echo esc_js( $uid ); ?>');
        if (!wrapper) return;

        var buttons = wrapper.querySelectorAll('.sector-tab-trigger');
        var panels  = wrapper.querySelectorAll('.sector-tab-panel');

        if (!buttons.length || !panels.length) return;

        buttons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var target = this.getAttribute('data-tab');
                if (!target) return;

                buttons.forEach(function(b) { b.classList.remove('active'); });
                panels.forEach(function(p) { p.classList.remove('active'); });

                this.classList.add('active');
                var panel = wrapper.querySelector('.sector-tab-panel[data-tab="' + target + '"]');
                if (panel) panel.classList.add('active');
            });
        });
    })();
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('sector_tabs_overview', 'shortcode_sector_tabs_overview');

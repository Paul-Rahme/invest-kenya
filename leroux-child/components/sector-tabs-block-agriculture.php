<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_agriculture]
| Tabs layout for AGRICULTURE sector
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_agriculture() {

    // ICONS
    $check_icon_url = ik_upload_url('2025/12/check-circle.svg');
	$link_icon_url  = ik_upload_url('2026/01/System-Icons-1.svg');

    // UNIQUE ID
    $uid = uniqid('sector-tabs-agri-');

    /*
    |--------------------------------------------------------------------------
    | TAB 1 FIELDS (Agriculture)
    |--------------------------------------------------------------------------
    */
    $tab_title_1               = get_field('tab_title_1');
    $snapshot_number_first_tab = get_field('snapshot_number_first_tab');
    $snapshot_label_first_tab  = get_field('snapshot_label_first_tab');

    $checklist_title_first_tab   = get_field('checklist_title_first_tab');
    $first_check_text_first_tab  = get_field('first_check_text_first_tab');
    $second_check_text_first_tab = get_field('second_check_text_first_tab');

    $logo_title_first_tab         = get_field('logo_title_first_tab');
    $first_logo_image_first_tab   = get_field('first_logo_image_first_tab');
    $second_logo_image_first_tab  = get_field('second_logo_image_first_tab');
    $third_logo_image_first_tab   = get_field('third_logo_image_first_tab');

    $bottom_text_first_tab        = get_field('bottom_text_first_tab');


    /*
    |--------------------------------------------------------------------------
    | TAB 2 FIELDS (Agriculture)
    |--------------------------------------------------------------------------
    */
    $tab_title_2                 = get_field('tab_title_2');
	
	// Snapshots (Tab 2)
$first_snapshot_number_second_tab  = get_field('first_snapshot_number_second_tab');
$second_snapshot_number_second_tab = get_field('second_snapshot_number_second_tab');
$first_snapshot_label_second_tab   = get_field('first_snapshot_label_second_tab');
$second_snapshot_label_second_tab  = get_field('second_snapshot_label_second_tab');


    // Replacing snapshot + checklist with ONE description text
    $description_text_second_tab = get_field('description_text_second_tab');

    // Logos (only one title and 3 logos)
    $logo_title_second_tab       = get_field('logo_title_second_tab');
    $first_logo_second_tab       = get_field('first_logo_second_tab');
    $second_logo_second_tab      = get_field('second_logo_second_tab');
    $third_logo_second_tab       = get_field('third_logo_second_tab');

    // Bottom text (similar to first tab)
    $bottom_text_second_tab      = get_field('bottom_text_second_tab');


    /*
    |--------------------------------------------------------------------------
    | TAB 3 FIELDS (Agriculture – Livestock style)
    |--------------------------------------------------------------------------
    */
    $tab_title_3 = get_field('tab_title_3');

    // Left snapshots column (12% / 25Mn+)
    $first_snapshot_number_third_tab  = get_field('first_snapshot_number_third_tab');
    $second_snapshot_number_third_tab = get_field('second_snapshot_number_third_tab');
    $first_snapshot_label_third_tab   = get_field('first_snapshot_label_third_tab');
    $second_snapshot_label_third_tab  = get_field('second_snapshot_label_third_tab');

    // Block titles
    $first_block_title_third_tab  = get_field('first_block_title_third_tab');
    $second_block_title_third_tab = get_field('second_block_title_third_tab');
    $third_block_title_third_tab  = get_field('third_block_title_third_tab');

    // Block 1
    $first_block_snapshot_number_third_tab = get_field('first_block_snapshot_number_third_tab');
    $first_block_snapshot_label_third_tab  = get_field('first_block_snapshot_label_third_tab');

    $first_block_logo_title_third_tab      = get_field('first_block_logo_title_third_tab');
    $first_block_first_logo_third_tab      = get_field('first_block_first_logo_third_tab');
    $first_block_second_logo_third_tab     = get_field('first_block_second_logo_third_tab');

    $first_block_text_under_logos_third_tab = get_field('first_block_text_under_logos_third_tab');
    $first_block_link_text_third_tab        = get_field('first_block_link_text_third_tab');
    $first_block_link_url_third_tab         = get_field('first_block_link_url_third_tab');

    // Block 2
    $second_block_snapshot_number_third_tab = get_field('second_block_snapshot_number_third_tab');
    $second_block_snapshot_label_third_tab  = get_field('second_block_snapshot_label_third_tab');

    $second_block_logo_title_third_tab      = get_field('second_block_logo_title_third_tab');
    $second_block_first_logo_third_tab      = get_field('second_block_first_logo_third_tab');
    $second_block_second_logo_third_tab     = get_field('second_block_second_logo_third_tab');

    // Block 3
    $third_block_snapshot_number_third_tab = get_field('third_block_snapshot_number_third_tab');
    $third_block_snapshot_label_third_tab  = get_field('third_block_snapshot_label_third_tab');

    $third_block_logo_title_third_tab      = get_field('third_block_logo_title_third_tab');
    $third_block_first_logo_third_tab      = get_field('third_block_first_logo_third_tab');
    $third_block_second_logo_third_tab     = get_field('third_block_second_logo_third_tab');

    ob_start(); ?>

<style>
    /* ============================================================
       SAFE AREA
    ============================================================ */
    #<?php echo $uid; ?>.ike-safe-area {
        max-width: 1530px;
        margin: 0 auto;
        width: 100%;
        padding-left: 0 !important;
        padding-right: 0 !important;
        box-sizing: border-box;
    }

    /* ============================================================
       TABS BASE
    ============================================================ */
    #<?php echo $uid; ?> {
        font-family: "DM Sans", sans-serif;
        color: #101110;
    }

    #<?php echo $uid; ?> .sector-tabs-nav {
        display: flex;
        gap: 40px;
        border-bottom: 1px solid #E5E7EB;
        margin-bottom: 32px;
        overflow-x: auto;
    }
	
	#<?php echo $uid; ?> .sector-tabs-nav {
    overflow-x: auto;
    overflow-y: hidden;   /* 👈 this removes the vertical scrollbar */
    scrollbar-width: none; /* Firefox */
}

#<?php echo $uid; ?> .sector-tabs-nav::-webkit-scrollbar {
    display: none; /* Chrome / Safari */
}


    #<?php echo $uid; ?> .sector-tab-trigger {
        position: relative;
        padding: 12px 0;
        cursor: pointer;
        background: none;
        border: none;
        font-size: 20px;
        font-weight: 500;
        color: #4B5563;
        white-space: nowrap;
		font-family: "DM Sans", sans-serif;
    }

    #<?php echo $uid; ?> .sector-tab-trigger.active {
        color: #DB2129;
    }

    #<?php echo $uid; ?> .sector-tab-trigger.active::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 3px;
        background: #DB2129;
    }

    #<?php echo $uid; ?> .sector-tab-panel {
        display: none;
    }
    #<?php echo $uid; ?> .sector-tab-panel.active {
        display: block;
    }

    /* ============================================================
       LAYOUT (TAB 1 & 2)
    ============================================================ */
    #<?php echo $uid; ?> .sector-tab-layout {
        display: flex;
        gap: 60px;
        align-items: flex-start;
    }

    #<?php echo $uid; ?> .sector-snapshot {
        flex: 0 0 220px;
    }

    #<?php echo $uid; ?> .sector-snapshot-number {
        font-size: 44px;
        font-weight: 600;
        line-height: 1.1;
        color: #101110;
    }

    #<?php echo $uid; ?> .sector-snapshot-number .small-currency {
        font-size: 0.6em;
        vertical-align: super;
        margin-right: 2px;
    }

    #<?php echo $uid; ?> .sector-snapshot-label {
        font-size: 16px;
        margin-top: 8px;
        color: #4B5563;
    }

    #<?php echo $uid; ?> .sector-middle {
        flex: 1;
        min-width: 220px;
    }

    #<?php echo $uid; ?> .sector-logos {
        flex: 1.1;
        min-width: 240px;
    }

    /* Checklist */
    #<?php echo $uid; ?> .sector-check-item {
        display: flex;
        gap: 10px;
        margin-bottom: 8px;
    }
    #<?php echo $uid; ?> .sector-check-item img {
        width: 18px;
        height: 18px;
        margin-top: 2px;
    }

    /* Subtitles (used for logo titles & block titles) */
    #<?php echo $uid; ?> .sector-subtitle {
        font-size: 18px;
        font-weight: 600;
        color: #101110;
        margin-bottom: 12px;
    }

    /* Logos */
    #<?php echo $uid; ?> .sector-logo-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }
    #<?php echo $uid; ?> .sector-logo-item {
        width: 145px;
        height: 82px;
        background: #FFF;
        border-radius: 8px;
        box-shadow: 0 0 0 1px #E5E7EB;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #<?php echo $uid; ?> .sector-logo-item img {
        max-width: 145px;
        max-height: 82px;
        object-fit: contain;
    }

    /* Bottom text */
    #<?php echo $uid; ?> .sector-bottom-text {
        margin-top: 40px;
        font-size: 16px;
        color: #101110;
        font-weight: 400;
    }

    /* ============================================================
       DESCRIPTION TEXT (TAB 2)
    ============================================================ */
    #<?php echo $uid; ?> .sector-description {
        font-size: 22px;
        font-weight: 600;
        color: #101110;
        line-height: 1.4;
        margin-bottom: 28px;
    }
	/* ============================================================
   TAB 2 – LIMIT DESCRIPTION WIDTH
============================================================ */
#<?php echo $uid; ?> [data-tab="2"] .sector-middle {
    flex: 0 0 420px;   /* adjust if needed */
    max-width: 420px;
}


    /* Mobile adjustments for TAB 1 & 2 */
    @media (max-width: 1024px) {
        #<?php echo $uid; ?> .sector-tab-layout {
            flex-direction: column;
            gap: 32px;
        }
        #<?php echo $uid; ?> .sector-description {
            font-size: 20px;
        }
    }

    @media (max-width: 640px) {
        #<?php echo $uid; ?> .sector-description {
            font-size: 18px;
        }
    }

    /* WIDTH CONTROL FIX (TAB 2 description) */
    #<?php echo $uid; ?> .sector-description {
        font-size: 22px;
        font-weight: 600;
        color: #101110;
        line-height: 1.4;
        margin-bottom: 28px;
        flex: 0 0 550px;
        max-width: 550px;
    }

    /* MOBILE/TABLET SAFE-AREA OVERRIDE */
    @media (max-width: 1024px) {
        #<?php echo $uid; ?>.ike-safe-area {
            padding-left: 40px !important;
            padding-right: 40px !important;
        }
    }

    /* Responsive description */
    @media (max-width: 1024px) {
        #<?php echo $uid; ?> .sector-description {
            flex: none;
            max-width: 100%;
        }
    }

    /* ============================================================
       TAB 3 – LIVESTOCK STYLE (3 COLUMN BLOCKS)
    ============================================================ */

    /* Main layout: left snapshots + right 3 blocks */
    #<?php echo $uid; ?> .sector-tab-layout-third {
        display: flex;
        gap: 60px;
        align-items: flex-start;
    }

    #<?php echo $uid; ?> .sector-third-snapshots {
        flex: 0 0 220px;
    }

    #<?php echo $uid; ?> .sector-third-snapshot-pair {
        margin-bottom: 32px;
    }

    #<?php echo $uid; ?> .sector-third-snapshot-pair:last-child {
        margin-bottom: 0;
    }

    /* Reuse snapshot number & label typo from other tabs */
    #<?php echo $uid; ?> .sector-third-snapshot-pair .sector-snapshot-number {
        font-size: 44px;
        font-weight: 600;
        line-height: 1.1;
        color: #101110;
    }

    #<?php echo $uid; ?> .sector-third-snapshot-pair .sector-snapshot-label {
        font-size: 16px;
        margin-top: 8px;
        color: #4B5563;
    }

    /* Right column: 3 blocks */
    #<?php echo $uid; ?> .sector-third-blocks {
        flex: 1;
        display: flex;
        gap: 40px;
    }

    #<?php echo $uid; ?> .sector-third-block {
        flex: 1;
        padding: 0 24px;
        box-sizing: border-box;
    }
	
#<?php echo $uid; ?> .sector-third-block .sector-block-snapshot-label {
    line-height: 1.2;
    min-height: calc(14px * 1.2 * 2);
}



    /* Vertical separators between blocks */
    #<?php echo $uid; ?> .sector-third-block:not(:last-child) {
        border-right: 1px solid #E5E7EB;
    }

    /* Block title – same typo as logo title in second tab (sector-subtitle) */
    #<?php echo $uid; ?> .sector-third-block .sector-block-title {
        margin-bottom: 16px;
    }

    /* Block snapshot inside each block – same typo as snapshot (number/label) */
    #<?php echo $uid; ?> .sector-third-block .sector-block-snapshot-number {
        font-size: 32px;
        font-weight: 600;
        line-height: 1.1;
        color: #101110;
        margin-bottom: 4px;
    }

    #<?php echo $uid; ?> .sector-third-block .sector-block-snapshot-label {
        font-size: 14px;
        color: #4B5563;
        margin-bottom: 16px;
    }

    /* Logo titles in third tab – specific typo */
    #<?php echo $uid; ?> .sector-logo-title-third {
        font-family: "DM Sans", sans-serif;
        font-weight: 600;
        font-style: normal;
        font-size: 16px;
        line-height: 100%;
        letter-spacing: 0;
        color: #101110;
        margin-bottom: 12px;
    }

    /* Text under logos – first block third tab */
    #<?php echo $uid; ?> .sector-under-logos-text {
        margin-top: 16px;
        margin-bottom: 8px;
        font-family: "DM Sans", sans-serif;
        font-weight: 600;
        font-style: normal;
        font-size: 16px;
        line-height: 100%;
        letter-spacing: 0;
        color: #101110;
    }

    /* Link with icon */
    #<?php echo $uid; ?> .sector-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        font-family: "DM Sans", sans-serif;
        font-weight: 400;
        font-style: normal;
        font-size: 14px;
        line-height: 100%;
        letter-spacing: 0;
        color: #DB2129;
        transition: color 0.2s ease, text-decoration-color 0.2s ease, opacity 0.2s ease;
    }

    #<?php echo $uid; ?> .sector-link-icon {
        width: 16px;
        height: 16px;
        opacity: 1;
    }

    #<?php echo $uid; ?> .sector-link:hover {
        text-decoration: underline;
        text-decoration-color: #DB2129;
        opacity: 0.85;
    }

    /* Mobile / tablet behaviour for TAB 3 */
    @media (max-width: 1024px) {
        #<?php echo $uid; ?> .sector-tab-layout-third {
            flex-direction: column;
            gap: 32px;
        }

        #<?php echo $uid; ?> .sector-third-blocks {
            flex-direction: column;
            gap: 24px;
        }

        #<?php echo $uid; ?> .sector-third-block {
            padding: 0 0 24px 0;
            border-right: none;
            border-bottom: 1px solid #E5E7EB;
        }

        #<?php echo $uid; ?> .sector-third-block:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        #<?php echo $uid; ?> .sector-third-snapshots {
            flex: none;
        }
		#<?php echo $uid; ?> .sector-third-block:not(:last-child) {
    border-right: none !important;
}
    }

    @media (max-width: 640px) {
        #<?php echo $uid; ?> .sector-third-block .sector-block-snapshot-number {
            font-size: 28px;
        }
    }
	/* ============================================================
   MOBILE / TABLET OVERRIDES (≤1024px)
============================================================ */
@media (max-width: 1024px) {

    /* TAB 1 ONLY – shrink snapshot column */
    #<?php echo $uid; ?> [data-tab="1"] .sector-snapshot {
        flex: 0 0 20px;
    }

    /* TAB 2 ONLY – remove fixed description width */
    #<?php echo $uid; ?> [data-tab="2"] .sector-middle {
        flex: none;
        max-width: none;
    }

}

</style>

<div id="<?php echo $uid; ?>" class="sector-tabs-wrapper ike-safe-area">
    <div class="sector-tabs-inner">

        <!-- TAB HEADERS -->
        <div class="sector-tabs-nav">
            <button class="sector-tab-trigger active" data-tab="1">
                <?php echo esc_html( $tab_title_1 ); ?>
            </button>
            <button class="sector-tab-trigger" data-tab="2">
                <?php echo esc_html( $tab_title_2 ); ?>
            </button>
            <button class="sector-tab-trigger" data-tab="3">
                <?php echo esc_html( $tab_title_3 ); ?>
            </button>
        </div>

        <!-- ============================================================
             TAB 1
        ============================================================ -->
        <div class="sector-tab-panel active" data-tab="1">

            <div class="sector-tab-layout">

                <!-- Snapshot -->
                <div class="sector-snapshot">
                    <?php if ( $snapshot_number_first_tab ) : ?>
                        <div class="sector-snapshot-number">
                            <?php echo esc_html( $snapshot_number_first_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $snapshot_label_first_tab ) : ?>
                        <div class="sector-snapshot-label">
                            <?php echo esc_html( $snapshot_label_first_tab ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Checklist -->
                <div class="sector-middle">
                    <?php if ( $checklist_title_first_tab ) : ?>
                        <div class="sector-subtitle"><?php echo esc_html( $checklist_title_first_tab ); ?></div>
                    <?php endif; ?>

                    <?php if ( $first_check_text_first_tab ) : ?>
                        <div class="sector-check-item">
                            <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                            <div><?php echo esc_html( $first_check_text_first_tab ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_check_text_first_tab ) : ?>
                        <div class="sector-check-item">
                            <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                            <div><?php echo esc_html( $second_check_text_first_tab ); ?></div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Logos -->
                <div class="sector-logos">
                    <?php if ( $logo_title_first_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title">
                            <?php echo esc_html( $logo_title_first_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php
                        $logos_tab1 = array(
                            $first_logo_image_first_tab,
                            $second_logo_image_first_tab,
                            $third_logo_image_first_tab,
                        );
                        foreach ( $logos_tab1 as $logo_url ) :
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

            </div>

            <?php if ( $bottom_text_first_tab ) : ?>
                <div class="sector-bottom-text">
                    <?php echo esc_html( $bottom_text_first_tab ); ?>
                </div>
            <?php endif; ?>

        </div>

<!-- ============================================================
     TAB 2
============================================================ -->
<div class="sector-tab-panel" data-tab="2">

    <div class="sector-tab-layout">

        <!-- SNAPSHOTS COLUMN -->
        <div class="sector-snapshot">

            <?php if ( $first_snapshot_number_second_tab ) : ?>
                <div class="sector-snapshot-number">
                    <?php echo esc_html( $first_snapshot_number_second_tab ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $first_snapshot_label_second_tab ) : ?>
                <div class="sector-snapshot-label">
                    <?php echo esc_html( $first_snapshot_label_second_tab ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $second_snapshot_number_second_tab ) : ?>
                <div class="sector-snapshot-number" style="margin-top:24px;">
                    <?php echo esc_html( $second_snapshot_number_second_tab ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $second_snapshot_label_second_tab ) : ?>
                <div class="sector-snapshot-label">
                    <?php echo esc_html( $second_snapshot_label_second_tab ); ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- DESCRIPTION COLUMN -->
        <div class="sector-middle">
            <div class="sector-description">
                <?php echo esc_html( $description_text_second_tab ); ?>
            </div>
        </div>

        <!-- LOGOS COLUMN -->
        <div class="sector-logos">

            <?php if ( $logo_title_second_tab ) : ?>
                <div class="sector-subtitle">
                    <?php echo esc_html( $logo_title_second_tab ); ?>
                </div>
            <?php endif; ?>

            <div class="sector-logo-row">
                <?php
                $logos_tab2 = array(
                    $first_logo_second_tab,
                    $second_logo_second_tab,
                    $third_logo_second_tab,
                );
                foreach ( $logos_tab2 as $logo_url ) :
                    if ( ! empty( $logo_url ) ) : ?>
                        <div class="sector-logo-item">
                            <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                        </div>
                    <?php endif;
                endforeach;
                ?>
            </div>

        </div>

    </div>

    <?php if ( $bottom_text_second_tab ) : ?>
        <div class="sector-bottom-text">
            <?php echo esc_html( $bottom_text_second_tab ); ?>
        </div>
    <?php endif; ?>

</div>


        <!-- ============================================================
             TAB 3 – LIVESTOCK / 3 BLOCKS
        ============================================================ -->
        <div class="sector-tab-panel" data-tab="3">

            <div class="sector-tab-layout-third">

                <!-- LEFT SNAPSHOTS COLUMN -->
                <div class="sector-third-snapshots">

                    <?php if ( $first_snapshot_number_third_tab || $first_snapshot_label_third_tab ) : ?>
                        <div class="sector-third-snapshot-pair">
                            <?php if ( $first_snapshot_number_third_tab ) : ?>
                                <div class="sector-snapshot-number">
                                    <?php echo esc_html( $first_snapshot_number_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_snapshot_label_third_tab ) : ?>
                                <div class="sector-snapshot-label">
                                    <?php echo esc_html( $first_snapshot_label_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_snapshot_number_third_tab || $second_snapshot_label_third_tab ) : ?>
                        <div class="sector-third-snapshot-pair">
                            <?php if ( $second_snapshot_number_third_tab ) : ?>
                                <div class="sector-snapshot-number">
                                    <?php echo esc_html( $second_snapshot_number_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_snapshot_label_third_tab ) : ?>
                                <div class="sector-snapshot-label">
                                    <?php echo esc_html( $second_snapshot_label_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- RIGHT – THREE BLOCKS -->
                <div class="sector-third-blocks">

                    <!-- BLOCK 1 -->
                    <div class="sector-third-block">
                        <?php if ( $first_block_title_third_tab ) : ?>
                            <div class="sector-subtitle sector-block-title">
                                <?php echo esc_html( $first_block_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $first_block_snapshot_number_third_tab || $first_block_snapshot_label_third_tab ) : ?>
                            <div class="sector-block-snapshot">
                                <?php if ( $first_block_snapshot_number_third_tab ) : ?>
                                    <div class="sector-block-snapshot-number">
                                        <?php echo esc_html( $first_block_snapshot_number_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $first_block_snapshot_label_third_tab ) : ?>
                                    <div class="sector-block-snapshot-label">
                                        <?php echo esc_html( $first_block_snapshot_label_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $first_block_logo_title_third_tab ) : ?>
                            <div class="sector-logo-title-third">
                                <?php echo esc_html( $first_block_logo_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="sector-logo-row">
                            <?php
                            $logos_block1 = array(
                                $first_block_first_logo_third_tab,
                                $first_block_second_logo_third_tab,
                            );
                            foreach ( $logos_block1 as $logo_url ) :
                                if ( ! empty( $logo_url ) ) : ?>
                                    <div class="sector-logo-item">
                                        <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                    </div>
                                <?php
                                endif;
                            endforeach;
                            ?>
                        </div>

                        <?php if ( $first_block_text_under_logos_third_tab ) : ?>
                            <div class="sector-under-logos-text">
                                <?php echo esc_html( $first_block_text_under_logos_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $first_block_link_text_third_tab && $first_block_link_url_third_tab ) : ?>
                            <a class="sector-link" href="<?php echo esc_url( ik_upload_url( $first_block_link_url_third_tab ) ); ?>" target="_blank" rel="noopener">
                                <span><?php echo esc_html( $first_block_link_text_third_tab ); ?></span>
                                <img src="<?php echo esc_url( $link_icon_url ); ?>" alt="" class="sector-link-icon">
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- BLOCK 2 -->
                    <div class="sector-third-block">
                        <?php if ( $second_block_title_third_tab ) : ?>
                            <div class="sector-subtitle sector-block-title">
                                <?php echo esc_html( $second_block_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_block_snapshot_number_third_tab || $second_block_snapshot_label_third_tab ) : ?>
                            <div class="sector-block-snapshot">
                                <?php if ( $second_block_snapshot_number_third_tab ) : ?>
                                    <div class="sector-block-snapshot-number">
                                        <?php echo esc_html( $second_block_snapshot_number_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $second_block_snapshot_label_third_tab ) : ?>
                                    <div class="sector-block-snapshot-label">
                                        <?php echo esc_html( $second_block_snapshot_label_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_block_logo_title_third_tab ) : ?>
                            <div class="sector-logo-title-third">
                                <?php echo esc_html( $second_block_logo_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="sector-logo-row">
                            <?php
                            $logos_block2 = array(
                                $second_block_first_logo_third_tab,
                                $second_block_second_logo_third_tab,
                            );
                            foreach ( $logos_block2 as $logo_url ) :
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

                    <!-- BLOCK 3 -->
                    <div class="sector-third-block">
                        <?php if ( $third_block_title_third_tab ) : ?>
                            <div class="sector-subtitle sector-block-title">
                                <?php echo esc_html( $third_block_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $third_block_snapshot_number_third_tab || $third_block_snapshot_label_third_tab ) : ?>
                            <div class="sector-block-snapshot">
                                <?php if ( $third_block_snapshot_number_third_tab ) : ?>
                                    <div class="sector-block-snapshot-number">
                                        <?php echo esc_html( $third_block_snapshot_number_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $third_block_snapshot_label_third_tab ) : ?>
                                    <div class="sector-block-snapshot-label">
                                        <?php echo esc_html( $third_block_snapshot_label_third_tab ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $third_block_logo_title_third_tab ) : ?>
                            <div class="sector-logo-title-third">
                                <?php echo esc_html( $third_block_logo_title_third_tab ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="sector-logo-row">
                            <?php
                            $logos_block3 = array(
                                $third_block_first_logo_third_tab,
                                $third_block_second_logo_third_tab,
                            );
                            foreach ( $logos_block3 as $logo_url ) :
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

                </div><!-- /.sector-third-blocks -->

            </div><!-- /.sector-tab-layout-third -->

        </div><!-- /.sector-tab-panel (3) -->

    </div>
</div>

<script>
(function() {
    var wrapper = document.getElementById('<?php echo $uid; ?>');
    if (!wrapper) return;

    var buttons = wrapper.querySelectorAll('.sector-tab-trigger');
    var panels  = wrapper.querySelectorAll('.sector-tab-panel');

    buttons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = this.getAttribute('data-tab');

            buttons.forEach(function(b) { b.classList.remove('active'); });
            panels.forEach(function(p) { p.classList.remove('active'); });

            this.classList.add('active');
            var panel = wrapper.querySelector('.sector-tab-panel[data-tab="' + target + '"]');
            if (panel) {
                panel.classList.add('active');
            }
        });
    });

})();
</script>

<?php
    return ob_get_clean();
}
add_shortcode( 'sector_tabs_agriculture', 'shortcode_sector_tabs_agriculture' );

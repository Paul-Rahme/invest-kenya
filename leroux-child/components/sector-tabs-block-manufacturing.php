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
       LAYOUT (NOW: SNAPSHOT COL 1 | SNAPSHOT COL 2 | CONTENT COL)
       (We keep the same classes & sizing rules)
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

    /* RESPONSIVE */
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
            </div>

            <?php
            // Panels renderer (split file)
            render_sector_tabs_panels([
                'uid'              => $uid,
                'check_icon_url'   => $check_icon_url,
                'download_icon_url'=> $download_icon_url,
            ]);
            ?>

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

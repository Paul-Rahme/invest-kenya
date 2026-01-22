<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_other_sectors]
| 3 Tabs – Other Sectors (based on Infrastructure layout, modified)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_other_sectors() {

    $uid = uniqid('sector-tabs-other-');

    /* =========================================
       TAB TITLES
    ========================================= */
    $tab_title_1 = get_field('tab_title_1');
    $tab_title_2 = get_field('tab_title_2');
    $tab_title_3 = get_field('tab_title_3');

    /* =========================================
       TAB 1
    ========================================= */
    $first_snapshot_number_first_tab  = get_field('first_snapshot_number_first_tab');
    $second_snapshot_number_first_tab = get_field('second_snapshot_number_first_tab');

    $first_snapshot_label_first_tab   = get_field('first_snapshot_label_first_tab');
    $second_snapshot_label_first_tab  = get_field('second_snapshot_label_first_tab');

    $first_text_first_tab  = get_field('first_text_first_tab');
    $second_text_first_tab = get_field('second_text_first_tab');

    /* =========================================
       TAB 2
    ========================================= */
    $first_snapshot_number_second_tab  = get_field('first_snapshot_number_second_tab');
    $second_snapshot_number_second_tab = get_field('second_snapshot_number_second_tab');

    $first_snapshot_label_second_tab   = get_field('first_snapshot_label_second_tab');
    $second_snapshot_label_second_tab  = get_field('second_snapshot_label_second_tab');

    $first_text_second_tab  = get_field('first_text_second_tab');
    $second_text_second_tab = get_field('second_text_second_tab');

    /* =========================================
       TAB 3
    ========================================= */
    $first_snapshot_number_third_tab  = get_field('first_snapshot_number_third_tab');
    $second_snapshot_number_third_tab = get_field('second_snapshot_number_third_tab');

    $first_snapshot_label_third_tab   = get_field('first_snapshot_label_third_tab');
    $second_snapshot_label_third_tab  = get_field('second_snapshot_label_third_tab');

    $first_text_third_tab  = get_field('first_text_third_tab');
    $second_text_third_tab = get_field('second_text_third_tab');

    ob_start(); ?>

<style>
/* ================================
   SAFE AREA
================================ */
#<?php echo $uid; ?>.ike-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    box-sizing: border-box;
}

/* ================================
   BASE
================================ */
#<?php echo $uid; ?> {
    font-family: "DM Sans", sans-serif;
    color: #101110;
}

/* ================================
   TABS NAV
================================ */
#<?php echo $uid; ?> .sector-tabs-nav {
    display: flex;
    gap: 40px;
    border-bottom: 1px solid #E5E7EB;
    margin-bottom: 32px;

    overflow-x: auto;
    overflow-y: hidden;        /* 🔥 kill vertical scrollbar */
    scrollbar-width: none;     /* Firefox */
}

#<?php echo $uid; ?> .sector-tabs-nav::-webkit-scrollbar {
    display: none;             /* Chrome / Safari */
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

/* ================================
   MAIN LAYOUT
================================ */
#<?php echo $uid; ?> .sector-tab-layout {
    display: flex;
    gap: 60px;
    align-items: flex-start;
}

/* ================================
   SNAPSHOTS COLUMN
================================ */
#<?php echo $uid; ?> .sector-snapshots {
    flex: 0 0 220px;
}

#<?php echo $uid; ?> .sector-snapshot-pair {
    margin-bottom: 40px;
}

#<?php echo $uid; ?> .sector-snapshot-number {
    font-size: 44px;
    font-weight: 600;
    line-height: 1.1;
    color: #101110;
}

#<?php echo $uid; ?> .sector-snapshot-label {
    font-size: 16px;
    margin-top: 6px;
    color: #4B5563;
}

/* ================================
   DESCRIPTIONS COLUMN
================================ */
#<?php echo $uid; ?> .sector-descriptions {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 40px;
}

/* ================================
   DESCRIPTION TEXT (same as old block text)
================================ */
#<?php echo $uid; ?> .sector-description-text {
    font-family: "DM Sans";
    font-weight: 400;
    font-style: normal;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0;
    color: #101110;
    max-width: 800px;
}

/* ================================
   MOBILE
================================ */
@media (max-width: 1024px) {
    #<?php echo $uid; ?> .sector-tab-layout {
        flex-direction: column;
        gap: 32px;
    }

    #<?php echo $uid; ?> .sector-descriptions {
        gap: 24px;
    }

    #<?php echo $uid; ?> .sector-snapshots {
        flex: none;
    }
}
</style>

<div id="<?php echo $uid; ?>" class="sector-tabs-wrapper ike-safe-area">
    <div class="sector-tabs-inner">

        <!-- TAB HEADERS -->
        <div class="sector-tabs-nav">
            <button class="sector-tab-trigger active" data-tab="1"><?php echo esc_html($tab_title_1); ?></button>
            <button class="sector-tab-trigger" data-tab="2"><?php echo esc_html($tab_title_2); ?></button>
            <button class="sector-tab-trigger" data-tab="3"><?php echo esc_html($tab_title_3); ?></button>
        </div>

        <!-- ================= TAB 1 ================= -->
        <div class="sector-tab-panel active" data-tab="1">
            <div class="sector-tab-layout">

                <div class="sector-snapshots">
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($first_snapshot_number_first_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_first_tab); ?></div>
                    </div>
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($second_snapshot_number_first_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($second_snapshot_label_first_tab); ?></div>
                    </div>
                </div>

                <div class="sector-descriptions">
                    <div class="sector-description-text"><?php echo esc_html($first_text_first_tab); ?></div>
                    <div class="sector-description-text"><?php echo esc_html($second_text_first_tab); ?></div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 2 ================= -->
        <div class="sector-tab-panel" data-tab="2">
            <div class="sector-tab-layout">

                <div class="sector-snapshots">
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($first_snapshot_number_second_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_second_tab); ?></div>
                    </div>
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($second_snapshot_number_second_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($second_snapshot_label_second_tab); ?></div>
                    </div>
                </div>

                <div class="sector-descriptions">
                    <div class="sector-description-text"><?php echo esc_html($first_text_second_tab); ?></div>
                    <div class="sector-description-text"><?php echo esc_html($second_text_second_tab); ?></div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 3 ================= -->
        <div class="sector-tab-panel" data-tab="3">
            <div class="sector-tab-layout">

                <div class="sector-snapshots">
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($first_snapshot_number_third_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_third_tab); ?></div>
                    </div>
                    <div class="sector-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($second_snapshot_number_third_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($second_snapshot_label_third_tab); ?></div>
                    </div>
                </div>

                <div class="sector-descriptions">
                    <div class="sector-description-text"><?php echo esc_html($first_text_third_tab); ?></div>
                    <div class="sector-description-text"><?php echo esc_html($second_text_third_tab); ?></div>
                </div>

            </div>
        </div>

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
            if (panel) panel.classList.add('active');
        });
    });
})();
</script>

<?php
    return ob_get_clean();
}
add_shortcode( 'sector_tabs_other_sectors', 'shortcode_sector_tabs_other_sectors' );

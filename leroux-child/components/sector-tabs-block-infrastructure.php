<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_infrastructure]
| 3 Tabs – Infrastructure (based on Agriculture Tab 3 layout)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_infrastructure() {

    $uid = uniqid('sector-tabs-infra-');

    /* =========================================
       TAB TITLES
    ========================================= */
    $tab_title_1 = get_field('tab_title_1');
    $tab_title_2 = get_field('tab_title_2');
    $tab_title_3 = get_field('tab_title_3');

    /* =========================================
       TAB 1
    ========================================= */
    $first_snapshot_number_first_tab       = get_field('first_snapshot_number_first_tab');
    $second_snapshot_number_first_tab      = get_field('second_snapshot_number_first_tab');

    $first_snapshot_label_top_first_tab    = get_field('first_snapshot_label_top_first_tab');
    $first_snapshot_label_bottom_first_tab = get_field('first_snapshot_label_bottom_first_tab');
    $second_snapshot_label_first_tab       = get_field('second_snapshot_label_first_tab');

    $first_block_title_first_tab  = get_field('first_block_title_first_tab');
    $second_block_title_first_tab = get_field('second_block_title_first_tab');
    $third_block_title_first_tab  = get_field('third_block_title_first_tab');

    $first_block_text_first_tab   = get_field('first_block_text_first_tab');
    $second_block_text_first_tab  = get_field('second_block_text_first_tab');
    $third_block_text_first_tab   = get_field('third_block_text_first_tab');

    /* =========================================
       TAB 2
    ========================================= */
    $first_snapshot_number_second_tab  = get_field('first_snapshot_number_second_tab');
    $second_snapshot_number_second_tab = get_field('second_snapshot_number_second_tab');

    $first_snapshot_label_second_tab   = get_field('first_snapshot_label_second_tab');
    $second_snapshot_label_second_tab  = get_field('second_snapshot_label_second_tab');

    $first_block_title_second_tab  = get_field('first_block_title_second_tab');
    $second_block_title_second_tab = get_field('second_block_title_second_tab');
    $third_block_title_second_tab  = get_field('third_block_title_second_tab');

    $first_block_text_second_tab   = get_field('first_block_text_second_tab');
    $second_block_text_second_tab  = get_field('second_block_text_second_tab');
    $third_block_text_second_tab   = get_field('third_block_text_second_tab');

    /* =========================================
       TAB 3
    ========================================= */
    $snapshot_number_third_tab = get_field('snapshot_number_third_tab');
    $snapshot_label_third_tab  = get_field('snapshot_label_third_tab');

    $first_block_title_third_tab  = get_field('first_block_title_third_tab');
    $second_block_title_third_tab = get_field('second_block_title_third_tab');
    $third_block_title_third_tab  = get_field('third_block_title_third_tab');

    $first_block_text_third_tab   = get_field('first_block_text_third_tab');
    $second_block_text_third_tab  = get_field('second_block_text_third_tab');
    $third_block_text_third_tab   = get_field('third_block_text_third_tab');

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
   TABS NAV (same as agriculture)
================================ */
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
    overflow-y: hidden;        /* 🔥 kill vertical scroll */
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
   MAIN LAYOUT (same as agri tab 3)
================================ */
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
   BLOCKS (NO SEPARATORS)
================================ */
#<?php echo $uid; ?> .sector-third-blocks {
    flex: 1;
    display: flex;
    gap: 40px;
}

#<?php echo $uid; ?> .sector-third-block {
    flex: 1;
    padding: 0;
    box-sizing: border-box;
}

/* ================================
   BLOCK TITLE
================================ */
#<?php echo $uid; ?> .sector-block-title {
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 12px;
}

/* ================================
   BLOCK TEXT (YOUR SPEC)
================================ */
#<?php echo $uid; ?> .sector-block-text {
    font-family: "DM Sans";
    font-weight: 400;
    font-style: normal;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0;
    color: #101110;
}

/* ================================
   MOBILE
================================ */
@media (max-width: 1024px) {
    #<?php echo $uid; ?> .sector-tab-layout-third {
        flex-direction: column;
        gap: 32px;
    }

    #<?php echo $uid; ?> .sector-third-blocks {
        flex-direction: column;
        gap: 24px;
    }

    #<?php echo $uid; ?> .sector-third-snapshots {
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
            <div class="sector-tab-layout-third">

                <div class="sector-third-snapshots">
                    <div class="sector-third-snapshot-pair">
                        <?php if ($first_snapshot_label_top_first_tab): ?>
                            <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_top_first_tab); ?></div>
                        <?php endif; ?>
                        <div class="sector-snapshot-number"><?php echo esc_html($first_snapshot_number_first_tab); ?></div>
                        <?php if ($first_snapshot_label_bottom_first_tab): ?>
                            <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_bottom_first_tab); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="sector-third-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($second_snapshot_number_first_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($second_snapshot_label_first_tab); ?></div>
                    </div>
                </div>

                <div class="sector-third-blocks">
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($first_block_title_first_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($first_block_text_first_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($second_block_title_first_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($second_block_text_first_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($third_block_title_first_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($third_block_text_first_tab); ?></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 2 ================= -->
        <div class="sector-tab-panel" data-tab="2">
            <div class="sector-tab-layout-third">

                <div class="sector-third-snapshots">
                    <div class="sector-third-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($first_snapshot_number_second_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($first_snapshot_label_second_tab); ?></div>
                    </div>
                    <div class="sector-third-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($second_snapshot_number_second_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($second_snapshot_label_second_tab); ?></div>
                    </div>
                </div>

                <div class="sector-third-blocks">
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($first_block_title_second_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($first_block_text_second_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($second_block_title_second_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($second_block_text_second_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($third_block_title_second_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($third_block_text_second_tab); ?></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 3 ================= -->
        <div class="sector-tab-panel" data-tab="3">
            <div class="sector-tab-layout-third">

                <div class="sector-third-snapshots">
                    <div class="sector-third-snapshot-pair">
                        <div class="sector-snapshot-number"><?php echo esc_html($snapshot_number_third_tab); ?></div>
                        <div class="sector-snapshot-label"><?php echo esc_html($snapshot_label_third_tab); ?></div>
                    </div>
                </div>

                <div class="sector-third-blocks">
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($first_block_title_third_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($first_block_text_third_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($second_block_title_third_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($second_block_text_third_tab); ?></div>
                    </div>
                    <div class="sector-third-block">
                        <div class="sector-block-title"><?php echo esc_html($third_block_title_third_tab); ?></div>
                        <div class="sector-block-text"><?php echo esc_html($third_block_text_third_tab); ?></div>
                    </div>
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
add_shortcode( 'sector_tabs_infrastructure', 'shortcode_sector_tabs_infrastructure' );

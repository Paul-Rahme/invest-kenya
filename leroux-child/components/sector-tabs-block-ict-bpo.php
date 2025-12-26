<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_ict_bpo]
| ICT & BPO Sector — 2 Tabs (Snapshots + Check Text + Logos)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_ict_bpo() {

    // ICONS
$check_icon_url    = ik_upload_url('2025/12/check-circle.svg');
$download_icon_url = ik_upload_url('2025/11/System-Icons-5.svg');


    // UNIQUE ID
    $uid = uniqid('sector-tabs-ictbpo-');

    /*
    |--------------------------------------------------------------------------
    | TAB 1 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_1  = get_field('tab_title_1');

    $first_snapshot_number_first_tab  = get_field('first_snapshot_number_first_tab');
    $second_snapshot_number_first_tab = get_field('second_snapshot_number_first_tab');

    $first_snapshot_label_first_tab  = get_field('first_snapshot_label_first_tab');
    $second_snapshot_label_first_tab = get_field('second_snapshot_label_first_tab');

    $check_text_first_tab = get_field('check_text_first_tab');

    $logo_title_first_tab  = get_field('logo_title_first_tab');
    $first_logo_first_tab  = get_field('first_logo_image_first_tab');
    $second_logo_first_tab = get_field('second_logo_image_first_tab');
    $third_logo_first_tab  = get_field('third_logo_image_first_tab');

    $bottom_text_first_tab   = get_field('bottom_text_first_tab');
    $download_text_first_tab = get_field('download_text_first_tab');
    $download_url_first_tab  = get_field('download_url_first_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 2 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_2 = get_field('tab_title_2');
    $description_text_second_tab = get_field('description_text_second_tab');
    $check_text_second_tab       = get_field('check_text_second_tab');

    $logo_title_second_tab = get_field('logo_title_second_tab');
    $logo2_1 = get_field('first_logo_second_tab');
    $logo2_2 = get_field('second_logo_second_tab');
    $logo2_3 = get_field('third_logo_second_tab');
    $logo2_4 = get_field('fourth_logo_second_tab');

    ob_start(); ?>

<style>

#<?php echo $uid; ?>.ike-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    font-family: "DM Sans", sans-serif;
    color: #101110;
}

/* TAB NAVIGATION */
#<?php echo $uid; ?> .sector-tabs-nav {
    display: flex;
    gap: 40px;
    border-bottom: 1px solid #E5E7EB;
    margin-bottom: 32px;
    overflow-x: auto;
}

#<?php echo $uid; ?> .sector-tab-trigger {
    position: relative;
    padding: 12px 0;
    font-size: 20px;
    font-weight: 500;
    color: #4B5563;
    border: none;
    background: none;
    cursor: pointer;
    white-space: nowrap;
	font-family: "DM Sans", sans-serif;
}

#<?php echo $uid; ?> .sector-tab-trigger.active {
    color: #DB2129;
}

#<?php echo $uid; ?> .sector-tab-trigger.active::after {
    content: "";
    position: absolute;
    left: 0; bottom: -1px;
    width: 100%;
    height: 3px;
    background: #DB2129;
}

/* PANELS */
#<?php echo $uid; ?> .sector-tab-panel { display: none; }
#<?php echo $uid; ?> .sector-tab-panel.active { display: block; }

/* DESKTOP MAIN LAYOUT */
#<?php echo $uid; ?> .sector-tab-layout {
    display: flex;
    align-items: flex-start;
    gap: 60px;
}

/* SNAPSHOTS (LEFT COLUMN) */
#<?php echo $uid; ?> .snapshot-column {
    flex: 0 0 200px;
}

#<?php echo $uid; ?> .snapshot-number {
    font-size: 44px;
    font-weight: 600;
    margin-bottom: 4px;
}

#<?php echo $uid; ?> .snapshot-label {
    font-size: 16px;
    color: #4B5563;
    margin-bottom: 20px;
}

/* TAB 1 CHECK COLUMN (MIRROR TAB 2 WIDTH: 45% + 55%) */
#<?php echo $uid; ?> .sector-description-block--first-tab {
    display: flex;
    gap: 30px;
    flex: 0 0 650px;
    max-width: 650px;
}

#<?php echo $uid; ?> .sector-description-block--first-tab .sector-description-text {
    flex: 0 0 45%;
    max-width: 45%;
}

#<?php echo $uid; ?> .sector-description-block--first-tab .sector-check-item {
    flex: 0 0 55%;
    max-width: 55%;
}

/* CHECK ITEM GENERAL */
#<?php echo $uid; ?> .sector-check-item {
    display: flex;
    gap: 10px;
    align-items: flex-start;
}

#<?php echo $uid; ?> .sector-check-item img {
    width: 18px;
    height: 18px;
    margin-top: 3px;
}

#<?php echo $uid; ?> .sector-check-text {
    font-size: 18px;
    line-height: 1.5;
}

/* TAB 2 DESCRIPTION BLOCK */
#<?php echo $uid; ?> .sector-description-block {
    display: flex;
    gap: 30px;
    flex: 0 0 650px;
    max-width: 650px;
}

#<?php echo $uid; ?> .sector-description-text {
    flex: 0 0 45%;
    max-width: 45%;
    font-size: 22px;
    font-weight: 600;
}

/* LOGOS COLUMN */
#<?php echo $uid; ?> .sector-logos {
    flex: 1;
}

#<?php echo $uid; ?> .sector-subtitle {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 12px;
}

#<?php echo $uid; ?> .sector-logo-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

#<?php echo $uid; ?> .sector-logo-item {
    width: 145px;
    height: 82px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 0 1px #E5E7EB;
    display: flex;
    justify-content: center;
    align-items: center;
}

#<?php echo $uid; ?> .sector-logo-item img {
    width: 145px;
    height: 82px;
    object-fit: contain;
}

/* BOTTOM ROW */
#<?php echo $uid; ?> .sector-bottom-row {
    margin-top: 30px;
    display: flex;
    gap: 16px;
    align-items: center;
    flex-wrap: wrap;
}

#<?php echo $uid; ?> .sector-download-btn {
    padding: 10px 18px;
    background: #DB2129;
    color: white;
    border-radius: 999px;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
}

#<?php echo $uid; ?> .sector-download-btn:hover {
    background: #292A29;
}
#<?php echo $uid; ?> .sector-check-block--first-tab {
    flex: 0 0 400px;
    max-width: 650px;
    display: flex;
    align-items: flex-start;
}


/* ============================================================
   RESPONSIVE — FINAL CLEAN VERSION
============================================================ */
@media (max-width: 1024px) {

    #<?php echo $uid; ?>.ike-safe-area {
        padding: 0 30px !important;
    }

    /* STACK EVERYTHING */
    #<?php echo $uid; ?> .sector-tab-layout {
        display: block !important;
        gap: 0 !important;
    }

    #<?php echo $uid; ?> .snapshot-column {
        margin-bottom: 10px !important;
    }

    /* TAB 1 CHECK FULL WIDTH */
    #<?php echo $uid; ?> .sector-description-block--first-tab {
        display: block !important;
        max-width: 100% !important;
        margin: 0 0 12px 0 !important;
    }

    #<?php echo $uid; ?> .sector-description-block--first-tab .sector-description-text {
        display: none !important;
    }

    #<?php echo $uid; ?> .sector-description-block--first-tab .sector-check-item {
        max-width: 100% !important;
        margin-bottom: 12px !important;
    }

    /* TAB 2 DESCRIPTION + CHECK FULL WIDTH */
    #<?php echo $uid; ?> .sector-description-block {
        display: block !important;
        max-width: 100% !important;
        margin-bottom: 12px !important;
    }

    #<?php echo $uid; ?> .sector-description-text {
        max-width: 100% !important;
        margin-bottom: 8px !important;
    }

    #<?php echo $uid; ?> .sector-description-block .sector-check-item {
        max-width: 100% !important;
        margin-bottom: 12px !important;
    }

    /* LOGOS FULL WIDTH STACK */
    #<?php echo $uid; ?> .sector-logos {
        margin-top: 0 !important;
    }

    #<?php echo $uid; ?> .sector-subtitle {
        margin-bottom: 10px !important;
    }

    /* Bottom row spacing */
    #<?php echo $uid; ?> .sector-bottom-row {
        margin-top: 20px !important;
    }
}
@media (max-width:1024px) {
    #<?php echo $uid; ?> .sector-check-block--first-tab {
        max-width: 100% !important;
        display: block !important;
        margin-bottom: 6px !important;
    }
}


</style>


<div id="<?php echo $uid; ?>" class="ike-safe-area sector-tabs-wrapper">

    <!-- TAB NAV -->
    <div class="sector-tabs-nav">
        <button class="sector-tab-trigger active" data-tab="1"><?php echo esc_html($tab_title_1); ?></button>
        <button class="sector-tab-trigger" data-tab="2"><?php echo esc_html($tab_title_2); ?></button>
    </div>


    <!-- TAB 1 -->
    <div class="sector-tab-panel active" data-tab="1">
        <div class="sector-tab-layout">

            <!-- SNAPSHOTS -->
            <div class="snapshot-column">
                <?php if ($first_snapshot_number_first_tab): ?>
                    <div class="snapshot-number"><?php echo esc_html($first_snapshot_number_first_tab); ?><span>%</span></div>
                <?php endif; ?>

                <?php if ($first_snapshot_label_first_tab): ?>
                    <div class="snapshot-label"><?php echo esc_html($first_snapshot_label_first_tab); ?></div>
                <?php endif; ?>

                <?php if ($second_snapshot_number_first_tab): ?>
                    <div class="snapshot-number">$<?php echo esc_html($second_snapshot_number_first_tab); ?></div>
                <?php endif; ?>

                <?php if ($second_snapshot_label_first_tab): ?>
                    <div class="snapshot-label"><?php echo esc_html($second_snapshot_label_first_tab); ?></div>
                <?php endif; ?>
            </div>

<div class="sector-check-block--first-tab">
    <div class="sector-check-item">
        <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
        <div class="sector-check-text">
            <?php echo esc_html($check_text_first_tab); ?>
        </div>
    </div>
</div>


            <!-- LOGOS FIRST TAB -->
            <div class="sector-logos">
                <?php if ($logo_title_first_tab): ?>
                    <div class="sector-subtitle"><?php echo esc_html($logo_title_first_tab); ?></div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ([$first_logo_first_tab, $second_logo_first_tab, $third_logo_first_tab] as $logo): ?>
                        <?php if ($logo): ?>
                            <div class="sector-logo-item"><img src="<?php echo esc_url( ik_upload_url($logo) ); ?>"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <!-- BOTTOM ROW -->
        <div class="sector-bottom-row">
            <?php if ($bottom_text_first_tab): ?>
                <div class="sector-bottom-text"><?php echo esc_html($bottom_text_first_tab); ?></div>
            <?php endif; ?>

            <?php if ($download_url_first_tab): ?>
                <a class="sector-download-btn" href="<?php echo esc_url( ik_upload_url($download_url_first_tab) ); ?>" target="_blank">
                    <?php echo esc_html($download_text_first_tab); ?>
                    <img src="<?php echo esc_url($download_icon_url); ?>" alt="">
                </a>
            <?php endif; ?>
        </div>
    </div>


    <!-- TAB 2 -->
    <div class="sector-tab-panel" data-tab="2">
        <div class="sector-tab-layout">

            <div class="sector-description-block">
                <div class="sector-description-text">
                    <?php echo esc_html($description_text_second_tab); ?>
                </div>

                <div class="sector-check-item">
                    <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                    <div class="sector-check-text"><?php echo esc_html($check_text_second_tab); ?></div>
                </div>
            </div>

            <div class="sector-logos">
                <?php if ($logo_title_second_tab): ?>
                    <div class="sector-subtitle"><?php echo esc_html($logo_title_second_tab); ?></div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ([$logo2_1, $logo2_2, $logo2_3, $logo2_4] as $logo): ?>
                        <?php if ($logo): ?>
                            <div class="sector-logo-item"><img src="<?php echo esc_url( ik_upload_url($logo) ); ?>"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

</div>


<script>
(function(){
    const wrapper = document.getElementById('<?php echo $uid; ?>');
    const buttons = wrapper.querySelectorAll('.sector-tab-trigger');
    const panels  = wrapper.querySelectorAll('.sector-tab-panel');

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const tab = this.getAttribute('data-tab');

            buttons.forEach(b => b.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            wrapper.querySelector('.sector-tab-panel[data-tab="'+tab+'"]').classList.add('active');
        });
    });
})();
</script>

<?php
return ob_get_clean();
}
add_shortcode('sector_tabs_ict_bpo', 'shortcode_sector_tabs_ict_bpo');

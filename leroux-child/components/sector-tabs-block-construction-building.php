<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_construction_building]
| Construction & Building Sector — 2 tabs (simplified version)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_construction_building() {

    // ICONS
    $check_icon_url = ik_upload_url('2025/12/check-circle.svg');
    // UNIQUE ID
    $uid = uniqid('sector-tabs-');

    /*
    |--------------------------------------------------------------------------
    | FIELDS — TAB 1
    |--------------------------------------------------------------------------
    */
    $tab_title_1               = get_field('tab_title_1');
    $snapshot_number_first_tab = get_field('snapshot_number_first_tab');
    $snapshot_label_first_tab  = get_field('snapshot_label_first_tab');

    $first_check_text_first_tab  = get_field('first_check_text_first_tab');
    $second_check_text_first_tab = get_field('second_check_text_first_tab');

    $logo_title_first_tab        = get_field('logo_title_first_tab');
    $first_logo_image_first_tab  = get_field('first_logo_image_first_tab');
    $second_logo_image_first_tab = get_field('second_logo_image_first_tab');


    /*
    |--------------------------------------------------------------------------
    | FIELDS — TAB 2
    |--------------------------------------------------------------------------
    */
    $tab_title_2                = get_field('tab_title_2');
    $snapshot_number_second_tab = get_field('snapshot_number_second_tab');
    $snapshot_label_second_tab  = get_field('snapshot_label_second_tab');

    $first_check_text_second_tab = get_field('first_check_text_second_tab');

    $logo_title_second_tab   = get_field('logo_title_second_tab');
    $first_logo_second_tab   = get_field('first_logo_second_tab');
    $second_logo_second_tab  = get_field('second_logo_second_tab');

    ob_start(); ?>

<style>

    /* SAFE AREA */
    #<?php echo $uid; ?>.ike-safe-area {
        max-width: 1530px;
        margin: 0 auto;
        width: 100%;
        padding-left: 0 !important;
        padding-right: 0 !important;
        box-sizing: border-box;
    }

    /* BASE */
    #<?php echo $uid; ?> {
        font-family: "DM Sans", sans-serif;
        color: #101110;
    }

#<?php echo esc_attr($uid); ?> .sector-tabs-nav {
    display: flex;
    gap: 40px;
    border-bottom: 1px solid #E5E7EB;
    margin-bottom: 32px;

    overflow-x: auto;
    overflow-y: hidden;        /* 🔥 kills vertical scroll */
    scrollbar-width: none;     /* Firefox */
}

#<?php echo esc_attr($uid); ?> .sector-tabs-nav::-webkit-scrollbar {
    display: none;             /* Chrome / Safari */
}


    .sector-tab-trigger {
        position: relative;
        padding: 12px 0;
        font-size: 20px;
        font-weight: 500;
        color: #4B5563;
        background: none;
        border: none;
        cursor: pointer;
		font-family: "DM Sans", sans-serif !important;
    }
    .sector-tab-trigger.active {
        color: #DB2129;
    }
    .sector-tab-trigger.active::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 3px;
        background: #DB2129;
    }

    .sector-tab-panel { display: none; }
    .sector-tab-panel.active { display: block; }

    .sector-tab-layout {
        display: flex;
        gap: 60px;
        align-items: flex-start;
    }

    .sector-snapshot-number {
        font-size: 44px;
        font-weight: 600;
        line-height: 1.1;
    }
    .sector-snapshot-label {
        margin-top: 8px;
        font-size: 16px;
        color: #4B5563;
    }

    .sector-check-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 10px;
    }

    .sector-check-item img {
        width: 18px;
        height: 18px;
    }

    .sector-logo-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .sector-logo-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .sector-logo-item {
        width: 145px;
        height: 82px;
        border-radius: 8px;
        box-shadow: 0 0 0 1px #E5E7EB;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .sector-logo-item img {
        width: 145px;
        height: 82px;
        object-fit: contain;
    }
	
	#<?php echo esc_attr($uid); ?> .sector-middle {
    flex: 0 0 30%;
    max-width: 30%;
}
#<?php echo esc_attr($uid); ?> .sector-check-item {
    align-items: flex-start;
}

#<?php echo esc_attr($uid); ?> .sector-check-text {
    flex: 0 0 50%;   /* take 50% of the row */
    max-width: 50%;
    display: block;
}

#<?php echo esc_attr($uid); ?> .sector-check-item img {
    margin-top: 2px;
}

	
@media (min-width: 1025px) {
    #<?php echo esc_attr($uid); ?> .sector-check-text {
        flex: 1 1 auto !important;
        max-width: none !important;
        width: auto !important;
    }
}


/* =============================
   FINAL RESPONSIVE FIX (WORKING)
============================= */
@media (max-width: 1024px) {

    /* Force each check row to stack vertically */
    #<?php echo esc_attr($uid); ?> .sector-check-item {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        width: 100% !important;
        gap: 6px !important;
    }

    /* Icon stays normal size, sits on top */
    #<?php echo esc_attr($uid); ?> .sector-check-item img {
        margin: 0 0 4px 0 !important;
    }

    /* Text becomes FULL WIDTH, always */
    #<?php echo esc_attr($uid); ?> .sector-check-text {
        width: 100% !important;
        max-width: 100% !important;
        flex: none !important;
        display: block !important;
        margin: 0 !important;
    }
}


    /* RESPONSIVE */
    @media (max-width: 1024px) {
        #<?php echo $uid; ?>.ike-safe-area {
            padding-left: 30px !important;
            padding-right: 30px !important;
        }

        .sector-tab-layout {
            flex-direction: column;
            gap: 32px;
        }
    }
	
	/* BREAK PARENT WIDTH LIMIT ON RESPONSIVE */
@media (max-width: 1024px) {
    #<?php echo esc_attr($uid); ?> .sector-middle {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
    }

    #<?php echo esc_attr($uid); ?> .sector-check-item {
        display: flex !important;
        width: 100% !important;
        flex-direction: row !important; /* keep icon left */
        align-items: flex-start !important;
    }

    #<?php echo esc_attr($uid); ?> .sector-check-text {
        width: 100% !important;
        max-width: 100% !important;
        flex: 1 1 auto !important;
        display: block !important;
    }
}

@media (max-width: 675px) {
    #<?php echo esc_attr($uid); ?> .sector-tab-trigger {
        white-space: nowrap;     /* prevent wrapping */
        flex-shrink: 0;          /* prevent shrinking */
        line-height: 1.2;        /* stable height */
    }

    #<?php echo esc_attr($uid); ?> .sector-tabs-nav {
        overflow-x: auto;        /* allow horizontal scroll if needed */
        overflow-y: hidden;      /* no vertical scrollbar */
    }
}

</style>

<div id="<?php echo $uid; ?>" class="sector-tabs-wrapper ike-safe-area">
    <div class="sector-tabs-inner">

        <!-- NAV -->
        <div class="sector-tabs-nav">
            <?php if ($tab_title_1): ?>
                <button class="sector-tab-trigger active" data-tab="1">
                    <?php echo esc_html($tab_title_1); ?>
                </button>
            <?php endif; ?>

            <?php if ($tab_title_2): ?>
                <button class="sector-tab-trigger" data-tab="2">
                    <?php echo esc_html($tab_title_2); ?>
                </button>
            <?php endif; ?>
        </div>


        <!-- ================= TAB 1 ================= -->
        <div class="sector-tab-panel active" data-tab="1">
            <div class="sector-tab-layout">

                <!-- Snapshot -->
                <div class="sector-snapshot">
                    <?php if ($snapshot_number_first_tab): ?>
                        <div class="sector-snapshot-number">
                            <span class="small-dollar">$</span><?php echo esc_html($snapshot_number_first_tab); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($snapshot_label_first_tab): ?>
                        <div class="sector-snapshot-label">
                            <?php echo esc_html($snapshot_label_first_tab); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Checklist (only 2 items, no title) -->
                <div class="sector-middle">
                    <div class="sector-checklist">

                        <?php if ($first_check_text_first_tab): ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                                <div class="sector-check-text">
                                    <?php echo esc_html($first_check_text_first_tab); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($second_check_text_first_tab): ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                                <div class="sector-check-text">
                                    <?php echo esc_html($second_check_text_first_tab); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Logos (ONLY 2 logos) -->
                <div class="sector-logos">
                    <?php if ($logo_title_first_tab): ?>
                        <div class="sector-logo-title">
                            <?php echo esc_html($logo_title_first_tab); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">

                        <?php if ($first_logo_image_first_tab): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($first_logo_image_first_tab) ); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if ($second_logo_image_first_tab): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($second_logo_image_first_tab) ); ?>" alt="">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>


        <!-- ================= TAB 2 ================= -->
        <div class="sector-tab-panel" data-tab="2">
            <div class="sector-tab-layout">

                <!-- Snapshot -->
                <div class="sector-snapshot">
                    <?php if ($snapshot_number_second_tab): ?>
                        <div class="sector-snapshot-number">
                            <span class="small-dollar">$</span><?php echo esc_html($snapshot_number_second_tab); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($snapshot_label_second_tab): ?>
                        <div class="sector-snapshot-label">
                            <?php echo esc_html($snapshot_label_second_tab); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Checklist (ONLY one item, no title) -->
                <div class="sector-middle">
                    <div class="sector-checklist">
                        <?php if ($first_check_text_second_tab): ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                                <div class="sector-check-text">
                                    <?php echo esc_html($first_check_text_second_tab); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Logos (ONLY 1 title + 2 logos) -->
                <div class="sector-logos">

                    <?php if ($logo_title_second_tab): ?>
                        <div class="sector-logo-title">
                            <?php echo esc_html($logo_title_second_tab); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php if ($first_logo_second_tab): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($first_logo_second_tab) ); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if ($second_logo_second_tab): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($second_logo_second_tab) ); ?>" alt="">
                            </div>
                        <?php endif; ?>
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

            buttons.forEach(b => b.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            wrapper.querySelector('.sector-tab-panel[data-tab="' + target + '"]').classList.add('active');
        });
    });
})();
</script>

<?php
return ob_get_clean();
}
add_shortcode('sector_tabs_construction_building', 'shortcode_sector_tabs_construction_building');

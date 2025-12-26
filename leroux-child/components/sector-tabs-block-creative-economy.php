<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_creative_economy]
| 3-tab layout for Creative Economy sector
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_creative_economy() {

    // ICON
    $check_icon_url = ik_upload_url('2025/12/check-circle.svg');
    // UNIQUE ID
    $uid = uniqid('sector-tabs-creative-');

    /*
    |--------------------------------------------------------------------------
    | TAB 1 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_1   = get_field('tab_title_1');
    $description_1 = get_field('description_text_first_tab');
    $check_text_1  = get_field('check_text_first_tab');
    $logo_title_1  = get_field('logo_title_first_tab');
    $logo_image_1  = get_field('logo_image_first_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 2 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_2   = get_field('tab_title_2');
    $description_2 = get_field('description_text_second_tab');
    $check_text_2  = get_field('check_text_second_tab');
    $logo_title_2  = get_field('logo_title_second_tab');
    $logo_2_first  = get_field('first_logo_second_tab');
    $logo_2_second = get_field('second_logo_second_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 3 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_3   = get_field('tab_title_3');
    $description_3 = get_field('description_text_third_tab');
    $check_text_3  = get_field('check_text_third_tab');
    $logo_title_3  = get_field('logo_title_third_tab');
    $logo_3_first  = get_field('first_logo_third_tab');
    $logo_3_second = get_field('second_logo_third_tab');
	
	/*
|--------------------------------------------------------------------------
| TAB 4 FIELDS (SPORTS)
|--------------------------------------------------------------------------
*/
$tab_title_4 = get_field('tab_title_4');

/* SNAPSHOTS */
$s4_num_1 = get_field('first_snapshot_number_fourth_tab');
$s4_lbl_1 = get_field('first_snapshot_label_fourth_tab');

$s4_num_2 = get_field('second_snapshot_number_fourth_tab');
$s4_lbl_2 = get_field('second_snapshot_label_fourth_tab');

$s4_num_3 = get_field('third_snapshot_number_fourth_tab');
$s4_lbl_3 = get_field('third_snapshot_label_fourth_tab');

/* CHECK TEXTS */
$check_4_1 = get_field('first_check_text_fourth_tab');
$check_4_2 = get_field('second_check_text_fourth_tab');

/* LOGOS */
$logo_title_4 = get_field('logo_title_fourth_tab');
$logo_4_1 = get_field('first_logo_fourth_tab');
$logo_4_2 = get_field('second_logo_fourth_tab');
$logo_4_3 = get_field('third_logo_fourth_tab');
$logo_4_4 = get_field('fourth_logo_fourth_tab');


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
        font-family: "DM Sans", sans-serif;
        color: #101110;
    }

    /* ============================================================
       TAB HEADERS
    ============================================================ */
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

    #<?php echo $uid; ?> .sector-tab-panel { display: none; }
    #<?php echo $uid; ?> .sector-tab-panel.active { display: block; }

    /* ============================================================
       MAIN LAYOUT
    ============================================================ */
    #<?php echo $uid; ?> .sector-tab-layout {
        display: flex;
        align-items: flex-start;
        gap: 60px;
    }

    /* ============================================================
       TABS 1–3 DESCRIPTION + CHECK
    ============================================================ */
    #<?php echo $uid; ?> .sector-description-block {
        display: flex;
        align-items: flex-start;
        gap: 30px;
        flex: 0 0 650px;
        max-width: 650px;
    }

    #<?php echo $uid; ?> .sector-description-text {
        font-size: 22px;
        font-weight: 600;
        line-height: 1.4;
        flex: 0 0 45%;
        max-width: 45%;
    }

    #<?php echo $uid; ?> .sector-check-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
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

    /* ============================================================
       LOGOS (ALL TABS)
    ============================================================ */
    #<?php echo $uid; ?> .sector-logos {
        flex: 1;
    }

    #<?php echo $uid; ?> .sector-subtitle {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    #<?php echo $uid; ?> .sector-logo-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    #<?php echo $uid; ?> .sector-logo-item {
        width: 145px;
        height: 82px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 0 1px #E5E7EB;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #<?php echo $uid; ?> .sector-logo-item img {
        max-width: 145px;
        max-height: 82px;
        object-fit: contain;
    }

    /* ============================================================
       TAB 4 — SNAPSHOT COLUMN
    ============================================================ */
    #<?php echo $uid; ?> .snapshot-column {
        flex: 0 0 260px;
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
		margin-top: 10px;
    }

    /* ============================================================
       TAB 4 — CHECK COLUMN (FINAL FIX)
       - NO 55%
       - NO FLEX GROW
       - EXPLICIT WIDTH
    ============================================================ */
    #<?php echo $uid; ?> .sector-tab-panel[data-tab="4"] .sector-check-block--first-tab {
        flex: 0 0 480px;
        max-width: 480px;
        display: flex;
        flex-direction: column;
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 1024px) {

        #<?php echo $uid; ?>.ike-safe-area {
            padding: 0 40px !important;
        }

        #<?php echo $uid; ?> .sector-tab-layout {
            display: block !important;
            gap: 0 !important;
        }

        #<?php echo $uid; ?> .sector-description-block {
            display: block !important;
            max-width: 100% !important;
            margin-bottom: 12px;
        }

        #<?php echo $uid; ?> .sector-description-text,
        #<?php echo $uid; ?> .sector-check-item {
            max-width: 100% !important;
        }

        #<?php echo $uid; ?> .snapshot-column,
        #<?php echo $uid; ?> .sector-check-block--first-tab,
        #<?php echo $uid; ?> .sector-logos {
            width: 100%;
            max-width: 100%;
            margin-bottom: 12px;
        }
    }

    @media (max-width: 640px) {
        #<?php echo $uid; ?> .sector-description-text {
            font-size: 18px;
        }
    }
	
	/* ============================================================
   TAB 4 — EARLY MOBILE SWITCH
============================================================ */
@media (max-width: 1280px) {

    #<?php echo $uid; ?> .sector-tab-panel[data-tab="4"] .sector-tab-layout {
        display: block !important;
        gap: 0 !important;
    }

    #<?php echo $uid; ?> .sector-tab-panel[data-tab="4"] .snapshot-column,
    #<?php echo $uid; ?> .sector-tab-panel[data-tab="4"] .sector-check-block--first-tab,
    #<?php echo $uid; ?> .sector-tab-panel[data-tab="4"] .sector-logos {
        width: 100% !important;
        max-width: 100% !important;
        margin-bottom: 12px;
    }
}


</style>


<div id="<?php echo $uid; ?>" class="sector-tabs-wrapper ike-safe-area">

    <!-- TAB HEADERS -->
    <div class="sector-tabs-nav">
        <button class="sector-tab-trigger active" data-tab="1"><?php echo esc_html($tab_title_1); ?></button>
        <button class="sector-tab-trigger" data-tab="2"><?php echo esc_html($tab_title_2); ?></button>
        <button class="sector-tab-trigger" data-tab="3"><?php echo esc_html($tab_title_3); ?></button>
		<button class="sector-tab-trigger" data-tab="4">
    <?php echo esc_html($tab_title_4); ?>
</button>

    </div>


    <!-- ============================================================
         TAB 1
    ============================================================ -->
    <div class="sector-tab-panel active" data-tab="1">
        <div class="sector-tab-layout">

            <div class="sector-description-block">

                <div class="sector-description-text">
                    <?php echo esc_html($description_1); ?>
                </div>

                <div class="sector-check-item">
                    <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                    <div class="sector-check-text"><?php echo esc_html($check_text_1); ?></div>
                </div>

            </div>

            <div class="sector-logos">
                <?php if ($logo_title_1): ?>
                    <div class="sector-subtitle"><?php echo esc_html($logo_title_1); ?></div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php if (!empty($logo_image_1)): ?>
                        <div class="sector-logo-item">
                            <img src="<?php echo esc_url( ik_upload_url($logo_image_1) ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>


    <!-- ============================================================
         TAB 2
    ============================================================ -->
    <div class="sector-tab-panel" data-tab="2">
        <div class="sector-tab-layout">

            <div class="sector-description-block">

                <div class="sector-description-text">
                    <?php echo esc_html($description_2); ?>
                </div>

                <div class="sector-check-item">
                    <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                    <div class="sector-check-text"><?php echo esc_html($check_text_2); ?></div>
                </div>

            </div>

            <div class="sector-logos">
                <?php if ($logo_title_2): ?>
                    <div class="sector-subtitle"><?php echo esc_html($logo_title_2); ?></div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ([$logo_2_first, $logo_2_second] as $logo): ?>
                        <?php if (!empty($logo)): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($logo) ); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>


    <!-- ============================================================
         TAB 3
    ============================================================ -->
    <div class="sector-tab-panel" data-tab="3">
        <div class="sector-tab-layout">

            <div class="sector-description-block">

                <div class="sector-description-text">
                    <?php echo esc_html($description_3); ?>
                </div>

                <div class="sector-check-item">
                    <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                    <div class="sector-check-text"><?php echo esc_html($check_text_3); ?></div>
                </div>

            </div>

            <div class="sector-logos">
                <?php if ($logo_title_3): ?>
                    <div class="sector-subtitle"><?php echo esc_html($logo_title_3); ?></div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ([$logo_3_first, $logo_3_second] as $logo): ?>
                        <?php if (!empty($logo)): ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url($logo) ); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
	
<!-- ============================================================
     TAB 4 — MINING TAB 1 STYLE
============================================================ -->
<div class="sector-tab-panel" data-tab="4">
    <div class="sector-tab-layout">

        <!-- SNAPSHOT COLUMN -->
        <div class="snapshot-column">
            <?php foreach ([
                [$s4_num_1, $s4_lbl_1],
                [$s4_num_2, $s4_lbl_2],
                [$s4_num_3, $s4_lbl_3],
            ] as [$num, $label]): ?>

                <?php if ($num): ?>
                    <div class="snapshot-number"><?php echo esc_html($num); ?></div>
                <?php endif; ?>

                <?php if ($label): ?>
                    <div class="snapshot-label"><?php echo esc_html($label); ?></div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <!-- CHECK BLOCK -->
        <div class="sector-check-block--first-tab">
            <?php foreach ([$check_4_1, $check_4_2] as $check): ?>
                <?php if ($check): ?>
                    <div class="sector-check-item" style="margin-bottom:12px;">
                        <img src="<?php echo esc_url($check_icon_url); ?>" alt="">
                        <div class="sector-check-text"><?php echo esc_html($check); ?></div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- LOGOS -->
        <div class="sector-logos">
            <?php if ($logo_title_4): ?>
                <div class="sector-subtitle"><?php echo esc_html($logo_title_4); ?></div>
            <?php endif; ?>

            <div class="sector-logo-row">
                <?php foreach ([$logo_4_1, $logo_4_2, $logo_4_3, $logo_4_4] as $logo): ?>
                    <?php if ($logo): ?>
                        <div class="sector-logo-item">
                            <img src="<?php echo esc_url( ik_upload_url($logo) ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
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
            wrapper.querySelector('.sector-tab-panel[data-tab="'+target+'"]').classList.add('active');
        });
    });
})();
</script>

<?php
return ob_get_clean();
}
add_shortcode('sector_tabs_creative_economy', 'shortcode_sector_tabs_creative_economy');

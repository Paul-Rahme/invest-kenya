<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_tourism_hospitality]
| Tourism & Hospitality Sector — 2 Tabs (Snapshots + Check Texts + Logos)
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_tourism_hospitality() {

    // ICON
    $check_icon_url = ik_upload_url('2025/12/check-circle.svg');

    // UNIQUE ID FOR SCOPED CSS/JS
    $uid = uniqid('sector-tabs-tourism-');

    /*
    |--------------------------------------------------------------------------
    | TAB 1 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_1              = get_field('tab_title_1');
    $snapshot_number_first_tab = get_field('snapshot_number_first_tab');
    $snapshot_label_first_tab  = get_field('snapshot_label_first_tab');

    $first_check_text_first_tab  = get_field('first_check_text_first_tab');
    $second_check_text_first_tab = get_field('second_check_text_first_tab');

    $logo_title_first_tab = get_field('logo_title_first_tab');
    $logo1_1 = get_field('first_logo_image_first_tab');
    $logo1_2 = get_field('second_logo_image_first_tab');
    $logo1_3 = get_field('third_logo_image_first_tab');
    $logo1_4 = get_field('fourth_logo_image_first_tab');

    /*
    |--------------------------------------------------------------------------
    | TAB 2 FIELDS
    |--------------------------------------------------------------------------
    */
    $tab_title_2 = get_field('tab_title_2');

    $first_snapshot_number_second_tab  = get_field('first_snapshot_number_second_tab');
    $second_snapshot_number_second_tab = get_field('second_snapshot_number_second_tab');

    $first_snapshot_label_second_tab  = get_field('first_snapshot_label_second_tab');
    $second_snapshot_label_second_tab = get_field('second_snapshot_label_second_tab');

    $first_check_text_second_tab  = get_field('first_check_text_second_tab');
    $second_check_text_second_tab = get_field('second_check_text_second_tab');

    $logo_title_second_tab = get_field('logo_title_second_tab');
    $logo2_1 = get_field('first_logo_second_tab');
    $logo2_2 = get_field('second_logo_second_tab');

    ob_start(); ?>

<style>
/* ============================================================
   SAFE AREA WRAPPER
============================================================ */
#<?php echo $uid; ?>.ike-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    font-family: "DM Sans", sans-serif;
    color: #101110;
}

/* ============================================================
   TAB NAVIGATION
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
    left: 0;
    bottom: -1px;
    width: 100%;
    height: 3px;
    background: #DB2129;
}

/* ============================================================
   PANELS
============================================================ */
#<?php echo $uid; ?> .sector-tab-panel {
    display: none;
}
#<?php echo $uid; ?> .sector-tab-panel.active {
    display: block;
}

/* ============================================================
   MAIN LAYOUT (3 COLUMNS)
============================================================ */
#<?php echo $uid; ?> .sector-tab-layout {
    display: flex;
    align-items: flex-start;
    gap: 60px;
}

/* ============================================================
   SNAPSHOTS COLUMN
============================================================ */
#<?php echo $uid; ?> .snapshot-column {
    flex: 0 0 220px;
}

/* Single snapshot (Tab 1) is just number + label stacked */
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

/* TAB 2: Two snapshot blocks that can rearrange on responsive */
#<?php echo $uid; ?> .snapshot-column--double {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

#<?php echo $uid; ?> .snapshot-column--double .snapshot-item {
    flex: 1;
}

/* ============================================================
   CHECK TEXTS COLUMN
============================================================ */
#<?php echo $uid; ?> .sector-check-block {
    flex: 0 0 400px;
    max-width: 650px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* General check item */
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

/* ============================================================
   LOGOS COLUMN
============================================================ */
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
    background: #FFFFFF;
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

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 1024px) {

    #<?php echo $uid; ?>.ike-safe-area {
        padding: 0 30px !important;
    }

    /* Stack main columns */
    #<?php echo $uid; ?> .sector-tab-layout {
        flex-direction: column;
        gap: 24px;
    }

    #<?php echo $uid; ?> .snapshot-column {
        margin-bottom: 10px !important;
    }

    #<?php echo $uid; ?> .sector-check-block {
        max-width: 100% !important;
    }

    #<?php echo $uid; ?> .sector-logos {
        margin-top: 0 !important;
    }

    #<?php echo $uid; ?> .sector-subtitle {
        margin-bottom: 10px !important;
    }

    /* TAB 2: make the two snapshot blocks sit next to each other */
    #<?php echo $uid; ?> .snapshot-column--double {
        flex-direction: row;
    }

    #<?php echo $uid; ?> .snapshot-column--double .snapshot-item {
        flex: 1;
    }
	/* FIX huge spacing on responsive */
#<?php echo $uid; ?> .sector-tab-layout {
    flex-direction: column !important;
    gap: 16px !important; /* tighter gap */
}

/* Make all three columns full width on mobile */
#<?php echo $uid; ?> .snapshot-column,
#<?php echo $uid; ?> .snapshot-column--double,
#<?php echo $uid; ?> .sector-check-block,
#<?php echo $uid; ?> .sector-logos {
    flex: 0 0 100% !important;
    max-width: 100% !important;
}

/* Remove extra bottom spacing inside snapshot blocks */
#<?php echo $uid; ?> .snapshot-label {
    margin-bottom: 10px !important;
}

/* Ensure double snapshots sit next to each other nicely */
#<?php echo $uid; ?> .snapshot-column--double {
    display: flex !important;
    flex-direction: row !important;
    gap: 20px !important;
}

#<?php echo $uid; ?> .snapshot-column--double .snapshot-item {
    flex: 1 !important;
}

/* Reduce spacing under check texts */
#<?php echo $uid; ?> .sector-check-block {
    gap: 10px !important;
    margin-bottom: 10px !important;
}

/* Reduce spacing before logos */
#<?php echo $uid; ?> .sector-logos {
    margin-top: 0 !important;
}

}
</style>

<div id="<?php echo $uid; ?>" class="ike-safe-area sector-tabs-wrapper">

    <!-- TAB NAV -->
    <div class="sector-tabs-nav">
        <?php if ( $tab_title_1 ) : ?>
            <button class="sector-tab-trigger active" data-tab="1">
                <?php echo esc_html( $tab_title_1 ); ?>
            </button>
        <?php endif; ?>

        <?php if ( $tab_title_2 ) : ?>
            <button class="sector-tab-trigger" data-tab="2">
                <?php echo esc_html( $tab_title_2 ); ?>
            </button>
        <?php endif; ?>
    </div>

    <!-- ========================================================
         TAB 1
         Structure: Snapshots (left) + Check Texts (middle) + Logos (right)
    ========================================================= -->
    <div class="sector-tab-panel active" data-tab="1">
        <div class="sector-tab-layout">

            <!-- SNAPSHOT COLUMN (ONE SNAPSHOT) -->
            <div class="snapshot-column">
                <?php if ( $snapshot_number_first_tab ) : ?>
                    <div class="snapshot-number">
                        <?php echo esc_html( $snapshot_number_first_tab ); ?>%
                    </div>
                <?php endif; ?>

                <?php if ( $snapshot_label_first_tab ) : ?>
                    <div class="snapshot-label">
                        <?php echo esc_html( $snapshot_label_first_tab ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CHECK TEXTS COLUMN (TWO CHECK TEXTS) -->
            <div class="sector-check-block">
                <?php if ( $first_check_text_first_tab ) : ?>
                    <div class="sector-check-item">
                        <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                        <div class="sector-check-text">
                            <?php echo esc_html( $first_check_text_first_tab ); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( $second_check_text_first_tab ) : ?>
                    <div class="sector-check-item">
                        <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                        <div class="sector-check-text">
                            <?php echo esc_html( $second_check_text_first_tab ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- LOGOS COLUMN (FOUR LOGOS) -->
            <div class="sector-logos">
                <?php if ( $logo_title_first_tab ) : ?>
                    <div class="sector-subtitle">
                        <?php echo esc_html( $logo_title_first_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ( [ $logo1_1, $logo1_2, $logo1_3, $logo1_4 ] as $logo ) : ?>
                        <?php if ( $logo ) : ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url( $logo ) ); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

    <!-- ========================================================
         TAB 2
         Structure: Snapshots (left, TWO blocks) + Check Texts + Logos
    ========================================================= -->
    <div class="sector-tab-panel" data-tab="2">
        <div class="sector-tab-layout">

            <!-- SNAPSHOT COLUMN (TWO SNAPSHOTS) -->
            <div class="snapshot-column snapshot-column--double">

                <?php if ( $first_snapshot_number_second_tab || $first_snapshot_label_second_tab ) : ?>
                    <div class="snapshot-item">
                        <?php if ( $first_snapshot_number_second_tab ) : ?>
                            <div class="snapshot-number">
                                <?php echo esc_html( $first_snapshot_number_second_tab ); ?>%
                            </div>
                        <?php endif; ?>

                        <?php if ( $first_snapshot_label_second_tab ) : ?>
                            <div class="snapshot-label">
                                <?php echo esc_html( $first_snapshot_label_second_tab ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $second_snapshot_number_second_tab || $second_snapshot_label_second_tab ) : ?>
                    <div class="snapshot-item">
                        <?php if ( $second_snapshot_number_second_tab ) : ?>
                            <div class="snapshot-number">
                                <?php echo esc_html( $second_snapshot_number_second_tab ); ?>%
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_snapshot_label_second_tab ) : ?>
                            <div class="snapshot-label">
                                <?php echo esc_html( $second_snapshot_label_second_tab ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- CHECK TEXTS COLUMN (TWO CHECK TEXTS) -->
            <div class="sector-check-block">
                <?php if ( $first_check_text_second_tab ) : ?>
                    <div class="sector-check-item">
                        <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                        <div class="sector-check-text">
                            <?php echo esc_html( $first_check_text_second_tab ); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( $second_check_text_second_tab ) : ?>
                    <div class="sector-check-item">
                        <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                        <div class="sector-check-text">
                            <?php echo esc_html( $second_check_text_second_tab ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- LOGOS COLUMN (TWO LOGOS) -->
            <div class="sector-logos">
                <?php if ( $logo_title_second_tab ) : ?>
                    <div class="sector-subtitle">
                        <?php echo esc_html( $logo_title_second_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="sector-logo-row">
                    <?php foreach ( [ $logo2_1, $logo2_2 ] as $logo ) : ?>
                        <?php if ( $logo ) : ?>
                            <div class="sector-logo-item">
                                <img src="<?php echo esc_url( ik_upload_url( $logo ) ); ?>" alt="">
                            </div>
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
    if (!wrapper) return;

    const buttons = wrapper.querySelectorAll('.sector-tab-trigger');
    const panels  = wrapper.querySelectorAll('.sector-tab-panel');

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const tab = this.getAttribute('data-tab');

            buttons.forEach(b => b.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            const panel = wrapper.querySelector('.sector-tab-panel[data-tab="' + tab + '"]');
            if (panel) panel.classList.add('active');
        });
    });
})();
</script>

<?php
    return ob_get_clean();
}
add_shortcode('sector_tabs_tourism_hospitality', 'shortcode_sector_tabs_tourism_hospitality');

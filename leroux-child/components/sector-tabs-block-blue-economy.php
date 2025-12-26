<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_tabs_blue_economy]
|--------------------------------------------------------------------------
*/

function shortcode_sector_tabs_blue_economy() {

    // ACF FIELDS (URLs + Text)
    $first_icon   = get_field('first_icon');
    $first_text   = get_field('first_text');

    $second_icon  = get_field('second_icon');
    $second_text  = get_field('second_text');

    $third_icon   = get_field('third_icon');
    $third_text   = get_field('third_text');

    ob_start();
?>

<!-- ===========================
     BLUE ECONOMY — SECTOR TABS
=========================== -->
<div class="be-safe-area">
    <div class="be-tabs-row">

        <!-- ITEM 1 -->
        <div class="be-item">
            <img class="be-icon" src="<?php echo esc_url( ik_upload_url($first_icon) ); ?>" alt="">
            <div class="be-label"><?php echo esc_html($first_text); ?></div>
        </div>

        <div class="be-divider"></div>

        <!-- ITEM 2 -->
        <div class="be-item">
            <img class="be-icon" src="<?php echo esc_url( ik_upload_url($second_icon) ); ?>" alt="">
            <div class="be-label"><?php echo esc_html($second_text); ?></div>
        </div>

        <div class="be-divider"></div>

        <!-- ITEM 3 -->
        <div class="be-item">
            <img class="be-icon" src="<?php echo esc_url( ik_upload_url($third_icon) ); ?>" alt="">
            <div class="be-label"><?php echo esc_html($third_text); ?></div>
        </div>

    </div>
</div>

<style>
/* ============================================================
   SAFE AREA
============================================================ */
.be-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    box-sizing: border-box;
}

/* ============================================================
   MAIN ROW
============================================================ */
.be-tabs-row {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 40px;
    padding: 20px 0;
}

/* ============================================================
   EACH ITEM
============================================================ */
.be-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;   /* LEFT align */
    text-align: left;          /* LEFT text */
    gap: 12px;
}


.be-icon {
    width: 36px;
    height: auto;
    display: block;
}

/* ============================================================
   LABEL TEXT
============================================================ */
.be-label {
    font-family: 'DM Sans', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #101110;
}

/* ============================================================
   DIVIDER
============================================================ */
.be-divider {
    width: 1px;
    background: #D9D9D9;
    align-self: stretch;   /* 🔥 this makes it match full height of the column */
}


/* ============================================================
   RESPONSIVE
============================================================ */

@media (max-width: 1024px) {
    .be-safe-area {
        padding: 0 20px;
    }
}

@media (max-width: 767px) {
    .be-tabs-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 25px;
    }

    .be-divider {
        display: none;
    }

    .be-item {
        gap: 12px;
    }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_tabs_blue_economy', 'shortcode_sector_tabs_blue_economy');

<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_construction_building]
| Adjusted: removed quote + added 5th snapshot
|--------------------------------------------------------------------------
*/

function shortcode_construction_building_overview() {

    // ACF FIELDS
    $desc        = get_field('sector_description');
    $eyebrow     = get_field('sector_eyebrow_title');

    $s1_num      = get_field('snapshot_1_number');
    $s2_num      = get_field('snapshot_2_number');
    $s3_num      = get_field('snapshot_3_number');
    $s4_num      = get_field('snapshot_4_number');
    $s5_num      = get_field('snapshot_5_number');

    $s1_label    = get_field('snapshot_1_label');
    $s2_label    = get_field('snapshot_2_label');
    $s3_label    = get_field('snapshot_3_label');

    $s4_label_1  = get_field('snapshot_4_label_1');
    $s4_label_2  = get_field('snapshot_4_label_2');

    $s5_label    = get_field('snapshot_5_label');

    // CONTACT CARD
    $contact_title    = get_field('contact_title');
    $person_name      = get_field('contact_person_name');
    $person_email     = get_field('contact_email_address');
    $button_text      = get_field('button_text');

    ob_start();
?>

<!-- ===========================
     SECTOR OVERVIEW BLOCK V2 (UPDATED)
=========================== -->
<div class="ike2-safe-area">
    <div class="ike2-two-columns">

        <!-- LEFT COLUMN -->
        <div class="ike2-left">

            <p class="ike2-desc">
                <?php echo esc_html($desc); ?>
            </p>

            <div class="ike2-eyebrow">
                <?php echo esc_html($eyebrow); ?>
            </div>

            <!-- SNAPSHOTS -->
            <div class="ike2-snapshot-row">

                <!-- SNAPSHOT 1 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number"><?php echo esc_html($s1_num); ?>%</div>
                    <div class="ike2-snap-label"><?php echo esc_html($s1_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 2 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number"><?php echo esc_html($s2_num); ?>%</div>
                    <div class="ike2-snap-label"><?php echo esc_html($s2_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 3 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number"><?php echo esc_html($s3_num); ?></div>
                    <div class="ike2-snap-label"><?php echo esc_html($s3_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 4 (label above, label below, currency small) -->
                <div class="ike2-snap ike2-snap-last">
                    <div class="ike2-snap-number">
                        $<?php echo esc_html($s4_num); ?>
                    </div>
                    <div class="ike2-snap-label"><?php echo esc_html($s4_label_2); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 5 (new) -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number">$<?php echo esc_html($s5_num); ?></div>
                    <div class="ike2-snap-label"><?php echo esc_html($s5_label); ?></div>
                </div>

            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="ike2-right">

            <div class="ike2-contact-card">

                <div class="ike2-contact-title">
                    <?php echo esc_html($contact_title); ?>
                </div>

                <div class="ike2-contact-person">
                    <img class="ike2-icon-person" src="<?php echo esc_url( ik_upload_url('2025/12/user-circle.svg') ); ?>">
                    <span><?php echo esc_html($person_name); ?></span>
                </div>

                <a href="mailto:<?php echo esc_attr($person_email); ?>" class="ike2-red-button">
                    <img class="ike2-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>

            </div>
        </div>

    </div>
</div>

<style>
/* SAFE AREA */
.ike2-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    box-sizing: border-box;
}

/* MAIN LAYOUT */
.ike2-two-columns {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

/* LEFT COLUMN */
.ike2-left {
    width: 980px;
    max-width: 980px;
}

/* RIGHT COLUMN */
.ike2-right {
    width: 380px;
    flex-shrink: 0;
}

/* DESCRIPTION */
.ike2-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 30px;
    color: #101110;
    margin-bottom: 25px;
}

/* EYEBROW */
.ike2-eyebrow {
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    font-weight: 800;
    color: #DB2129;
    margin-top: 24px;
    margin-bottom: 30px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
}

/* SNAPSHOT ROW */
.ike2-snapshot-row {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    gap: 40px;
}

/* SNAPSHOTS */
.ike2-snap-number {
    font-family: 'DM Sans', sans-serif;
    font-size: 42px;
    font-weight: 700;
    color: #101110;
}

.ike2-snap-label {
    font-family: 'DM Sans', sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: #101110;
    margin-top: 8px;
}

/* SNAPSHOT 4 ONLY — small currency */
.ike2-currency {
    font-size: 24px;
    font-weight: 500;
    vertical-align: top;
    margin-right: 4px;
}

.ike2-snap-label-top {
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #565A56;
    margin-bottom: 6px;
}

/* DIVIDER */
.ike2-snap-divider {
    width: 1px;
    background: #A6A6A6;
    align-self: stretch;
}

/* CONTACT CARD */
.ike2-contact-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.ike2-contact-title {
    font-family: 'DM Sans', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 20px;
}

.ike2-contact-person {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #292A29;
    margin-bottom: 25px;
}

.ike2-icon-person {
    width: 22px;
}

/* BUTTON */
.ike2-red-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #DB2129;
    color: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: 17px;
    height: 50px;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.25s ease;
}

.ike2-red-button:hover {
    background: #292A29;
    color: white;
}

.ike2-mail-icon {
    width: 20px;
}

/* RESPONSIVE */
@media (max-width:1390px){
    .ike2-two-columns {
        flex-direction: column;
        gap: 40px;
    }
    .ike2-left {
        width: 100%;
    }
    .ike2-right {
        width: 100%;
    }
}
	
@media (max-width:1390px) and (min-width:951px){

    /* stack button under person */
    .ike2-contact-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* keep person icon + name on one row */
    .ike2-contact-person {
        margin-bottom: 16px;
    }

    /* button below, natural width, left aligned */
    .ike2-red-button {
        width: auto;
        justify-content: flex-start;
        padding: 0 24px;
    }
}

@media (max-width:950px){
    .ike2-desc { font-size: 20px; }

    .ike2-snapshot-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 28px;
    }

    .ike2-snap-divider { display: none; }

}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_construction_building', 'shortcode_construction_building_overview');

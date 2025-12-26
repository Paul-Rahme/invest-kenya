<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_tourism_hospitality]
|--------------------------------------------------------------------------
*/

function shortcode_tourism_hospitality_overview() {

    // ACF FIELDS
    $desc        = get_field('sector_description');
    $eyebrow     = get_field('sector_eyebrow_title');

    $s1_num      = get_field('snapshot_1_number');
    $s1_label    = get_field('snapshot_1_label');

    $s2_num      = get_field('snapshot_2_number');
    $s2_label    = get_field('snapshot_2_label');

    $s3_num      = get_field('snapshot_3_number');
    $s3_label    = get_field('snapshot_3_label');

    // SNAPSHOT 4 — TWO NUMBERS + TWO LABELS
    $s4_first_num   = get_field('snapshot_4_first_number');
    $s4_first_label = get_field('snapshot_4_first_label');
    $s4_second_num  = get_field('snapshot_4_second_number');
    $s4_second_label= get_field('snapshot_4_second_label');

    $s5_num      = get_field('snapshot_5_number');
    $s5_label    = get_field('snapshot_5_label');

    // CONTACT CARD
    $contact_title    = get_field('contact_title');
    $person_name      = get_field('contact_person_name');
    $person_email     = get_field('contact_email_address');
    $button_text      = get_field('button_text');

    ob_start();
?>

<!-- ===========================
     TOURISM & HOSPITALITY OVERVIEW BLOCK
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

            <!-- SNAPSHOTS ROW -->
            <div class="ike2-snapshot-row">

                <!-- SNAPSHOT 1 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number">
                        <?php echo esc_html($s1_num); ?>%
                    </div>
                    <div class="ike2-snap-label"><?php echo esc_html($s1_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 2 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number">
                        <?php echo esc_html($s2_num); ?>
                    </div>
                    <div class="ike2-snap-label"><?php echo esc_html($s2_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 3 -->
                <div class="ike2-snap">
                    <div class="ike2-snap-number">
                        $<?php echo esc_html($s3_num); ?>
                    </div>
                    <div class="ike2-snap-label"><?php echo esc_html($s3_label); ?></div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 4 — TWO NUMBERS + TWO LABELS -->
                <div class="ike2-snap ike2-snap-double">
                    <div class="ike2-snap-number ike2-snap-4-number">
                        <?php echo esc_html($s4_first_num); ?>%
                    </div>
                    <div class="ike2-snap-label">
                        <?php echo esc_html($s4_first_label); ?>
                    </div>

                    <div class="ike2-snap-number ike2-snap-4-number ike2-snap-4-second">
                        <?php echo esc_html($s4_second_num); ?>%
                    </div>
                    <div class="ike2-snap-label">
                        <?php echo esc_html($s4_second_label); ?>
                    </div>
                </div>

                <div class="ike2-snap-divider"></div>

                <!-- SNAPSHOT 5 -->
                <div class="ike2-snap ike2-snap-last">
                    <div class="ike2-snap-number">
                        <?php echo esc_html($s5_num); ?>
                    </div>
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
                    <img class="ike2-icon-person" src="<?php echo esc_url( ik_upload_url('2025/12/user-circle.svg') ); ?>" alt="">
                    <span><?php echo esc_html($person_name); ?></span>
                </div>

                <a href="mailto:<?php echo esc_attr($person_email); ?>" class="ike2-red-button">
                    <img class="ike2-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>" alt="">
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

/* GENERIC NUMBER SNAPSHOT */
.ike2-snap-number {
    font-family: 'DM Sans', sans-serif;
    font-size: 42px;
    font-weight: 700;
    color: #101110;
}

/* SNAPSHOT LABEL */
.ike2-snap-label {
    font-family: 'DM Sans', sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: #101110;
    margin-top: 8px;
}

/* DOUBLE SNAPSHOT (STACKED) */
.ike2-snap-double {
    display: flex;
    flex-direction: column;
    align-items: flex-start !important;
    justify-content: flex-start !important;
}

/* DOUBLE SNAPSHOT — CUSTOM TYPO */
.ike2-snap-4-number {
    font-size: 32px !important;
    font-weight: 600 !important;
    color: #101110 !important;
    margin-bottom: 4px;
}

/* SPACE ADDED BEFORE SECOND NUMBER */
.ike2-snap-4-second {
    margin-top: 14px !important;
}

/* DIVIDER */
.ike2-snap-divider {
    align-self: stretch;
    width: 1.5px;
    background: #A6A6A6;
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
    margin-bottom: 0; /* UPDATED */
    transition: 0.25s ease;
}

.ike2-mail-icon {
    width: 20px;
}

.ike2-red-button:hover {
    background: #292A29;
    color: white;
}

/* RESPONSIVE */
@media (max-width:1405px){
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
	
@media (max-width:1405px) and (min-width:768px) {

    /* Contact card layout adjustments */
    .ike2-contact-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Keep icon + name on one row */
    .ike2-contact-person {
        margin-bottom: 16px;
    }

    /* Button below, natural width, left aligned */
    .ike2-red-button {
        align-self: flex-start;
        width: auto;
        justify-content: flex-start;
        padding: 0 22px;
    }
}

@media (max-width: 931px) and (min-width: 768px) {
    .ike2-snapshot-row {
        flex-wrap: wrap;
        row-gap: 20px;
        column-gap: 40px;
    }
}

@media (max-width:767px){
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

add_shortcode('sector_overview_tourism_hospitality', 'shortcode_tourism_hospitality_overview');

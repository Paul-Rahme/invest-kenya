<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_blue_economy]
|--------------------------------------------------------------------------
*/

function shortcode_blue_economy_overview() {

    // ACF FIELDS
    $desc        = get_field('sector_description');
    $eyebrow     = get_field('sector_eyebrow_title');

    $s1_num      = get_field('snapshot_1_number');
    $s1_label    = get_field('snapshot_1_label');

    $s2_num      = get_field('snapshot_2_number');
    $s2_label    = get_field('snapshot_2_label');

    $s3_num      = get_field('snapshot_3_number');
    $s3_label    = get_field('snapshot_3_label');

    // NEW SNAPSHOT 4
    $s4_num      = get_field('snapshot_4_number');
    $s4_label    = get_field('snapshot_4_label');

    $contact_title    = get_field('contact_title');
    $person_name      = get_field('contact_person_name');
    $person_email     = get_field('contact_email_address');
    $button_text      = get_field('button_text');

    ob_start();
?>

<!-- ===========================
     SECTOR OVERVIEW BLOCK — BLUE ECONOMY
=========================== -->
<div class="ike-safe-area">
    <div class="ike-two-columns">

        <!-- LEFT COLUMN -->
        <div class="ike-left">

            <p class="ike-desc">
                <?php echo esc_html($desc); ?>
            </p>

            <div class="ike-eyebrow">
                <?php echo esc_html($eyebrow); ?>
            </div>

            <div class="ike-snapshot-row">

                <!-- SNAPSHOT 1: ALWAYS $ -->
                <div class="ike-snap">
                    <div class="ike-snap-number">
                        <?php echo esc_html($s1_num); ?><span>%</span>
                    </div>
                    <div class="ike-snap-label">
                        <?php echo esc_html($s1_label); ?>
                    </div>
                </div>

                <div class="ike-snap-divider"></div>

                <!-- SNAPSHOT 2: ALWAYS % -->
                <div class="ike-snap">
                    <div class="ike-snap-number">
                        <?php echo esc_html($s2_num); ?>%
                    </div>
                    <div class="ike-snap-label">
                        <?php echo esc_html($s2_label); ?>
                    </div>
                </div>

                <div class="ike-snap-divider"></div>

                <!-- SNAPSHOT 3 -->
                <div class="ike-snap">
                    <div class="ike-snap-number">
                        <span>$</span><?php echo esc_html($s3_num); ?>
                    </div>
                    <div class="ike-snap-label">
                        <?php echo esc_html($s3_label); ?>
                    </div>
                </div>

                <div class="ike-snap-divider"></div>

                <!-- SNAPSHOT 4 — SAME AS SNAPSHOT 1 ($ prefix) -->
                <div class="ike-snap">
                    <div class="ike-snap-number">
                        <span>$</span><?php echo esc_html($s4_num); ?>
                    </div>
                    <div class="ike-snap-label">
                        <?php echo esc_html($s4_label); ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="ike-right">
            <div class="ike-contact-card">

                <div class="ike-contact-title">
                    <?php echo esc_html($contact_title); ?>
                </div>

                <div class="ike-contact-person">
                    <img class="ike-icon-person" src="<?php echo esc_url( ik_upload_url('2025/12/user-circle.svg') ); ?>">
                    <span><?php echo esc_html($person_name); ?></span>
                </div>

                <a href="mailto:<?php echo esc_attr($person_email); ?>" class="ike-red-button">
                    <img class="ike-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>

                <!-- QUOTE REMOVED -->

            </div>
        </div>

    </div>
</div>

<style>
/* SAFE AREA */
.ike-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    box-sizing: border-box;
}

/* MAIN LAYOUT */
.ike-two-columns {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

/* LEFT COLUMN */
.ike-left {
    width: 980px;
    max-width: 980px;
}

/* RIGHT COLUMN */
.ike-right {
    width: 380px;
    flex-shrink: 0;
}

/* DESCRIPTION TEXT */
.ike-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 30px;
    color: #101110;
    margin-bottom: 25px;
}

/* EYEBROW */
.ike-eyebrow {
    font-family: 'DM Sans';
    font-size: 12px;
    font-weight: 800;
    color: #DB2129;
    margin-top: 24px;
    margin-bottom: 30px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
}

/* SNAPSHOT ROW */
.ike-snapshot-row {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 40px;
}

.ike-snap-number {
    font-family: 'DM Sans';
    font-size: 42px;
    font-weight: 700;
    color: #101110;
}

.ike-snap-label {
    font-family: 'DM Sans';
    font-size: 16px;
    font-weight: 400;
    color: #101110;
    margin-top: 8px;
}

.ike-snap-divider {
    align-self: stretch;
    width: 1px;
    background: #A6A6A6;
}

/* CONTACT CARD */
.ike-contact-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.ike-contact-title {
    font-family: 'DM Sans';
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 20px;
}

.ike-contact-person {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'DM Sans';
    font-size: 16px;
    font-weight: 600;
    color: #292A29;
    margin-bottom: 25px;
}

.ike-icon-person { width: 22px; }

/* BUTTON */
.ike-red-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #DB2129;
    color: #fff;
    font-family: 'DM Sans';
    font-size: 17px;
    height: 50px;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.25s ease;
    margin-bottom: 0 !important; /* REMOVED SPACING */
}

.ike-red-button:hover {
    background: #292A29;
    color: white;
}

.ike-mail-icon { width: 20px; }

/* RESPONSIVE */
@media (max-width:1240px){
    .ike-two-columns {
        flex-direction: column;
        gap: 40px;
    }
    .ike-left {
        width: 100%;
    }
    .ike-right {
        width: 100%;
    }
}
	
@media (max-width:1240px) and (min-width:768px){

    /* Contact card layout */
    .ike-contact-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Person row stays horizontal */
    .ike-contact-person {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
    }

    /* Button below, natural width, left-aligned */
    .ike-red-button {
        align-self: flex-start;
        justify-content: flex-start;
        padding: 0 24px;
        width: auto;
    }
}

@media (max-width:767px){
    .ike-desc { font-size: 20px; }

    .ike-snapshot-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 28px;
    }

    .ike-snap-divider { display: none; }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_blue_economy', 'shortcode_blue_economy_overview');

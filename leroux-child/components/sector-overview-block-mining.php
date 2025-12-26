<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_mining]
|--------------------------------------------------------------------------
*/

function shortcode_mining_overview() {

    // ACF FIELDS
    $desc          = get_field('sector_description');
    $eyebrow       = get_field('sector_eyebrow_title');

    $s1_num        = get_field('snapshot_1_number');
    $s1_label      = get_field('snapshot_1_label');

    $contact_title = get_field('contact_title');
    $person_name   = get_field('contact_person_name');
    $person_email  = get_field('contact_email_address');
    $button_text   = get_field('button_text');

    ob_start();
?>

<!-- ===========================
     SECTOR OVERVIEW — MINING (UPDATED ORDER)
=========================== -->
<div class="mining-safe-area">
    <div class="mining-two-columns">

        <!-- LEFT COLUMN -->
        <div class="mining-left">

            <!-- DESCRIPTION FIRST -->
            <p class="mining-desc">
                <?php echo esc_html($desc); ?>
            </p>

            <!-- EYEBROW TITLE SECOND -->
            <?php if ($eyebrow): ?>
            <div class="mining-eyebrow">
                <?php echo esc_html($eyebrow); ?>
            </div>
            <?php endif; ?>

            <!-- SNAPSHOT THIRD -->
            <div class="mining-snapshot-row">

                <div class="mining-snap">
                    <div class="mining-snap-number">
                        $<?php echo esc_html($s1_num); ?>
                    </div>
                    <div class="mining-snap-label">
                        <?php echo esc_html($s1_label); ?>
                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="mining-right">
            <div class="mining-contact-card">

                <div class="mining-contact-title">
                    <?php echo esc_html($contact_title); ?>
                </div>

                <div class="mining-contact-person">
                    <img class="mining-icon-person" src="<?php echo esc_url( ik_upload_url('2025/12/user-circle.svg') ); ?>">
                    <span><?php echo esc_html($person_name); ?></span>
                </div>

                <a href="mailto:<?php echo esc_attr($person_email); ?>" class="mining-red-button">
                    <img class="mining-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>

            </div>
        </div>

    </div>
</div>

<style>
/* ============================================
   SAFE AREA
============================================ */
.mining-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    box-sizing: border-box;
}

/* ============================================
   TWO COLUMN LAYOUT
============================================ */
.mining-two-columns {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

/* LEFT COLUMN */
.mining-left {
    width: 980px;
    max-width: 980px;
}

/* RIGHT COLUMN */
.mining-right {
    width: 380px;
    flex-shrink: 0;
}

/* DESCRIPTION */
.mining-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 30px;
    color: #101110;
    margin-bottom: 25px;
}

/* ============================================
   EYEBROW TITLE (same as ICT-BPO)
============================================ */
.mining-eyebrow {
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    font-weight: 800;
    color: #DB2129;
    margin-bottom: 25px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
	margin-top: 24px;
}

/* ============================================
   SNAPSHOT (same styling as ICT-BPO)
============================================ */
.mining-snapshot-row {
    display: flex;
    align-items: flex-start;
    gap: 40px;
    margin-bottom: 30px;
}

.mining-snap-number {
    font-family: 'DM Sans', sans-serif;
    font-size: 42px;
    font-weight: 700;
    color: #101110;
}

.mining-snap-label {
    font-family: 'DM Sans', sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: #101110;
    margin-top: 8px;
}

/* ============================================
   CONTACT CARD
============================================ */
.mining-contact-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.mining-contact-title {
    font-family: 'DM Sans';
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 20px;
}

.mining-contact-person {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'DM Sans';
    font-size: 16px;
    font-weight: 600;
    color: #292A29;
    margin-bottom: 25px;
}

.mining-icon-person { width: 22px; }

/* NO MARGIN-BOTTOM AS REQUESTED */
.mining-red-button {
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
    margin-bottom: 0;
    transition: 0.25s ease;
}

.mining-red-button:hover {
    background: #292A29;
    color: white;
}

.mining-mail-icon { width: 20px; }

/* ============================================
   RESPONSIVE
============================================ */
@media (max-width:1260px){
    .mining-two-columns {
        flex-direction: column;
        gap: 40px;
    }
    .mining-left {
        width: 100%;
    }
    .mining-right {
        width: 100%;
    }
}
	
/* ===============================
   ADD (tablet-only right white column)
================================ */

@media (max-width:1260px) and (min-width:768px) {

    .mining-contact-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .mining-contact-person {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .mining-red-button {
        margin-top: 16px;
        width: auto;
        align-self: flex-start;
        display: inline-flex;
		padding: 0 22px;
    }
}


@media (max-width:767px){
    .mining-desc { font-size: 20px; }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_mining', 'shortcode_mining_overview');

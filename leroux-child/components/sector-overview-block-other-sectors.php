<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_other_sectors]
|--------------------------------------------------------------------------
*/

function shortcode_sector_overview_other_sectors() {

    // ACF FIELDS
    $desc          = get_field('sector_description');
    $contact_title = get_field('contact_title');
    $contact_email = get_field('contact_email');
    $button_text   = get_field('button_text');

    ob_start();
?>

<div class="ppp-safe-area">
    <div class="ppp-two-columns">

        <!-- LEFT COLUMN -->
        <div class="ppp-left">
            <p class="ppp-desc">
                <?php echo esc_html($desc); ?>
            </p>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="ppp-right">
            <div class="ppp-contact-card">

                <div class="ppp-contact-title">
                    <?php echo esc_html($contact_title); ?>
                </div>

                <!-- BUTTON (EMAIL) -->
                <?php if ($contact_email): ?>
                <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="ppp-red-button">
                    <img class="ppp-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>" alt="Email">
                    <?php echo esc_html($button_text); ?>
                </a>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<style>
/* SAFE AREA */
.ppp-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 !important;
    box-sizing: border-box;
}

/* MAIN LAYOUT */
.ppp-two-columns {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

/* LEFT COLUMN */
.ppp-left {
    width: 980px;
    max-width: 980px;
}

/* RIGHT COLUMN */
.ppp-right {
    width: 380px;
    flex-shrink: 0;
}

/* DESCRIPTION */
.ppp-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 30px;
    color: #101110;
    margin-bottom: 0;
}

/* CONTACT CARD */
.ppp-contact-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.ppp-contact-title {
    font-family: 'DM Sans', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 25px;
}

/* BUTTON */
.ppp-red-button {
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

.ppp-mail-icon {
    width: 20px;
}

.ppp-red-button:hover {
    background: #292A29;
    color: white;
}

/* RESPONSIVE */
@media (max-width:1405px){
    .ppp-two-columns {
        flex-direction: column;
        gap: 40px;
    }
    .ppp-left,
    .ppp-right {
        width: 100%;
    }

    .ppp-red-button {
        max-width: 250px;
    }
}

@media (max-width:767px){
    .ppp-desc { font-size: 20px; }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_other_sectors', 'shortcode_sector_overview_other_sectors');

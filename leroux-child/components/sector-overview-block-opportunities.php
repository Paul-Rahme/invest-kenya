<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [sector_overview_opportunities]
|--------------------------------------------------------------------------
*/

function shortcode_opportunities_overview() {

    // ACF FIELDS
    $desc           = get_field('sector_description');
    $contact_title  = get_field('contact_title');
    $contact_email  = get_field('contact_email_address');
    $button_text    = get_field('button_text');

    ob_start();
?>

<!-- ===========================
     SECTOR OVERVIEW — OPPORTUNITIES
=========================== -->
<div class="iko-safe-area">
    <div class="iko-two-columns">

        <!-- LEFT COLUMN (DESCRIPTION ONLY) -->
        <div class="iko-left">
            <p class="iko-desc">
                <?php echo esc_html($desc); ?>
            </p>
        </div>

        <!-- RIGHT COLUMN (CARD WITH TITLE + BUTTON ONLY) -->
        <div class="iko-right">
            <div class="iko-contact-card">

                <?php if ($contact_title): ?>
                    <div class="iko-contact-title">
                        <?php echo esc_html($contact_title); ?>
                    </div>
                <?php endif; ?>

                <?php if ($button_text): ?>
                    <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="iko-red-button">
                        <img class="iko-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/Path.svg') ); ?>">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<style>
/* ===========================
   SAFE AREA
=========================== */
.iko-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    width: 100%;
    padding: 0 30px; /* desktop gutters */
    box-sizing: border-box;
}


/* ===========================
   TWO COLUMNS
=========================== */
.iko-two-columns {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

.iko-left {
    width: 980px;
    max-width: 980px;
}

.iko-right {
    width: 380px;
    flex-shrink: 0;
}

/* ===========================
   DESCRIPTION TEXT
=========================== */
.iko-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 30px;
    color: #101110;
    margin-bottom: 25px;
}

/* ===========================
   RIGHT COLUMN CARD
=========================== */
.iko-contact-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.iko-contact-title {
    font-family: 'DM Sans';
    font-size: 18px;
    font-weight: 600;
    color: #101110;
    margin-bottom: 20px;
}

/* ===========================
   BUTTON
=========================== */
.iko-red-button {
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
    margin-bottom: 5px;
    transition: 0.25s ease;
}

.iko-red-button:hover {
    background: #292A29;
    color: white;
}

.iko-mail-icon {
    width: 20px;
}

/* ===========================
   RESPONSIVE
=========================== */
@media (max-width:1260px){
    .iko-two-columns {
        flex-direction: column;
        gap: 40px;
        align-items: flex-start;
    }

    .iko-left {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .iko-right {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .iko-contact-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .iko-contact-title {
        margin-bottom: 0;
        white-space: nowrap;
    }

    .iko-red-button {
        margin-bottom: 0;
        flex-shrink: 0;
        padding: 0 24px;
    }
}





@media (max-width:767px){
    .iko-safe-area{
        padding: 0 30px !important;
    }

    .iko-left,
    .iko-right{
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .iko-contact-card {
        display: block;
    }

    .iko-contact-title {
        margin-bottom: 20px;
        white-space: normal;
    }

    .iko-red-button {
        width: 100%;
        justify-content: center;
    }

    .iko-desc{
        font-size: 20px;
    }
}


</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_opportunities', 'shortcode_opportunities_overview');

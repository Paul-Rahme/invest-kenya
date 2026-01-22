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
    $desc_1         = get_field('sector_description_1');
    $desc_2         = get_field('sector_description_2');
    $link_text      = get_field('link_text');
    $link_url       = get_field('link_url');

    $contact_title  = get_field('contact_title');
    $contact_email  = get_field('contact_email_address');
    $button_text    = get_field('button_text');

    // ICONS (USING HELPER)
    $link_icon_default = ik_upload_url('2026/01/System-Icons.svg');
    $link_icon_hover   = ik_upload_url('2025/11/System-Icons-2.svg');

    ob_start();
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.iko-custom-link');

    links.forEach(link => {
        const icon = link.querySelector('.iko-link-icon');
        if (!icon) return;

        const defaultSrc = icon.getAttribute('data-default');
        const hoverSrc   = icon.getAttribute('data-hover');

        link.addEventListener('mouseenter', () => {
            icon.src = hoverSrc;
        });

        link.addEventListener('mouseleave', () => {
            icon.src = defaultSrc;
        });
    });
});
</script>

<!-- ===========================
     SECTOR OVERVIEW — OPPORTUNITIES
=========================== -->
<div class="iko-safe-area">
    <div class="iko-two-columns">

        <!-- LEFT COLUMN -->
        <div class="iko-left">

            <?php if ($desc_1): ?>
                <p class="iko-desc">
                    <?php echo esc_html($desc_1); ?>
                </p>
            <?php endif; ?>

            <?php if ($desc_2): ?>
                <p class="iko-desc">
                    <?php echo esc_html($desc_2); ?>
                </p>
            <?php endif; ?>

            <?php if ($link_text && $link_url): ?>
                <a href="<?php echo esc_url($link_url); ?>" class="iko-custom-link">
                    <?php echo esc_html($link_text); ?>
                    <img 
                        src="<?php echo esc_url($link_icon_default); ?>" 
                        class="iko-link-icon" 
                        data-hover="<?php echo esc_url($link_icon_hover); ?>"
                        data-default="<?php echo esc_url($link_icon_default); ?>"
                        alt=""
                    >
                </a>
            <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="iko-right">
            <div class="iko-contact-card">

                <?php if ($contact_title): ?>
                    <div class="iko-contact-title">
                        <?php echo esc_html($contact_title); ?>
                    </div>
                <?php endif; ?>

                <?php if ($button_text): ?>
                    <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="iko-red-button">
                        <img class="iko-mail-icon" src="<?php echo esc_url( ik_upload_url('2025/12/mail.svg') ); ?>">
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
    padding: 0 30px;
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
    margin-bottom: 28px;
}

/* ===========================
   CUSTOM LINK
=========================== */
.iko-custom-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'DM Sans';
    font-weight: 400;
    font-style: normal;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0%;
    color: #DB2129;
    text-decoration: none;
    position: relative;
    padding-bottom: 6px;
    width: fit-content;
    margin-top: 6px;
    transition: 0.25s ease;
}

.iko-custom-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background-color: #DB2129;
    transition: 0.25s ease;
}

.iko-link-icon {
    width: 20px;
    height: 20px;
    opacity: 1;
    transition: 0.25s ease;
    position: relative;
    top: 1px;
}

/* Hover */
.iko-custom-link:hover {
    color: #000000;
}

.iko-custom-link:hover::after {
    background-color: #000000;
}

.iko-custom-link:hover .iko-link-icon {
    content: attr(data-hover);
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

    .iko-left,
    .iko-right {
        width: 100%;
        max-width: 100%;
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

    .iko-custom-link{
        font-size: 20px;
    }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('sector_overview_opportunities', 'shortcode_opportunities_overview');

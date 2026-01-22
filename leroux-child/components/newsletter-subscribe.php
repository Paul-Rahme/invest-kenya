<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Component: Newsletter Subscribe
| File: newsletter-subscribe.php
|--------------------------------------------------------------------------
| - ACF driven title + text
| - // split support
| - Inline styles (self-contained)
| - MC4WP filter override (correct + working)
| - Placeholder inside input
| - White text + white messages
| - Zero padding (Elementor controls spacing)
|--------------------------------------------------------------------------
*/

function ik_newsletter_subscribe_block() {

    // ACF FIELDS
    $title_raw = get_field('title_newsletter');
    $text      = get_field('text_newsletter');

    // SPLIT TITLE BY //
    $title_part_1 = '';
    $title_part_2 = '';

    if ($title_raw) {
        $parts = explode('//', $title_raw);
        $title_part_1 = trim($parts[0]);
        $title_part_2 = isset($parts[1]) ? trim($parts[1]) : '';
    }

    ob_start();
    ?>

    <style>
        /* ===============================
           NEWSLETTER SUBSCRIBE – FINAL
        =============================== */

        .ik-newsletter-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 80px;
            width: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* ---------- LEFT ---------- */

        .ik-newsletter-left {
            flex: 1;
            padding: 0;
            margin: 0;
        }

        .ik-newsletter-title {
            margin: 0 0 8px 0;
            line-height: 52px;
        }

        .ik-title-white {
            font-family: "PT Serif", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 38px;
            color: #ffffff;
            letter-spacing: -1px;
            margin-right: 6px;
        }

        .ik-title-grey {
            font-family: "DM Sans", sans-serif;
            font-weight: 600;
            font-style: italic;
            font-size: 38px;
            color: #BDBDBD;
            letter-spacing: -1px;
        }

        .ik-newsletter-text {
            margin: 0;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            font-weight: 200;
            font-size: 20px;
            color: #F0F0F0;
            line-height: 52px;
        }

        /* ---------- RIGHT / FORM ---------- */

        .ik-newsletter-form-row {
            display: flex;
            align-items: center;
            gap: 24px;
            min-width: 480px;
            padding: 0;
            margin: 0;
        }

        .ik-newsletter-input-wrap {
            flex: 1;
            padding: 0;
            margin: 0;
        }

        /* Input */
        .ik-newsletter-input-wrap input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #6F6F6F;
            padding: 6px 0 10px 0;
            margin: 0;
            font-family: "DM Sans", sans-serif;
            font-size: 18px;
            font-weight: 400;
            color: #FFFFFF; /* typed text white */
            outline: none;
            box-shadow: none;
            border-radius: 0;
        }

        /* Placeholder */
        .ik-newsletter-input-wrap input::placeholder {
            color: #BDBDBD;
            opacity: 1;
        }

        /* Focus */
        .ik-newsletter-input-wrap input:focus {
            border-bottom-color: #FFFFFF;
            color: #FFFFFF;
        }

        /* Autofill fix */
        .ik-newsletter-input-wrap input:-webkit-autofill,
        .ik-newsletter-input-wrap input:-webkit-autofill:hover,
        .ik-newsletter-input-wrap input:-webkit-autofill:focus {
            -webkit-text-fill-color: #FFFFFF;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Button */
        .ik-newsletter-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #DB2129;
            color: #FFFFFF;
            border: none;
            padding: 14px 26px;
            margin: 0;
            border-radius: 999px;
            font-family: "DM Sans", sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.25s ease;
            white-space: nowrap;
            line-height: 1;
        }

        .ik-newsletter-btn:hover {
            background: #292A29;
        }

        .ik-newsletter-btn img {
            width: 24px;
            height: 24px;
            display: inline-block;
            opacity: 1;
        }

        /* ---------- MAILCHIMP MESSAGES ---------- */

        .mc4wp-response {
            margin-top: 12px;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            font-size: 14px;
            font-weight: 400;
            color: #FFFFFF;
        }

        .mc4wp-response p {
            margin: 0;
            padding: 0;
            color: #FFFFFF;
        }

        .mc4wp-response .mc4wp-error,
        .mc4wp-response .mc4wp-alert.mc4wp-error {
            color: #F87171;
        }

        .mc4wp-response .mc4wp-success,
        .mc4wp-response .mc4wp-alert.mc4wp-notice {
            color: #FFFFFF;
        }

        /* ---------- RESPONSIVE ---------- */

        @media (max-width: 1189px) {
            .ik-newsletter-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .ik-newsletter-form-row {
                width: 100%;
                min-width: unset;
            }
			
			.ik-title-white, .ik-title-grey{
				font-size: 30px; 
			}
			
			.ik-newsletter-text{
				font-size: 14px;
				line-height: 30px;
			}
        }
		
@media (max-width: 768px) {

    .ik-newsletter-title {
        line-height: 35px;
    }

    .ik-newsletter-form-row {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 16px;
        width: 100%;
        min-width: 300px; /* 🔴 IMPORTANT: fixes right cut */
    }

    .ik-newsletter-input-wrap,
    .ik-newsletter-input-wrap input {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .ik-newsletter-btn {
        width: auto; /* change to 100% if you want full width button */
    }

}

    </style>

    <div class="ik-newsletter-wrapper">

        <!-- LEFT -->
        <div class="ik-newsletter-left">

            <?php if ($title_part_1 || $title_part_2): ?>
                <h3 class="ik-newsletter-title">
                    <?php if ($title_part_1): ?>
                        <span class="ik-title-white"><?php echo esc_html($title_part_1); ?></span>
                    <?php endif; ?>

                    <?php if ($title_part_2): ?>
                        <span class="ik-title-grey"><?php echo esc_html($title_part_2); ?></span>
                    <?php endif; ?>
                </h3>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="ik-newsletter-text"><?php echo esc_html($text); ?></p>
            <?php endif; ?>

        </div>

        <!-- RIGHT -->
        <div class="ik-newsletter-right">
            <?php echo do_shortcode('[mc4wp_form id="19035"]'); ?>
        </div>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('ik_newsletter_subscribe', 'ik_newsletter_subscribe_block');


/* =========================================================
   MC4WP FORM OVERRIDE – DO NOT TOUCH
========================================================= */

add_filter('mc4wp_form_content', 'ik_override_newsletter_form', 10, 3);
function ik_override_newsletter_form($content, $form, $instance) {

    // Only target your form
    if ($form->ID != 19035) {
        return $content;
    }

    ob_start();
    ?>

    <div class="ik-newsletter-form-row">

        <div class="ik-newsletter-input-wrap">
            <input type="email" name="EMAIL" placeholder="Email address" required />
        </div>

        <button type="submit" class="ik-newsletter-btn">
            Subscribe
            <img src="<?php echo ik_upload_url('2026/01/System-Icons-2.svg'); ?>" alt="">
        </button>

    </div>

    <?php
    return ob_get_clean();
}

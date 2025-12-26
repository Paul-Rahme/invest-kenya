<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [eligible_investments_block]
|--------------------------------------------------------------------------
| Clean component — no padding, no background.
| Parent Elementor container handles spacing & colors.
|--------------------------------------------------------------------------
*/

function shortcode_eligible_investments_block() {

    /* ----------------------------------------
       ACF FIELDS
    ---------------------------------------- */

    // Title split using //
    $raw_title = get_field('title_second_section');
    $title_part_1 = '';
    $title_part_2 = '';
    if ($raw_title && strpos($raw_title, '//') !== false) {
        list($title_part_1, $title_part_2) = explode('//', $raw_title);
    } else {
        $title_part_1 = $raw_title;
    }

    $first_text = get_field('first_text_second_section');

    // COLUMN RED TITLES
    $left_red_title  = get_field('left_column_red_title');
    $right_red_title = get_field('right_column_red_title');

    // LEFT COLUMN CONTENT
    $lt1     = get_field('first_title_left_column');
    $lt1_txt = get_field('first_text_left_column');

    $lt2_txt = get_field('second_text_left_column');
    $lt2     = get_field('second_title_left_column');

    $lsub1   = get_field('first_subtitle_left_column');
    $lt3_txt = get_field('third_text_left_column');

    $lsub2   = get_field('second_subtitle_Second_Subtitle_Left_Columnleft_column');
    $lt4_txt = get_field('fourth_text_left_column');

    $lt3     = get_field('third_title_left_column');
    $lt5_txt = get_field('fifth_text_left_column');
    $lt6_txt = get_field('sixth_text_left_column');

    // RIGHT COLUMN CONTENT
    $rt1_txt = get_field('first_text_right_column');
    $rt1     = get_field('first_title_right_column');

    $rt2_txt = get_field('second_text_right_column');
    $rt2     = get_field('second_title_right_column');

    $rt3_txt = get_field('third_text_right_column');
    $rt3     = get_field('third_title_right_column');

    $rt4_txt = get_field('fourth_text_right_column');
    $rt4     = get_field('fourth_title_right_column');

    $rt5_txt = get_field('fifth_text_right_column');

    ob_start();
?>

<style>
/* ----------------------------------------
   SAFE AREA
---------------------------------------- */
.eib-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    box-sizing: border-box;
}

@media (max-width: 1024px) {
    .eib-safe-area {
        padding-left: 30px !important;
        padding-right: 30px !important;
    }
}

/* ----------------------------------------
   TYPOGRAPHY
---------------------------------------- */
.eib-title-part-1 {
    font-family: "PT Serif", serif;
    font-weight: 700;
    font-style: italic;
    font-size: 36px;
    line-height: 56px;
    color: #000000;
}

.eib-title-part-2 {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 36px;
    line-height: 56px;
    color: #565A56;
}

.qodef-h2, h2 {
    margin: 18px 0;
}

.eib-main-text {
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 20px;
    line-height: 100%;
    color: #101110;
}

/* Red section titles */
.eib-red-title {
    font-family: "DM Sans", sans-serif;
    font-weight: 900;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #DB2129;
    margin-bottom: 16px;
}

/* Column titles */
.eib-col-title {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 24px;
    line-height: 100%;
    color: #101110;
    margin-bottom: 10px;
}

/* Subtitles */
.eib-subtitle {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 20px;
    line-height: 100%;
    color: #101110;
    margin-top: 20px;
    margin-bottom: 10px;
}

/* Regular text */
.eib-col-text {
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 18px;
    line-height: 26px;
    color: #101110;
}

/* ----------------------------------------
   SEPARATOR
---------------------------------------- */
.eib-separator {
    width: 100%;
    height: 1px;
    background-color: #F0F0F0;
    margin: 18px 0;
}

/* ----------------------------------------
   RED LINE
---------------------------------------- */
.eib-red-line {
    width: 70px;
    height: 6px;
    background-color: #DB2129;
}

/* ----------------------------------------
   GRID
---------------------------------------- */
.eib-two-columns {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-top: 40px;
    align-items: stretch;
}

.eib-two-columns > div {
    display: flex;
    flex-direction: column;
}

.eib-col {
    height: 100%;
}

@media (max-width: 1024px) {
    .eib-two-columns {
        grid-template-columns: 1fr;
    }
}

/* ----------------------------------------
   WHITE COLUMN BOXES
---------------------------------------- */
.eib-col {
    background: #FFFFFF;
    padding: 30px;
    border-radius: 34px;
    box-sizing: border-box;
}
</style>

<div class="eib-safe-area">

    <div class="eib-red-line"></div>

    <h2 class="eib-title">
        <span class="eib-title-part-1"><?php echo esc_html($title_part_1); ?></span>
        <span class="eib-title-part-2"> <?php echo esc_html($title_part_2); ?></span>
    </h2>

    <p class="eib-main-text"><?php echo esc_html($first_text); ?></p>

    <div class="eib-two-columns">

        <!-- LEFT COLUMN -->
        <div>
            <div class="eib-red-title"><?php echo esc_html($left_red_title); ?></div>

            <div class="eib-col">

                <div class="eib-col-title"><?php echo esc_html($lt1); ?></div>
                <div class="eib-col-text"><?php echo esc_html($lt1_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-text"><?php echo esc_html($lt2_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($lt2); ?></div>

                <div class="eib-subtitle"><?php echo esc_html($lsub1); ?></div>
                <div class="eib-col-text"><?php echo esc_html($lt3_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-subtitle"><?php echo esc_html($lsub2); ?></div>
                <div class="eib-col-text"><?php echo esc_html($lt4_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($lt3); ?></div>
                <div class="eib-col-text"><?php echo esc_html($lt5_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-text"><?php echo esc_html($lt6_txt); ?></div>

            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div>
            <div class="eib-red-title"><?php echo esc_html($right_red_title); ?></div>

            <div class="eib-col">

                <div class="eib-col-text"><?php echo esc_html($rt1_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($rt1); ?></div>
                <div class="eib-col-text"><?php echo esc_html($rt2_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($rt2); ?></div>
                <div class="eib-col-text"><?php echo esc_html($rt3_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($rt3); ?></div>
                <div class="eib-col-text"><?php echo esc_html($rt4_txt); ?></div>
                <div class="eib-separator"></div>

                <div class="eib-col-title"><?php echo esc_html($rt4); ?></div>
                <div class="eib-col-text"><?php echo esc_html($rt5_txt); ?></div>

            </div>
        </div>

    </div>

</div>

<?php
    return ob_get_clean();
}
add_shortcode('eligible_investments_block', 'shortcode_eligible_investments_block');

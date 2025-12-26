<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [second_section_laws_regulations]
| Fully self-contained row-based block — no padding, no background.
| Safe area: 1530px.
|--------------------------------------------------------------------------
*/

function shortcode_second_section_laws_regulations() {

    /* ---------------------------------------------
       ACF FIELDS
    --------------------------------------------- */

    // MAIN TITLE
    $main_title_second_section = get_field('main_title_second_section');

    // LEFT COLUMN TITLES & TEXTS
    $first_title_left_column  = get_field('first_title_left_column');
    $second_title_left_column = get_field('second_title_left_column');
    $third_title_left_column  = get_field('third_title_left_column');
    $fourth_title_left_column = get_field('fourth_title_left_column');
    $fifth_title_left_column  = get_field('fifth_title_left_column');

    $first_text_left_column  = get_field('first_text_left_column');
    $second_text_left_column = get_field('second_text_left_column');
    $third_text_left_column  = get_field('third_text_left_column');
    $fourth_text_left_column = get_field('fourth_text_left_column');
    $fifth_text_left_column  = get_field('fifth_text_left_column');

    // RIGHT COLUMN RED TITLES
    $first_red_title_right_column  = get_field('first_red_title_right_column');
    $second_red_title_right_column = get_field('second_red_title_right_column');
    $third_red_title_right_column  = get_field('third_red_title_right_column');
    $fourth_red_title_right_column = get_field('fourth_red_title_right_column');
    $fifth_red_title_right_column  = get_field('fifth_red_title_right_column');

    // RIGHT COLUMN VALUES
    $first_value_right_column  = get_field('first_value_right_column');
    $second_value_right_column = get_field('second_value_right_column');
    $third_value_right_column  = get_field('third_value_right_column');
    $fourth_value_right_column = get_field('fourth_value_right_column');
    $fifth_value_right_column  = get_field('fifth_value_right_column');
    $sixth_value_right_column  = get_field('sixth_value_right_column');

    // RIGHT COLUMN LABELS
    $first_label_right_column  = get_field('first_label_right_column');
    $second_label_right_column = get_field('second_label_right_column');
    $third_label_right_column  = get_field('third_label_right_column');

    ob_start();
?>

<div class="sslr-wrapper">
    <div class="sslr-safe-area">

        <!-- MAIN TITLE -->
        <?php if ($main_title_second_section): ?>
            <h2 class="sslr-main-title"><?php echo esc_html($main_title_second_section); ?></h2>
        <?php endif; ?>

        <!-- ALL ROWS -->
        <div class="sslr-rows">

            <!-- ROW 1 -->
            <div class="sslr-row">

                <div class="sslr-left-cell">
                    <?php if ($first_title_left_column): ?>
                        <h3 class="sslr-left-title"><?php echo esc_html($first_title_left_column); ?></h3>
                    <?php endif; ?>

                    <?php if ($first_text_left_column): ?>
                        <p class="sslr-left-text"><?php echo esc_html($first_text_left_column); ?></p>
                    <?php endif; ?>
                </div>

                <div class="sslr-right-cell">

                    <?php if ($first_red_title_right_column): ?>
                        <div class="sslr-right-red-title"><?php echo esc_html($first_red_title_right_column); ?></div>
                    <?php endif; ?>

                    <div class="sslr-right-values-row">

                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($first_value_right_column); ?></span>
                            <?php if ($first_label_right_column): ?>
                                <span class="sslr-inline-label"><?php echo esc_html($first_label_right_column); ?></span>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div><!-- /ROW 1 -->


            <!-- ROW 2 -->
            <div class="sslr-row">

                <div class="sslr-left-cell">
                    <?php if ($second_title_left_column): ?>
                        <h3 class="sslr-left-title"><?php echo esc_html($second_title_left_column); ?></h3>
                    <?php endif; ?>

                    <?php if ($second_text_left_column): ?>
                        <p class="sslr-left-text"><?php echo esc_html($second_text_left_column); ?></p>
                    <?php endif; ?>
                </div>

                <div class="sslr-right-cell">

                    <?php if ($second_red_title_right_column): ?>
                        <div class="sslr-right-red-title"><?php echo esc_html($second_red_title_right_column); ?></div>
                    <?php endif; ?>

                    <div class="sslr-right-values-row">
                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($second_value_right_column); ?></span>
                        </div>
                    </div>

                </div>

            </div><!-- /ROW 2 -->


            <!-- ROW 3 -->
            <div class="sslr-row">

                <div class="sslr-left-cell">
                    <?php if ($third_title_left_column): ?>
                        <h3 class="sslr-left-title"><?php echo esc_html($third_title_left_column); ?></h3>
                    <?php endif; ?>

                    <?php if ($third_text_left_column): ?>
                        <p class="sslr-left-text"><?php echo esc_html($third_text_left_column); ?></p>
                    <?php endif; ?>
                </div>

                <div class="sslr-right-cell">

                    <?php if ($third_red_title_right_column): ?>
                        <div class="sslr-right-red-title"><?php echo esc_html($third_red_title_right_column); ?></div>
                    <?php endif; ?>

                    <div class="sslr-right-values-row">

                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($third_value_right_column); ?></span>
                            <?php if ($second_label_right_column): ?>
                                <span class="sslr-inline-label"><?php echo esc_html($second_label_right_column); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($fourth_value_right_column); ?></span>
                            <?php if ($third_label_right_column): ?>
                                <span class="sslr-inline-label"><?php echo esc_html($third_label_right_column); ?></span>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>

            </div><!-- /ROW 3 -->


            <!-- ROW 4 -->
            <div class="sslr-row">

                <div class="sslr-left-cell">
                    <?php if ($fourth_title_left_column): ?>
                        <h3 class="sslr-left-title"><?php echo esc_html($fourth_title_left_column); ?></h3>
                    <?php endif; ?>

                    <?php if ($fourth_text_left_column): ?>
                        <p class="sslr-left-text"><?php echo esc_html($fourth_text_left_column); ?></p>
                    <?php endif; ?>
                </div>

                <div class="sslr-right-cell">

                    <?php if ($fourth_red_title_right_column): ?>
                        <div class="sslr-right-red-title"><?php echo esc_html($fourth_red_title_right_column); ?></div>
                    <?php endif; ?>

                    <div class="sslr-right-values-row">
                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($fifth_value_right_column); ?></span>
                        </div>
                    </div>

                </div>

            </div><!-- /ROW 4 -->


            <!-- ROW 5 -->
            <div class="sslr-row">

                <div class="sslr-left-cell">
                    <?php if ($fifth_title_left_column): ?>
                        <h3 class="sslr-left-title"><?php echo esc_html($fifth_title_left_column); ?></h3>
                    <?php endif; ?>

                    <?php if ($fifth_text_left_column): ?>
                        <p class="sslr-left-text"><?php echo esc_html($fifth_text_left_column); ?></p>
                    <?php endif; ?>
                </div>

                <div class="sslr-right-cell">

                    <?php if ($fifth_red_title_right_column): ?>
                        <div class="sslr-right-red-title"><?php echo esc_html($fifth_red_title_right_column); ?></div>
                    <?php endif; ?>

                    <div class="sslr-right-values-row">
                        <div class="sslr-inline-value">
                            <span class="sslr-big"><?php echo esc_html($sixth_value_right_column); ?></span>
                        </div>
                    </div>

                </div>

            </div><!-- /ROW 5 -->

        </div><!-- /sslr-rows -->

    </div>
</div>

<style>
/* GLOBAL */
.sslr-wrapper,
.sslr-wrapper * {
    box-sizing: border-box;
    font-family: "DM Sans", sans-serif !important;
}

.sslr-wrapper {
    padding: 0;
    margin: 0;
}

.sslr-safe-area {
    max-width: 1530px;
    margin: 0 auto;
}

/* MAIN TITLE */
.sslr-main-title {
    color: #101110;
    font-weight: 600;
    font-size: 32px;
    line-height: 100%;
    margin: 0 0 32px 0;
}

/* ROWS */
.sslr-rows {
    border-top: 1px solid #E0E0E0;
}

.sslr-row {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 48px;
    padding: 24px 0;
    border-bottom: 1px solid #E0E0E0;
}

/* LEFT COLUMN */
.sslr-left-title {
    margin: 0 0 6px 0;
    color: #101110;
    font-weight: 600;
    font-size: 24px;
    line-height: 100%;
}

.sslr-left-text {
    margin: 0;
    color: #101110;
    font-weight: 400;
    font-size: 18px;
    line-height: 26px;
}

/* RIGHT COLUMN */
.sslr-right-red-title {
    color: #DB2129;
    font-weight: 800;
    font-size: 12px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.sslr-right-values-row {
    display: flex;
    flex-wrap: wrap;
    gap: 32px;
}

.sslr-inline-value {
    display: flex;
    gap: 8px;
    align-items: flex-end;
    white-space: nowrap;
}

.sslr-big {
    color: #101110;
    font-weight: 600;
    font-size: 36px;
    line-height: 100%;
}

.sslr-inline-label {
    color: #101110;
    font-weight: 400;
    font-size: 20px;
    line-height: 100%;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .sslr-safe-area {
        padding-left: 30px;
        padding-right: 30px;
    }

    .sslr-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}

@media (max-width: 768px) {
    .sslr-main-title { font-size: 26px; }
    .sslr-big { font-size: 28px; }
    .sslr-inline-label { font-size: 18px; }
}
</style>

<?php
    return ob_get_clean();
}

add_shortcode('second_section_laws_regulations', 'shortcode_second_section_laws_regulations');

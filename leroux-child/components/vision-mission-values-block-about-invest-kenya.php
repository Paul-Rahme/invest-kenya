<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [vision_mission_values_block]
|--------------------------------------------------------------------------
*/

function shortcode_vision_mission_values_block() {

    // ACF FIELDS
    $main_title      = get_field('main_title');

    $first_big_text  = get_field('first_big_text');
    $second_big_text = get_field('second_big_text');

    $values_title    = get_field('values_title');

    $icon_1 = get_field('icon_1');
    $icon_2 = get_field('icon_2');
    $icon_3 = get_field('icon_3');
    $icon_4 = get_field('icon_4');

    $icon_title_1 = get_field('icon_title_1');
    $icon_title_2 = get_field('icon_title_2');
    $icon_title_3 = get_field('icon_title_3');
    $icon_title_4 = get_field('icon_title_4');

    $icon_text_1 = get_field('icon_text_1');
    $icon_text_2 = get_field('icon_text_2');
    $icon_text_3 = get_field('icon_text_3');
    $icon_text_4 = get_field('icon_text_4');


    /*
    |--------------------------------------------------------------------------
    | SAFE HELPER FUNCTION (No redeclare error)
    |--------------------------------------------------------------------------
    */
    if (!function_exists('vmv_split_double_slash')) {
        function vmv_split_double_slash($text) {
            $parts = explode('//', $text);
            if (count($parts) <= 1) return ['', ''];
            return [trim($parts[0]), trim($parts[1])];
        }
    }


    // TITLE SPLIT
    list($title_part_1, $title_part_2) = vmv_split_double_slash($main_title);

    // PARAGRAPHS SPLIT
    list($first_big_1,  $first_big_2)  = vmv_split_double_slash($first_big_text);
    list($second_big_1, $second_big_2) = vmv_split_double_slash($second_big_text);


    ob_start();
?>

<div class="vmv-wrapper">
    <div class="vmv-safe">

        <!-- TWO COLUMN LAYOUT -->
        <div class="vmv-top-layout">

            <!-- LEFT COLUMN → RED LINE + TITLE -->
            <div class="vmv-title-column">
                <div class="vmv-red-line"></div>

                <h2 class="vmv-main-title">
                    <?php if ($title_part_1): ?>
                        <span class="vmv-title-dmsans"><?php echo esc_html($title_part_1); ?></span>
                    <?php endif; ?>

                    <?php if ($title_part_2): ?>
                        <span class="vmv-title-ptserif"><?php echo esc_html($title_part_2); ?></span>
                    <?php endif; ?>
                </h2>
            </div>

            <!-- RIGHT COLUMN → PARAGRAPHS -->
            <div class="vmv-paragraphs">
                <?php if ($first_big_1 || $first_big_2): ?>
                    <p class="vmv-big-text">
                        <span class="vmv-big-1"><?php echo esc_html($first_big_1); ?></span>
                        <span class="vmv-big-2"><?php echo esc_html($first_big_2); ?></span>
                    </p>
                <?php endif; ?>

                <?php if ($second_big_1 || $second_big_2): ?>
                    <p class="vmv-big-text">
                        <span class="vmv-big-1"><?php echo esc_html($second_big_1); ?></span>
                        <span class="vmv-big-2"><?php echo esc_html($second_big_2); ?></span>
                    </p>
                <?php endif; ?>
            </div>

        </div> <!-- END TWO-COLUMN -->

    </div>
</div>

<!-- FULL-WIDTH WHITE SECTION -->
<div class="vmv-values-full">
    <div class="vmv-safe">

        <!-- VALUES TITLE -->
        <h3 class="vmv-values-title"><?php echo esc_html($values_title); ?></h3>

        <!-- ICON GRID -->
        <div class="vmv-grid">

            <div class="vmv-item">
                <img src="<?php echo esc_url( ik_upload_url( $icon_1 ) ); ?>" alt="">
                <h4><?php echo esc_html($icon_title_1); ?></h4>
                <p><?php echo esc_html($icon_text_1); ?></p>
            </div>

            <div class="vmv-item">
                <img src="<?php echo esc_url( ik_upload_url( $icon_2 ) ); ?>" alt="">
                <h4><?php echo esc_html($icon_title_2); ?></h4>
                <p><?php echo esc_html($icon_text_2); ?></p>
            </div>

            <div class="vmv-item">
                <img src="<?php echo esc_url( ik_upload_url( $icon_3 ) ); ?>" alt="">
                <h4><?php echo esc_html($icon_title_3); ?></h4>
                <p><?php echo esc_html($icon_text_3); ?></p>
            </div>

            <div class="vmv-item">
                <img src="<?php echo esc_url( ik_upload_url( $icon_4 ) ); ?>" alt="">
                <h4><?php echo esc_html($icon_title_4); ?></h4>
                <p><?php echo esc_html($icon_text_4); ?></p>
            </div>

        </div>

    </div>
</div>

<style>

.vmv-wrapper { width: 100%; padding: 60px 40px; margin: 0; }

/* SAFE AREA */
.vmv-safe {
    max-width: 1530px;
    margin: 0 auto;
}

/* FULL WIDTH VALUES BACKGROUND */
.vmv-values-full {
    width: 100%;
    background-color: #ffffff;
	padding: 60px 40px;
}

/* TWO COLUMNS LAYOUT */
.vmv-top-layout {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 60px;
}

/* LEFT COLUMN → TITLE */
.vmv-title-column {
    flex: 0 0 420px;
}

/* RIGHT COLUMN → PARAGRAPHS */
.vmv-paragraphs {
    flex: 1;
    max-width: 900px;
    display: flex;
    flex-direction: column;
    gap: 36px;
}

/* RED LINE */
.vmv-red-line {
    width: 70px;
    height: 6px;
    background-color: #DB2129;
    opacity: 1;
    margin-bottom: 24px;
}

/* MAIN TITLE */
.vmv-main-title {
    margin: 0 0 56px 0;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.vmv-title-dmsans {
    font-family: "DM Sans"; font-weight: 600; font-size: 36px; color: #101110; line-height: 100%;
}

.vmv-title-ptserif {
    font-family: "PT Serif"; font-weight: 700; font-style: italic; font-size: 36px; color: #101110; line-height: 100%;
}

/* PARAGRAPHS */
.vmv-big-text { margin: 0; }

.vmv-big-1 {
    font-family: "DM Sans"; font-weight: 400; font-size: 32px; color: #101110; line-height: 34px;
}

.vmv-big-2 {
    font-family: "DM Sans"; font-weight: 400; font-size: 32px; color: #101110; line-height: 34px;
}

/* VALUES TITLE */
.vmv-values-title {
    font-family: "DM Sans"; font-weight: 600; font-size: 32px; color: #000;
    margin: 0px 0 40px 0;
}

/* GRID */
.vmv-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.vmv-item img { width: 40px; height: 40px; margin-bottom: 20px; }

.vmv-item h4 { font-family: "DM Sans"; font-weight: 600; font-size: 20px; color: #000; margin-bottom: 10px; }

.vmv-item p { font-family: "DM Sans"; font-weight: 400; font-size: 18px; line-height: 26px; color: #333; }

/* RESPONSIVE */
@media (max-width: 1024px) {


    .vmv-top-layout { flex-direction: column; gap: 40px; }

    .vmv-title-column, .vmv-paragraphs { max-width: 100%; }

    .vmv-main-title { margin-bottom: 24px; }

    .vmv-top-layout { gap: 20px; }

    .vmv-title-column { flex: 0 0 40px; }
	.vmv-wrapper { padding: 30px; }
	
	.vmv-values-full {
	padding: 30px
	}
	.vmv-big-1, .vmv-big-2{
		font-size:28px;
	}
}

@media (max-width: 600px) {
    .vmv-grid {
        grid-template-columns: 1fr;
    }

    .vmv-main-title {
        margin-bottom: 20px;
    }

    .vmv-item h4 {
        margin: 0;
    }

}


</style>

<?php
    return ob_get_clean();
}

add_shortcode('vision_mission_values_block', 'shortcode_vision_mission_values_block');

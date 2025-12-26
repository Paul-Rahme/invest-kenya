<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [first_section_why_kenya]
|--------------------------------------------------------------------------
| FINAL WORKING VERSION:
| - Row 1: icon + subtitle
| - Row 2: text aligned under icon using padding-left
| - Space between the two rows preserved
|--------------------------------------------------------------------------
*/

function shortcode_first_section_why_kenya() {

    // Main title split
    $raw = get_field('main_title_first_section');
    $parts = explode('//', $raw);
    $p1 = trim($parts[0] ?? '');
    $p2 = trim($parts[1] ?? '');

    // Items
    $items = [
        [
            'icon' => get_field('first_icon_first_section'),
            'subtitle' => get_field('first_subtitle_first_section'),
            'text' => get_field('first_text_first_section'),
        ],
        [
            'icon' => get_field('second_icon_first_section'),
            'subtitle' => get_field('second_subtitle_first_section'),
            'text' => get_field('second_text_first_section'),
        ],
        [
            'icon' => get_field('third_icon_first_section'),
            'subtitle' => get_field('third_subtitle_first_section'),
            'text' => get_field('third_text_first_section'),
        ],
        [
            'icon' => get_field('fourth_icon_first_section'),
            'subtitle' => get_field('fourth_subtitle_first_section'),
            'text' => get_field('fourth_text_first_section'),
        ],
        [
            'icon' => get_field('fifth_icon_first_section'),
            'subtitle' => get_field('fifth_subtitle_first_section'),
            'text' => get_field('fifth_text_first_section'),
        ],
        [
            'icon' => get_field('sixth_icon_first_section'),
            'subtitle' => get_field('sixth_subtitle_first_section'),
            'text' => get_field('sixth_text_first_section'),
        ],
    ];

    ob_start();
?>

<div class="why-kenya-wrapper">
    <div class="why-kenya-safe">

        <!-- RED LINE -->
        <div class="why-kenya-red-line"></div>

        <!-- MAIN TITLE -->
        <h2 class="why-kenya-main-title">
            <span class="wk-title-black"><?= esc_html($p1) ?></span>
            <span class="wk-title-gray"><?= esc_html($p2) ?></span>
        </h2>

        <!-- GRID: 2 COLUMNS -->
        <div class="why-kenya-grid">

            <?php foreach ($items as $item): ?>
            <div class="why-kenya-item-wrapper">

                <!-- ROW 1: ICON + SUBTITLE -->
                <div class="wk-row-1">
                    <img class="wk-icon" src="<?= esc_url( ik_upload_url($item['icon']) ) ?>" alt="">
                    <div class="wk-subtitle"><?= esc_html($item['subtitle']) ?></div>
                </div>

                <!-- ROW 2: TEXT ALIGNED UNDER ICON -->
                <div class="wk-row-2">
                    <?= esc_html($item['text']) ?>
                </div>

                <!-- SEPARATOR -->
                <div class="wk-separator"></div>

            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>

<style>

/* GENERAL */
.why-kenya-wrapper { margin:0; padding:0; background:none !important; }
.why-kenya-safe { max-width:1530px; margin:0 auto; }

/* RED LINE */
.why-kenya-wrapper .why-kenya-red-line{
    width:70px;
    height:6px;
    background:#DB2129;
    margin-bottom:18px;
}

/* TITLE */
.why-kenya-main-title {
    margin:0 0 24px 0;
    padding:0;
    font-size:0;
}
.wk-title-black {
    font-family:"PT Serif";
    font-weight:700;
    font-style:italic;
    font-size:36px;
    line-height:56px;
    margin-right:8px;
}
.wk-title-gray {
    font-family:"DM Sans";
    font-weight:600;
    font-size:36px;
    line-height:56px;
    color:#565A56;
}

/* GRID */
.why-kenya-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    column-gap:60px;
}

/* ITEM WRAPPER */
.why-kenya-item-wrapper { width:100%; }

/* ------------------------- */
/* ROW 1: ICON + SUBTITLE    */
/* ------------------------- */
.wk-row-1 {
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:14px; /* SPACE BETWEEN ROW 1 AND ROW 2 */
}

.wk-icon {
    width:40px;
    height:40px;
    object-fit:contain;
}

.wk-subtitle {
    font-family:"DM Sans";
    font-weight:600;
    font-size:20px;
    color:#101110;
}

/* ------------------------- */
/* ROW 2: TEXT ALIGNED UNDER ICON */
/* ------------------------- */
.wk-row-2 {
    font-family:"DM Sans";
    font-weight:400;
    font-size:16px;
    color:#292A29;
    line-height:28px;
}

/* SEPARATOR */
.wk-separator {
    width:100%;
    height:1px;
    background:#E0E0E0;
    margin:24px 0 24px 0;
}

/* RESPONSIVE */
@media (max-width:1024px){
    .why-kenya-safe { padding:0 30px; }
}

@media (max-width:768px){
    .why-kenya-grid { grid-template-columns:1fr; }
}

</style>

<?php
    return ob_get_clean();
}

add_shortcode('first_section_why_kenya','shortcode_first_section_why_kenya');

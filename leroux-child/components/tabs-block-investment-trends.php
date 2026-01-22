<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Shortcode: [tabs_block_investment_trends]
|--------------------------------------------------------------------------
| - FULL self-contained file
| - EXACT layout + styling of first-section-block-why-kenya.php
| - Spotlight tabs integrated
| - 3 tabs switching 3 identical blocks
|--------------------------------------------------------------------------
*/

function shortcode_tabs_block_investment_trends() {

    $uid = 'investment-trends-' . wp_rand(1000,9999);

    // TAB TITLES
    $tab1_title = get_field('tab_1_title');
    $tab2_title = get_field('tab_2_title');
    $tab3_title = get_field('tab_3_title');

    // BOTTOM ROW FIELDS
    $bottom_text   = get_field('bottom_text');
    $download_text = get_field('download_text');
    $download_url  = get_field('download_url');

    // ICON (same as ICT BPO)
    $download_icon_url = ik_upload_url('2025/11/System-Icons-5.svg');

    // SAFE HELPER
    $build_items = function($prefix) {
        return [
            ['icon'=>get_field("first_icon_{$prefix}"),  'subtitle'=>get_field("first_subtitle_{$prefix}"),  'text'=>get_field("first_text_{$prefix}")],
            ['icon'=>get_field("second_icon_{$prefix}"), 'subtitle'=>get_field("second_subtitle_{$prefix}"), 'text'=>get_field("second_text_{$prefix}")],
            ['icon'=>get_field("third_icon_{$prefix}"),  'subtitle'=>get_field("third_subtitle_{$prefix}"),  'text'=>get_field("third_text_{$prefix}")],
            ['icon'=>get_field("fourth_icon_{$prefix}"), 'subtitle'=>get_field("fourth_subtitle_{$prefix}"), 'text'=>get_field("fourth_text_{$prefix}")],
            ['icon'=>get_field("fifth_icon_{$prefix}"),  'subtitle'=>get_field("fifth_subtitle_{$prefix}"),  'text'=>get_field("fifth_text_{$prefix}")],
            ['icon'=>get_field("sixth_icon_{$prefix}"),  'subtitle'=>get_field("sixth_subtitle_{$prefix}"),  'text'=>get_field("sixth_text_{$prefix}")],
        ];
    };

    // TAB 1
    $parts1 = explode('//', get_field('main_title_first_tab'));
    $t1_p1 = trim($parts1[0] ?? '');
    $t1_p2 = trim($parts1[1] ?? '');
    $items1 = $build_items('first_tab');

    // TAB 2
    $parts2 = explode('//', get_field('main_title_second_tab'));
    $t2_p1 = trim($parts2[0] ?? '');
    $t2_p2 = trim($parts2[1] ?? '');
    $items2 = $build_items('second_tab');

    // TAB 3
    $parts3 = explode('//', get_field('main_title_third_tab'));
    $t3_p1 = trim($parts3[0] ?? '');
    $t3_p2 = trim($parts3[1] ?? '');
    $items3 = $build_items('third_tab');

    ob_start();
?>

<div id="<?php echo esc_attr($uid); ?>">

    <!-- ================= TABS ================= -->
    <div class="spotlight-tabs-safe-area">
        <div class="spotlight-tabs-wrapper">
            <div class="spotlight-tabs">
                <button class="spotlight-tab active" data-target="tab1"><?php echo esc_html($tab1_title); ?></button>
                <button class="spotlight-tab" data-target="tab2"><?php echo esc_html($tab2_title); ?></button>
                <button class="spotlight-tab" data-target="tab3"><?php echo esc_html($tab3_title); ?></button>
                <div class="spotlight-underline"></div>
            </div>
        </div>
    </div>

    <!-- ================= TAB 1 ================= -->
    <div class="investment-group-tab1">

        <?php render_investment_block($t1_p1, $t1_p2, $items1, $bottom_text, $download_text, $download_url, $download_icon_url); ?>

    </div>

    <!-- ================= TAB 2 ================= -->
    <div class="investment-group-tab2" style="display:none;">

        <?php render_investment_block($t2_p1, $t2_p2, $items2, $bottom_text, $download_text, $download_url, $download_icon_url); ?>

    </div>

    <!-- ================= TAB 3 ================= -->
    <div class="investment-group-tab3" style="display:none;">

        <?php render_investment_block($t3_p1, $t3_p2, $items3, $bottom_text, $download_text, $download_url, $download_icon_url); ?>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const root = document.getElementById('<?php echo esc_js($uid); ?>');
    const tabs = root.querySelectorAll(".spotlight-tab");
    const underline = root.querySelector(".spotlight-underline");

    function showGroup(target) {
        root.querySelectorAll("[class^='investment-group-']").forEach(group => {
            group.style.display = group.classList.contains("investment-group-" + target) ? "block" : "none";
        });
    }

    function activateTab(tab) {
        tabs.forEach(t => t.classList.remove("active"));
        tab.classList.add("active");
        underline.style.width = tab.offsetWidth + "px";
        underline.style.left = tab.offsetLeft + "px";
        showGroup(tab.dataset.target);
    }

    setTimeout(() => activateTab(root.querySelector(".spotlight-tab.active")), 50);

    tabs.forEach(tab => tab.addEventListener("click", e => {
        e.preventDefault();
        activateTab(tab);
    }));
});
</script>

<style>
/* ================= SAFE AREA ================= */
.spotlight-tabs-safe-area{max-width:1530px;padding-bottom:40px;margin:0 auto;box-sizing:border-box}

/* ================= TABS ================= */
.spotlight-tabs{display:flex;gap:32px;border-bottom:1px solid #e5e5e5;padding-bottom:8px;position:relative}
.spotlight-tab{background:none;border:none;font-size:18px;font-weight:500;cursor:pointer;color:#707070;padding:0}
.spotlight-tab.active{color:#DB2129}
.spotlight-underline{position:absolute;bottom:-1px;height:2px;background:#DB2129;transition:all .3s ease;width:0;left:0}

/* ================= BLOCK ================= */
.why-kenya-wrapper{margin:0;padding:0}
.why-kenya-safe{max-width:1530px;margin:0 auto}
.why-kenya-red-line{width:70px;height:6px;background:#DB2129;margin-bottom:18px}
.why-kenya-main-title{margin:0 0 24px;font-size:0}
.wk-title-black{font-family:"PT Serif";font-weight:700;font-style:italic;font-size:36px;line-height:56px;margin-right:8px}
.wk-title-gray{font-family:"DM Sans";font-weight:600;font-size:36px;line-height:56px;color:#565A56}
.why-kenya-grid{display:grid;grid-template-columns:1fr 1fr;column-gap:60px}
.wk-row-1{display:flex;align-items:center;gap:20px;margin-bottom:14px}
.wk-icon{width:40px;height:40px;object-fit:contain}
.wk-subtitle{font-family:"DM Sans";font-weight:600;font-size:20px;color:#101110}
.wk-row-2{font-family:"DM Sans";font-weight:400;font-size:16px;color:#292A29;line-height:28px}
.wk-separator{width:100%;height:1px;background:#E0E0E0;margin:24px 0}

/* ================= BOTTOM ROW ================= */
.sector-bottom-row {
    margin-top: 30px;
    display: flex;
    gap: 16px;
    align-items: center;
    flex-wrap: wrap;
}

.sector-bottom-text {
    font-size: 16px;
    color: #101110;
}

.sector-download-btn {
    padding: 10px 18px;
    background: #DB2129;
    color: white;
    border-radius: 999px;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
}

.sector-download-btn:hover {
    background: #292A29;
	color: white;
}

/* ================= RESPONSIVE ================= */
@media(max-width:1024px){.spotlight-tabs-safe-area,.why-kenya-safe{padding:0 30px} .spotlight-tabs-safe-area{padding-bottom: 30px}}
@media(max-width:768px){.why-kenya-grid{grid-template-columns:1fr}}
</style>

<?php
    return ob_get_clean();
}

/* ========================================= */
/* RENDER BLOCK (SAFE, OUTSIDE SHORTCODE)    */
/* ========================================= */
function render_investment_block($p1, $p2, $items, $bottom_text, $download_text, $download_url, $download_icon_url) { ?>
    <div class="why-kenya-wrapper">
        <div class="why-kenya-safe">

            <div class="why-kenya-red-line"></div>

            <h2 class="why-kenya-main-title">
                <span class="wk-title-black"><?php echo esc_html($p1); ?></span>
                <span class="wk-title-gray"><?php echo esc_html($p2); ?></span>
            </h2>

            <div class="why-kenya-grid">
                <?php foreach ($items as $item): ?>
                    <div>
                        <div class="wk-row-1">
                            <img class="wk-icon" src="<?php echo esc_url(ik_upload_url($item['icon'])); ?>" alt="">
                            <div class="wk-subtitle"><?php echo esc_html($item['subtitle']); ?></div>
                        </div>
                        <div class="wk-row-2"><?php echo esc_html($item['text']); ?></div>
                        <div class="wk-separator"></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($bottom_text || $download_url): ?>
                <div class="sector-bottom-row">
                    <?php if ($bottom_text): ?>
                        <div class="sector-bottom-text"><?php echo esc_html($bottom_text); ?></div>
                    <?php endif; ?>

                    <?php if ($download_url): ?>
                        <a class="sector-download-btn" href="<?php echo esc_url( ik_upload_url($download_url) ); ?>" target="_blank">
                            <?php echo esc_html($download_text); ?>
                            <img src="<?php echo esc_url($download_icon_url); ?>" alt="">
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php }

add_shortcode('tabs_block_investment_trends','shortcode_tabs_block_investment_trends');

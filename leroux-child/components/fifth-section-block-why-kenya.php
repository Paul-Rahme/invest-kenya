<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: fifth-section-block-why-kenya.php
| Shortcode: [fifth_section_block_why_kenya]
|--------------------------------------------------------------------------
*/

function shortcode_fifth_section_block_why_kenya() {

    /* ---------------------------------------------
       ACF FIELDS — TEXTS
    --------------------------------------------- */
    $main_title  = get_field('main_title_fifth_section');
    $bottom_text = get_field('bottom_text_fifth_section');

$tabs = [
    get_field('first_tab_fifth_section'),
    get_field('second_tab_fifth_section'),
    get_field('third_tab_fifth_section'),
    get_field('fourth_tab_fifth_section'),
    get_field('fifth_tab_fifth_section'),
    get_field('sixth_tab_fifth_section'),
    get_field('seventh_tab_fifth_section'),
    get_field('eighth_tab_fifth_section'),
];


    /* ---------------------------------------------
       ACF FIELDS — IMAGES FOR EACH TAB
    --------------------------------------------- */
$tab_images = [
    [
        get_field('first_image_first_tab_fifth_section'),
        get_field('second_image_first_tab_fifth_section'),
        get_field('third_image_first_tab_fifth_section'),
        get_field('fourth_image_first_tab_fifth_section'),
    ],
    [
        get_field('first_image_second_tab_fifth_section'),
        get_field('second_image_second_tab_fifth_section'),
        get_field('third_image_second_tab_fifth_section'),
        get_field('fourth_image_second_tab_fifth_section'),
    ],
    [
        get_field('first_image_third_tab_fifth_section'),
        get_field('second_image_third_tab_fifth_section'),
        get_field('third_image_third_tab_fifth_section'),
        get_field('fourth_image_third_tab_fifth_section'),
    ],
    [
        get_field('first_image_fourth_tab_fifth_section'),
        get_field('second_image_fourth_tab_fifth_section'),
        get_field('third_image_fourth_tab_fifth_section'),
        get_field('fourth_image_fourth_tab_fifth_section'),
    ],
    [
        get_field('first_image_fifth_tab_fifth_section'),
        get_field('second_image_fifth_tab_fifth_section'),
        get_field('third_image_fifth_tab_fifth_section'),
        get_field('fourth_image_fifth_tab_fifth_section'),
    ],
    [
        get_field('first_image_sixth_tab_fifth_section'),
        get_field('second_image_sixth_tab_fifth_section'),
        get_field('third_image_sixth_tab_fifth_section'),
        get_field('fourth_image_sixth_tab_fifth_section'),
    ],
    [
        get_field('first_image_seventh_tab_fifth_section'),
        get_field('second_image_seventh_tab_fifth_section'),
        get_field('third_image_seventh_tab_fifth_section'),
        get_field('fourth_image_seventh_tab_fifth_section'),
    ],
    [
        get_field('first_image_eight_tab_fifth_section'),
        get_field('second_image_eight_tab_fifth_section'),
        get_field('third_image_eight_tab_fifth_section'),
        get_field('fourth_image_eight_tab_fifth_section'),
    ],
];


    ob_start();
    ?>

<div class="fsb5-wrapper">

    <!-- MAIN TITLE -->
    <?php if ($main_title): ?>
        <h2 class="fsb5-title"><?php echo esc_html($main_title); ?></h2>
    <?php endif; ?>

    <!-- TABS + GREY BASELINE -->
    <div class="fsb5-tabs-wrapper">
        <div class="fsb5-tabs">
            <?php foreach ($tabs as $index => $label): ?>
                <?php if ($label): ?>
                    <button class="fsb5-tab-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="<?php echo $index; ?>">
                        <?php echo esc_html($label); ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
		<span class="fsb5-divider-indicator"></span>
    </div>

    <!-- IMAGE GRID AREA -->
    <div class="fsb5-grid-area">
        <?php foreach ($tab_images as $t_index => $images): ?>
            <div class="fsb5-grid <?php echo $t_index === 0 ? 'active' : ''; ?>" data-grid="<?php echo $t_index; ?>">
                <?php foreach ($images as $img): ?>
                    <?php if ($img): ?>
                        <div class="fsb5-card">
                            <img src="<?php echo esc_url( ik_upload_url( $img ) ); ?>" alt="">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- BOTTOM TEXT -->
    <?php if ($bottom_text): ?>
        <p class="fsb5-bottom-text"><?php echo esc_html($bottom_text); ?></p>
    <?php endif; ?>

</div>

<style>
/* ================================================================
   CORE WRAPPER — SAFE AREA, NO OUTER PADDING
================================================================ */
.fsb5-wrapper {
    max-width: 1530px;
    margin: 0 auto;
    padding: 0;
    font-family: "DM Sans", sans-serif !important;
}

/* Tablet + Mobile padding */
@media (max-width: 1100px) {
    .fsb5-wrapper {
        padding-left: 30px;
        padding-right: 30px;
    }
}
@media (max-width: 600px) {
    .fsb5-wrapper {
        padding-left: 30px;
        padding-right: 30px;
    }
}

/* ================================================================
   TITLE
================================================================ */
.fsb5-title {
    color: #101110;
    font-weight: 600;
    font-size: 32px;
    line-height: 100%;
    margin-bottom: 30px;
}

/* ================================================================
   TABS WRAPPER WITH BASELINE
================================================================ */
.fsb5-tabs-wrapper {
    position: relative;
    padding-bottom: 18px;
    margin-bottom: 25px;
	overflow: visible;
}

.fsb5-tabs-wrapper::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 1px;
    background-color: #D9D9D9;
}

/* ================================================================
   TABS
================================================================ */
.fsb5-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
}

/* Scrollable below 1110px */
@media (max-width: 1110px) {
    .fsb5-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        white-space: nowrap;
        gap: 20px;
        padding-bottom: 10px;
        scroll-behavior: smooth;

        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .fsb5-tabs::-webkit-scrollbar {
        display: none;
    }

    .fsb5-tab-btn {
        flex: 0 0 auto;
    }
}

.fsb5-tab-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    padding-bottom: 8px;
    color: #565A56;
    font-weight: 600;
    font-size: 18px;
    position: relative;
	font-family: "DM Sans", sans-serif !important;
	position: relative;
}


/* ACTIVE tab underline */
.fsb5-tab-btn {
    position: relative;
}



.fsb5-tab-btn.active {
    color: #DB2129;
}
	


/* ================================================================
   IMAGE GRIDS
================================================================ */
.fsb5-grid {
    display: none;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    margin-top: 35px;
}

.fsb5-grid.active {
    display: grid;
}

@media (max-width: 1100px) {
    .fsb5-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 600px) {
    .fsb5-grid {
        grid-template-columns: repeat(1, 1fr);
    }
}

/* ================================================================
   CARD DESIGN — SAME AS PARTNERS BLOCK
================================================================ */
.fsb5-card {
    border: 1px solid #E0E0E0;
    height: 230px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
}

.fsb5-card img {
    max-width: 70%;
    max-height: 70%;
    object-fit: contain;
}

/* ================================================================
   BOTTOM TEXT
================================================================ */
.fsb5-bottom-text {
    margin-top: 32px !important;
    color: #565A56;
    font-weight: 400;
    font-size: 20px;
    line-height: 100%;
}
	
/* ================================================================
   ACTIVE DIVIDER INDICATOR (ON GREY BASELINE)
================================================================ */
.fsb5-divider-indicator {
    position: absolute;
    bottom: 0;                 /* sits exactly on divider */
    height: 3px;
    background-color: #DB2129;
    transition: transform 0.35s ease, width 0.35s ease;
    pointer-events: none;
    will-change: transform, width;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tabsWrapper = document.querySelector(".fsb5-tabs-wrapper");
    const tabs = document.querySelectorAll(".fsb5-tab-btn");
    const indicator = document.querySelector(".fsb5-divider-indicator");
    const grids = document.querySelectorAll(".fsb5-grid");

    function moveIndicator(tab) {
        const tabRect = tab.getBoundingClientRect();
        const wrapperRect = tabsWrapper.getBoundingClientRect();

        indicator.style.width = tabRect.width + "px";
        indicator.style.transform =
            `translateX(${tabRect.left - wrapperRect.left}px)`;
    }

    // Initial position
    const activeTab = document.querySelector(".fsb5-tab-btn.active");
    if (activeTab) moveIndicator(activeTab);

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {

            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            moveIndicator(tab);

            tab.scrollIntoView({
                behavior: "smooth",
                inline: "center",
                block: "nearest"
            });

            const index = tab.dataset.tab;
            grids.forEach(g => {
                g.classList.toggle("active", g.dataset.grid === index);
            });
        });
    });

    // Keep indicator aligned during horizontal scroll
    document.querySelector(".fsb5-tabs")?.addEventListener("scroll", () => {
        const active = document.querySelector(".fsb5-tab-btn.active");
        if (active) moveIndicator(active);
    });
});

</script>

<?php
    return ob_get_clean();
}

add_shortcode('fifth_section_block_why_kenya', 'shortcode_fifth_section_block_why_kenya');

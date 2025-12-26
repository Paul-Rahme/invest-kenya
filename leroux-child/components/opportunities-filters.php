<?php
/**
 * OPPORTUNITIES FILTERS — HTML + JS
 * File: /leroux-child/components/opportunities-filters.php
 */

// Collect unique meta values from opportunities posts
$opp_posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'category_name'  => 'opportunities',
    'post_status'    => 'publish',
]);

$stage_values  = [];
$county_values = [];
$sector_tags   = [];

foreach ($opp_posts as $post) {
    $stg  = trim(get_post_meta($post->ID, 'project_stage', true));
    $cty  = trim(get_post_meta($post->ID, 'county', true));

    if (!empty($stg)) $stage_values[]  = $stg;
    if (!empty($cty)) $county_values[] = $cty;

    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            $sector_tags[$tag->slug] = $tag->name;
        }
    }
}

/* ===============================
   UNIQUE + SORT (ALPHABETICAL)
=============================== */
$stage_values  = array_unique($stage_values);
$county_values = array_unique($county_values);

// Sort counties alphabetically (A → Z)
natcasesort($county_values);

// Sort sectors alphabetically by NAME (A → Z)
natcasesort($sector_tags);

// For AJAX
$ajax_url = admin_url('admin-ajax.php');
$nonce    = wp_create_nonce('kenya_filter_opportunities_nonce');
?>

<div class="opportunities-filters-wrapper">
    <div class="opportunities-filters">

        <!-- SECTOR DROPDOWN (FIRST) -->
        <div class="efilter-select efilter-dropdown" data-type="sector">
            <div class="efilter-selected" data-placeholder="Sector">Sector</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list">
                <?php foreach ($sector_tags as $slug => $name): ?>
                    <div data-value="<?php echo esc_attr($slug); ?>">
                        <?php echo esc_html($name); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- INVESTMENT AMOUNT DROPDOWN -->
        <div class="efilter-select efilter-dropdown" data-type="investment_amount">
            <div class="efilter-selected" data-placeholder="Investment amount">Investment amount</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list">
                <div data-value="0-50">Below 50 Mn</div>
                <div data-value="50-100">50 – 100 Mn</div>
                <div data-value="100-250">100 – 250 Mn</div>
                <div data-value="250-500">250 – 500 Mn</div>
                <div data-value="500+">Above 500 Mn</div>
            </div>
        </div>

        <!-- PROJECT STAGE DROPDOWN -->
        <div class="efilter-select efilter-dropdown" data-type="project_stage">
            <div class="efilter-selected" data-placeholder="Project stage">Project stage</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list">
                <?php foreach ($stage_values as $val): ?>
                    <div data-value="<?php echo esc_attr($val); ?>">
                        <?php echo esc_html($val); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- COUNTY DROPDOWN -->
        <div class="efilter-select efilter-dropdown" data-type="county">
            <div class="efilter-selected" data-placeholder="County">County</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list">
                <?php foreach ($county_values as $val): ?>
                    <div data-value="<?php echo esc_attr($val); ?>">
                        <?php echo esc_html($val); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const OPC_AJAX_URL   = "<?php echo esc_js($ajax_url); ?>";
    const OPC_AJAX_NONCE = "<?php echo esc_js($nonce); ?>";

    document.querySelectorAll(".opportunities-filters .efilter-dropdown").forEach(drop => {

        const selected = drop.querySelector(".efilter-selected");
        const clearBtn = drop.querySelector(".efilter-clear");
        const list     = drop.querySelector(".efilter-list");
        const type     = drop.dataset.type;

        drop.addEventListener("click", e => {
            e.stopPropagation();
            drop.classList.toggle("open");
        });

        list.querySelectorAll("div").forEach(item => {
            item.addEventListener("click", function(e) {
                e.stopPropagation();
                selected.textContent = this.textContent;
                selected.classList.add("has-value");
                drop.dataset.value = this.dataset.value;
                drop.classList.add("has-value");
                drop.classList.remove("open");

                applyOpportunitiesFilters();
            });
        });

        clearBtn.addEventListener("click", e => {
            e.stopPropagation();

            selected.textContent = selected.dataset.placeholder;
            selected.classList.remove("has-value");
            drop.classList.remove("has-value");
            drop.dataset.value = "";

            applyOpportunitiesFilters();
        });

    });

    document.addEventListener("click", () => {
        document.querySelectorAll(".opportunities-filters .efilter-dropdown")
            .forEach(d => d.classList.remove("open"));
    });

    function collectOppFilters() {
        const getVal = (type) => {
            const el = document.querySelector(".opportunities-filters [data-type='" + type + "']");
            return el && el.dataset.value ? el.dataset.value : "";
        };

        return {
            investment_amount: getVal("investment_amount"),
            project_stage:     getVal("project_stage"),
            county:            getVal("county"),
            sector:            getVal("sector")
        };
    }

    function applyOpportunitiesFilters() {

        const filters = collectOppFilters();
        const grid    = document.querySelector(".opc-safe-area .opc-grid");

        if (!grid) return;

        const formData = new FormData();
        formData.append("action", "kenya_filter_opportunities");
        formData.append("nonce", OPC_AJAX_NONCE);

        Object.keys(filters).forEach(key => {
            formData.append(key, filters[key]);
        });

        fetch(OPC_AJAX_URL, { method: "POST", body: formData })
            .then(res => res.text())
            .then(html => grid.innerHTML = html);
    }

    (function waitForFilters(){

        const wrapper = document.querySelector('.opportunities-filters');
        const grid    = document.querySelector('.opc-safe-area .opc-grid');

        if (!wrapper || !grid) {
            requestAnimationFrame(waitForFilters);
            return;
        }

        const params = new URLSearchParams(window.location.search);
        let inv = params.get("investment_amount");
        if (inv) inv = inv.replace(/\s/g, '+');

        function setDropdown(type, value){
            if (!value) return false;

            const dropdown = wrapper.querySelector("[data-type='" + type + "']");
            if (!dropdown) return false;

            const selected = dropdown.querySelector(".efilter-selected");
            const items    = dropdown.querySelectorAll(".efilter-list div");

            let match = null;

            items.forEach(item => {
                if ((item.dataset.value || '').toLowerCase() === value.toLowerCase()) {
                    match = item;
                }
            });

            if (!match) return false;

            selected.textContent = match.textContent;
            selected.classList.add("has-value");
            dropdown.dataset.value = match.dataset.value;
            dropdown.classList.add("has-value");

            return true;
        }

        const applied =
            setDropdown("investment_amount", inv) |
            setDropdown("project_stage", params.get("project_stage")) |
            setDropdown("county", params.get("county")) |
            setDropdown("sector", params.get("sector"));

        if (applied) {
            applyOpportunitiesFilters();
        }

    })();

});
</script>

<?php /* RESOURCES FILTERS — HTML + JS */ ?>

<div class="resources-filters-wrapper">
    <div class="resources-filters">

        <!-- TYPE DROPDOWN (TAGS FROM RESOURCES ONLY) -->
        <div class="rfilter-select rfilter-dropdown" data-type="type">
            <div class="rfilter-selected">Type</div>
            <span class="rfilter-clear">×</span>
            <span class="rfilter-arrow"></span>

            <div class="rfilter-list">
                <?php
                /**
                 * Collect tags used ONLY on posts in the "resources" category.
                 */
                $resources_posts = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => -1,
                    'category_name'  => 'resources',
                    'fields'         => 'ids',
                ]);

                $tag_ids = [];

                if (!empty($resources_posts)) {
                    foreach ($resources_posts as $post_id) {
                        $post_tags = wp_get_post_tags($post_id);
                        foreach ($post_tags as $tag) {
                            $tag_ids[] = $tag->term_id;
                        }
                    }
                }

                $tag_ids = array_unique($tag_ids);

                if (!empty($tag_ids)) {
                    $tags = get_terms([
                        'taxonomy'   => 'post_tag',
                        'include'    => $tag_ids,
                        'hide_empty' => true,
                        'orderby'    => 'name',
                        'order'      => 'ASC',
                    ]);

                    if (!empty($tags) && !is_wp_error($tags)) :
                        foreach ($tags as $tag) : ?>
                            <div data-value="<?php echo esc_attr($tag->slug); ?>">
                                <?php echo esc_html($tag->name); ?>
                            </div>
                        <?php
                        endforeach;
                    endif;
                }
                ?>
            </div>
        </div>

        <!-- DATE PICKER -->
<!--         <div class="rfilter-select rfilter-date">
            <div class="rfilter-selected rfilter-date-inner">
                <input type="text" id="resource-filter-date" placeholder="Date" autocomplete="off">
            </div>
            <span class="rfilter-clear date-clear">×</span>
            <span class="rfilter-arrow"></span>
        </div> -->

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ===============================
       GENERIC DROPDOWNS
    =============================== */
    document.querySelectorAll(".rfilter-dropdown").forEach(drop => {

        const selected = drop.querySelector(".rfilter-selected");
        const clearBtn = drop.querySelector(".rfilter-clear");
        const list = drop.querySelector(".rfilter-list");

        drop.addEventListener("click", e => {
            e.stopPropagation();
            drop.classList.toggle("open");
        });

        if (list) {
            list.querySelectorAll("div").forEach(item => {
                item.addEventListener("click", function (e) {
                    e.stopPropagation();
                    selected.textContent = this.textContent;
                    selected.classList.add("has-value");
                    drop.dataset.value = this.dataset.value;
                    drop.classList.add("has-value");
                    drop.classList.remove("open");

                    document.dispatchEvent(new CustomEvent("resources_filters_changed", {
                        detail: collectFilters()
                    }));
                });
            });
        }

        if (clearBtn) {
            clearBtn.addEventListener("click", e => {
                e.stopPropagation();
                selected.textContent = "Type";
                selected.classList.remove("has-value");
                drop.classList.remove("has-value");
                drop.dataset.value = "";

                document.dispatchEvent(new CustomEvent("resources_filters_changed", {
                    detail: collectFilters()
                }));
            });
        }

    });

    document.addEventListener("click", () => {
        document.querySelectorAll(".rfilter-dropdown").forEach(d => d.classList.remove("open"));
    });


    /* ===============================
       DATE PICKER
    =============================== */
    const dateBox   = document.querySelector(".rfilter-date");
    const dateInput = document.getElementById("resource-filter-date");
    const dateClear = document.querySelector(".date-clear");

    if (dateInput && window.flatpickr) {
        const fp = flatpickr(dateInput, {
            dateFormat: "Y-m-d",
            altInput: true,
            altInputClass: "rfilter-alt-input-class",
            altFormat: "d F, Y",
            disableMobile: true,

            onReady() {
                const alt = dateBox.querySelector(".rfilter-alt-input-class");
                if (alt) document.querySelector(".rfilter-date-inner").appendChild(alt);
            },

            onChange(selectedDates, dateStr) {
                dateBox.classList.toggle("has-value", !!dateStr);
                document.dispatchEvent(new CustomEvent("resources_filters_changed", {
                    detail: collectFilters()
                }));
            }
        });

        dateBox.addEventListener("click", () => fp.open());
    }

    if (dateClear) {
        dateClear.addEventListener("click", e => {
            e.stopPropagation();
            if (dateInput && dateInput._flatpickr) {
                dateInput._flatpickr.clear();
            }
            if (dateBox) {
                dateBox.classList.remove("has-value");
            }

            document.dispatchEvent(new CustomEvent("resources_filters_changed", {
                detail: collectFilters()
            }));
        });
    }

    /* ===============================
       COLLECT FILTERS
    =============================== */
    function collectFilters() {
        return {
            type: document.querySelector("[data-type='type']")?.dataset.value || "",
            date: dateInput?.value || ""
        };
    }

    /* ===============================
       AJAX: FILTER RESOURCES GRID
       (same structure as NEWS)
    =============================== */
    function fetchResources(filters) {
        if (!window.jQuery) return;
        var $ = jQuery;

        const $grid = document.querySelector(".rpc-grid");
        if (!$grid) return; // only main grid, not row

        $.ajax({
            url: "<?php echo esc_url( admin_url('admin-ajax.php') ); ?>",
            type: "POST",
            dataType: "json",
            data: {
                action: "kenya_filter_resources",
                type: filters.type || "",
                date: filters.date || ""
            },
            beforeSend: function () {
                $grid.classList.add("rpc-loading");
            },
            success: function (res) {
                $grid.classList.remove("rpc-loading");

                if (res && res.success && res.data && typeof res.data.html !== "undefined") {
                    $grid.innerHTML = res.data.html;
                } else {
                    $grid.innerHTML = "<p>No resources found.</p>";
                }
            },
            error: function () {
                $grid.classList.remove("rpc-loading");
                $grid.innerHTML = "<p>There was an error loading resources.</p>";
            }
        });
    }

    document.addEventListener("resources_filters_changed", function (e) {
        fetchResources(e.detail || {});
    });

});
</script>

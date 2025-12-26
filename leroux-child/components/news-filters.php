<?php /* NEWS FILTERS — HTML + JS */ ?>

<div class="news-filters-wrapper">
    <div class="news-filters">

        <!-- TOPIC DROPDOWN (TAGS FROM NEWS POSTS) -->
        <div class="efilter-select efilter-dropdown" data-type="topic">
            <div class="efilter-selected">Topic</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list">
                <?php if (!empty($news_tags) && !is_wp_error($news_tags)) : ?>
                    <?php foreach ($news_tags as $tag) : ?>
                        <div data-value="<?php echo esc_attr($tag->slug); ?>">
                            <?php echo esc_html($tag->name); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- DATE PICKER -->
        <div class="efilter-select efilter-date">
            <div class="efilter-selected efilter-date-inner">
                <input
                    type="text"
                    id="news-filter-date"
                    placeholder="Date"
                    autocomplete="off"
                >
            </div>
            <span class="efilter-clear date-clear">×</span>
            <span class="efilter-arrow"></span>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const wrapper   = document.querySelector(".news-filters-wrapper");
    if (!wrapper) return;

    /* ===============================
       GENERIC DROPDOWNS (SCOPED)
    =============================== */
    wrapper.querySelectorAll(".efilter-dropdown").forEach(drop => {

        const selected = drop.querySelector(".efilter-selected");
        const clearBtn = drop.querySelector(".efilter-clear");
        const list     = drop.querySelector(".efilter-list");

        drop.addEventListener("click", function(e) {
            e.stopPropagation();
            drop.classList.toggle("open");
        });

        if (list) {
            list.querySelectorAll("div").forEach(item => {
                item.addEventListener("click", function(e) {
                    e.stopPropagation();
                    selected.textContent = this.textContent;
                    selected.classList.add("has-value");
                    drop.dataset.value = this.dataset.value || "";
                    drop.classList.add("has-value");
                    drop.classList.remove("open");

                    onNewsFiltersChanged();
                });
            });
        }

        if (clearBtn) {
            clearBtn.addEventListener("click", function(e) {
                e.stopPropagation();

                const type = drop.dataset.type;
                if (type === "topic") {
                    selected.textContent = "Topic";
                }

                selected.classList.remove("has-value");
                drop.classList.remove("has-value");
                drop.dataset.value = "";

                onNewsFiltersChanged();
            });
        }
    });

    // close dropdowns when clicking outside
    document.addEventListener("click", () => {
        wrapper.querySelectorAll(".efilter-dropdown").forEach(d => d.classList.remove("open"));
    });


    /* ===============================
       DATE PICKER
    =============================== */
    const dateBox   = wrapper.querySelector(".efilter-date");
    const dateInput = wrapper.querySelector("#news-filter-date");
    const dateClear = wrapper.querySelector(".date-clear");

    let fp = null;

    if (dateInput && typeof flatpickr !== "undefined") {
        fp = flatpickr(dateInput, {
            dateFormat: "Y-m-d",
            altInput: true,
            altInputClass: "efilter-alt-input-class",
            altFormat: "d F, Y",
            disableMobile: true,

            onReady(_, __, instance) {
                const alt = wrapper.querySelector(".efilter-alt-input-class");
                const inner = wrapper.querySelector(".efilter-date-inner");
                if (alt && inner && !inner.contains(alt)) {
                    inner.appendChild(alt);
                }
            },

            onChange(selectedDates, dateStr) {
                dateBox.classList.toggle("has-value", !!dateStr);
                onNewsFiltersChanged();
            }
        });

        dateBox.addEventListener("click", function(e) {
            // open calendar when clicking the box
            if (fp) {
                fp.open();
            }
        });
    }

    if (dateClear) {
        dateClear.addEventListener("click", function(e) {
            e.stopPropagation();
            if (fp) {
                fp.clear();
            }
            if (dateInput) {
                dateInput.value = "";
            }
            dateBox.classList.remove("has-value");
            onNewsFiltersChanged();
        });
    }


    /* ===============================
       COLLECT FILTERS
    =============================== */
    function collectNewsFilters() {
        const topicDrop = wrapper.querySelector("[data-type='topic']");
        const topicVal  = topicDrop ? (topicDrop.dataset.value || "") : "";

        return {
            topic: topicVal,
            date:  dateInput ? (dateInput.value || "") : ""
        };
    }

    /* ===============================
       AJAX APPLY FILTERS
    =============================== */
    const ajaxUrl = "<?php echo esc_url( admin_url('admin-ajax.php') ); ?>";

    function onNewsFiltersChanged() {
        const filters = collectNewsFilters();
        applyNewsFilters(filters);
    }

    function applyNewsFilters(filters) {
        const grid = document.getElementById("npc-grid");
        if (!grid) return;

        grid.classList.add("npc-grid-loading");

        const formData = new FormData();
        formData.append("action", "kenya_filter_news");
        formData.append("topic", filters.topic);
        formData.append("date",  filters.date);

        fetch(ajaxUrl, {
            method: "POST",
            body:   formData
        })
        .then(response => response.text())
        .then(html => {
            grid.innerHTML = html;
        })
        .catch(err => {
            console.error("NEWS AJAX error:", err);
        })
        .finally(() => {
            grid.classList.remove("npc-grid-loading");
        });
    }
});
</script>

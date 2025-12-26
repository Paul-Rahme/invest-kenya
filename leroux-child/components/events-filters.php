<?php /* EVENTS FILTERS — HTML + JS */ ?>

<div class="events-filters-wrapper">
    <div class="events-filters">

        <!-- LOCATION DROPDOWN -->
        <div class="efilter-select efilter-dropdown" data-type="location">
            <div class="efilter-selected">Location</div>
            <span class="efilter-clear">×</span>
            <span class="efilter-arrow"></span>

            <div class="efilter-list" id="location-options">
                <!-- Options added by JS -->
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {


    const phpLocations   = window.eventFilterLocations || [];
    const dropdown       = document.querySelector(".efilter-dropdown");
    const selectedLabel  = dropdown.querySelector(".efilter-selected");
    const clearBtn       = dropdown.querySelector(".efilter-clear");
    const list           = document.getElementById("location-options");

    /* ===============================
       1. POPULATE OPTIONS
    =============================== */
    list.innerHTML = "";
    phpLocations.forEach(loc => {
        const item = document.createElement("div");
        item.dataset.value = loc;
        item.textContent   = loc;
        list.appendChild(item);
    });

    /* ===============================
       2. APPLY FILTER ON ALL .epc-card
    =============================== */
function applyFilter() {
    const value = (dropdown.dataset.value || "").toLowerCase().trim();

    // Always target BOTH grids — even if hidden
    const grids = [
        document.querySelector("#upcoming-events-grid .epc-grid"),
        document.querySelector("#expired-events-grid .epc-grid")
    ];

    grids.forEach(grid => {
        if (!grid) return;

        const cards     = grid.querySelectorAll(".epc-card");
        const noResults = grid.querySelector(".epc-no-results");

        let visible = 0;

        cards.forEach(card => {
            const locEl   = card.querySelector(".epc-location");
            const cardLoc = locEl ? locEl.textContent.toLowerCase().trim() : "";

            // No filter → show everything
            if (!value || cardLoc.includes(value)) {
                card.style.display = "";
                visible++;
            } else {
                card.style.display = "none";
            }
        });

        // No results block handling
        if (noResults) {
            noResults.style.display = (visible === 0) ? "block" : "none";
        }
    });
}












    /* ===============================
       3. DROPDOWN INTERACTIONS
    =============================== */

    // Open/close (ignore clear click)
    dropdown.addEventListener("click", function(e) {
        if (e.target === clearBtn) return;
        e.stopPropagation();
        dropdown.classList.toggle("open");
    });

    // Select option
    list.addEventListener("click", function(e) {
        const item = e.target.closest("div[data-value]");
        if (!item) return;

        dropdown.dataset.value      = item.dataset.value;
        selectedLabel.textContent   = item.textContent;
        selectedLabel.classList.add("has-value");
        dropdown.classList.add("has-value");
        dropdown.classList.remove("open");

        applyFilter();
    });

    // Clear
    clearBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        dropdown.dataset.value = "";
        selectedLabel.textContent = "Location";
        selectedLabel.classList.remove("has-value");
        dropdown.classList.remove("has-value");
        applyFilter();
    });

    // Close on outside click
    document.addEventListener("click", function() {
        dropdown.classList.remove("open");
    });

});
</script>

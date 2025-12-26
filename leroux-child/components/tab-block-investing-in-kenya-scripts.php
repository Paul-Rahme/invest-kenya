<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: tab-block-investing-in-kenya-scripts.php
| Purpose: JS for tab switching behavior
|--------------------------------------------------------------------------
*/

if (!function_exists('kn_render_investing_tabs_scripts')) :

function kn_render_investing_tabs_scripts() {

    ob_start(); ?>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const tabButtons = document.querySelectorAll(".ik-invest-tab-btn");
    const tabContents = document.querySelectorAll(".ik-invest-tab");

    if (!tabButtons.length || !tabContents.length) return;

    tabButtons.forEach(btn => {

        btn.addEventListener("click", () => {

            const targetTab = btn.getAttribute("data-tab");

            /* ==============================
               REMOVE ACTIVE FROM ALL TABS
            =============================== */
            tabButtons.forEach(b => b.classList.remove("active"));
            tabContents.forEach(c => c.classList.remove("active"));

            /* ==============================
               ACTIVATE CLICKED TAB BUTTON
            =============================== */
            btn.classList.add("active");

            /* ==============================
               ACTIVATE CORRESPONDING CONTENT
            =============================== */
            const content = document.querySelector(
                `.ik-invest-tab[data-tab-content="${targetTab}"]`
            );

            if (content) {
                content.classList.add("active");
            }

            /* ==============================
               ENSURE TAB IS FULLY VISIBLE
               WHEN SCROLLABLE IN MOBILE
            =============================== */
            if (window.innerWidth <= 1100) {
                btn.scrollIntoView({
                    behavior: "smooth",
                    inline: "center",
                    block: "nearest"
                });
            }

        });
    });

});
</script>

<?php
    return ob_get_clean();
}

endif;

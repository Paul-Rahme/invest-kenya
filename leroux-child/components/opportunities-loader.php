<?php
/**
 * OPPORTUNITIES GLOBAL LOADER (VIEWPORT FIXED)
 * File: /leroux-child/components/opportunities-loader.php
 *
 * Loader is always visible (fixed to viewport)
 * Section is dimmed to keep context
 * Zero changes to existing components
 */

add_action('wp_footer', function () {
?>
<style>
/* ===============================
   DIM TARGET SECTION
=============================== */
.opc-safe-area.is-loading {
    pointer-events: none;
    opacity: 0.5;
    transition: opacity 0.2s ease;
}

/* ===============================
   VIEWPORT FIXED LOADER
=============================== */
.opc-global-loader {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(2px);
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.25s ease;
}

body.opc-loading .opc-global-loader {
    opacity: 1;
    pointer-events: all;
}

/* Spinner (brand color) */
.opc-spinner {
    width: 48px;
    height: 48px;
    border: 3px solid #E3E3E3;
    border-top-color: #0C3B29;
    border-radius: 50%;
    animation: opc-spin 0.9s linear infinite;
}

@keyframes opc-spin {
    to { transform: rotate(360deg); }
}
</style>

<div class="opc-global-loader">
    <div class="opc-spinner"></div>
</div>

<script>
(function ($) {
	
	    /* ===============================
       EXCLUDE PAGE: ID 11444
    =============================== */
    if (document.body.classList.contains('page-id-11444')) {
        return;
    }

    /* ===============================
       FETCH HOOK
    =============================== */
    if (window.fetch) {
        const originalFetch = window.fetch;
        window.fetch = function () {

            document.body.classList.add('opc-loading');
            document.querySelectorAll('.opc-safe-area')
                .forEach(el => el.classList.add('is-loading'));

            return originalFetch.apply(this, arguments)
                .finally(() => {
                    document.body.classList.remove('opc-loading');
                    document.querySelectorAll('.opc-safe-area')
                        .forEach(el => el.classList.remove('is-loading'));
                });
        };
    }

    /* ===============================
       JQUERY AJAX HOOK
    =============================== */
    $(document).ajaxStart(function () {
        document.body.classList.add('opc-loading');
        document.querySelectorAll('.opc-safe-area')
            .forEach(el => el.classList.add('is-loading'));
    });

    $(document).ajaxStop(function () {
        document.body.classList.remove('opc-loading');
        document.querySelectorAll('.opc-safe-area')
            .forEach(el => el.classList.remove('is-loading'));
    });

})(jQuery);
</script>


<?php
});

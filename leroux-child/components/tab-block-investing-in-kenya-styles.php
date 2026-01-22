<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: tab-block-investing-in-kenya-styles.php
| Purpose: Full CSS for "Investing in Kenya" tabs component
|--------------------------------------------------------------------------
*/

if (!function_exists('kn_render_investing_tabs_styles')) :

function kn_render_investing_tabs_styles() {
    ob_start(); ?>

<style>
/* ============================================================
   CORE WRAPPER — ZERO PADDING, SAFE AREA 1530PX
============================================================ */
.ik-invest-wrapper {
    width: 100%;
    padding: 0;
    margin: 0;
    background: transparent;
}

.ik-invest-safe {
    width: 100%;
    max-width: 1530px;
    margin: 0 auto;
    padding: 0;
}

/* Mobile & Tablet Left/Right Padding */
@media (max-width: 1100px) {
    .ik-invest-safe {
        padding-left: 30px;
        padding-right: 30px;
    }
}
@media (max-width: 600px) {
    .ik-invest-safe {
        padding-left: 30px;
        padding-right: 30px;
    }
}

/* ============================================================
   MAIN TITLE & RED LINE
============================================================ */
.ik-invest-header {
    margin-bottom: 24px;
}

.ik-red-line {
    width: 70px;
    height: 6px;
    background-color: #DB2129;
    margin-bottom: 18px;
}

.ik-invest-main-title-text {
    margin: 0;
    font-size: 0; /* merge inline parts */
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

/* Part 1 — PT Serif Italic Black */
.ik-title-part1 {
    font-family: "PT Serif", serif;
    font-style: italic;
    font-weight: 700;
    font-size: 36px;
    line-height: 32px;
    color: #101110;
}

/* Part 2 — DM Sans SemiBold Light Gray */
.ik-title-part2 {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 36px;
    line-height: 32px;
    color: #565A56;
}

/* ============================================================
   DESCRIPTION UNDER TITLE
============================================================ */
.ik-invest-description {
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 20px;
    line-height: 28px;
    color: #101110;
    max-width: 800px;
    margin-bottom: 50px !important;
}

/* ============================================================
   TABS
============================================================ */
.ik-invest-tabs-wrapper {
    position: relative;
    padding-bottom: 20px;
    margin-bottom: 30px;
}

.ik-invest-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 26px;
}

@media (max-width: 1400px) {
    .ik-invest-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        white-space: nowrap;
        gap: 20px;
        padding-bottom: 10px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .ik-invest-tabs::-webkit-scrollbar {
        display: none;
    }
}

.ik-invest-tab-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0 0 6px 0;
    font-family: "DM Sans", sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #565A56;
    position: relative;
    white-space: nowrap;
}

/* Active Tab */
.ik-invest-tab-btn.active {
    color: #DB2129;
}
	

.ik-invest-tab-btn.active::after {
    content: "";
    width: 100%;
    height: 3px;
    background-color: #DB2129;
    position: absolute;
    left: 0;
    bottom: -3px;
}

/* ============================================================
   TAB CONTENT SECTIONS
============================================================ */
.ik-invest-tabs-content {
    width: 100%;
}

.ik-invest-tab {
    display: none;
}

.ik-invest-tab.active {
    display: block;
}

/* ============================================================
   NUMBER BLOCK
============================================================ */
.ik-invest-number-block {
    margin-bottom: 50px;
}

/* top row: number — line — title */
.ik-invest-number-row {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 20px;
}

/* Number typography */
.ik-invest-number {
    color: #DB2129;
    font-family: "DM Sans", sans-serif;
    font-weight: 900;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0.16em;
    text-transform: uppercase;
}

/* Separator Line */
.ik-invest-number-separator {
    width: 40px;
    height: 2px;
    background-color: #000000;
}

/* Title next to number */
.ik-invest-number-title {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 28px;
    line-height: 100%;
    color: #101110;
}

/* Description under title */
.ik-invest-number-description {
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 18px;
    line-height: 26px;
    color: #101110;
    max-width: 780px;
    margin-bottom: 28px;
}

/* Button */
.ik-invest-number-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #DB2129;
    color: #FFFFFF;
    padding: 10px 18px;
    border-radius: 999px;
    font-family: "DM Sans", sans-serif;
    font-size: 14px;
    font-weight: 400;
    text-decoration: none;
    transition: 0.2s ease;
	margin-top: 30px
}

.ik-invest-number-btn:hover {
    background-color: #292A29;
	color: white
}
@media (max-width: 600px) {
.ik-invest-number-btn {
    font-size: 12px;
}
}

.ik-invest-btn-icon {
    width: 16px;
    height: 16px;
}

/* ============================================================
   SUBTITLES & BIG TITLES
============================================================ */
.ik-invest-subtitle {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 20px;
    color: #101110;
    margin: 35px 0 25px 0;
}

.ik-invest-big-title {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 28px;
    color: #101110;
    margin: 50px 0 30px 0;
}

/* ============================================================
   IMAGE GRID (ALL TABS)
============================================================ */
.ik-invest-image-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2px;
}

@media (max-width: 1100px) {
    .ik-invest-image-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .ik-invest-image-grid {
        grid-template-columns: 1fr;
		gap: 20px
    }
}

/* Image Card */
.ik-invest-img-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 100%;
    padding-bottom: 20px; /* NEW: space under text */
    background: #FFFFFF; /* NEW: match Figma */
}



.ik-invest-img-wrapper {
    width: 100%;
    height: 180px;
    background-color: #FFFFFF;
    display: flex;
    justify-content: center;
    align-items: center;
}


.ik-invest-img-wrapper img {
    max-width: 70%;
    max-height: 70%;
    object-fit: contain;
}

/* Thin Line Under Image */
.ik-invest-img-underline {
    width: 80%; /* NEW – adjust as needed (70%–85% recommended) */
    max-width: 440px; /* NEW – prevents it from becoming too long */
    height: 1px;
    background-color: #D9D9D9;
    
    margin: 12px auto; /* NEW – centers it */
    display: block;    /* ensure centering works */
}


/* Text Under Image */
	
.ik-invest-img-text {
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 16px;
    color: #101110;
    line-height: 100%;
    margin-top: 8px; /* NEW – spacing between underline and text */
    text-align: center; /* ensure centered */
	width: 90%;
}


/* ============================================================
   SINGLE IMAGE BLOCK (TAB 6)
============================================================ */
.ik-invest-single-image-wrapper {
    max-width: 420px;
    margin-top: 25px;
}
	
	
	
/* ===========================================
   FULL-WIDTH BACKGROUND (SAFE METHOD)
=========================================== */
.ik-invest-tabs-bg {
    position: relative;
    width: 100%;
    padding-top: 60px;
    padding-bottom: 60px;
    margin-top: -47px; /* active tab underline touches bg */
    z-index: 0; /* creates proper stacking context */
    background: transparent;
}

.ik-invest-tabs-bg::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100vw;
    height: 100%;
    background-color: #F2F2F2; /* your gray background */
    z-index: -1;
	border-top-left-radius: 40px;
	border-top-right-radius: 40px;
}

/* Safe area remains aligned with the top section */
.ik-invest-tabs-bg .ik-invest-safe {
    max-width: 1530px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 0;
    padding-right: 0;
}

@media (max-width: 1400px) {
.ik-invest-tabs-bg {
    margin-top: -57px; /* active tab underline touches bg */
}
}	
	
@media (max-width: 1100px) {
    .ik-invest-safe {
        padding-left: 30px;
        padding-right: 30px;
    }
}
@media (max-width: 600px) {
.ik-invest-main-title-text {
    gap: 0px;
}
}

.ik-invest-main-title-text {
    margin: 0;
    font-size: 0;
    display: flex
;
    flex-wrap: wrap;
    gap: 8px;
}
	
	
	.ik-invest-img-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.ik-invest-img-card:hover {
    cursor: pointer;
    transform: translateY(-2px);
    transition: 0.2s ease;
}

</style>

<?php
    return ob_get_clean();
}

endif;

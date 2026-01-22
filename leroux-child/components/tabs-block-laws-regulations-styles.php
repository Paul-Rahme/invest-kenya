<?php
/* ============================================================
   LAWS & REGULATIONS — UPDATED FINAL STYLESHEET
============================================================ */
?>
<style>

/* ============================================================
   WRAPPER + SAFE AREA
============================================================ */
.laws-tabs-block {
    width: 100%;
    box-sizing: border-box;
}

.laws-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
}

@media (max-width: 1024px) {
    .laws-safe-area {
        padding-left: 30px;
        padding-right: 30px;
    }
}

/* ============================================================
   RED LINE ABOVE TITLE
============================================================ */
.laws-red-line {
    width: 70px;
    height: 6px;
    background-color: #DB2129;
    margin-bottom: 24px;
}

/* ============================================================
   MAIN TITLE — UPDATED TYPOGRAPHY
============================================================ */
.laws-main-title {
    margin: 0 0 32px 0;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.laws-title-serif {
    font-family: "PT Serif", serif;
    font-weight: 700;
    font-style: italic;
    font-size: 36px;
    line-height: 56px;
    letter-spacing: 0px;
    color: #101110;
}

.laws-title-sans {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size: 36px;
    line-height: 56px;
    letter-spacing: 0px;
    color: #565A56;
}

/* Responsive title */
@media (max-width: 600px) {
    .laws-title-serif,
    .laws-title-sans {
        font-size: 28px;
        line-height: 38px;
    }
}

/* ============================================================
   TABS NAV — COLORS + TYPO UPDATED
============================================================ */
.laws-tabs-nav-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.laws-tabs-nav {
    display: flex;
    gap: 40px;
    padding: 0;
    margin: 0;
    list-style: none;
    white-space: nowrap;
}

.laws-tabs-nav li {
    font-family: "DM Sans", sans-serif;
    font-size: 16px;
    font-weight: 600;
    line-height: 100%;
    letter-spacing: 0%;
    color: #565A56;
    cursor: pointer;
    padding-bottom: 12px;
    border-bottom: 2px solid transparent;
    transition: color 0.2s ease, border-color 0.2s ease;
}

/* ACTIVE TAB */
.laws-tabs-nav li.active {
    color: #DB2129;
    border-bottom-color: transparent;
}
/* ============================================================
   TABS DIVIDER (ACTIVE INDICATOR MOVES HERE)
============================================================ */
.laws-tabs-divider {
    position: relative;
    width: 100%;
    height: 1px;
    background-color: #E5E7EB;
    margin-bottom: 32px;
}

.laws-tabs-divider-active {
    position: absolute;
    top: -1px;
    left: 0;
    height: 2px;
    width: 0;
    background-color: #DB2129;
    transition: left 0.3s ease, width 0.3s ease;
}
	
ol:not(.wp-block), ul:not(.wp-block) {
    margin: 0 0 0;
}


/* Mobile spacing fix */
@media (max-width: 840px) {
    .laws-tabs-nav {
        gap: 24px;
    }
}

/* ============================================================
   TAB PANELS
============================================================ */
.laws-tab-panel {
    display: none;
}

.laws-tab-panel.active {
    display: block;
}

/* ============================================================
   INTRO TEXT UNDER TABS — UPDATED TYPOGRAPHY
============================================================ */
.laws-tab-intro {
    font-family: "DM Sans", sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 100%;
    letter-spacing: 0%;
    color: #101110;
    margin: 0 0 24px 0;
}

/* ============================================================
   RED SECTION LABEL — UPDATED TYPO + SPACING FIXED
============================================================ */
.laws-section-label {
    font-family: "DM Sans", sans-serif;
    font-weight: 900;
    font-style: normal; /* Black weight handled via font-weight */
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0.16em; /* 16% letter spacing */
    text-transform: uppercase;
    color: #DB2129;

    /* SPACING AS PER FIGMA/Screenshot */
    margin-top: 32px;   /* more top spacing */
    margin-bottom: 24px; /* less bottom spacing */
}


/* ============================================================
   INFO GRID — 2 COLUMNS
============================================================ */
.laws-info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 40px;
}

@media (max-width: 850px) {
    .laws-info-grid {
        grid-template-columns: 1fr;
        gap: 28px;
    }
}

/* ============================================================
   INFO TITLES — SUBTITLE UPDATED TYPO
============================================================ */
.laws-info-title {
    font-family: "DM Sans", sans-serif;
    font-size: 24px;
    font-weight: 600;
    line-height: 100%;
    letter-spacing: 0%;
    color: #101110;
    margin-bottom: 8px;
}

/* ============================================================
   INFO TEXT UNDER SUBTITLE — UPDATED TYPO
============================================================ */
.laws-info-text {
    font-family: "DM Sans", sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 26px;
    letter-spacing: 0%;
    color: #101110;
}

/* ============================================================
   DIVIDER
============================================================ */
.laws-divider {
    width: 100%;
    height: 1px;
    background-color: #E5E7EB;
    margin: 40px 0;
}

/* ============================================================
   BOTTOM ROW — TEXT + BUTTON INLINE
============================================================ */
.laws-bottom-row {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 24px; /* Ensures button sits beside text */
    flex-wrap: wrap;
}

.laws-bottom-text {
    font-family: "DM Sans", sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 100%;
    letter-spacing: 0%;
    color: #101110;
    max-width: none;
}

/* Responsive stacking */
@media (max-width: 850px) {
    .laws-bottom-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
}

/* ============================================================
   CTA BUTTON — MATCH INCENTIVES EXACTLY
============================================================ */
.laws-cta-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 999px;
    background-color: #DB2129;
    color: #FFFFFF;
    text-decoration: none;
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 16px;
    line-height: 1;
    border: none;
    transition: background-color 0.2s ease;
}

.laws-cta-button:hover {
    background-color: #292A29;
}

.laws-cta-text {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 16px;
    line-height: 1;
    color: #FFFFFF;
}

.laws-cta-icon img {
    display: block;
    width: 18px;
    height: 18px;
}

	
.laws-info-text a.laws-inline-link {
    color: #DB2129 !important;
    font-weight: 400;
    text-decoration: underline !important;
    text-decoration-color: currentColor !important;
    text-underline-offset: 2px;
    text-decoration-thickness: 1px;
    transition: color 0.2s ease, text-decoration-color 0.2s ease;
}

.laws-info-text a.laws-inline-link:hover {
    color: #292A29 !important;
    text-decoration-color: currentColor !important;
}




</style>

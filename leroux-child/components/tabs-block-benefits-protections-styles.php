<?php ?>
<style>
/* ============================================================
   Root: no padding / no bg, safe area only controls width
============================================================ */
#<?php echo esc_js( $uid ); ?>.incentives-tabs-block {
    margin: 0;
    padding: 0;
    background: none;
}

#<?php echo esc_js( $uid ); ?> .incentives-safe-area {
    max-width: 1530px;
    margin: 0 auto;
    box-sizing: border-box;
}

/* ============================================================
   Red line
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-red-line {
    width: 70px;
    height: 6px;
    background-color: #DB2129;
    margin-bottom: 16px;
}

/* ============================================================
   Main title
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-main-title {
    margin: 0 0 16px 0;
    font-size: 0;
    line-height: 0;
}

#<?php echo esc_js( $uid ); ?> .incentives-title-serif {
    font-family: "PT Serif", serif;
    font-weight: 700;
    font-style: italic;
    font-size: 36px;
    line-height: 56px;
    letter-spacing: 0;
    color: #101110;
    display: inline-block;
}

#<?php echo esc_js( $uid ); ?> .incentives-title-sans {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size: 36px;
    line-height: 56px;
    letter-spacing: 0;
    color: #6B7280;
    display: inline-block;
    margin-left: 6px;
}

/* ============================================================
   Intro text under title
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-intro-text {
    margin: 0 0 32px 0;
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 20px;
    line-height: 1.0;
    letter-spacing: 0;
    color: #101110;
    max-width: 840px;
}

/* ============================================================
   Tabs navigation
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-tabs-nav-wrapper {
	position: relative;
    border-bottom: 1px solid #E5E7EB;
    margin-bottom: 24px;
}

/* Active indicator that moves */
#<?php echo esc_js( $uid ); ?> .incentives-tabs-indicator {
    position: absolute;
    bottom: -1px;
    height: 3px;
    background-color: #DB2129;
    transition: transform 0.3s ease, width 0.3s ease;
    will-change: transform, width;
}

#<?php echo esc_js( $uid ); ?> .incentives-tabs-nav {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 32px;
}

#<?php echo esc_js( $uid ); ?> .incentives-tabs-nav li {
    position: relative;
    padding: 0 0 16px 0;
    cursor: pointer;
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 16px;
    line-height: 1.0;
    letter-spacing: 0;
    color: #9CA3AF;
    white-space: nowrap;
}

#<?php echo esc_js( $uid ); ?> .incentives-tabs-nav li.active {
    color: #DB2129;
}


/* ============================================================
   Tab intro
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-tab-intro {
    margin: 0 0 24px 0;
    font-family: "DM Sans", sans-serif;
    font-weight: 400;
    font-size: 22px;
    line-height: 1.0;
    letter-spacing: 0;
    color: #101110;
}

/* ============================================================
   Red section labels
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-section-label {
    margin: 0 0 24px 0;
    font-family: "DM Sans", sans-serif;
    font-weight: 900;
    font-size: 16px;
    line-height: 1.0;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #DB2129;
}

/* ============================================================
   Info grid (What you get)
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    column-gap: 64px;
    row-gap: 40px;
    margin-bottom: 48px;
}

#<?php echo esc_js( $uid ); ?> .incentives-info-item {
    font-family: "DM Sans", sans-serif;
}

#<?php echo esc_js( $uid ); ?> .incentives-info-title {
    font-weight: 600;
    font-size: 24px;
    line-height: 1.0;
    letter-spacing: 0;
    color: #101110;
    margin-bottom: 8px;
}

#<?php echo esc_js( $uid ); ?> .incentives-info-text {
    font-weight: 400;
    font-size: 18px;
    line-height: 26px;
    letter-spacing: 0;
    color: #101110;
}

/* ============================================================
   Divider
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-divider {
    height: 1px;
    background-color: #E5E7EB;
    margin-bottom: 32px;
}

/* ============================================================
   Steps row
   IMPORTANT: Must align perfectly with incentives-info-grid
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-steps-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr)); /* SAME AS .incentives-info-grid */
    column-gap: 64px;                                /* SAME AS .incentives-info-grid */
    row-gap: 32px;
    align-items: start;
}

/* Step item: grid so long text never breaks alignment */
#<?php echo esc_js( $uid ); ?> .incentives-step-item {
    display: grid;
    grid-template-columns: 68px 1fr; /* circle + content */
    column-gap: 20px;
    align-items: start;
    min-width: 0;
}

/* Circle */
#<?php echo esc_js( $uid ); ?> .incentives-step-circle {
    width: 68px;
    height: 68px;
    border-radius: 36px;
    background-color: #565A56;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

#<?php echo esc_js( $uid ); ?> .incentives-step-circle span {
    font-family: "DM Sans", sans-serif;
    font-weight: 600;
    font-size: 24px;
    line-height: 1;
    color: #FFFFFF;
}

/* Step content */
#<?php echo esc_js( $uid ); ?> .incentives-step-content {
    font-family: "DM Sans", sans-serif;
    display: flex;
    flex-direction: column;
    min-width: 0;
}

#<?php echo esc_js( $uid ); ?> .incentives-step-title {
    font-weight: 600;
    font-size: 24px;
    line-height: 1.0;
    letter-spacing: 0;
    color: #101110;
    margin: 0 0 4px 0; /* avoid misalignment */
}

#<?php echo esc_js( $uid ); ?> .incentives-step-text {
    font-weight: 400;
    font-size: 18px;
    line-height: 26px;
    letter-spacing: 0;
    color: #101110;
    margin: 0; /* avoid misalignment */
}

/* ============================================================
   Button
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-button-wrapper {
    grid-column: 1 / -1; /* full width under the two steps */
    width: 100%;
    margin-top: 24px;
}

#<?php echo esc_js( $uid ); ?> .incentives-cta-button {
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
}

#<?php echo esc_js( $uid ); ?> .incentives-cta-button:hover {
    background-color: #292A29;
}

#<?php echo esc_js( $uid ); ?> .incentives-cta-icon img {
    display: block;
    width: 18px;
    height: 18px;
}

/* ============================================================
   Tabs content visibility
============================================================ */
#<?php echo esc_js( $uid ); ?> .incentives-tab-panel {
    display: none;
}

#<?php echo esc_js( $uid ); ?> .incentives-tab-panel.active {
    display: block;
}

/* ============================================================
   Responsive
============================================================ */
@media (max-width: 1024px) {
    #<?php echo esc_js( $uid ); ?> .incentives-info-grid {
        grid-template-columns: 1fr;
    }

    /* Steps row MUST follow same breakpoint behavior */
    #<?php echo esc_js( $uid ); ?> .incentives-steps-row {
        grid-template-columns: 1fr;
    }

    #<?php echo esc_js( $uid ); ?> .incentives-safe-area {
        padding-left: 30px !important;
        padding-right: 30px !important;
    }
}

@media (max-width: 768px) {
    #<?php echo esc_js( $uid ); ?> .incentives-tabs-nav {
        flex-wrap: wrap;
        gap: 16px;
    }

    #<?php echo esc_js( $uid ); ?> .incentives-button-wrapper {
        width: 100%;
    }

    #<?php echo esc_js( $uid ); ?> .incentives-cta-button {
        margin-top: 8px;
    }

    #<?php echo esc_js( $uid ); ?> .incentives-safe-area {
        padding-left: 30px !important;
        padding-right: 30px !important;
    }
}

/* ============================================================
   Make tabs scrollable horizontally on mobile
============================================================ */
@media (max-width: 880px) {
    #<?php echo esc_js($uid); ?> .incentives-tabs-nav-wrapper {
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    #<?php echo esc_js($uid); ?> .incentives-tabs-nav {
        display: inline-flex;
        flex-wrap: nowrap !important;
        gap: 24px;
        padding-bottom: 6px;
        min-width: max-content;
    }

    #<?php echo esc_js($uid); ?> .incentives-tabs-nav li {
        white-space: nowrap;
        flex-shrink: 0;
    }
}
</style>

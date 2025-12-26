<?php
/**
 * MEGA MENU — WORKING VERSION WITH REQUESTED STYLE UPDATES
 */

add_action('wp_footer', function() {
?>
<!-- ===============================
     MEGA MENU HTML
=============================== -->
<div id="ik-mega-root" class="ik-mega-menu">
    <div class="ik-mega-inner">

        <div class="ik-left">
            <h2 id="ik-mega-title"></h2>
        </div>

        <div class="ik-divider"></div>

        <!-- TOP BORDER + GREEN ACTIVE BAR -->
        <div class="ik-top-border"></div>
        <div id="ik-green-bar" class="ik-green-bar"></div>

        <div id="ik-right-wrapper" class="ik-right-wrapper">
            <div id="ik-mega-links" class="ik-right"></div>
        </div>

    </div>
</div>

<!-- ===============================
     CSS
=============================== -->
<style>

/* ============================================================
   ONLY ENABLE MEGA MENU AT 1485px+
============================================================ */
@media (max-width:1484px){
    #ik-mega-root { display:none !important; }
}

/* MAIN CONTAINER */
.ik-mega-menu {
    position: fixed;
    left: 0;
    right: 0;
    padding-bottom: 60px;
    background: #ffffff;
    display: none;
    z-index: 999999999;
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
    opacity: 1;
    transform: translateY(0);
}

/* OPEN ANIMATION */
.ik-mega-menu.animate-in {
    opacity: 0;
    transform: translateY(-12px);
}

.ik-mega-menu.animate-in.ik-open {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.12s ease-out, transform 0.12s ease-out;
}

/* CLOSE ANIMATION */
.ik-mega-hide {
    opacity: 0 !important;
    transform: translateY(-10px) !important;
    transition: opacity 0.12s ease-out, transform 0.12s ease-out !important;
}

/* LAYOUT */
.ik-mega-inner {
    position: relative;
    display: flex;
    align-items: flex-start;
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 20px;
}

/* LEFT SIDE */
.ik-left {
    width: 320px;
}

/* ============================================================
   TITLE — UPDATED PER REQUEST
============================================================ */
#ik-mega-title {
    font-size: 36px;                 /* reduced from 48px */
    font-family: "PT Serif", serif;  /* NEW */
    font-weight: 700;                /* NEW */
    margin: 0;
    color: #101110;                  /* NEW */
    line-height: 1.2;
}

#ik-mega-title em {
    display:block;
    font-style: normal;
    font-family: "DM Sans", sans-serif; /* NEW */
    color: #565A56;                     /* NEW */
    font-weight: 600;                   /* NEW */
    font-size: 28px;                    /* optional smaller */
}

/* DIVIDER */
.ik-divider {
    width: 1px;
    background: #E5E5E5;
    height: 240px;
    margin-left: 50px;
    margin-right: 60px;
}

/* RIGHT SIDE */
.ik-right-wrapper {
    position: absolute;
    padding-top: 20px;
}

/* ============================================================
   RIGHT LINKS — UPDATED PER REQUEST
============================================================ */
.ik-right {
    display: flex;
    flex-direction: column;
    gap: 14px;
    font-family: "DM Sans", sans-serif;   /* NEW */
}

.ik-right a {
    font-size: 20px;
    text-decoration: none;
    color: #575B59;
    font-family: "DM Sans", sans-serif;    /* NEW */
}

.ik-right a:hover {
    color: #027337;                        /* NEW */
}

/* DISABLE ORIGINAL DROPDOWNS */
@media (min-width: 1485px) {
    /* Disable original dropdown ONLY on large screens */
    .qodef-drop-down-second,
    .qodef-drop-down-second-inner {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }
}


/* HEADER HEIGHT LOCK */
.qodef-page-header-inner {
    height: 70px;
}

/* MEGA MENU POSITION */
#ik-mega-root {
    top: 70px;
}

/* HEADER OVERRIDES WHEN OPEN */
.qodef-main-header-mega-open #qodef-page-header {
    background: #ffffff !important;
}

.qodef-main-header-mega-open 
    .qodef-header-navigation > ul > li > a .qodef-menu-item-text {
    color: #000000 !important;
}

/* ============================================================
   TOP BORDER + GREEN BAR
============================================================ */
.ik-top-border {
    position: absolute;
    top: 0;
    left: 0;
    height: 1px;
    width: 100%;
    background: #E5E5E5;
}

.ik-green-bar {
    position: absolute;
    top: 0;
    height: 2px;
    width: 0;
    left: 0;
    background: #0E7A3B;
    transition: all 0.18s ease-out;
}

/* ============================================================
   DISABLE UNDERLINE WHEN MEGA OPEN
============================================================ */

/* MAIN HEADER */
.qodef-main-header-mega-open 
    #qodef-page-header-inner .qodef-header-navigation > ul > li > a .qodef-menu-item-text {
    background-image: none !important;
}

/* STICKY HEADER */
.qodef-sticky-header-mega-open 
    .qodef-header-sticky-inner .qodef-header-navigation > ul > li > a .qodef-menu-item-text {
    background-image: none !important;
}

/* RESTORE underline when CLOSED (sticky only) */
body:not(.qodef-sticky-header-mega-open)
    .qodef-header-sticky-inner .qodef-header-navigation > ul > li > a .qodef-menu-item-text {
    background-image: linear-gradient(90deg, currentColor 0, currentColor 100%) !important;
}



</style>

<!-- ===============================
     JAVASCRIPT (UNCHANGED)
=============================== -->
<script>
jQuery(function($){

    let megaHideTimer  = null;
    let megaFromSticky = false;

    const mega      = $('#ik-mega-root');
    const megaInner = $('.ik-mega-inner');
    const megaTitle = $('#ik-mega-title');
    const megaLinks = $('#ik-mega-links');
    const rightWrap = $('#ik-right-wrapper');

    /* MAIN HEADER BOTTOM */
    function getMainHeaderBottom() {
        const main = document.querySelector('#qodef-page-header');
        return main ? main.getBoundingClientRect().bottom : 100;
    }

    /* LEFT ALIGN */
    function getMegaContainerLeft() {
        const container = megaInner.offset();
        return container ? container.left : 0;
    }

    /* LOGO SWITCH DARK */
    function switchMainLogoToDark() {
        const mainLogo = $('#qodef-page-header-inner .qodef-header-logo-image.qodef--main');
        mainLogo.attr('src', 'https://beta.investkenya.go.ke/wordpress/wp-content/uploads/2025/11/logo-dark.png');
        mainLogo.css({opacity:"1",visibility:"visible",display:"inline-block"});
        $('#qodef-page-header-inner .qodef-header-logo-image.qodef--dark, #qodef-page-header-inner .qodef-header-logo-image.qodef--light')
        .css({display:"none !important",visibility:"hidden",opacity:"0"});
    }

    /* LOGO RESTORE */
    function restoreMainLogo() {
        const mainLogo = $('#qodef-page-header-inner .qodef-header-logo-image.qodef--main');
        mainLogo.attr('src', 'https://beta.investkenya.go.ke/wordpress/wp-content/uploads/2025/11/KENINVEST-LOGOS-FOOTER-LOGO-3-1.png');
        mainLogo.css({opacity:"1",visibility:"visible",display:"inline-block"});
        $('#qodef-page-header-inner .qodef-header-logo-image.qodef--dark, #qodef-page-header-inner .qodef-header-logo-image.qodef--light')
        .css({display:"none !important",visibility:"hidden",opacity:"0"});
    }

    /* SHOW MEGA */
    function showMegaMenu(parent) {

        if (window.innerWidth < 1485) return;  /* NEW: disable on small screens */

        clearTimeout(megaHideTimer);

        const label =
            parent.find('> a .qodef-menu-item-text').text().trim()
            || parent.find('> a').text().trim();

        const submenu =
            parent.find('.qodef-drop-down-second .sub-menu > li > a');

        if (submenu.length < 1) return;

        /* Detect sticky or main */
        megaFromSticky = parent.closest('.qodef-header-sticky-inner').length > 0;

        if (!megaFromSticky) {
            document.body.classList.add('qodef-main-header-mega-open');
            document.body.classList.remove('qodef-sticky-header-mega-open');
            switchMainLogoToDark();
        } else {
            document.body.classList.add('qodef-sticky-header-mega-open');
            document.body.classList.remove('qodef-main-header-mega-open');
        }

        /* Column alignment */
        const textElem = parent.find('> a .qodef-menu-item-text');
        if (textElem.length) {
            const textLeft = textElem.offset().left;
            const containerLeft = getMegaContainerLeft();
            rightWrap.css('left', (textLeft - containerLeft) + 'px');
        }

        /* GREEN BAR */
        const parentLink = parent.find('> a .qodef-menu-item-text');
        if (parentLink.length) {
            const rect = parentLink[0].getBoundingClientRect();
            const megaRect = megaInner[0].getBoundingClientRect();
            $('#ik-green-bar').css({
                left: (rect.left - megaRect.left) + 'px',
                width: rect.width + 'px'
            });
        }

        rightWrap.css('top', $('.ik-left').position().top + 'px');

        /* CONTENT BUILD */
        megaTitle.html(label + '<br><em>Explore</em>');
        megaLinks.html('');
        submenu.each(function(){
            const a = $(this);
            const text = a.find('.qodef-menu-item-text').text().trim() || a.text().trim();
            megaLinks.append('<a href="'+a.attr('href')+'">'+text+'</a>');
        });

        /* Reveal */
        mega.stop(true,true).show();
        mega.removeClass('ik-mega-hide ik-open animate-in');
        mega.addClass('animate-in');
        setTimeout(() => mega.addClass('ik-open'), 10);
    }

    /* NORMAL HIDE */
    function hideMegaMenuNormal() {
        document.body.classList.remove('qodef-main-header-mega-open');
        document.body.classList.remove('qodef-sticky-header-mega-open');
        restoreMainLogo();
        mega.removeClass('ik-open');
        setTimeout(() => {
            mega.hide();
            mega.removeClass('ik-open animate-in ik-mega-hide');
        }, 120);
    }

    /* STICKY INSTANT HIDE */
    function hideMegaFromStickyInstant() {
        mega.stop(true,true).hide();
        mega.removeClass('ik-open animate-in ik-mega-hide');
        restoreMainLogo();
        document.body.classList.remove('qodef-main-header-mega-open');
        document.body.classList.remove('qodef-sticky-header-mega-open');
    }

    /* HOVER LOGIC */
    const parentSelector =
        '#qodef-page-header-inner li.menu-item-has-children, ' +
        '.qodef-header-sticky-inner li.menu-item-has-children';

    $(document).on('mouseenter', parentSelector, function() {
        showMegaMenu($(this));
    });

    $(document).on('mouseleave', parentSelector, function() {
        megaHideTimer = setTimeout(() => {
            if (!mega.is(':hover')) hideMegaMenuNormal();
        }, 200);
    });

    mega.on('mouseenter', function(){
        clearTimeout(megaHideTimer);
    });

    mega.on('mouseleave', function(){
        megaHideTimer = setTimeout(() => hideMegaMenuNormal(), 200);
    });

    /* SCROLL LOGIC */
    $(window).on('scroll', function() {

        if (!mega.is(':visible')) return;

        if (megaFromSticky) {
            hideMegaFromStickyInstant();
        } else {
            hideMegaMenuNormal();
        }
    });

});
</script>

<?php
});
?>

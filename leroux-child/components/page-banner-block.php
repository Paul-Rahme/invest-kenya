<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: page-banner-block.php
| Shortcode: [page_banner_block]
|--------------------------------------------------------------------------
| - Zero padding, zero background
| - Parent Elementor container handles layout
| - 3 slides driven by ACF fields
| - Red line above title block, thicker progress bar
| - Updated buttons, navigation dots, 80vh height, touch/swipe
|--------------------------------------------------------------------------
*/

function shortcode_page_banner_block() {

    $uid = 'ik-page-banner-' . wp_rand(1000,9999);

    // ---------------------------------------------
    // ACF FIELDS — SLIDES DATA
    // ---------------------------------------------
    $slides = array(
        array(
            'image'              => get_field('image_first_slider'),
            'title_part_one'     => get_field('title_part_one_first_slider'),
            'title_part_two'     => get_field('title_part_two_first_slider'),
            'btn1_text'          => get_field('first_button_text_first_slider'),
            'btn1_link'          => get_field('first_button_link_first_slider'),
            'btn2_text'          => get_field('second_button_text_first_slider'),
            'btn2_link'          => get_field('second_button_link_first_slider'),
        ),
        array(
            'image'              => get_field('image_second_slider'),
            'title_part_one'     => get_field('title_part_one_second_slider'),
            'title_part_two'     => get_field('title_part_two_second_slider'),
            'btn1_text'          => get_field('first_button_text_second_slider'),
            'btn1_link'          => get_field('first_button_link_second_slider'),
            'btn2_text'          => get_field('second_button_text_second_slider'),
            'btn2_link'          => get_field('second_button_link_second_slider'),
        ),
        array(
            'image'              => get_field('image_third_slider'),
            'title_part_one'     => get_field('title_part_one_third_slider'),
            'title_part_two'     => get_field('title_part_two_third_slider'),
            'btn1_text'          => get_field('first_button_text_third_slider'),
            'btn1_link'          => get_field('first_button_link_third_slider'),
            'btn2_text'          => get_field('second_button_text_third_slider'),
            'btn2_link'          => get_field('second_button_link_third_slider'),
        ),
    );

    ob_start();
    ?>

<div class="ik-page-banner-wrapper" id="<?php echo esc_attr($uid); ?>">

    <div class="ik-page-banner-slider">

        <?php
        $slide_index = 0;
        foreach ( $slides as $slide ) :

            // Skip slide if no image and no title & no buttons – optional safety
            $has_content = $slide['image'] || $slide['title_part_one'] || $slide['title_part_two'] || $slide['btn1_text'] || $slide['btn2_text'];
            if ( ! $has_content ) {
                $slide_index++;
                continue;
            }

            $bg_image = $slide['image']
    ? esc_url( ik_upload_url( $slide['image'] ) )
    : esc_url( ik_upload_url('2025/11/5116cf19e7b6ef331af3620fd4e069ae2ec98bd0.jpg') );


            // Slide number as 01, 02, 03...
            $human_index = str_pad( (string)($slide_index + 1), 2, '0', STR_PAD_LEFT );
        ?>
        <div class="ik-banner-slide" style="background-image: url('<?php echo $bg_image; ?>');">
            <div class="ik-banner-content">

                <div class="ik-banner-redline"></div>

                <?php if ( $slide['title_part_one'] ) : ?>
                    <div class="ik-banner-title-1">
                        <?php echo esc_html( $slide['title_part_one'] ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $slide['title_part_two'] ) : ?>
                    <div class="ik-banner-title-2">
                        <?php echo esc_html( $slide['title_part_two'] ); ?>
                    </div>
                <?php endif; ?>

                <div class="ik-banner-bottom">
                    <div class="ik-banner-number"><?php echo esc_html( $human_index ); ?></div>

                    <div class="ik-banner-progress">
                        <div class="ik-banner-progress-fill"></div>
                    </div>

                    <div class="ik-banner-buttons">
                        <?php if ( $slide['btn1_text'] ) : ?>
                            <a href="<?php echo esc_url( $slide['btn1_link'] ? home_url( $slide['btn1_link'] ) : '#' ); ?>" class="ik-btn ik-btn-red">
                                <span><?php echo esc_html( $slide['btn1_text'] ); ?></span>
                                <img class="ik-btn-icon" src="<?php echo esc_url( ik_upload_url('2025/12/System-Icons-1.svg') ); ?>" alt="" />
                            </a>
                        <?php endif; ?>

                        <?php if ( $slide['btn2_text'] ) : ?>
                            <a href="<?php echo esc_url( $slide['btn2_link'] ? home_url( $slide['btn2_link'] ) : '#' ); ?>" class="ik-btn ik-btn-white">
                                <span><?php echo esc_html( $slide['btn2_text'] ); ?></span>
                                <img class="ik-btn-icon" src="<?php echo esc_url( ik_upload_url('2025/11/System-Icons-2.svg') ); ?>" alt="" />
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $slide_index++;
        endforeach;
        ?>

    </div>

    <!-- NAV DOTS -->
    <div class="ik-banner-dots"></div>

</div>


<style>
/* ---------------------------
   WRAPPER
----------------------------*/
#<?php echo $uid; ?> {
    width: 100%;
    overflow: hidden;
    position: relative;
    height: 80vh;
}

/* ---------------------------
   SLIDER
----------------------------*/
#<?php echo $uid; ?> .ik-page-banner-slider {
    display: flex;
    width: 300%;
    height: 100%;
    transition: transform 0.8s ease-in-out;
}

#<?php echo $uid; ?> .ik-banner-slide {
    width: 100vw;
    height: 80vh;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
}

/* dark overlay */
#<?php echo $uid; ?> .ik-banner-slide::before {
    content:"";
    position:absolute;
    left:0; top:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.35);
}

	#<?php echo $uid; ?> .ik-banner-slide::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;

    /* LEFT → RIGHT gradient overlay */
    background: linear-gradient(
        to right,
        rgba(0,0,0,0.45) 0%,   /* dark on left */
        rgba(0,0,0,0.25) 25%,  /* softer */
        rgba(0,0,0,0.10) 50%,  /* very soft */
        rgba(0,0,0,0) 100%     /* fade to transparent */
    );
}


/* ---------------------------
   CONTENT
----------------------------*/
#<?php echo $uid; ?> .ik-banner-content {
    position: relative;
    z-index: 2;
    color: white;
    margin-left: 80px;
    max-width: 650px;
}

/* ---------------------------
   RED LINE
----------------------------*/
#<?php echo $uid; ?> .ik-banner-redline {
    width: 86px;
    height: 6px;
    background: #DB2129;
    margin-bottom: 24px;
}

/* ---------------------------
   TITLES
----------------------------*/
#<?php echo $uid; ?> .ik-banner-title-1 {
    font-family: "PT Serif";
    font-weight: 700;
    font-style: italic;
    font-size: 42px;
    line-height: 48px;
    color: #fff;
    margin-bottom: 14px;
}

#<?php echo $uid; ?> .ik-banner-title-2 {
    font-family: "DM Sans";
    font-weight: 500;
    font-size: 28px;
    line-height: 32px;
    color: #fff;
    margin-bottom: 36px;
}

/* ---------------------------
   PROGRESS BAR (taller)
----------------------------*/
#<?php echo $uid; ?> .ik-banner-progress {
    width: 380px;
    height: 1px; /* TALLER */
    background: rgba(255,255,255,0.4);
    overflow: hidden;
    margin-bottom: 30px;
    border-radius: 4px;
}

#<?php echo $uid; ?> .ik-banner-progress-fill {
    height: 100%;
    width: 0%;
    background: #ffffff;
    transition: width linear;
}

/* ---------------------------
   BUTTONS
----------------------------*/
#<?php echo $uid; ?> .ik-banner-buttons {
    display: flex;
    gap: 16px;
}

/* Base button */
#<?php echo $uid; ?> .ik-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    border-radius: 50px;
    text-decoration: none;
    font-family: "DM Sans";
    font-weight: 400;
    font-size: 16px;
    line-height: 100%;
    transition: all 0.25s ease;
}

/* Red Button */
#<?php echo $uid; ?> .ik-btn-red {
    background: #DB2129;
    color: white;
}

#<?php echo $uid; ?> .ik-btn-red:hover {
    background: #292A29;
    color: white;
}

/* White Button */
#<?php echo $uid; ?> .ik-btn-white {
    background: #FFFFFFCF;
    color: #000;
}

#<?php echo $uid; ?> .ik-btn-white:hover {
    background: #292A29;
    color: white;
}

#<?php echo $uid; ?> .ik-btn-white:hover .ik-btn-icon {
    content: url("/beta/wp-content/uploads/2025/12/System-Icons-1.svg");
}

/* Button Icons */
#<?php echo $uid; ?> .ik-btn-icon {
    width: 20px;
    height: 20px;
}

/* ---------------------------
   NAVIGATION DOTS
----------------------------*/
#<?php echo $uid; ?> .ik-banner-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
    z-index: 10;
}

#<?php echo $uid; ?> .ik-banner-dot {
    width: 10px;
    height: 10px;
    background: #ffffff80;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.25s ease;
}

#<?php echo $uid; ?> .ik-banner-dot.active {
    background: #DB2129;
    transform: scale(1.4);
}
	
#<?php echo $uid; ?> .ik-banner-slide {
    position: absolute;
    left: 0;
    top: 0;
    width: 100vw;
    height: 80vh;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

#<?php echo $uid; ?> .ik-page-banner-slider {
    position: relative;
}


/* ---------------------------
   RESPONSIVE
----------------------------*/
@media(max-width: 768px) {
    #<?php echo $uid; ?> .ik-banner-content {
        margin-left: 20px;
        max-width: 85%;
    }

    #<?php echo $uid; ?> .ik-banner-title-1 {
        font-size: 32px;
        line-height: 38px;
    }

    #<?php echo $uid; ?> .ik-banner-title-2 {
        font-size: 20px;
        line-height: 26px;
    }

    #<?php echo $uid; ?> .ik-banner-progress {
        width: 190px;
    }

    /* Stack buttons under each other on mobile */
    #<?php echo $uid; ?> .ik-banner-buttons {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}
</style>


<script>
(function(){
    const root = document.querySelector("#<?php echo $uid; ?>");
    if (!root) return;

    const slider = root.querySelector(".ik-page-banner-slider");
    const slides = root.querySelectorAll(".ik-banner-slide");
    const progressBars = root.querySelectorAll(".ik-banner-progress-fill");
    const dotsContainer = root.querySelector(".ik-banner-dots");

    if (!slider || slides.length === 0) return;

    let index = 0;
    let duration = 8000;
    let touchStartX = 0;
    let autoplay;

    /* Create dots */
    slides.forEach((_, i) => {
        const dot = document.createElement("div");
        dot.classList.add("ik-banner-dot");
        if(i === 0) dot.classList.add("active");

        dot.addEventListener("click", () => {
            index = i;
            goToSlide(index, true); // manual
        });

        dotsContainer.appendChild(dot);
    });

    const dots = root.querySelectorAll(".ik-banner-dot");

    function activateDot(i){
        dots.forEach(d => d.classList.remove("active"));
        if (dots[i]) {
            dots[i].classList.add("active");
        }
    }

    function startAutoplay(){
        clearInterval(autoplay);
        autoplay = setInterval(() => {
            index = (index + 1) % slides.length;
            goToSlide(index, false);
        }, duration);
    }

function goToSlide(i, manual = false){

    // Fading logic
    slides.forEach((slide, idx) => {
        slide.style.opacity = idx === i ? "1" : "0";
        slide.style.zIndex = idx === i ? "2" : "1";
    });

    // Reset and restart progress bars
    progressBars.forEach(bar => {
        bar.style.transition = "none";
        bar.style.width = "0%";
    });

    setTimeout(() => {
        if (progressBars[i]) {
            progressBars[i].style.transition = `width ${duration}ms linear`;
            progressBars[i].style.width = "100%";
        }
    }, 50);

    activateDot(i);

    if (manual) startAutoplay();
}


    // Init
    goToSlide(0, false);
    startAutoplay();

    /* Touch swipe */
    root.addEventListener("touchstart", e => {
        touchStartX = e.touches[0].clientX;
    });

    root.addEventListener("touchend", e => {
        let end = e.changedTouches[0].clientX;

        if (end - touchStartX > 50) {
            index = Math.max(0, index - 1);
            goToSlide(index, true);
        } else if (touchStartX - end > 50) {
            index = Math.min(slides.length - 1, index + 1);
            goToSlide(index, true);
        }
    });

})();
</script>

<?php
    return ob_get_clean();
}

add_shortcode('page_banner_block', 'shortcode_page_banner_block');

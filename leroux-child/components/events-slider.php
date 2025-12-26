<?php
/**
 * KENYA EVENTS SLIDER
 * Shortcode: [kenya_events_slider]
 */


/* ============================================================
   DATE FORMATTER (Ymd → 8th Apr, 2027)
============================================================ */
function kenya_format_event_date($date_raw) {

    if (!$date_raw || strlen($date_raw) !== 8) return "";

    $year  = substr($date_raw, 0, 4);
    $month = substr($date_raw, 4, 2);
    $day   = substr($date_raw, 6, 2);

    $day_int   = intval($day);
    $month_int = intval($month);
    $year_int  = intval($year);

    // Short month name (Jan, Feb, Mar…)
    $month_name = date("M", mktime(0, 0, 0, $month_int, 10));

    // Ordinal suffix
    if ($day_int % 10 == 1 && $day_int != 11) $suffix = "st";
    elseif ($day_int % 10 == 2 && $day_int != 12) $suffix = "nd";
    elseif ($day_int % 10 == 3 && $day_int != 13) $suffix = "rd";
    else $suffix = "th";

    return $day_int . $suffix . " " . $month_name . ", " . $year_int;
}


/* ============================================================
   FORMAT DATE RANGE
============================================================ */
function kenya_format_event_range($start_raw, $end_raw) {

    $start = kenya_format_event_date($start_raw);
    $end   = kenya_format_event_date($end_raw);

    if (!$start && !$end) return "";
    if ($start && !$end)  return $start;
    if (!$start && $end)  return $end;

    if ($start_raw === $end_raw) return $start;

    $sm = substr($start_raw, 4, 2);
    $em = substr($end_raw,   4, 2);
    $sy = substr($start_raw, 0, 4);
    $ey = substr($end_raw,   0, 4);

    $sd = intval(substr($start_raw, 6, 2));
    $ed = intval(substr($end_raw,   6, 2));

    // Ordinal suffix helper
    $suffix = function($day) {
        if ($day % 10 == 1 && $day != 11) return "st";
        if ($day % 10 == 2 && $day != 12) return "nd";
        if ($day % 10 == 3 && $day != 13) return "rd";
        return "th";
    };

    $sd_f = $sd . $suffix($sd);
    $ed_f = $ed . $suffix($ed);

    $sm_name = date("M", mktime(0,0,0,intval($sm),10));
    $em_name = date("M", mktime(0,0,0,intval($em),10));

    // Same month + year
    if ($sy === $ey && $sm === $em) {
        return $sd_f . "–" . $ed_f . " " . $sm_name . ", " . $sy;
    }

    return $start . " – " . $end;
}



/* ============================================================
   MAIN RENDER FUNCTION
============================================================ */
function kenya_events_slider_render() {

    /* ------------------------------------------------------------
       1) COLLECT ALL POSTS THAT HAVE display_in_slider = "Yes"
    ------------------------------------------------------------ */
    $valid_posts = [];

    $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'events'
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $display = get_post_meta(get_the_ID(), 'display_in_slider', true);

            if (is_array($display)) {
                $display = implode('', $display);
            }

            if (strtolower(trim($display)) === "yes") {
                $valid_posts[] = get_the_ID();
            }
        }
    }

    wp_reset_postdata();

    $events_found = count($valid_posts);

    /* ------------------------------------------------------------
       2) IF NO EVENTS → RETURN EMPTY STRING (SAFE FOR ELEMENTOR)
    ------------------------------------------------------------ */
    if ($events_found === 0) {
        return "";  // ⭐ THIS IS NOW SAFE
    }


    /* ------------------------------------------------------------
       3) START OUTPUT BUFFER
    ------------------------------------------------------------ */
    ob_start();
    ?>

<div class="kenya-event-slider">

<?php
/* ------------------------------------------------------------
   4) RENDER ONLY VALID POSTS
------------------------------------------------------------ */
foreach ($valid_posts as $index => $post_id):

    $image = get_the_post_thumbnail_url($post_id, 'large');
    if (!$image) {
        $image = ik_upload_url( '2025/11/placeholder-event.jpg' );
    }

    $location   = get_post_meta($post_id, 'location', true);
    $start_raw  = get_post_meta($post_id, 'start_date', true);
    $end_raw    = get_post_meta($post_id, 'end_date', true);
    $date_range = kenya_format_event_range($start_raw, $end_raw);

?>
    <div class="ev-slide <?php echo ($index === 0) ? 'active' : ''; ?>">

        <div class="event-featured">

            <!-- IMAGE -->
            <div class="event-featured-image">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </div>

            <!-- RIGHT SIDE CONTENT -->
            <div class="event-featured-content">

                <div class="event-meta">

                    <span class="event-meta-item">
                        <img src="<?php echo esc_url( ik_upload_url( '2025/11/Map_Pin.svg' ) ); ?>"
                             class="event-meta-icon">
                        <?php echo esc_html($location); ?>
                    </span>

                    <?php if ($location && $date_range): ?>
                        <span class="event-separator"></span>
                    <?php endif; ?>

                    <span class="event-meta-item">
                        <img src="<?php echo esc_url( ik_upload_url( '2025/11/calendar-blank-light-1.svg' ) ); ?>"
                             class="event-meta-icon">
                        <?php echo esc_html($date_range); ?>
                    </span>

                </div>

                <h2 class="event-title"><?php echo esc_html(get_the_title($post_id)); ?></h2>

                <p class="event-desc">
                    <?php echo esc_html(get_the_excerpt($post_id)); ?>
                </p>

                <!-- READ MORE -->
                <div class="ev-readmore-wrapper">
                    <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="kns-readmore">
                        Read more
<span class="kns-arrow-wrapper">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>" class="kns-arrow default-arrow">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>" class="kns-arrow hover-arrow">
</span>

                    </a>
                </div>

                <!-- ARROWS (ONLY IF MORE THAN 1 EVENT) -->
                <?php if ($events_found > 1): ?>
                <div class="ev-nav-bottom">
                    <button class="ev-prev">
                        <img src="<?php echo esc_url( ik_upload_url( '2025/11/arrow-left.svg' ) ); ?>" alt="">
                    </button>
                    <button class="ev-next">
                        <img src="<?php echo esc_url( ik_upload_url( '2025/11/arrow-right.svg' ) ); ?>" alt="">
                    </button>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php endforeach; ?>

</div><!-- kenya-event-slider -->

<?php
return ob_get_clean();
}



/* ============================================================
   JAVASCRIPT — SLIDER LOGIC
============================================================ */
add_action('wp_footer', function() { ?>
<script>
document.addEventListener("DOMContentLoaded", () => {

    const slider = document.querySelector(".kenya-event-slider");
    if (!slider) return;

    const slides = slider.querySelectorAll(".ev-slide");
    const prevBtns = slider.querySelectorAll(".ev-prev");
    const nextBtns = slider.querySelectorAll(".ev-next");

    let current = 0;

    function showSlide(i) {
        slides.forEach(s => {
            s.classList.remove("active");
            s.style.display = "none";
        });

        slides[i].style.display = "block";

        requestAnimationFrame(() => {
            slides[i].classList.add("active");
        });
    }

    showSlide(current);

    prevBtns.forEach(btn =>
        btn.addEventListener("click", () => {
            current = (current - 1 + slides.length) % slides.length;
            showSlide(current);
        })
    );

    nextBtns.forEach(btn =>
        btn.addEventListener("click", () => {
            current = (current + 1) % slides.length;
            showSlide(current);
        })
    );

});
</script>
<?php });

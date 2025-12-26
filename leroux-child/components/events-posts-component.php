<?php 
/* ============================================================
   DATE FORMATTER (Ymd → 8th Nov, 2027)
============================================================ */
if ( ! function_exists('kenya_format_event_date') ) {

    function kenya_format_event_date($date_raw) {

        if (!$date_raw || strlen($date_raw) !== 8) return "";

        $year  = substr($date_raw, 0, 4);
        $month = substr($date_raw, 4, 2);
        $day   = substr($date_raw, 6, 2);

        $day_int   = intval($day);
        $month_int = intval($month);
        $year_int  = intval($year);

        // *** SHORT MONTH NAMES (Nov, Dec, Jan) ***
        $month_name = date("M", mktime(0, 0, 0, $month_int, 10));

        // Ordinal suffix
        if ($day_int % 10 == 1 && $day_int != 11)      $suffix = "st";
        else if ($day_int % 10 == 2 && $day_int != 12) $suffix = "nd";
        else if ($day_int % 10 == 3 && $day_int != 13) $suffix = "rd";
        else                                            $suffix = "th";

        return $day_int . $suffix . " " . $month_name . ", " . $year_int;
    }
}


/* ============================================================
   DATE RANGE FORMATTER
============================================================ */
if ( ! function_exists('kenya_format_event_range') ) {

    function kenya_format_event_range($start_raw, $end_raw) {

        $start = kenya_format_event_date($start_raw);
        $end   = kenya_format_event_date($end_raw);

        if (!$start && !$end) return "";
        if ($start && !$end)  return $start;
        if (!$start && $end)  return $end;

        // Same exact day
        if ($start_raw === $end_raw) return $start;

        // Same month + year → 8th–12th Nov, 2027
        $start_month = substr($start_raw, 4, 2);
        $end_month   = substr($end_raw, 4, 2);
        $start_year  = substr($start_raw, 0, 4);
        $end_year    = substr($end_raw, 0, 4);

        if ($start_month === $end_month && $start_year === $end_year) {

            $start_day = intval(substr($start_raw, 6, 2));

            if ($start_day % 10 == 1 && $start_day != 11)      $suffix = "st";
            else if ($start_day % 10 == 2 && $start_day != 12) $suffix = "nd";
            else if ($start_day % 10 == 3 && $start_day != 13) $suffix = "rd";
            else                                                $suffix = "th";

            $start_formatted = $start_day . $suffix;
            $end_only        = kenya_format_event_date($end_raw);

            return $start_formatted . "–" . $end_only;
        }

        return $start . " – " . $end;
    }
}


/* ============================================================
   DETECT CUSTOM QUERY + MODE
============================================================ */
$custom_query = get_query_var('epc_custom_query');
$epc_mode     = get_query_var('epc_mode'); // normal OR row

if ($custom_query && is_array($custom_query)) {

    $events_query = new WP_Query($custom_query);

} else {

    // Default (first 9 events)
    $events_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 9,
        'category_name'  => 'events',
    ]);
}
?>


<?php if ($epc_mode === 'row'): ?>

    <div class="epc-row-grid">

<?php else: ?>

    <div class="epc-safe-area">
        <div class="epc-grid" id="epc-grid">

<?php endif; ?>


<?php if ($events_query->have_posts()): ?>
    <?php while ($events_query->have_posts()): $events_query->the_post(); ?>

        <?php
            $location   = get_post_meta(get_the_ID(), 'location', true);
            $start_raw  = get_post_meta(get_the_ID(), 'start_date', true);
            $end_raw    = get_post_meta(get_the_ID(), 'end_date', true);
            $date_range = kenya_format_event_range($start_raw, $end_raw);
        ?>

        <div class="epc-card">

            <div class="epc-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>">
                </a>
            </div>

            <div class="epc-meta">

                <?php if ($location): ?>
                    <span class="epc-location">
                        <img class="epc-icon" src="<?php echo esc_url( ik_upload_url( '2025/11/Map_Pin.svg' ) ); ?>" alt="Location">
                        <?php echo esc_html($location); ?>
                    </span>
                <?php endif; ?>

                <?php if ($location && $date_range): ?>
                    <span class="epc-separator-vertical"></span>
                <?php endif; ?>

                <?php if ($date_range): ?>
                    <span class="epc-date">
                        <img class="epc-icon" src="<?php echo esc_url( ik_upload_url( '2025/11/calendar-blank-light-1.svg' ) ); ?>" alt="Date">
                        <?php echo esc_html($date_range); ?>
                    </span>
                <?php endif; ?>

            </div>

            <div class="epc-meta-divider"></div>

            <div class="epc-content">
                <h3 class="epc-title"><?php the_title(); ?></h3>

                <p class="epc-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>
            </div>

            <a class="epc-readmore" href="<?php the_permalink(); ?>">
                Read more
<span class="epc-arrow-wrapper">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>" class="epc-arrow default-arrow">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>" class="epc-arrow hover-arrow">
</span>

            </a>

        </div>

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<?php if ($epc_mode === 'row'): ?>

    </div><!-- .epc-row-grid -->

<?php else: ?>

        </div><!-- .epc-grid -->
    </div><!-- .epc-safe-area -->

<?php endif; ?>

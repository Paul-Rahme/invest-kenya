<?php
/**
 * KENYA NEWS SLIDER
 * Shortcode: [kenya_news_slider]
 *
 * File: /leroux-child/components/news-slider.php
 */

/* ============================================================
   SHORTCODE
============================================================ */
add_shortcode('kenya_news_slider', 'kenya_news_slider_render');


/* ============================================================
   MAIN RENDER FUNCTION
============================================================ */
function kenya_news_slider_render() {

    /* ------------------------------------------------------------
       1) COLLECT ALL POSTS THAT HAVE display_in_slider = "Yes"
          (category: news)
    ------------------------------------------------------------ */
    $valid_posts = [];

    $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'news'
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

    $news_found = count($valid_posts);

    /* ------------------------------------------------------------
       2) IF NO NEWS → RETURN EMPTY STRING (SAFE FOR ELEMENTOR)
    ------------------------------------------------------------ */
    if ($news_found === 0) {
        return "";  // safe
    }

    /* ------------------------------------------------------------
       3) START OUTPUT BUFFER
    ------------------------------------------------------------ */
    ob_start();
    ?>

<div class="kenya-news-slider">

    <?php foreach ($valid_posts as $index => $post_id):

        // FEATURED IMAGE
        $image = get_the_post_thumbnail_url($post_id, 'large');
        if (!$image) {
            // TODO: adjust to your own placeholder if needed
            $image = ik_upload_url( '2025/11/placeholder-news.jpg' );
        }

        // TAGS
        $tags = get_the_tags($post_id);

        // PUBLISHED DATE (FORMAT C: 8 November, 2025)
        $published_date = get_the_date('j F, Y', $post_id);

    ?>
        <div class="kns-slide-news <?php echo ($index === 0) ? 'active' : ''; ?>">

            <div class="news-featured">

                <!-- LEFT COLUMN — IMAGE -->
                <div class="news-featured-image">
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>

                <!-- RIGHT COLUMN — CONTENT -->
                <div class="news-featured-content">

                    <!-- TAG CHIPS (REPLACES LOCATION + DATE RANGE) -->
                    <?php if ($tags && !is_wp_error($tags)): ?>
                        <div class="news-tags">
                            <?php foreach ($tags as $tag): ?>
                                <span class="news-tag-chip">
                                    <?php echo esc_html($tag->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- PUBLISHED DATE UNDER CHIPS -->
                    <div class="news-meta-date">
                        <?php echo esc_html($published_date); ?>
                    </div>

                    <!-- TITLE -->
                    <h2 class="news-title">
                        <?php echo esc_html(get_the_title($post_id)); ?>
                    </h2>

                    <!-- DESCRIPTION / EXCERPT -->
                    <p class="news-desc">
                        <?php echo esc_html(get_the_excerpt($post_id)); ?>
                    </p>

                    <!-- READ MORE -->
                    <div class="news-readmore-wrapper">
                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="kns-readmore-news">
                            Read more
                            <span class="kns-arrow-wrapper-news">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
     class="kns-arrow-news default-arrow-news" alt="">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
     class="kns-arrow-news hover-arrow-news" alt="">

                            </span>
                        </a>
                    </div>

                    <!-- ARROWS (ONLY IF MORE THAN 1 NEWS POST) -->
                    <?php if ($news_found > 1): ?>
                        <div class="news-nav-bottom">
                            <button class="news-prev">
                                <img src="<?php echo esc_url( ik_upload_url( '2025/11/arrow-left.svg' ) ); ?>" alt="">
                            </button>
                            <button class="news-next">
                                <img src="<?php echo esc_url( ik_upload_url( '2025/11/arrow-right.svg' ) ); ?>" alt="">
                            </button>
                        </div>
                    <?php endif; ?>

                </div><!-- .news-featured-content -->
            </div><!-- .news-featured -->

        </div><!-- .kns-slide-news -->
    <?php endforeach; ?>

</div><!-- .kenya-news-slider -->

<?php
    return ob_get_clean();
}


/* ============================================================
   JAVASCRIPT — SLIDER LOGIC (NEWS)
============================================================ */
add_action('wp_footer', function() { ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".kenya-news-slider");
    if (!slider) return;

    const slides   = slider.querySelectorAll(".kns-slide-news");
    const prevBtns = slider.querySelectorAll(".news-prev");
    const nextBtns = slider.querySelectorAll(".news-next");

    if (!slides.length) return;

    let current = 0;

    function showNewsSlide(index) {
        slides.forEach(function (slide) {
            slide.classList.remove("active");
            slide.style.display = "none";
        });

        slides[index].style.display = "block";

        requestAnimationFrame(function () {
            slides[index].classList.add("active");
        });
    }

    showNewsSlide(current);

    prevBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            current = (current - 1 + slides.length) % slides.length;
            showNewsSlide(current);
        });
    });

    nextBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            current = (current + 1) % slides.length;
            showNewsSlide(current);
        });
    });
});
</script>
<?php });

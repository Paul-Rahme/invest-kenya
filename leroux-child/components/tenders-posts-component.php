<?php
$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'category_name'  => 'tenders',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<div class="tpc-safe-area">

<?php if ($query->have_posts()) : ?>

    <!-- GRID ONLY EXISTS WHEN THERE ARE POSTS -->
    <div class="tpc-grid">

        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <?php
            $download_raw = get_post_meta(get_the_ID(), 'download_url', true);
            $download_url = $download_raw ? esc_url(ik_upload_url($download_raw)) : '';
            ?>

            <div class="tpc-card">
                <h3 class="tpc-title"><?php the_title(); ?></h3>

                <p class="tpc-desc">
                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                </p>

                <div class="tpc-separator"></div>

                <?php if ($download_url): ?>
                    <a class="tpc-download-btn"
                       href="<?php echo esc_url($download_url); ?>"
                       target="_blank"
                       rel="noopener noreferrer">
                        Download
                        <img src="<?php echo esc_url(ik_upload_url('2025/11/System-Icons-5.svg')); ?>"
                             class="tpc-download-icon"
                             alt="">
                    </a>
                <?php endif; ?>
            </div>

        <?php endwhile; wp_reset_postdata(); ?>

    </div><!-- .tpc-grid -->

<?php else : ?>

    <!-- FULL-WIDTH FALLBACK (NOT A GRID ITEM) -->
    <div class="tpc-no-data-wrapper">
        <div class="ik-no-data-block">

            <img 
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/Frame-427318857.svg"
                alt=""
                class="ik-no-data-icon"
            />

            <h2 class="ik-no-data-title">No tenders available</h2>

            <p class="ik-no-data-text">
                Please check back soon.
            </p>

            <a href="<?php echo esc_url( home_url( '/investment-opportunities/' ) ); ?>" class="ik-no-data-btn">
                Browse investment opportunities
                <img 
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/System-Icons-1.svg"
                    class="ik-btn-icon"
                    alt=""
                />
            </a>

        </div>
    </div>

<?php endif; ?>

</div><!-- .tpc-safe-area -->

<script>
document.addEventListener("DOMContentLoaded", function () {

    const grid = document.querySelector('.tpc-grid');
    if (!grid) return;

    const cards = grid.querySelectorAll('.tpc-card');
    if (!cards.length) return;

    function equalize() {
        // Reset
        cards.forEach(card => {
            card.style.height = 'auto';
        });

        // Measure
        let maxHeight = 0;
        cards.forEach(card => {
            maxHeight = Math.max(maxHeight, card.offsetHeight);
        });

        // Apply
        cards.forEach(card => {
            card.style.height = maxHeight + 'px';
        });
    }

    // Initial
    equalize();

    // Observe REAL layout changes (this is the key)
    const resizeObserver = new ResizeObserver(() => {
        equalize();
    });

    resizeObserver.observe(grid);

    // Fonts still matter
    if (document.fonts) {
        document.fonts.ready.then(equalize);
    }
});


</script>

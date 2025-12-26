<?php
/**
 * GOVERNANCE POSTS COMPONENT
 * File: /leroux-child/components/governance-posts-component.php
 *
 * Completely independent from Resources component.
 * Uses its own query vars and classes (gpc_*).
 */

/* ============================================================
   DETECT CUSTOM QUERY + MODE
============================================================ */
$gpc_custom_query = get_query_var('gpc_custom_query'); // gpc = governance posts component
$gpc_mode         = get_query_var('gpc_mode');         // 'row' OR default grid

if ($gpc_custom_query && is_array($gpc_custom_query)) {
    $governance_query = new WP_Query($gpc_custom_query);
} else {
    // Fallback: first 8 posts in Board Members category (adjust slug if needed)
    $governance_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'board-members', // <-- change to your actual slug if different
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}
?>

<?php if ($gpc_mode === 'row'): ?>
    <div class="gpc-row-grid">
<?php else: ?>
    <div class="gpc-safe-area">
        <div class="gpc-grid" id="gpc-grid">
<?php endif; ?>


<?php if ($governance_query->have_posts()): ?>
    <?php while ($governance_query->have_posts()): $governance_query->the_post(); ?>

        <?php
        // Job position from meta
        $gpc_job_position = get_post_meta(get_the_ID(), 'job_position', true);
        ?>

        <div class="gpc-card">

            <!-- IMAGE -->
            <div class="gpc-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>"
                         alt="<?php the_title_attribute(); ?>">
                </a>
            </div>

            <!-- TITLE -->
			<div class="gpc-content-wrap">
            <h3 class="gpc-title"><?php the_title(); ?></h3>

            <!-- JOB POSITION (IF AVAILABLE) -->
            <?php if (!empty($gpc_job_position)) : ?>
                <div class="gpc-job">
                    <img src="<?php echo esc_url( ik_upload_url( '2025/11/handbag.svg' ) ); ?>"
                         class="gpc-job-icon"
                         alt="Position">
                    <span class="gpc-job-text">
                        <?php echo esc_html($gpc_job_position); ?>
                    </span>
                </div>
            <?php endif; ?>
			</div>

            <!-- ACTIONS: READ BIOGRAPHY -->
            <div class="gpc-actions">

                <a class="gpc-readmore" href="<?php the_permalink(); ?>">
                    Read biography
<span class="gpc-arrow-wrapper">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
         class="gpc-arrow gpc-arrow-default"
         alt="Arrow">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
         class="gpc-arrow gpc-arrow-hover"
         alt="Arrow">
</span>

                </a>

            </div><!-- .gpc-actions -->

        </div><!-- .gpc-card -->

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<?php if ($gpc_mode === 'row'): ?>
    </div><!-- .gpc-row-grid -->
<?php else: ?>
        </div><!-- .gpc-grid -->
    </div><!-- .gpc-safe-area -->
<?php endif; ?>

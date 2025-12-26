<?php
/**
 * RESOURCES POSTS COMPONENT
 * File: /leroux-child/components/resources-posts-component.php
 *
 * Completely independent from News component.
 * Uses its own query vars and classes (rpc_*).
 */

/* ============================================================
   DETECT CUSTOM QUERY + MODE
============================================================ */
$rpc_custom_query = get_query_var('rpc_custom_query'); // rpc = resources posts component
$rpc_mode         = get_query_var('rpc_mode');         // normal OR row

if ($rpc_custom_query && is_array($rpc_custom_query)) {
    $resources_query = new WP_Query($rpc_custom_query);
} else {
    // Default: first 8 resources posts (2 rows x 4 columns)
    $resources_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'resources',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}
?>

<?php if ($rpc_mode === 'row'): ?>
    <div class="rpc-row-grid">
<?php else: ?>
    <div class="rpc-safe-area">
        <div class="rpc-grid" id="rpc-grid">
<?php endif; ?>


<?php if ($resources_query->have_posts()): ?>
    <?php while ($resources_query->have_posts()): $resources_query->the_post(); ?>

        <?php
// Download URL from ACF text field
$rpc_download_raw = get_post_meta(get_the_ID(), 'download_url', true);
$rpc_download_url = '';

if (!empty($rpc_download_raw)) {
    $rpc_download_url = esc_url( ik_upload_url( $rpc_download_raw ) );
}


        ?>

        <div class="rpc-card">

            <!-- IMAGE -->
            <div class="rpc-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>"
                         alt="<?php the_title_attribute(); ?>">
                </a>
            </div>

            <!-- TITLE -->
			<div class="resource-content-wrapper">
            <h3 class="rpc-title"><?php the_title(); ?></h3>
			</div>
            <!-- ACTIONS: DOWNLOAD + READ MORE -->
            <div class="rpc-actions">

                <?php if (!empty($rpc_download_url)) : ?>
                    <a class="rpc-download-btn"
                       href="<?php echo esc_url($rpc_download_url); ?>"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span>Download</span>
                        <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-5.svg' ) ); ?>"
                             class="rpc-download-icon"
                             alt="Download">
                    </a>
                <?php endif; ?>

                <a class="rpc-readmore" href="<?php the_permalink(); ?>">
                    Read more
                    <span class="rpc-arrow-wrapper">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
     class="rpc-arrow rpc-arrow-default"
     alt="Arrow">
<img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
     class="rpc-arrow rpc-arrow-hover"
     alt="Arrow">

                    </span>
                </a>

            </div><!-- .rpc-actions -->

        </div><!-- .rpc-card -->

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<?php if ($rpc_mode === 'row'): ?>
    </div><!-- .rpc-row-grid -->
<?php else: ?>
        </div><!-- .rpc-grid -->
    </div><!-- .rpc-safe-area -->
<?php endif; ?>

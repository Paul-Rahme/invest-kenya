<?php
/**
 * OPPORTUNITIES POSTS COMPONENT
 */

$opc_custom_query = get_query_var('opc_custom_query');
$opc_mode         = get_query_var('opc_mode');

if ($opc_custom_query && is_array($opc_custom_query)) {
    $opportunities_query = new WP_Query($opc_custom_query);
} else {
    $opportunities_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'opportunities',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}

// =======================================
// HIDE ROW GRID IF NO RESULTS
// =======================================
$opc_has_results = $opportunities_query->have_posts();
$opportunities_query->rewind_posts();

if ($opc_mode === 'row' && !$opc_has_results) {
    echo '<style>
        .opportunities-row {
            display: none !important;
        }
    </style>';
}

if ($opc_mode === 'row' && !$opc_has_results) {
    return;
}
?>

<?php if ($opc_mode === 'row'): ?>
    <div class="opc-row-grid <?php echo $opc_has_results ? 'has-results' : 'no-results'; ?>">
<?php else: ?>
    <div class="opc-safe-area">
        <div class="opc-grid">
<?php endif; ?>

<?php if ($opportunities_query->have_posts()): ?>
    <?php while ($opportunities_query->have_posts()): $opportunities_query->the_post(); ?>

        <?php
        $opc_tags = get_the_tags();

        $investment_amount = get_post_meta(get_the_ID(), 'investment_ammount', true);
        $project_stage     = get_post_meta(get_the_ID(), 'project_stage', true);
        $county            = get_post_meta(get_the_ID(), 'county', true);
        ?>

        <div class="opc-card">

            <div class="opc-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                         alt="<?php the_title_attribute(); ?>">
                </a>
            </div>

            <div class="opc-content">

                <!-- TAGS -->
                <?php if ($opc_tags): ?>
                    <div class="opc-tags">
                        <?php foreach ($opc_tags as $tag): ?>
                            <span class="opc-tag-chip"><?php echo esc_html($tag->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- META ROW -->
                <div class="opc-meta-row">
    <?php if (!empty($investment_amount)): ?>
        <div class="opc-meta-item">
            <img src="<?php echo esc_url( ik_upload_url( '2025/12/money-square.svg' ) ); ?>" alt="">
            <span class="opc-meta-text"><?php echo esc_html($investment_amount); ?></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($project_stage)): ?>
        <div class="opc-meta-item">
            <img src="<?php echo esc_url( ik_upload_url( '2025/12/light-bulb.svg' ) ); ?>" alt="">
            <span class="opc-meta-text"><?php echo esc_html($project_stage); ?></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($county)): ?>
        <div class="opc-meta-item">
            <img src="<?php echo esc_url( ik_upload_url( '2025/12/Map_Pin.svg' ) ); ?>" alt="">
            <span class="opc-meta-text"><?php echo esc_html($county); ?></span>
        </div>
    <?php endif; ?>
</div>


                <h3 class="opc-title"><?php the_title(); ?></h3>

                <p class="opc-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>

            </div>

            <a class="opc-readmore" href="<?php the_permalink(); ?>">
                Read more
<span class="opc-arrow-wrapper">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
         class="opc-arrow opc-arrow-default" alt="">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
         class="opc-arrow opc-arrow-hover" alt="">
</span>

            </a>

        </div>

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>

<?php if ($opc_mode === 'row'): ?>
    </div>
<?php else: ?>
        </div>
    </div>
<?php endif; ?>

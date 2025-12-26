<?php
/**
 * NEWS POSTS COMPONENT
 * File: /leroux-child/components/news-posts-component.php
 *
 * Independent from Events component.
 * Uses its own query vars and classes.
 */

/* ============================================================
   DETECT CUSTOM QUERY + MODE
============================================================ */
$npc_custom_query = get_query_var('npc_custom_query'); // npc = news posts component
$npc_mode         = get_query_var('npc_mode');         // normal OR row

if ($npc_custom_query && is_array($npc_custom_query)) {
    $news_query = new WP_Query($npc_custom_query);
} else {
    // Default: first 9 news posts
    $news_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'news',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}
?>

<?php if ($npc_mode === 'row'): ?>
    <div class="npc-row-grid">
<?php else: ?>
    <div class="npc-safe-area">
        <div class="npc-grid" id="npc-grid">
<?php endif; ?>


<?php if ($news_query->have_posts()): ?>
    <?php while ($news_query->have_posts()): $news_query->the_post(); ?>

        <?php
        // Get tags for chips
        $npc_tags = get_the_tags();

        // Post date in format: "November 23, 2025"
        $npc_date = get_the_date('F j, Y');
        ?>

        <div class="npc-card">

            <!-- IMAGE -->
            <div class="npc-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>" alt="<?php the_title_attribute(); ?>">
                </a>
            </div>

            <!-- TAG CHIPS -->
			<div class="npc-content">
            <?php if ($npc_tags && ! is_wp_error($npc_tags)): ?>
                <div class="npc-tags">
                    <?php foreach ($npc_tags as $tag): ?>
                        <span class="npc-tag-chip">
                            <?php echo esc_html($tag->name); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- POST DATE -->
            <?php if (!empty($npc_date)): ?>
                <div class="npc-date">
                    <?php echo esc_html($npc_date); ?>
                </div>
            <?php endif; ?>

            <!-- TITLE -->
            <h3 class="npc-title"><?php the_title(); ?></h3>

            <!-- EXCERPT -->
            <p class="npc-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
            </p>
			</div>
            <!-- READ MORE WITH ARROWS -->
            <a class="npc-readmore" href="<?php the_permalink(); ?>">
                Read more
<span class="npc-arrow-wrapper">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-1-1.svg' ) ); ?>"
         class="npc-arrow npc-arrow-default"
         alt="Arrow">
    <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-2.svg' ) ); ?>"
         class="npc-arrow npc-arrow-hover"
         alt="Arrow">
</span>

            </a>

        </div><!-- .npc-card -->

    <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<?php if ($npc_mode === 'row'): ?>
    </div><!-- .npc-row-grid -->
<?php else: ?>
        </div><!-- .npc-grid -->
    </div><!-- .npc-safe-area -->
<?php endif; ?>

<?php
/**
 * NEWS FILTERS SHORTCODE + ASSETS + AJAX
 * File: /leroux-child/components/news-filters-shortcodes.php
 *
 * Remember to require this file in functions.php:
 * require_once get_stylesheet_directory() . '/components/news-filters-shortcodes.php';
 */

/* ============================================================
   SHORTCODE — [kenya_news_filters]
============================================================ */
function kenya_news_filters_shortcode() {

    // Collect all tags from published NEWS posts
    $news_posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'news',
        'fields'         => 'ids',
    ]);

    $tag_ids = [];

    foreach ($news_posts as $post_id) {
        $post_tags = wp_get_post_tags($post_id);
        if (!empty($post_tags) && !is_wp_error($post_tags)) {
            foreach ($post_tags as $tag) {
                $tag_ids[] = $tag->term_id;
            }
        }
    }

    $tag_ids   = array_unique($tag_ids);
    $news_tags = !empty($tag_ids)
        ? get_terms([
            'taxonomy'   => 'post_tag',
            'include'    => $tag_ids,
            'hide_empty' => true,
        ])
        : [];

    ob_start();
    include get_stylesheet_directory() . '/components/news-filters.php';
    return ob_get_clean();
}
add_shortcode('kenya_news_filters', 'kenya_news_filters_shortcode');


/* ============================================================
   ENQUEUE FILTERS CSS + FLATPICKR
============================================================ */
function kenya_news_filters_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'news-filters-css',
        $base_uri . 'news-filters.css',
        [],
        filemtime($base_dir . 'news-filters.css')
    );

    // Flatpickr (assuming handles are registered like for Events)
    wp_enqueue_style('flatpickr');
    wp_enqueue_script('flatpickr');
}
add_action('wp_enqueue_scripts', 'kenya_news_filters_assets');


/* ============================================================
   AJAX HANDLER — FILTER NEWS GRID
============================================================ */
function kenya_filter_news_ajax() {

    $topic = isset($_POST['topic']) ? sanitize_text_field($_POST['topic']) : '';
    $date  = isset($_POST['date'])  ? sanitize_text_field($_POST['date'])  : '';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 9,
        'category_name'  => 'news',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    // Filter by tag (topic)
    if (!empty($topic)) {
        $args['tag'] = $topic;
    }

    // Filter by date (post date)
    if (!empty($date)) {
        $timestamp = strtotime($date);
        if ($timestamp) {
            $args['date_query'] = [[
                'year'  => (int) date('Y', $timestamp),
                'month' => (int) date('m', $timestamp),
                'day'   => (int) date('d', $timestamp),
            ]];
        }
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        ob_start();

        while ($query->have_posts()) {
            $query->the_post();

            // Same logic as in news-posts-component.php
            $npc_tags = get_the_tags();
            $npc_date = get_the_date('F j, Y');
            ?>

            <div class="npc-card">

                <!-- IMAGE -->
                <div class="npc-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>"
                             alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>

                <div class="npc-content">
                    <!-- TAG CHIPS -->
                    <?php if ($npc_tags && !is_wp_error($npc_tags)) : ?>
                        <div class="npc-tags">
                            <?php foreach ($npc_tags as $tag) : ?>
                                <span class="npc-tag-chip">
                                    <?php echo esc_html($tag->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- POST DATE -->
                    <?php if (!empty($npc_date)) : ?>
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

            </div>

            <?php
        }

        wp_reset_postdata();

        echo ob_get_clean();

    } else {
        // Simple "no results" state — you can style with .npc-no-results if you want
        echo '<div class="npc-no-results"><p>No news found matching your filters.</p></div>';
    }

    wp_die();
}

add_action('wp_ajax_kenya_filter_news', 'kenya_filter_news_ajax');
add_action('wp_ajax_nopriv_kenya_filter_news', 'kenya_filter_news_ajax');

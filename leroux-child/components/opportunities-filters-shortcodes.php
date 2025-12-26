<?php
/**
 * OPPORTUNITIES FILTERS SHORTCODES + ASSETS + AJAX
 * File: /leroux-child/components/opportunities-filters-shortcodes.php
 *
 * Remember to require this file in functions.php:
 * require_once get_stylesheet_directory() . '/components/opportunities-filters-shortcodes.php';
 */

/* ============================================================
   SHORTCODE
   [kenya_opportunities_filters]
============================================================ */
function kenya_opportunities_filters_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/opportunities-filters.php';
    return ob_get_clean();
}
add_shortcode('kenya_opportunities_filters', 'kenya_opportunities_filters_shortcode');

/* ============================================================
   ENQUEUE CSS
============================================================ */
function kenya_opportunities_filters_assets() {
    wp_enqueue_style(
        'opportunities-filters-css',
        get_stylesheet_directory_uri() . '/components/opportunities-filters.css',
        [],
        filemtime(get_stylesheet_directory() . '/components/opportunities-filters.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_opportunities_filters_assets');

/* ============================================================
   AJAX HANDLER
   Filters ONLY opportunities grid (.opc-grid)
============================================================ */
function kenya_filter_opportunities_callback() {

    check_ajax_referer('kenya_filter_opportunities_nonce', 'nonce');

    $investment_amount = isset($_POST['investment_amount']) ? sanitize_text_field(wp_unslash($_POST['investment_amount'])) : '';
    $project_stage     = isset($_POST['project_stage']) ? sanitize_text_field(wp_unslash($_POST['project_stage'])) : '';
    $county            = isset($_POST['county']) ? sanitize_text_field(wp_unslash($_POST['county'])) : '';
    $sector            = isset($_POST['sector']) ? sanitize_text_field(wp_unslash($_POST['sector'])) : '';

    $meta_query = ['relation' => 'AND'];

    if ($project_stage !== '') {
        $meta_query[] = [
            'key'     => 'project_stage',
            'value'   => $project_stage,
            'compare' => '='
        ];
    }

    if ($county !== '') {
        $meta_query[] = [
            'key'     => 'county',
            'value'   => $county,
            'compare' => '='
        ];
    }

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'category_name'  => 'opportunities',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if (count($meta_query) > 1) {
        $args['meta_query'] = $meta_query;
    }

    // TAG FILTER (SECTOR)
    if ($sector !== '') {
        $args['tag'] = $sector;
    }

    $query = new WP_Query($args);

    /* ============================================================
       ACCURATE INVESTMENT RANGE FILTER (MANUAL)
    ============================================================ */
    if ($investment_amount !== '' && !empty($query->posts)) {

        $filtered_posts = [];

        foreach ($query->posts as $p) {

            $raw_value = get_post_meta($p->ID, 'investment_ammount', true);
            if (!$raw_value) continue;

            // Convert "1,200 Mn" → 1200 | "23.8 Mn" → 23.8
            $numeric_value = (float) str_replace(
                [',', 'Mn', ' '],
                '',
                $raw_value
            );

            if (strpos($investment_amount, '-') !== false) {

                [$min, $max] = explode('-', $investment_amount);

                if (
                    $numeric_value >= (float)$min &&
                    $numeric_value <= (float)$max
                ) {
                    $filtered_posts[] = $p;
                }

            } elseif (str_contains($investment_amount, '+')) {

                $min = (float) str_replace('+', '', $investment_amount);

                if ($numeric_value >= $min) {
                    $filtered_posts[] = $p;
                }
            }
        }

        $query->posts      = $filtered_posts;
        $query->post_count = count($filtered_posts);
        $query->rewind_posts();
    }

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $opc_tags = get_the_tags();

            $investment_amount_meta = get_post_meta(get_the_ID(), 'investment_ammount', true);
            $project_stage_meta     = get_post_meta(get_the_ID(), 'project_stage', true);
            $county_meta            = get_post_meta(get_the_ID(), 'county', true);
            ?>
            <div class="opc-card">

                <div class="opc-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                             alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>

                <div class="opc-content">

                    <?php if ($opc_tags): ?>
                        <div class="opc-tags">
                            <?php foreach ($opc_tags as $tag): ?>
                                <span class="opc-tag-chip"><?php echo esc_html($tag->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="opc-meta-row">
                        <?php if (!empty($investment_amount_meta)): ?>
                            <div class="opc-meta-item">
                                <img src="<?php echo esc_url( ik_upload_url('2025/12/money-square.svg') ); ?>" alt="">
                                <span class="opc-meta-text"><?php echo esc_html($investment_amount_meta); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($project_stage_meta)): ?>
                            <div class="opc-meta-item">
                                <img src="<?php echo esc_url( ik_upload_url('2025/12/light-bulb.svg') ); ?>" alt="">
                                <span class="opc-meta-text"><?php echo esc_html($project_stage_meta); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($county_meta)): ?>
                            <div class="opc-meta-item">
                                <img src="<?php echo esc_url( ik_upload_url('2025/12/Map_Pin.svg') ); ?>" alt="">
                                <span class="opc-meta-text"><?php echo esc_html($county_meta); ?></span>
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
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <p>No opportunities found matching your filters.</p>
        <?php
    endif;

    wp_die();
}
add_action('wp_ajax_kenya_filter_opportunities', 'kenya_filter_opportunities_callback');
add_action('wp_ajax_nopriv_kenya_filter_opportunities', 'kenya_filter_opportunities_callback');

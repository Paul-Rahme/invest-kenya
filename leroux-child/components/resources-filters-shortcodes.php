<?php
/**
 * RESOURCES FILTERS SHORTCODE + ASSETS + AJAX
 * File: /leroux-child/components/resources-filters-shortcodes.php
 */

/* ===============================
   SHORTCODE: [kenya_resources_filters]
=============================== */
function kenya_resources_filters_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/resources-filters.php';
    return ob_get_clean();
}
add_shortcode('kenya_resources_filters', 'kenya_resources_filters_shortcode');


/* ===============================
   ENQUEUE CSS + FLATPICKR
=============================== */
function kenya_resources_filters_assets() {

    wp_enqueue_style(
        'resources-filters-css',
        get_stylesheet_directory_uri() . '/components/resources-filters.css',
        [],
        filemtime(get_stylesheet_directory() . '/components/resources-filters.css')
    );

    // Flatpickr (assuming handles already registered, like in your events/news setup)
    wp_enqueue_style('flatpickr');
    wp_enqueue_script('flatpickr');

    // jQuery is bundled with WP; make sure it's there
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'kenya_resources_filters_assets');


/* ===============================
   AJAX CALLBACK
   action: kenya_filter_resources
=============================== */
function kenya_filter_resources_callback() {

    $type = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'resources',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    // Filter by tag (type)
    if ($type !== '') {
        $args['tag'] = $type; // tag slug
    }

    // Filter by date (post date)
    if ($date !== '') {
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

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();

            // DOWNLOAD URL (STRING → FULL URL, SAME AS MAIN COMPONENT)
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

                <!-- ACTIONS -->
                <div class="rpc-actions">

                    <?php if (!empty($rpc_download_url)) : ?>
                        <a class="rpc-download-btn"
                           href="<?php echo esc_url($rpc_download_url); ?>"
                           target="_blank"
                           rel="noopener noreferrer">
                            <span>Download</span>
                            <img src="https://beta.investkenya.go.ke/wordpress/wp-content/uploads/2025/11/System-Icons-5.svg"
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

        <?php
        endwhile;
    endif;

    wp_reset_postdata();

    $html = ob_get_clean();

    wp_send_json_success([
        'html' => $html,
    ]);
}

/* Hook AJAX for logged in + guests */
add_action('wp_ajax_kenya_filter_resources', 'kenya_filter_resources_callback');
add_action('wp_ajax_nopriv_kenya_filter_resources', 'kenya_filter_resources_callback');

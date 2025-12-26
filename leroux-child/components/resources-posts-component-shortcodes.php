<?php
/**
 * RESOURCES POSTS COMPONENT SHORTCODES + ASSETS
 * File: /leroux-child/components/resources-posts-component-shortcodes.php
 *
 * Remember to require this file in functions.php:
 * require_once get_stylesheet_directory() . '/components/resources-posts-component-shortcodes.php';
 */

/* ============================================================
   HELPER: RESOURCE DOWNLOAD BUTTON (REUSABLE)
============================================================ */
if ( ! function_exists('kenya_render_resource_download_button') ) {
    function kenya_render_resource_download_button( $post_id = null ) {

        $post_id = $post_id ?: get_the_ID();
        if ( ! $post_id ) return '';

        // Download URL from ACF text field
        $download_raw = get_post_meta($post_id, 'download_url', true);
        if ( empty($download_raw) ) return '';

        $download_url = esc_url( ik_upload_url( $download_raw ) );

        ob_start();
        ?>
        <a class="rpc-download-btn"
           href="<?php echo $download_url; ?>"
           target="_blank"
           rel="noopener noreferrer">
            <span>Download</span>
            <img src="<?php echo esc_url( ik_upload_url( '2025/11/System-Icons-5.svg' ) ); ?>"
                 class="rpc-download-icon"
                 alt="Download">
        </a>
        <?php
        return ob_get_clean();
    }
}

/* ============================================================
   MAIN RESOURCES POSTS COMPONENT SHORTCODE (GRID)
   [kenya_resources_posts]
============================================================ */
function kenya_resources_posts_component_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/resources-posts-component.php';
    return ob_get_clean();
}
add_shortcode('kenya_resources_posts', 'kenya_resources_posts_component_shortcode');

/* ============================================================
   ROW VARIANT (ONE ROW OF RESOURCES)
   [kenya_resources_row]
============================================================ */
add_shortcode('kenya_resources_row', function() {

    set_query_var('rpc_mode', 'row');

    // Exclude current post if on single resource
    $exclude = [];
    if ( is_singular('post') ) {
        $exclude[] = get_the_ID();
    }

    set_query_var('rpc_custom_query', [
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'category_name'  => 'resources',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => $exclude, // 👈 key line
    ]);

    ob_start();
    include get_stylesheet_directory() . '/components/resources-posts-component.php';
    return ob_get_clean();
});

/* ============================================================
   SHORTCODE: RESOURCE DOWNLOAD BUTTON ONLY
   Usage: [kenya_resource_download_btn]
============================================================ */
add_shortcode('kenya_resource_download_btn', function () {

    if ( ! is_singular('post') ) return '';

    return '<div class="rpc-download-shortcode">'
       . kenya_render_resource_download_button()
       . '</div>';
});

/* ============================================================
   LOAD CSS FILE FOR RESOURCES COMPONENT
============================================================ */
function kenya_resources_posts_component_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory()      . '/components/';

    wp_enqueue_style(
        'resources-posts-component-css',
        $base_uri . 'resources-posts-component.css',
        [],
        filemtime($base_dir . 'resources-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_resources_posts_component_assets');

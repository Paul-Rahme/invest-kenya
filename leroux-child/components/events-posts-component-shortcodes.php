<?php
/* ============================================================
   EVENTS POSTS COMPONENT SHORTCODE (BASE COMPONENT)
============================================================ */
function kenya_events_posts_component_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/components/events-posts-component.php';
    return ob_get_clean();
}
add_shortcode('kenya_events_posts', 'kenya_events_posts_component_shortcode');



/* ============================================================
   SHORTCODE — UPCOMING EVENTS (end_date >= today)
============================================================ */
add_shortcode('kenya_events_upcoming', function() {

    $today = date('Ymd');

    set_query_var('epc_grid_id', 'upcoming-events-grid');
    set_query_var('epc_mode', 'grid');

    /* --------------------------------------------
       BUILD THE BASE QUERY (NO LOCATION FILTER YET)
    -------------------------------------------- */
    $custom_query = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'category_name'  => 'events',

        'meta_query' => [
            'relation' => 'OR',

            // Case 1 — start_date ONLY AND start_date >= today
            [
                'relation' => 'AND',
                [
                    'key'     => 'start_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type'    => 'NUMERIC'
                ],
                [
                    'relation' => 'OR',
                    [ 'key' => 'end_date', 'compare' => 'NOT EXISTS' ],
                    [ 'key' => 'end_date', 'value' => '', 'compare' => '=' ],
                ],
            ],

            // Case 2 — end_date exists AND end_date >= today
            [
                'key'     => 'end_date',
                'value'   => $today,
                'compare' => '>=',
                'type'    => 'NUMERIC'
            ],
        ],

        'orderby'  => 'meta_value',
        'meta_key' => 'start_date',
        'order'    => 'ASC'
    ];

    /* --------------------------------------------
       APPLY LOCATION FILTER (IF EXISTS)
    -------------------------------------------- */
    if (!empty($_GET['location'])) {
        $custom_query['meta_query'][] = [
            'key'     => 'location',
            'value'   => sanitize_text_field($_GET['location']),
            'compare' => '=',
        ];
    }

    /* Pass final query to component */
    set_query_var('epc_custom_query', $custom_query);

    ob_start(); ?>
        <div id="upcoming-events-grid">
            <?php include get_stylesheet_directory() . '/components/events-posts-component.php'; ?>
        </div>
    <?php
    return ob_get_clean();
});



/* ============================================================
   SHORTCODE — EXPIRED EVENTS (end_date < today)
============================================================ */
add_shortcode('kenya_events_expired', function() {

    $today = date('Ymd');

    set_query_var('epc_grid_id', 'expired-events-grid');
    set_query_var('epc_mode', 'grid');

    /* --------------------------------------------
       BASE QUERY (NO LOCATION FILTER YET)
    -------------------------------------------- */
    $custom_query = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'category_name'  => 'events',

        'meta_query' => [
            'relation' => 'OR',

            // Case 1 — Only start_date exists AND start_date < today AND end empty
            [
                'relation' => 'AND',
                [
                    'key'     => 'start_date',
                    'value'   => $today,
                    'compare' => '<',
                    'type'    => 'NUMERIC'
                ],
                [
                    'relation' => 'OR',
                    [ 'key' => 'end_date', 'compare' => 'NOT EXISTS' ],
                    [ 'key' => 'end_date', 'value' => '', 'compare' => '=' ],
                ],
            ],

            // Case 2 — end_date exists AND end_date < today
            [
                'relation' => 'AND',
                [
                    'key'     => 'end_date',
                    'value'   => $today,
                    'compare' => '<',
                    'type'    => 'NUMERIC'
                ],
                [
                    'key'     => 'end_date',
                    'value'   => '',
                    'compare' => '!=',
                ]
            ],
        ],

        'orderby'  => 'meta_value',
        'meta_key' => 'start_date',
        'order'    => 'DESC'
    ];

    /* --------------------------------------------
       APPLY LOCATION FILTER (IF EXISTS)
    -------------------------------------------- */
    if (!empty($_GET['location'])) {
        $custom_query['meta_query'][] = [
            'key'     => 'location',
            'value'   => sanitize_text_field($_GET['location']),
            'compare' => '=',
        ];
    }

    set_query_var('epc_custom_query', $custom_query);

    ob_start(); ?>
        <div id="expired-events-grid">
            <?php include get_stylesheet_directory() . '/components/events-posts-component.php'; ?>
        </div>
    <?php
    return ob_get_clean();
});



/* ============================================================
   SHORTCODE — SINGLE ROW EVENTS
============================================================ */
add_shortcode('kenya_events_row', function() {

    $today = date('Ymd');

    set_query_var('epc_mode', 'row');
    set_query_var('epc_grid_id', 'events-row-grid');

    $custom_query = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'category_name'  => 'events',

        'post__not_in'   => is_singular('post') ? [ get_the_ID() ] : [],

        'meta_query' => [
            'relation' => 'OR',

            // start_date only AND start_date >= today
            [
                'relation' => 'AND',
                [
                    'key'     => 'start_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type'    => 'NUMERIC'
                ],
                [
                    'relation' => 'OR',
                    [ 'key' => 'end_date', 'compare' => 'NOT EXISTS' ],
                    [ 'key' => 'end_date', 'value' => '', 'compare' => '=' ],
                ],
            ],

            // end_date exists AND end_date >= today
            [
                'key'     => 'end_date',
                'value'   => $today,
                'compare' => '>=',
                'type'    => 'NUMERIC'
            ],
        ],

        'orderby'  => 'meta_value',
        'meta_key' => 'start_date',
        'order'    => 'ASC'
    ];

    /* Optional location filter */
    if (!empty($_GET['location'])) {
        $custom_query['meta_query'][] = [
            'key'     => 'location',
            'value'   => sanitize_text_field($_GET['location']),
            'compare' => '=',
        ];
    }

    set_query_var('epc_custom_query', $custom_query);

    ob_start(); ?>
        <div id="events-row-grid">
            <?php include get_stylesheet_directory() . '/components/events-posts-component.php'; ?>
        </div>
    <?php
    return ob_get_clean();
});




/* ============================================================
   LOAD CSS ONLY
============================================================ */
function kenya_events_posts_component_assets() {

    $base_uri = get_stylesheet_directory_uri() . '/components/';
    $base_dir = get_stylesheet_directory() . '/components/';

    wp_enqueue_style(
        'events-posts-component-css',
        $base_uri . 'events-posts-component.css',
        [],
        filemtime($base_dir . 'events-posts-component.css')
    );
}
add_action('wp_enqueue_scripts', 'kenya_events_posts_component_assets');

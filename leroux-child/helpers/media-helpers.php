<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Build full upload URL from a relative uploads path
 *
 * Stored in ACF as:
 *   2025/12/icon.svg
 *
 * Output:
 *   https://domain.com/wp-content/uploads/2025/12/icon.svg
 */
if ( ! function_exists( 'ik_upload_url' ) ) {
    function ik_upload_url( $relative_path ) {

        if ( empty( $relative_path ) ) {
            return '';
        }

        // If someone mistakenly pastes a full URL, return it safely
        if ( filter_var( $relative_path, FILTER_VALIDATE_URL ) ) {
            return $relative_path;
        }

        $upload_dir = wp_get_upload_dir();

        return trailingslashit( $upload_dir['baseurl'] ) . ltrim( $relative_path, '/' );
    }
}

<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Render one snapshot block (number + label).
 * - Uses existing classes only
 * - Does NOT force $ or % (you can include them in the ACF value)
 */
if ( ! function_exists('ik_render_sector_snapshot_block') ) {
    function ik_render_sector_snapshot_block( $number, $label ) {

        $number = is_string($number) ? trim($number) : $number;
        $label  = is_string($label)  ? trim($label)  : $label;

        if ( $number === '' && $label === '' ) return;

        ?>
        <div class="sector-snapshot-block">
            <?php if ( $number !== '' ) : ?>
                <div class="sector-snapshot-number">
                    <?php echo esc_html( $number ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $label !== '' ) : ?>
                <div class="sector-snapshot-label">
                    <?php echo esc_html( $label ); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

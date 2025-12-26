<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Render all tab panels (Tab 1-4).
 * Keeps:
 * - same classes
 * - same ordering rules
 * - third column: checklist first, then logo title, then logos ALWAYS under title
 */
if ( ! function_exists('render_sector_tabs_panels') ) {

    function render_sector_tabs_panels( $ctx ) {

        $uid               = isset($ctx['uid']) ? $ctx['uid'] : '';
        $check_icon_url    = isset($ctx['check_icon_url']) ? $ctx['check_icon_url'] : '';
        $download_icon_url = isset($ctx['download_icon_url']) ? $ctx['download_icon_url'] : '';

        if ( ! $uid ) return;

        /* ============================================================
           TAB 1 FIELDS (NOW 4 SNAPSHOTS)
        ============================================================ */
        $first_snapshot_number_first_tab  = get_field('first_snapshot_number_first_tab');
        $second_snapshot_number_first_tab = get_field('second_snapshot_number_first_tab');
        $third_snapshot_number_first_tab  = get_field('third_snapshot_number_first_tab');
        $fourth_snapshot_number_first_tab = get_field('fourth_snapshot_number_first_tab');

        $first_snapshot_label_first_tab   = get_field('first_snapshot_label_first_tab');
        $second_snapshot_label_first_tab  = get_field('second_snapshot_label_first_tab');
        $third_snapshot_label_first_tab   = get_field('third_snapshot_label_first_tab');
        $fourth_snapshot_label_first_tab  = get_field('fourth_snapshot_label_first_tab');

        $checklist_title_first_tab    = get_field('checklist_title_first_tab');
        $first_check_text_first_tab   = get_field('first_check_text_first_tab');
        $second_check_text_first_tab  = get_field('second_check_text_first_tab');

        $logo_title_first_tab         = get_field('logo_title_first_tab');
        $first_logo_image_first_tab   = get_field('first_logo_image_first_tab');
        $second_logo_image_first_tab  = get_field('second_logo_image_first_tab');
        $third_logo_image_first_tab   = get_field('third_logo_image_first_tab');
        $fourth_logo_image_first_tab  = get_field('fourth_logo_image_first_tab');

        $bottom_text_first_tab        = get_field('bottom_text_first_tab');
        $download_text_first_tab      = get_field('download_text_first_tab');
        $download_link_first_tab      = get_field('download_link_first_tab');

        /* ============================================================
           TAB 2 FIELDS (NOW 6 SNAPSHOTS + 6 LOGOS IN ROW 2)
        ============================================================ */
        $first_snapshot_number_second_tab  = get_field('first_snapshot_number_second_tab');
        $second_snapshot_number_second_tab = get_field('second_snapshot_number_second_tab');
        $third_snapshot_number_second_tab  = get_field('third_snapshot_number_second_tab');
        $fourth_snapshot_number_second_tab = get_field('fourth_snapshot_number_second_tab');
        $fifth_snapshot_number_second_tab  = get_field('fifth_snapshot_number_second_tab');
        $sixth_snapshot_number_second_tab  = get_field('sixth_snapshot_number_second_tab');

        $first_snapshot_label_second_tab   = get_field('first_snapshot_label_second_tab');
        $second_snapshot_label_second_tab  = get_field('second_snapshot_label_second_tab');
        $third_snapshot_label_second_tab   = get_field('third_snapshot_label_second_tab');
        $fourth_snapshot_label_second_tab  = get_field('fourth_snapshot_label_second_tab');
        $fifth_snapshot_label_second_tab   = get_field('fifth_snapshot_label_second_tab');
        $sixth_snapshot_label_second_tab   = get_field('sixth_snapshot_label_second_tab');

        $checklist_title_second_tab  = get_field('checklist_title_second_tab');
        $first_check_text_second_tab = get_field('first_check_text_second_tab');

        $first_logo_title_second_tab  = get_field('first_logo_title_second_tab');
        $second_logo_title_second_tab = get_field('second_logo_title_second_tab');

        $first_row_first_logo_second_tab  = get_field('first_row_first_logo_second_tab');
        $first_row_second_logo_second_tab = get_field('first_row_second_logo_second_tab');
        $first_row_third_logo_second_tab  = get_field('first_row_third_logo_second_tab');

        $second_row_first_logo_second_tab  = get_field('second_row_first_logo_second_tab');
        $second_row_second_logo_second_tab = get_field('second_row_second_logo_second_tab');
        $second_row_third_logo_second_tab  = get_field('second_row_third_logo_second_tab');
        $second_row_fourth_logo_second_tab = get_field('second_row_fourth_logo_second_tab');
        $second_row_fifth_logo_second_tab  = get_field('second_row_fifth_logo_second_tab');
        $second_row_sixth_logo_second_tab  = get_field('second_row_sixth_logo_second_tab');

        $bottom_text_second_tab   = get_field('bottom_text_second_tab');
        $download_text_second_tab = get_field('download_text_second_tab');
        $download_link_second_tab = get_field('download_link_second_tab');

        /* ============================================================
           TAB 3 FIELDS (NOW 4 SNAPSHOTS)
        ============================================================ */
        $first_snapshot_number_third_tab  = get_field('first_snapshot_number_third_tab');
        $second_snapshot_number_third_tab = get_field('second_snapshot_number_third_tab');
        $third_snapshot_number_third_tab  = get_field('third_snapshot_number_third_tab');
        $fourth_snapshot_number_third_tab = get_field('fourth_snapshot_number_third_tab');

        $first_snapshot_label_third_tab   = get_field('first_snapshot_label_third_tab');
        $second_snapshot_label_third_tab  = get_field('second_snapshot_label_third_tab');
        $third_snapshot_label_third_tab   = get_field('third_snapshot_label_third_tab');
        $fourth_snapshot_label_third_tab  = get_field('fourth_snapshot_label_third_tab');

        $checklist_title_third_tab    = get_field('checklist_title_third_tab');
        $first_check_text_third_tab   = get_field('first_check_text_third_tab');
        $second_check_text_third_tab  = get_field('second_check_text_third_tab');

        $logo_title_third_tab         = get_field('logo_title_third_tab');
        $first_logo_image_third_tab   = get_field('first_logo_image_third_tab');
        $second_logo_image_third_tab  = get_field('second_logo_image_third_tab');
        $third_logo_image_third_tab   = get_field('third_logo_image_third_tab');

        // NOTE: You did not provide bottom fields for Tab 3 in your ACF list.
        // If you want the SAME bottom as all tabs (as per screenshots), we reuse Tab 1 bottom values.
        $bottom_text_third_tab   = $bottom_text_first_tab;
        $download_text_third_tab = $download_text_first_tab;
        $download_link_third_tab = $download_link_first_tab;

        /* ============================================================
           TAB 4 FIELDS (NOW 5 SNAPSHOTS)
        ============================================================ */
        $first_snapshot_number_fourth_tab  = get_field('first_snapshot_number_fourth_tab');
        $second_snapshot_number_fourth_tab = get_field('second_snapshot_number_fourth_tab');
        $third_snapshot_number_fourth_tab  = get_field('third_snapshot_number_fourth_tab');
        $fourth_snapshot_number_fourth_tab = get_field('fourth_snapshot_number_fourth_tab');
        $fifth_snapshot_number_fourth_tab  = get_field('fifth_snapshot_number_fourth_tab');

        $first_snapshot_label_fourth_tab   = get_field('first_snapshot_label_fourth_tab');
        $second_snapshot_label_fourth_tab  = get_field('second_snapshot_label_fourth_tab');
        $third_snapshot_label_fourth_tab   = get_field('third_snapshot_label_fourth_tab');
        $fourth_snapshot_label_fourth_tab  = get_field('fourth_snapshot_label_fourth_tab');
        $fifth_snapshot_label_fourth_tab   = get_field('fifth_snapshot_label_fourth_tab');

        $checklist_title_fourth_tab         = get_field('checklist_title_fourth_tab');
        $first_check_text_fourth_tab        = get_field('first_check_text_fourth_tab');
        $second_check_text_fourth_tab       = get_field('second_check_text_fourth_tab');
        $third_check_text_fourth_tab        = get_field('third_check_text_fourth_tab');
        $fourth_check_text_fourth_tab       = get_field('fourth_check_text_fourth_tab');

        $logo_title_fourth_tab              = get_field('logo_title_fourth_tab');
        $first_logo_image_fourth_tab        = get_field('first_logo_image_fourth_tab');
        $second_logo_image_fourth_tab       = get_field('second_logo_image_fourth_tab');
        $third_logo_image_fourth_tab        = get_field('third_logo_image_fourth_tab');
        $fourth_logo_image_fourth_tab       = get_field('fourth_logo_image_fourth_tab');

        // NOTE: You did not provide bottom fields for Tab 4 in your ACF list.
        // If you want the SAME bottom as all tabs (as per screenshots), we reuse Tab 1 bottom values.
        $bottom_text_fourth_tab   = $bottom_text_first_tab;
        $download_text_fourth_tab = $download_text_first_tab;
        $download_link_fourth_tab = $download_link_first_tab;

        ?>

        <!-- ================= TAB 1 PANEL ================= -->
        <div class="sector-tab-panel active" data-tab="1">
            <div class="sector-tab-layout">

<!-- SNAPSHOTS (ROW-PAIRED) -->
<div class="sector-snapshot">

    <!-- Row 1 -->
    <div class="sector-tab-layout" style="gap:60px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $first_snapshot_number_first_tab,
                $first_snapshot_label_first_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $third_snapshot_number_first_tab,
                $third_snapshot_label_first_tab
            ); ?>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $second_snapshot_number_first_tab,
                $second_snapshot_label_first_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fourth_snapshot_number_first_tab,
                $fourth_snapshot_label_first_tab
            ); ?>
        </div>
    </div>

</div>


                <!-- Column 3: Checklist then Logos (logos always under title) -->
                <div class="sector-logos">

                    <?php if ( $checklist_title_first_tab ) : ?>
                        <div class="sector-subtitle">
                            <?php echo esc_html( $checklist_title_first_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-checklist">
                        <?php if ( $first_check_text_first_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $first_check_text_first_tab ); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_check_text_first_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $second_check_text_first_tab ); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $logo_title_first_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title" style="margin-top:24px;">
                            <?php echo esc_html( $logo_title_first_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php
                        $logos_tab1 = [
                            $first_logo_image_first_tab,
                            $second_logo_image_first_tab,
                            $third_logo_image_first_tab,
                            $fourth_logo_image_first_tab,
                        ];
                        foreach ( $logos_tab1 as $logo_url ) :
                            if ( ! empty( $logo_url ) ) : ?>
                                <div class="sector-logo-item">
                                    <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>

                </div>
            </div>

            <?php if ( $bottom_text_first_tab || ( $download_text_first_tab && $download_link_first_tab ) ) : ?>
                <div class="sector-download-wrap">
                    <?php if ( $bottom_text_first_tab ) : ?>
                        <div class="sector-bottom-text"><?php echo esc_html( $bottom_text_first_tab ); ?></div>
                    <?php endif; ?>

                    <?php if ( $download_text_first_tab && $download_link_first_tab ) : ?>
                        <a class="sector-download-btn" href="<?php echo esc_url( ik_upload_url( $download_link_first_tab ) ); ?>" target="_blank" rel="noopener">
                            <span><?php echo esc_html( $download_text_first_tab ); ?></span>
                            <img src="<?php echo esc_url( $download_icon_url ); ?>" alt="">
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- ================= TAB 2 PANEL ================= -->
        <div class="sector-tab-panel" data-tab="2">
            <div class="sector-tab-layout">

<!-- SNAPSHOTS: ROW-PAIRED FOR PERFECT ALIGNMENT -->
<div class="sector-snapshot">

    <!-- Row 1 -->
    <div class="sector-tab-layout" style="gap:60px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $first_snapshot_number_second_tab,
                $first_snapshot_label_second_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fourth_snapshot_number_second_tab,
                $fourth_snapshot_label_second_tab
            ); ?>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $second_snapshot_number_second_tab,
                $second_snapshot_label_second_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fifth_snapshot_number_second_tab,
                $fifth_snapshot_label_second_tab
            ); ?>
        </div>
    </div>

    <!-- Row 3 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $third_snapshot_number_second_tab,
                $third_snapshot_label_second_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $sixth_snapshot_number_second_tab,
                $sixth_snapshot_label_second_tab
            ); ?>
        </div>
    </div>

</div>



                <!-- Column 3: Checklist then Logos (each logo row always under its title) -->
                <div class="sector-logos">

                    <?php if ( $checklist_title_second_tab ) : ?>
                        <div class="sector-subtitle">
                            <?php echo esc_html( $checklist_title_second_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-checklist">
                        <?php if ( $first_check_text_second_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $first_check_text_second_tab ); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $first_logo_title_second_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title" style="margin-top:24px;">
                            <?php echo esc_html( $first_logo_title_second_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php
                        $row1_logos = [
                            $first_row_first_logo_second_tab,
                            $first_row_second_logo_second_tab,
                            $first_row_third_logo_second_tab,
                        ];
                        foreach ( $row1_logos as $logo_url ) :
                            if ( ! empty( $logo_url ) ) : ?>
                                <div class="sector-logo-item">
                                    <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>

                    <?php if ( $second_logo_title_second_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title">
                            <?php echo esc_html( $second_logo_title_second_tab ); ?>
                        </div>
                    <?php endif; ?>

<!-- Second logo row: first 3 -->
<div class="sector-logo-row">
    <?php
    $row2_top = [
        $second_row_first_logo_second_tab,
        $second_row_second_logo_second_tab,
        $second_row_third_logo_second_tab,
    ];
    foreach ( $row2_top as $logo_url ) :
        if ( ! empty( $logo_url ) ) : ?>
            <div class="sector-logo-item">
                <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
            </div>
        <?php endif;
    endforeach; ?>
</div>

<!-- Second logo row: second 3 (aligned under first row) -->
<div class="sector-logo-row">
    <?php
    $row2_bottom = [
        $second_row_fourth_logo_second_tab,
        $second_row_fifth_logo_second_tab,
        $second_row_sixth_logo_second_tab,
    ];
    foreach ( $row2_bottom as $logo_url ) :
        if ( ! empty( $logo_url ) ) : ?>
            <div class="sector-logo-item">
                <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
            </div>
        <?php endif;
    endforeach; ?>
</div>


                </div>
            </div>

            <?php if ( $bottom_text_second_tab || ( $download_text_second_tab && $download_link_second_tab ) ) : ?>
                <div class="sector-download-wrap">
                    <?php if ( $bottom_text_second_tab ) : ?>
                        <div class="sector-bottom-text"><?php echo esc_html( $bottom_text_second_tab ); ?></div>
                    <?php endif; ?>

                    <?php if ( $download_text_second_tab && $download_link_second_tab ) : ?>
                        <a class="sector-download-btn" href="<?php echo esc_url( ik_upload_url( $download_link_second_tab ) ); ?>" target="_blank" rel="noopener">
                            <span><?php echo esc_html( $download_text_second_tab ); ?></span>
                            <img src="<?php echo esc_url( $download_icon_url ); ?>" alt="">
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- ================= TAB 3 PANEL ================= -->
        <div class="sector-tab-panel" data-tab="3">
            <div class="sector-tab-layout">

<!-- SNAPSHOTS (ROW-PAIRED) -->
<div class="sector-snapshot">

    <!-- Row 1 -->
    <div class="sector-tab-layout" style="gap:60px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $first_snapshot_number_third_tab,
                $first_snapshot_label_third_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $third_snapshot_number_third_tab,
                $third_snapshot_label_third_tab
            ); ?>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $second_snapshot_number_third_tab,
                $second_snapshot_label_third_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fourth_snapshot_number_third_tab,
                $fourth_snapshot_label_third_tab
            ); ?>
        </div>
    </div>

</div>


                <!-- Column 3: Checklist then Logos -->
                <div class="sector-logos">

                    <?php if ( $checklist_title_third_tab ) : ?>
                        <div class="sector-subtitle">
                            <?php echo esc_html( $checklist_title_third_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-checklist">
                        <?php if ( $first_check_text_third_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $first_check_text_third_tab ); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_check_text_third_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $second_check_text_third_tab ); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $logo_title_third_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title" style="margin-top:24px;">
                            <?php echo esc_html( $logo_title_third_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php
                        $logos_tab3 = [
                            $first_logo_image_third_tab,
                            $second_logo_image_third_tab,
                            $third_logo_image_third_tab,
                        ];
                        foreach ( $logos_tab3 as $logo_url ) :
                            if ( ! empty( $logo_url ) ) : ?>
                                <div class="sector-logo-item">
                                    <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= TAB 4 PANEL ================= -->
        <div class="sector-tab-panel" data-tab="4">
            <div class="sector-tab-layout">

<!-- SNAPSHOTS (ROW-PAIRED) -->
<div class="sector-snapshot">

    <!-- Row 1 -->
    <div class="sector-tab-layout" style="gap:60px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $first_snapshot_number_fourth_tab,
                $first_snapshot_label_fourth_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fourth_snapshot_number_fourth_tab,
                $fourth_snapshot_label_fourth_tab
            ); ?>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $second_snapshot_number_fourth_tab,
                $second_snapshot_label_fourth_tab
            ); ?>
        </div>

        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $fifth_snapshot_number_fourth_tab,
                $fifth_snapshot_label_fourth_tab
            ); ?>
        </div>
    </div>

    <!-- Row 3 -->
    <div class="sector-tab-layout" style="gap:60px; margin-top:32px;">
        <div class="sector-snapshot">
            <?php ik_render_sector_snapshot_block(
                $third_snapshot_number_fourth_tab,
                $third_snapshot_label_fourth_tab
            ); ?>
        </div>
    </div>

</div>


                <!-- Column 3: Checklist then Logos -->
                <div class="sector-logos">

                    <?php if ( $checklist_title_fourth_tab ) : ?>
                        <div class="sector-subtitle">
                            <?php echo esc_html( $checklist_title_fourth_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-checklist">
                        <?php if ( $first_check_text_fourth_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $first_check_text_fourth_tab ); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $second_check_text_fourth_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $second_check_text_fourth_tab ); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $third_check_text_fourth_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $third_check_text_fourth_tab ); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $fourth_check_text_fourth_tab ) : ?>
                            <div class="sector-check-item">
                                <img src="<?php echo esc_url( $check_icon_url ); ?>" alt="">
                                <div class="sector-check-text"><?php echo esc_html( $fourth_check_text_fourth_tab ); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $logo_title_fourth_tab ) : ?>
                        <div class="sector-subtitle sector-logo-title" style="margin-top:24px;">
                            <?php echo esc_html( $logo_title_fourth_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sector-logo-row">
                        <?php
                        $logos_tab4 = [
                            $first_logo_image_fourth_tab,
                            $second_logo_image_fourth_tab,
                            $third_logo_image_fourth_tab,
                            $fourth_logo_image_fourth_tab,
                        ];
                        foreach ( $logos_tab4 as $logo_url ) :
                            if ( ! empty( $logo_url ) ) : ?>
                                <div class="sector-logo-item">
                                    <img src="<?php echo esc_url( ik_upload_url( $logo_url ) ); ?>" alt="">
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

        <?php
    }
}

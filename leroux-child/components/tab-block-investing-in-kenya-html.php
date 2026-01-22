<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: tab-block-investing-in-kenya-html.php
| Renders the full HTML for: [tab_block_investing_in_kenya]
|--------------------------------------------------------------------------
*/

if (!function_exists('kn_render_investing_tabs_html')) :

function kn_render_investing_tabs_html($d) {

    // Defensive defaults
    $main_title  = $d['main_title'] ?? ['part1' => '', 'part2' => ''];
    $description = $d['description'] ?? '';
    $tabs        = $d['tabs'] ?? [];

    $tab1 = $d['tab1'] ?? [];
    $tab2 = $d['tab2'] ?? [];
    $tab3 = $d['tab3'] ?? [];
    $tab4 = $d['tab4'] ?? [];
    $tab5 = $d['tab5'] ?? [];
    $tab6 = $d['tab6'] ?? [];

    ob_start(); ?>

    <div class="ik-invest-wrapper">
        <div class="ik-invest-safe">

            <!-- ============================================
                 MAIN TITLE + RED LINE
            ============================================= -->
            <div class="ik-invest-header">
                <div class="ik-red-line"></div>

                <h2 class="ik-invest-main-title-text">
                    <?php if (!empty($main_title['part1'])): ?>
                        <span class="ik-title-part1">
                            <?php echo esc_html($main_title['part1']); ?>
                        </span>
                    <?php endif; ?>

                    <?php if (!empty($main_title['part2'])): ?>
                        <span class="ik-title-part2">
                            <?php echo esc_html($main_title['part2']); ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>

            <!-- ============================================
                 DESCRIPTION UNDER MAIN TITLE
            ============================================= -->
            <?php if ($description): ?>
                <p class="ik-invest-description">
                    <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>

            <!-- ============================================
                 TAB BUTTONS
            ============================================= -->
            <div class="ik-invest-tabs-wrapper">
                <div class="ik-invest-tabs">
                    <?php foreach ($tabs as $index => $label): ?>
                        <?php if (!$label) continue; ?>
                        <button
                            class="ik-invest-tab-btn <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-tab="<?php echo esc_attr($index); ?>"
                            type="button"
                        >
                            <?php echo esc_html($label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
			<!-- FULL-WIDTH BACKGROUND START -->
			<div class="ik-invest-tabs-bg">
    			<div class="ik-invest-safe">

            <!-- ============================================
                 TABS CONTENT
            ============================================= -->
            <div class="ik-invest-tabs-content">

                <!-- ============================================
                     TAB 1
                     - number block with button
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-0 active" data-tab-content="0">
                    <?php echo kn_render_investing_number_block($tab1, true); ?>
                </div>

                <!-- ============================================
                     TAB 2
                     - number block with button
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-1" data-tab-content="1">
                    <?php echo kn_render_investing_number_block($tab2, true); ?>
                </div>

                <!-- ============================================
                     TAB 3
                     - number block WITHOUT button
                     - subtitle
                     - 4 images with text under image
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-2" data-tab-content="2">

                    <?php echo kn_render_investing_number_block($tab3, false); ?>

                    <?php if (!empty($tab3['subtitle'])): ?>
                        <h3 class="ik-invest-subtitle">
                            <?php echo esc_html($tab3['subtitle']); ?>
                        </h3>
                    <?php endif; ?>

                    <?php
                    $tab3_images = $tab3['images'] ?? [];
                    echo kn_render_investing_image_grid($tab3_images);
                    ?>
                </div>

                <!-- ============================================
                     TAB 4
                     - number block WITHOUT button
                     - FIRST BIG TITLE + SUBTITLE + 5 images
                     - SECOND BIG TITLE + SUBTITLE + 3 images
                     - THIRD SUBTITLE + 3 images
                     - FOURTH SUBTITLE + 2 images
                     - FIFTH SUBTITLE + 2 images (2 + 1 split in Figma, but
                       all structured as one grid with 2 items here)
                     - SIXTH SUBTITLE + 1 image
                     - THIRD BIG TITLE + 3 images
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-3" data-tab-content="3">

                    <!-- Number block (no button) -->
                    <?php echo kn_render_investing_number_block($tab4, false); ?>

                    <?php
                    // FIRST BLOCK
                    $first_big_title      = $tab4['first_big_title'] ?? '';
                    $first_subtitle       = $tab4['first_subtitle'] ?? '';
                    $first_block_images   = $tab4['first_block_images'] ?? [];

                    // SECOND BLOCK
                    $second_big_title     = $tab4['second_big_title'] ?? '';
                    $second_subtitle      = $tab4['second_subtitle'] ?? '';
                    $second_block_images  = $tab4['second_block_images'] ?? [];

                    // THIRD BLOCK
                    $third_subtitle       = $tab4['third_subtitle'] ?? '';
                    $third_block_images   = $tab4['third_block_images'] ?? [];

                    // FOURTH BLOCK
                    $fourth_subtitle      = $tab4['fourth_subtitle'] ?? '';
                    $fourth_block_images  = $tab4['fourth_block_images'] ?? [];

                    // FIFTH BLOCK
                    $fifth_subtitle       = $tab4['fifth_subtitle'] ?? '';
                    $fifth_block_images   = $tab4['fifth_block_images'] ?? [];

                    // SIXTH BLOCK
                    $sixth_subtitle       = $tab4['sixth_subtitle'] ?? '';
                    $sixth_block_images   = $tab4['sixth_block_images'] ?? [];

                    // SEVENTH / FINAL BLOCK
                    $third_big_title      = $tab4['third_big_title'] ?? '';
                    $seventh_block_images = $tab4['seventh_block_images'] ?? [];
                    ?>

                    <!-- FIRST BLOCK -->
                    <?php if ($first_big_title || $first_subtitle || !empty($first_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-1">
                            <?php if ($first_big_title): ?>
                                <h2 class="ik-invest-big-title">
                                    <?php echo esc_html($first_big_title); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($first_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($first_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($first_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- SECOND BLOCK -->
                    <?php if ($second_big_title || $second_subtitle || !empty($second_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-2">
                            <?php if ($second_big_title): ?>
                                <h2 class="ik-invest-big-title">
                                    <?php echo esc_html($second_big_title); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($second_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($second_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($second_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- THIRD BLOCK -->
                    <?php if ($third_subtitle || !empty($third_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-3">
                            <?php if ($third_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($third_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($third_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- FOURTH BLOCK -->
                    <?php if ($fourth_subtitle || !empty($fourth_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-4">
                            <?php if ($fourth_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($fourth_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($fourth_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- FIFTH BLOCK -->
                    <?php if ($fifth_subtitle || !empty($fifth_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-5">
                            <?php if ($fifth_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($fifth_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($fifth_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- SIXTH BLOCK -->
                    <?php if ($sixth_subtitle || !empty($sixth_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-6">
                            <?php if ($sixth_subtitle): ?>
                                <h3 class="ik-invest-subtitle">
                                    <?php echo esc_html($sixth_subtitle); ?>
                                </h3>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($sixth_block_images); ?>
                        </section>
                    <?php endif; ?>

                    <!-- SEVENTH / FINAL BLOCK -->
                    <?php if ($third_big_title || !empty($seventh_block_images)): ?>
                        <section class="ik-invest-block ik-invest-block-4-7">
                            <?php if ($third_big_title): ?>
                                <h2 class="ik-invest-big-title">
                                    <?php echo esc_html($third_big_title); ?>
                                </h2>
                            <?php endif; ?>

                            <?php echo kn_render_investing_image_grid($seventh_block_images); ?>
                        </section>
                    <?php endif; ?>

                </div><!-- END TAB 4 -->

                <!-- ============================================
                     TAB 5
                     - number block WITHOUT button
                     - subtitle
                     - 3 images with text
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-4" data-tab-content="4">

                    <?php echo kn_render_investing_number_block($tab5, false); ?>

                    <?php if (!empty($tab5['subtitle'])): ?>
                        <h3 class="ik-invest-subtitle">
                            <?php echo esc_html($tab5['subtitle']); ?>
                        </h3>
                    <?php endif; ?>

                    <?php
                    $tab5_images = $tab5['images'] ?? [];
                    echo kn_render_investing_image_grid($tab5_images);
                    ?>
                </div>

                <!-- ============================================
                     TAB 6
                     - number block WITHOUT button
                     - subtitle
                     - single image + text
                ============================================= -->
                <div class="ik-invest-tab ik-invest-tab-5" data-tab-content="5">

                    <?php echo kn_render_investing_number_block($tab6, false); ?>

                    <?php if (!empty($tab6['subtitle'])): ?>
                        <h3 class="ik-invest-subtitle">
                            <?php echo esc_html($tab6['subtitle']); ?>
                        </h3>
                    <?php endif; ?>

                    <?php
                    $single_image = $tab6['image'] ?? null;
                    if ($single_image && !empty($single_image['img'])): ?>
                        <div class="ik-invest-single-image-wrapper">
<?php echo kn_render_investing_image_card(
    $single_image['img'],
    $single_image['text'] ?? '',
    $single_image['link'] ?? ''
); ?>

                        </div>
                    <?php endif; ?>

                </div>

            </div><!-- END .ik-invest-tabs-content -->
			    </div><!-- END safe area inside bg -->
		</div><!-- END full-width bg -->


        </div><!-- END .ik-invest-safe -->
    </div><!-- END .ik-invest-wrapper -->

    <?php
    return ob_get_clean();
}

endif;

<?php
// SECURITY
if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| File: tab-block-investing-in-kenya-functions.php
| Purpose:
| - Handle title splitting using //
| - Provide reusable render helpers for:
|     - number blocks
|     - image cards (image + underline + text)
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Split Main Title Using //
| Returns array: ['part1', 'part2']
|--------------------------------------------------------------------------
*/
function kn_split_title_investing($text) {
    if (!$text) return ['', ''];

    // Split into two parts
    $parts = explode('//', $text);

    $part1 = trim($parts[0] ?? '');
    $part2 = trim($parts[1] ?? '');

    return [
        'part1' => $part1,
        'part2' => $part2,
    ];
}

/*
|--------------------------------------------------------------------------
| Render Image Card
| - Takes image URL + text
| - Outputs image, underline, text
|--------------------------------------------------------------------------
*/
function kn_render_investing_image_card($img, $text) {

    if (!$img) return '';

    ob_start(); ?>
    
    <div class="ik-invest-img-card">
        <div class="ik-invest-img-wrapper">
            <img src="<?php echo esc_url( ik_upload_url( $img ) ); ?>" alt="">
        </div>

        <div class="ik-invest-img-underline"></div>

        <?php if ($text): ?>
            <p class="ik-invest-img-text"><?php echo esc_html($text); ?></p>
        <?php endif; ?>
    </div>

    <?php
    return ob_get_clean();
}

/*
|--------------------------------------------------------------------------
| Render Number Block (used in Tab 1, Tab 2)
|--------------------------------------------------------------------------
| Structure:
|   01 — | — Title
|   Description
|   (Optional Button)
|--------------------------------------------------------------------------
*/
function kn_render_investing_number_block($data, $show_button = true) {

    if (!$data || empty($data['number'])) return '';

    $number      = $data['number'];
    $title       = $data['title'] ?? '';
    $description = $data['description'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_link = $data['button_link'] ?? '';

    ob_start(); ?>

    <div class="ik-invest-number-block">

        <div class="ik-invest-number-row">

            <span class="ik-invest-number">
                <?php echo esc_html($number); ?>
            </span>

            <span class="ik-invest-number-separator"></span>

            <span class="ik-invest-number-title">
                <?php echo esc_html($title); ?>
            </span>

        </div>

        <?php if ($description): ?>
            <p class="ik-invest-number-description">
                <?php echo esc_html($description); ?>
            </p>
        <?php endif; ?>

        <?php if ($show_button && $button_text && $button_link): ?>
            <a href="<?php echo esc_url( home_url( $button_link ) ); ?>" class="ik-invest-number-btn">
                <span><?php echo esc_html($button_text); ?></span>
                <img src="<?php echo esc_url( ik_upload_url( '2025/12/System-Icons-1.svg' ) ); ?>" alt="" class="ik-invest-btn-icon">
            </a>
        <?php endif; ?>

    </div>

    <?php
    return ob_get_clean();
}

/*
|--------------------------------------------------------------------------
| Render Multiple Image Cards (grid)
|--------------------------------------------------------------------------
*/
function kn_render_investing_image_grid($items = []) {

    if (!$items || !is_array($items)) return '';

    ob_start(); ?>

    <div class="ik-invest-image-grid">
        <?php foreach ($items as $item):
            if (!$item['img']) continue;
            echo kn_render_investing_image_card($item['img'], $item['text'] ?? '');
        endforeach; ?>
    </div>

    <?php
    return ob_get_clean();
}


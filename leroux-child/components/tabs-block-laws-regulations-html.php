<?php ?>
<div id="<?php echo esc_attr($uid); ?>" class="laws-tabs-block">
    <div class="laws-safe-area">

        <!-- RED LINE -->
        <div class="laws-red-line"></div>

        <!-- MAIN TITLE -->
        <?php if ( $title_primary || $title_secondary ): ?>
            <h2 class="laws-main-title">
                <?php if ( $title_primary ): ?>
                    <span class="laws-title-serif"><?php echo esc_html( $title_primary ); ?></span>
                <?php endif; ?>
                <?php if ( $title_secondary ): ?>
                    <span class="laws-title-sans"><?php echo esc_html( $title_secondary ); ?></span>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <!-- NOTE: No intro text under title (as requested) -->

        <!-- TABS NAV -->
        <div class="laws-tabs-nav-wrapper">
            <ul class="laws-tabs-nav">
                <?php if ( $tab_1_label ): ?>
                    <li class="active" data-tab="1"><?php echo esc_html( $tab_1_label ); ?></li>
                <?php endif; ?>
                <?php if ( $tab_2_label ): ?>
                    <li data-tab="2"><?php echo esc_html( $tab_2_label ); ?></li>
                <?php endif; ?>
            </ul>
        </div>
		<!-- TABS DIVIDER -->
<div class="laws-tabs-divider">
    <span class="laws-tabs-divider-active"></span>
</div>


        <!-- TABS CONTENT -->
        <div class="laws-tabs-content">

            <!-- TAB 1 PANEL -->
            <div class="laws-tab-panel active" data-tab="1">
                <?php if ( $first_text_first_tab ): ?>
                    <p class="laws-tab-intro">
                        <?php echo esc_html( $first_text_first_tab ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $first_red_title_first_tab ): ?>
                    <div class="laws-section-label">
                        <?php echo esc_html( $first_red_title_first_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="laws-info-grid">
                    <?php if ( $first_information_title_first_tab || $first_information_text_first_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $first_information_title_first_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $first_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_information_text_first_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $first_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_information_title_first_tab || $second_information_text_first_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $second_information_title_first_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $second_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_information_text_first_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $second_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_information_title_first_tab || $third_information_text_first_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $third_information_title_first_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $third_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $third_information_text_first_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $third_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $fourth_information_title_first_tab || $fourth_information_text_first_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $fourth_information_title_first_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $fourth_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $fourth_information_text_first_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $fourth_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
					<?php if ( $fifth_information_title_first_tab || $fifth_information_text_first_tab ): ?>
<div class="laws-info-item">
    <?php if ( $fifth_information_title_first_tab ): ?>
        <div class="laws-info-title"><?php echo esc_html( $fifth_information_title_first_tab ); ?></div>
    <?php endif; ?>
    <?php if ( $fifth_information_text_first_tab ): ?>
        <div class="laws-info-text"><?php echo esc_html( $fifth_information_text_first_tab ); ?></div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if ( $sixth_information_title_first_tab || $sixth_information_text_first_tab ): ?>
<div class="laws-info-item">
    <?php if ( $sixth_information_title_first_tab ): ?>
        <div class="laws-info-title"><?php echo esc_html( $sixth_information_title_first_tab ); ?></div>
    <?php endif; ?>
    <?php if ( $sixth_information_text_first_tab ): ?>
        <div class="laws-info-text"><?php echo esc_html( $sixth_information_text_first_tab ); ?></div>
    <?php endif; ?>
</div>
<?php endif; ?>

                </div>

                <div class="laws-divider"></div>

                <!-- NEW BOTTOM ROW: text on left, button on right -->
                <div class="laws-bottom-row">
                    <?php if ( $bottom_text_first_tab ): ?>
                        <div class="laws-bottom-text">
                            <?php echo esc_html( $bottom_text_first_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $button_text_first_tab && $button_link_first_tab ): ?>
                        <div class="laws-button-wrapper">
                            <a class="laws-cta-button" href="<?php echo esc_url( home_url( $button_link_first_tab ) ); ?>">
                                <span class="laws-cta-text">
                                    <?php echo esc_html( $button_text_first_tab ); ?>
                                </span>
                                <?php if ( $button_icon_url ): ?>
                                    <span class="laws-cta-icon">
                                        <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                                    </span>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- TAB 2 PANEL -->
            <div class="laws-tab-panel" data-tab="2">
                <?php if ( $first_text_second_tab ): ?>
                    <p class="laws-tab-intro">
                        <?php echo esc_html( $first_text_second_tab ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $first_red_title_second_tab ): ?>
                    <div class="laws-section-label">
                        <?php echo esc_html( $first_red_title_second_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="laws-info-grid">
                    <?php if ( $first_information_title_second_tab || $first_information_text_second_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $first_information_title_second_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $first_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_information_text_second_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $first_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_information_title_second_tab || $second_information_text_second_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $second_information_title_second_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $second_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_information_text_second_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $second_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_information_title_second_tab || $third_information_text_second_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $third_information_title_second_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $third_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $third_information_text_second_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $third_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $fourth_information_title_second_tab || $fourth_information_text_second_tab ): ?>
                        <div class="laws-info-item">
                            <?php if ( $fourth_information_title_second_tab ): ?>
                                <div class="laws-info-title">
                                    <?php echo esc_html( $fourth_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $fourth_information_text_second_tab ): ?>
                                <div class="laws-info-text">
                                    <?php echo esc_html( $fourth_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
					<?php if ( $fifth_information_title_second_tab || $fifth_information_text_second_tab ): ?>
<div class="laws-info-item">
    <?php if ( $fifth_information_title_second_tab ): ?>
        <div class="laws-info-title"><?php echo esc_html( $fifth_information_title_second_tab ); ?></div>
    <?php endif; ?>
    <?php if ( $fifth_information_text_second_tab ): ?>
        <div class="laws-info-text"><?php echo esc_html( $fifth_information_text_second_tab ); ?></div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if ( $sixth_information_title_second_tab || $sixth_information_text_second_tab ): ?>
<div class="laws-info-item">
    <?php if ( $sixth_information_title_second_tab ): ?>
        <div class="laws-info-title"><?php echo esc_html( $sixth_information_title_second_tab ); ?></div>
    <?php endif; ?>
    <?php if ( $sixth_information_text_second_tab ): ?>
        <div class="laws-info-text"><?php echo esc_html( $sixth_information_text_second_tab ); ?></div>
    <?php endif; ?>
</div>
<?php endif; ?>

                </div>

                <div class="laws-divider"></div>

                <!-- NEW BOTTOM ROW: text on left, button on right -->
                <div class="laws-bottom-row">
                    <?php if ( $bottom_text_second_tab ): ?>
                        <div class="laws-bottom-text">
                            <?php echo esc_html( $bottom_text_second_tab ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $button_text_second_tab && $button_link_second_tab ): ?>
                        <div class="laws-button-wrapper">
                            <a class="laws-cta-button" href="<?php echo esc_url( home_url( $button_link_second_tab ) ); ?>">
                                <span class="laws-cta-text">
                                    <?php echo esc_html( $button_text_second_tab ); ?>
                                </span>
                                    <?php if ( $button_icon_url ): ?>
                                        <span class="laws-cta-icon">
                                            <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                                        </span>
                                    <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- /.laws-tabs-content -->
    </div><!-- /.laws-safe-area -->
</div><!-- /.laws-tabs-block -->

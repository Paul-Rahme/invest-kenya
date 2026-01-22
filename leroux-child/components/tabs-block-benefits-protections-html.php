<?php ?>
<div id="<?php echo esc_attr($uid); ?>" class="incentives-tabs-block">
    <div class="incentives-safe-area">

        <!-- RED LINE -->
        <div class="incentives-red-line"></div>

        <!-- MAIN TITLE -->
        <?php if ( $title_primary || $title_secondary ): ?>
            <h2 class="incentives-main-title">
                <?php if ( $title_primary ): ?>
                    <span class="incentives-title-serif"><?php echo esc_html( $title_primary ); ?></span>
                <?php endif; ?>
                <?php if ( $title_secondary ): ?>
                    <span class="incentives-title-sans"><?php echo esc_html( $title_secondary ); ?></span>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <!-- INTRO TEXT -->
        <?php if ( $first_text_first_section ): ?>
            <p class="incentives-intro-text">
                <?php echo esc_html( $first_text_first_section ); ?>
            </p>
        <?php endif; ?>

        <!-- TABS NAV -->
        <div class="incentives-tabs-nav-wrapper">
            <ul class="incentives-tabs-nav">
                <?php if ( $tab_1_label ): ?>
                    <li class="active" data-tab="1"><?php echo esc_html( $tab_1_label ); ?></li>
                <?php endif; ?>
                <?php if ( $tab_2_label ): ?>
                    <li data-tab="2"><?php echo esc_html( $tab_2_label ); ?></li>
                <?php endif; ?>
                <?php if ( $tab_3_label ): ?>
                    <li data-tab="3"><?php echo esc_html( $tab_3_label ); ?></li>
                <?php endif; ?>
            </ul>
			<div class="incentives-tabs-indicator"></div>
        </div>

        <!-- TABS CONTENT -->
        <div class="incentives-tabs-content">

            <!-- TAB 1 PANEL -->
            <div class="incentives-tab-panel active" data-tab="1">
                <?php if ( $first_text_first_tab ): ?>
                    <p class="incentives-tab-intro">
                        <?php echo esc_html( $first_text_first_tab ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $first_red_title_first_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $first_red_title_first_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-info-grid">
                    <?php if ( $first_information_title_first_tab || $first_information_text_first_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $first_information_title_first_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $first_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_information_text_first_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $first_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_information_title_first_tab || $second_information_text_first_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $second_information_title_first_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $second_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_information_text_first_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $second_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_information_title_first_tab || $third_information_text_first_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $third_information_title_first_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $third_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $third_information_text_first_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $third_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $fourth_information_title_first_tab || $fourth_information_text_first_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $fourth_information_title_first_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $fourth_information_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $fourth_information_text_first_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $fourth_information_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="incentives-divider"></div>

                <?php if ( $second_red_title_first_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $second_red_title_first_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-steps-row">
                    <div class="incentives-step-item">
                        <?php if ( $first_step_number_first_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $first_step_number_first_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $first_step_title_first_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $first_step_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_step_text_first_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $first_step_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="incentives-step-item">
                        <?php if ( $second_step_number_first_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $second_step_number_first_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $second_step_title_first_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $second_step_title_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_step_text_first_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $second_step_text_first_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

<div class="incentives-bottom-row">
    <?php if ( $bottom_text_first_tab ): ?>
        <div class="incentives-bottom-text">
            <?php echo esc_html( $bottom_text_first_tab ); ?>
        </div>
    <?php endif; ?>

    <?php if ( $button_text_first_tab && $button_link_first_tab ): ?>
        <div class="incentives-button-wrapper">
            <a class="incentives-cta-button" href="<?php echo esc_url( home_url( $button_link_first_tab ) ); ?>">
                <span class="incentives-cta-text">
                    <?php echo esc_html( $button_text_first_tab ); ?>
                </span>
                <?php if ( $button_icon_url ): ?>
                    <span class="incentives-cta-icon">
                        <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                    </span>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>
</div>

                </div>
            </div>

            <!-- TAB 2 PANEL -->
            <div class="incentives-tab-panel" data-tab="2">
                <?php if ( $first_text_second_tab ): ?>
                    <p class="incentives-tab-intro">
                        <?php echo esc_html( $first_text_second_tab ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $first_red_title_second_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $first_red_title_second_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-info-grid">
                    <?php if ( $first_information_title_second_tab || $first_information_text_second_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $first_information_title_second_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $first_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_information_text_second_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $first_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_information_title_second_tab || $second_information_text_second_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $second_information_title_second_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $second_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_information_text_second_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $second_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_information_title_second_tab || $third_information_text_second_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $third_information_title_second_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $third_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $third_information_text_second_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $third_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $fourth_information_title_second_tab || $fourth_information_text_second_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $fourth_information_title_second_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $fourth_information_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $fourth_information_text_second_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $fourth_information_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="incentives-divider"></div>

                <?php if ( $second_red_title_second_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $second_red_title_second_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-steps-row">
                    <div class="incentives-step-item">
                        <?php if ( $first_step_number_second_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $first_step_number_second_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $first_step_title_second_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $first_step_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_step_text_second_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $first_step_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="incentives-step-item">
                        <?php if ( $second_step_number_second_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $second_step_number_second_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $second_step_title_second_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $second_step_title_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_step_text_second_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $second_step_text_second_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

<div class="incentives-bottom-row">
    <?php if ( $bottom_text_second_tab ): ?>
        <div class="incentives-bottom-text">
            <?php echo esc_html( $bottom_text_second_tab ); ?>
        </div>
    <?php endif; ?>

    <?php if ( $button_text_second_tab && $button_link_second_tab ): ?>
        <div class="incentives-button-wrapper">
            <a class="incentives-cta-button" href="<?php echo esc_url( home_url( $button_link_second_tab ) ); ?>">
                <span class="incentives-cta-text">
                    <?php echo esc_html( $button_text_second_tab ); ?>
                </span>
                <?php if ( $button_icon_url ): ?>
                    <span class="incentives-cta-icon">
                        <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                    </span>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>
</div>

                </div>
            </div>

            <!-- TAB 3 PANEL -->
            <div class="incentives-tab-panel" data-tab="3">
                <?php if ( $first_text_third_tab ): ?>
                    <p class="incentives-tab-intro">
                        <?php echo esc_html( $first_text_third_tab ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $first_red_title_third_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $first_red_title_third_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-info-grid">
                    <?php if ( $first_information_title_third_tab || $first_information_text_third_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $first_information_title_third_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $first_information_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_information_text_third_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $first_information_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $second_information_title_third_tab || $second_information_text_third_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $second_information_title_third_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $second_information_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_information_text_third_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $second_information_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $third_information_title_third_tab || $third_information_text_third_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $third_information_title_third_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $third_information_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $third_information_text_third_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $third_information_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $fourth_information_title_third_tab || $fourth_information_text_third_tab ): ?>
                        <div class="incentives-info-item">
                            <?php if ( $fourth_information_title_third_tab ): ?>
                                <div class="incentives-info-title">
                                    <?php echo esc_html( $fourth_information_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $fourth_information_text_third_tab ): ?>
                                <div class="incentives-info-text">
                                    <?php echo esc_html( $fourth_information_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="incentives-divider"></div>

                <?php if ( $second_red_title_third_tab ): ?>
                    <div class="incentives-section-label">
                        <?php echo esc_html( $second_red_title_third_tab ); ?>
                    </div>
                <?php endif; ?>

                <div class="incentives-steps-row">
                    <div class="incentives-step-item">
                        <?php if ( $first_step_number_third_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $first_step_number_third_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $first_step_title_third_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $first_step_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $first_step_text_third_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $first_step_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="incentives-step-item">
                        <?php if ( $second_step_number_third_tab ): ?>
                            <div class="incentives-step-circle">
                                <span><?php echo esc_html( $second_step_number_third_tab ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="incentives-step-content">
                            <?php if ( $second_step_title_third_tab ): ?>
                                <div class="incentives-step-title">
                                    <?php echo esc_html( $second_step_title_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $second_step_text_third_tab ): ?>
                                <div class="incentives-step-text">
                                    <?php echo esc_html( $second_step_text_third_tab ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

<div class="incentives-bottom-row">
    <?php if ( $bottom_text_third_tab ): ?>
        <div class="incentives-bottom-text">
            <?php echo esc_html( $bottom_text_third_tab ); ?>
        </div>
    <?php endif; ?>

    <?php if ( $button_text_third_tab && $button_link_third_tab ): ?>
        <div class="incentives-button-wrapper">
            <a class="incentives-cta-button" href="<?php echo esc_url( home_url( $button_link_third_tab ) ); ?>">
                <span class="incentives-cta-text">
                    <?php echo esc_html( $button_text_third_tab ); ?>
                </span>
                <?php if ( $button_icon_url ): ?>
                    <span class="incentives-cta-icon">
                        <img src="<?php echo esc_url( $button_icon_url ); ?>" alt="" />
                    </span>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>
</div>

                </div>
            </div>

        </div><!-- /.incentives-tabs-content -->
    </div><!-- /.incentives-safe-area -->
</div><!-- /.incentives-tabs-block -->

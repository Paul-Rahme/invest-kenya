<?php
// SECURITY
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| File: second-section-investment-trends.php
|--------------------------------------------------------------------------
| Shortcode: [second_section_investment_trends]
|--------------------------------------------------------------------------
| - ZERO padding, ZERO background on outer component
| - Parent Elementor container handles spacing/background
| - Internal 1530px safe area (no left/right padding)
| - 3 tab buttons switch between 3 lists (First/Second/Third)
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'shortcode_second_section_investment_trends' ) ) {

	function shortcode_second_section_investment_trends() {

		$uid = 'ik-second-investment-trends-' . wp_rand(1000, 9999);

		// ---------------------------------------------------------
		// ACF FIELDS — TOP
		// ---------------------------------------------------------
		$main_title  = get_field('main_title_section_section');
		$desc_text   = get_field('descriptive_text_section_section');

		$btn_1_text  = get_field('first_button_text_section_section');
		$btn_2_text  = get_field('second_button_text_section_section');
		$btn_3_text  = get_field('third_button_text_section_section');

		// ---------------------------------------------------------
		// HELPERS
		// ---------------------------------------------------------
		$build_column = function( $list_key, $side_key ) {

			// side_key: left | right
			$title = get_field("title_{$side_key}_column_{$list_key}");
			$label = get_field("label_{$side_key}_column_{$list_key}");

			$rows = [];

			$ordinals = [
				1 => 'first',
				2 => 'second',
				3 => 'third',
				4 => 'fourth',
				5 => 'fifth',
			];

			for ( $i = 1; $i <= 5; $i++ ) {

				$ordinal = $ordinals[$i];

				$text_field  = "{$ordinal}_text_{$side_key}_column_{$list_key}";
				$value_field = "{$ordinal}_value_{$side_key}_column_{$list_key}";

				$rows[] = [
					'text'  => get_field( $text_field ),
					'value' => get_field( $value_field ),
				];
			}

			return [
				'title' => $title,
				'label' => $label,
				'rows'  => $rows,
			];
		};

		$build_panel = function( $list_key ) use ( $build_column ) {
			return [
				'left'  => $build_column( $list_key, 'left' ),
				'right' => $build_column( $list_key, 'right' ),
			];
		};

		$panels = [
			'first_list'  => $build_panel('first_list'),
			'second_list' => $build_panel('second_list'),
			'third_list'  => $build_panel('third_list'),
		];

		ob_start();
		?>

		<div id="<?php echo esc_attr( $uid ); ?>" class="ik-second-investment-trends">
			<div class="ik-safe-area">

				<?php if ( $main_title ): ?>
					<h2 class="ik-title"><?php echo esc_html( $main_title ); ?></h2>
				<?php endif; ?>

				<?php if ( $desc_text ): ?>
					<p class="ik-desc"><?php echo esc_html( $desc_text ); ?></p>
				<?php endif; ?>

				<div class="ik-tabs">
					<button type="button" class="ik-tab-btn is-active" data-tab="first_list">
						<?php echo esc_html( $btn_1_text ? $btn_1_text : '2024' ); ?>
					</button>
					<button type="button" class="ik-tab-btn" data-tab="second_list">
						<?php echo esc_html( $btn_2_text ? $btn_2_text : '2023' ); ?>
					</button>
					<button type="button" class="ik-tab-btn" data-tab="third_list">
						<?php echo esc_html( $btn_3_text ? $btn_3_text : '2022' ); ?>
					</button>
				</div>

				<?php
				$render_column = function( $col ) {

					$title = isset($col['title']) ? $col['title'] : '';
					$label = isset($col['label']) ? $col['label'] : '';
					$rows  = isset($col['rows'])  ? $col['rows']  : [];

					?>
					<div class="ik-col">

						<div class="ik-col-head">
							<?php if ( $title ): ?>
								<div class="ik-col-title"><?php echo esc_html( $title ); ?></div>
							<?php endif; ?>

							<?php if ( $label ): ?>
								<div class="ik-col-label"><?php echo esc_html( $label ); ?></div>
							<?php endif; ?>
						</div>

						<div class="ik-list">
							<?php foreach ( $rows as $row ): ?>
								<?php
								$text  = isset($row['text']) ? $row['text'] : '';
								$value = isset($row['value']) ? $row['value'] : '';
								?>
								<div class="ik-item">
									<div class="ik-item-text"><?php echo esc_html( $text ); ?></div>
									<div class="ik-item-value"><?php echo esc_html( $value ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>

					</div>
					<?php
				};
				?>

				<div class="ik-panels">
					<?php foreach ( $panels as $key => $panel ): ?>
						<div class="ik-panel <?php echo $key === 'first_list' ? 'is-active' : ''; ?>" data-panel="<?php echo esc_attr( $key ); ?>">
							<div class="ik-grid">
								<?php $render_column( $panel['left'] ); ?>
								<?php $render_column( $panel['right'] ); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>

		<style>
			/* OUTER: ZERO padding/background (parent handles spacing) */
			#<?php echo esc_attr( $uid ); ?>.ik-second-investment-trends{
				padding:0 !important;
				margin:0 !important;
				background:transparent !important;
			}

			/* 1530px safe area, NO left/right padding */
			#<?php echo esc_attr( $uid ); ?> .ik-safe-area{
				max-width:1530px !important;
				width:100% !important;
				margin-left:auto !important;
				margin-right:auto !important;
				padding-left:0 !important;
				padding-right:0 !important;
				box-sizing:border-box !important;
			}

			/* TYPO */
			#<?php echo esc_attr( $uid ); ?> .ik-title{
				margin:0 0 14px 0 !important;
				color:#101110 !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:600 !important;
				font-size:32px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-desc{
				margin:0 0 20px 0 !important;
				color:#101110 !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:400 !important;
				font-size:18px !important;
				line-height:26px !important;
				letter-spacing:0 !important;
				max-width:980px;
			}

			/* TABS */
			#<?php echo esc_attr( $uid ); ?> .ik-tabs{
				display:flex;
				gap:10px;
				align-items:center;
				margin:0 0 24px 0 !important;
				padding:0 !important;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-tab-btn{
				height:38px !important;
				min-width:82.7890625px !important;
				border-radius:4px !important;

				background:#ffffff !important;
				color:#364153 !important;

				border:1px solid #e5e7eb !important;
				cursor:pointer !important;

				font-family:'DM Sans', sans-serif !important;
				font-weight:400 !important;
				font-size:14px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
				text-align:center !important;

				padding:0 18px !important;
				transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-tab-btn.is-active{
				background:#DB2129 !important;
				color:#ffffff !important;
				border-color:#DB2129 !important;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-tab-btn:focus{
				outline:none !important;
				box-shadow:none !important;
			}

			/* PANELS / GRID */
			#<?php echo esc_attr( $uid ); ?> .ik-panel{ display:none; }
			#<?php echo esc_attr( $uid ); ?> .ik-panel.is-active{ display:block; }

			#<?php echo esc_attr( $uid ); ?> .ik-grid{
				display:grid;
				grid-template-columns: 1fr 1fr;
				gap:28px;
				align-items:start;
			}

			/* Column head */
			#<?php echo esc_attr( $uid ); ?> .ik-col-head{
				display:flex;
				justify-content:space-between;
				align-items:flex-start;
				margin:0 0 14px 0 !important;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-col-title{
				color:#0A0A0A !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:600 !important;
				font-size:20px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
				margin:0 !important;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-col-label{
				color:#6A7282 !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:400 !important;
				font-size:14px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
				margin-top:2px !important;
				white-space:nowrap;
			}

			/* List items */
			#<?php echo esc_attr( $uid ); ?> .ik-list{
				display:flex;
				flex-direction:column;
				gap:14px;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-item{
				border-radius:10px !important;
				border:1px solid #e5e7eb !important;
				background:#ffffff !important;

				padding-top:17px !important;
				padding-right:17px !important;
				padding-bottom:17px !important;
				padding-left:25px !important;

				box-sizing:border-box !important;

				display:flex;
				align-items:center;
				justify-content:space-between;
				gap:16px;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-item-text{
				color:#101110 !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:400 !important;
				font-size:16px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
				white-space:nowrap;
				overflow:hidden;
				text-overflow:ellipsis;
				max-width:70%;
				padding-bottom:1px;
			}

			#<?php echo esc_attr( $uid ); ?> .ik-item-value{
				color:#101110 !important;
				font-family:'DM Sans', sans-serif !important;
				font-weight:600 !important;
				font-size:22px !important;
				line-height:100% !important;
				letter-spacing:0 !important;
				text-align:right !important;
				white-space:nowrap;
				margin-left:auto;
			}

			/* Responsive */
			@media (max-width: 1024px){
				#<?php echo esc_attr( $uid ); ?> .ik-grid{
					grid-template-columns:1fr;
					gap:22px;
				}
				#<?php echo esc_attr( $uid ); ?> .ik-tabs{
					flex-wrap:wrap;
					gap:10px;
				}
				#<?php echo esc_attr( $uid ); ?> .ik-item-text{
					max-width:62%;
				}
			}

			@media (max-width: 520px){
				#<?php echo esc_attr( $uid ); ?> .ik-title{ font-size:26px !important; }
				#<?php echo esc_attr( $uid ); ?> .ik-desc{
					font-size:16px !important;
					line-height:24px !important;
				}
				#<?php echo esc_attr( $uid ); ?> .ik-item-value{ font-size:20px !important; }
			}
		</style>

		<script>
		(function(){
			var root = document.getElementById('<?php echo esc_js( $uid ); ?>');
			if(!root) return;

			var btns   = root.querySelectorAll('.ik-tab-btn');
			var panels = root.querySelectorAll('.ik-panel');

			function activate(key){
				btns.forEach(function(b){
					b.classList.toggle('is-active', b.getAttribute('data-tab') === key);
				});
				panels.forEach(function(p){
					p.classList.toggle('is-active', p.getAttribute('data-panel') === key);
				});
			}

			btns.forEach(function(btn){
				btn.addEventListener('click', function(){
					activate(btn.getAttribute('data-tab'));
				});
			});

			activate('first_list');
		})();
		</script>

		<?php
		return ob_get_clean();
	}
}

add_shortcode( 'second_section_investment_trends', 'shortcode_second_section_investment_trends' );

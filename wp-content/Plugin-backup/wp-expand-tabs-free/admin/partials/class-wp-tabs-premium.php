<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/admin/partials
 */

/**
 * WP_Tabs_Premium_Page class.
 *
 * @since    2.0.0
 */
class WP_Tabs_Premium_Page {

	/**
	 * Admin help page
	 *
	 * @since    2.0.0
	 */
	public function premium_page() {
		add_submenu_page(
			'edit.php?post_type=sp_wp_tabs',
			__( 'Premium', 'wp-expand-tabs-free' ),
			__( 'Premium', 'wp-expand-tabs-free' ),
			'manage_options',
			'tabs_premium',
			array( $this, 'premium_page_callback' )
		);
	}

	/**
	 * Happy users.
	 *
	 * @param boolean $username Happy user name.
	 * @param array   $args Happy user args.
	 * @return $data
	 */
	public function happy_users( $username = 'shapedplugin', $args = array() ) {
		if ( $username ) {
			$params = array(
				'timeout'   => 10,
				'sslverify' => false,
			);

			$raw = wp_remote_retrieve_body( wp_remote_get( 'http://wptally.com/api/' . $username, $params ) );
			$raw = json_decode( $raw, true );

			if ( array_key_exists( 'error', $raw ) ) {
				$data = array(
					'error' => $raw['error'],
				);
			} else {
				$data = $raw;
			}
		} else {
			$data = array(
				'error' => __( 'No data found!', 'wp-expand-tabs-free' ),
			);
		}

		return $data;
	}

	/**
	 * Premium Page Callback
	 */
	public function premium_page_callback() {
		wp_enqueue_style( 'sp-tab__admin-premium', esc_url( WP_TABS_URL . 'admin/css/premium-page.min.css' ), array(), WP_TABS_VERSION );
		wp_enqueue_style( 'sp-tab__admin-premium-modal', esc_url( WP_TABS_URL . 'admin/css/modal-video.min.css' ), array(), WP_TABS_VERSION );
		wp_enqueue_script( 'sp-tab__admin-premium', esc_url( WP_TABS_URL . 'admin/js/jquery-modal-video.min.js' ), array( 'jquery' ), WP_TABS_VERSION, true );
		?>
	<div class="sp-tabs__premium-page">
		<!-- Banner section start -->
		<section class="sp-tabs__banner">
			<div class="sp-tabs__container">
				<div class="row">
					<div class="sp-tabs__col-xl-6">
						<div class="sp-tabs__banner-content">
							<h2 class="sp-tabs__font-30 main-color sp-tabs__font-weight-500"><?php esc_html_e( 'Upgrade To WP Tabs Pro', 'wp-expand-tabs-free' ); ?></h2>
							<h4 class="sp-tabs__mt-10 sp-tabs__font-18 sp-tabs__font-weight-500"><?php echo wp_kses_post( 'Supercharge <strong>Your Tabs Page or Section</strong> with powerful functionality!', 'wp-expand-tabs-free' ); ?></h4>
							<p class="sp-tabs__mt-25 text-color-2 line-height-20 sp-tabs__font-weight-400"><?php esc_html_e( 'A highly flexible and customizable WordPress tabs plugin designed for everyone including designers & developers.', 'wp-expand-tabs-free' ); ?></p>
							<p class="sp-tabs__mt-20 text-color-2 sp-tabs__line-height-20 sp-tabs__font-weight-400"><?php esc_html_e( 'The WP Tabs Pro plugin has plenty of incredible features like different layouts, Vertical tabs, Horizontal tabs, 10+ Tabs positions, Deep-linking, Multi-level or Nested, Flat tabs, Tabs title with subtitle icon, CSS Transitions, and 16 Animation effects, 940+ Google fonts, 100+ Essential options and much more.', 'wp-expand-tabs-free' ); ?></p>
							<p class="sp-tabs__mt-25 text-color-2 line-height-20 sp-tabs__font-weight-400"><?php esc_html_e( 'You can also create tabs from existing WordPress posts, pages, taxonomy, and much more.', 'wp-expand-tabs-free' ); ?></p>
						</div>
						<div class="sp-tabs__banner-button sp-tabs__mt-40">
							<a class="sp-tabs__btn sp-tabs__btn-sky" href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank">Upgrade To Pro Now</a>
							<a class="sp-tabs__btn sp-tabs__btn-border ml-16 sp-tabs__mt-15" href="https://demo.shapedplugin.com/wp-tabs/?ref=1" target="_blank">Live Demo</a>
						</div>
					</div>
					<div class="sp-tabs__col-xl-6">
						<div class="sp-tabs__banner-img">
							<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/wp-tabs-pro-vector.svg' ); ?>" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner section End -->

		<!-- Count section Start -->
		<section class="sp-tabs__count">
			<div class="sp-tabs__container">
				<div class="sp-tabs__count-area">
					<div class="count-item">
						<h3 class="sp-tabs__font-24">
						<?php
						$plugin_data  = $this->happy_users();
						$plugin_names = array_values( $plugin_data['plugins'] );

						$active_installations = array_column( $plugin_names, 'installs', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-expand-tabs-free'] ) . '+';
						?>
						</h3>
						<span class="sp-tabs__font-weight-400">Active Installations</span>
					</div>
					<div class="count-item">
						<h3 class="sp-tabs__font-24">
						<?php
						$active_installations = array_column( $plugin_names, 'downloads', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-expand-tabs-free'] );
						?>
						</h3>
						<span class="sp-tabs__font-weight-400">all time downloads</span>
					</div>
					<div class="count-item">
						<h3 class="sp-tabs__font-24">
						<?php
						$active_installations = array_column( $plugin_names, 'rating', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-expand-tabs-free'] ) . '/5';
						?>
						</h3>
						<span class="sp-tabs__font-weight-400">user reviews</span>
					</div>
				</div>
			</div>
		</section>
		<!-- Count section End -->

		<!-- Video Section Start -->
		<section class="sp-tabs__video">
			<div class="sp-tabs__container">
				<div class="section-title text-center">
					<h2 class="sp-tabs__font-28">Designed for Everyone including Designers & Developers</h2>
					<h4 class="sp-tabs__font-16 sp-tabs__mt-10 sp-tabs__font-weight-400">Learn why WP Tabs Pro is the best Tabs builder plugin for WordPress.</h4>
				</div>
				<div class="video-area text-center">
					<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/wp-tabs-pro-vector-2.svg' ); ?>" alt="">
					<div class="video-button">
						<a class="js-video-button" href="#" data-channel="youtube" data-video-url="//www.youtube.com/embed/B9QUvJNmvqo">
							<span><i class="fa fa-play"></i></span>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Video Section End -->

		<!-- Features Section Start -->
		<section class="sp-tabs__feature">
			<div class="sp-tabs__container">
				<div class="section-title text-center">
					<h2 class="sp-tabs__font-28">Amazing Pro Key Features</h2>
					<h4 class="sp-tabs__font-16 sp-tabs__mt-10 sp-tabs__font-weight-400">Upgrade To Pro and can get access to our full suite of features. It matters for boosting sales!.</h4>
				</div>
				<div class="feature-wrapper">
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/responsive-design.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Responsive, SEO-friendly, and Lightweight</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">WP Tabs Pro has unique responsive features with cross-browser and devices supported, fully compatible with tablet, desktop, and mobile. The plugin is fully SEO-friendly, and slick, lightweight.</p>
							</div>
						</div>

						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="
								<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/layout.svg' ); ?>
								" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">2 Tabs layouts (Horizontal and Vertical)</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">WP Tabs Pro comes with two unique layout presets like Horizontal and Vertical to display your tabs. The layout presets are fully customizable with various options.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="
								<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Positions.svg' ); ?>
								" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">10 Flexible Ways To Tabs Positions</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Tabs are very flexible and customizable. It can be positioned in 10 flexible ways, (top-left, top-center, top-right, top-compact, bottom-left, bottom-center, bottom-right, bottom-compact).</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Action.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Event or Action–supports Click/Mouseover/AutoPlay</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">WP Tabs Pro supports click/mouseover/autoplay to select a tab on desktops. Super-fast CSS3 transitions are used to achieve faster and smoother performance without any delays.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Custom-Tab-Icons.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Custom Tab Icons Including FontAwesome Library</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">In WP Tabs Pro, you can upload custom PNG, SVG image icons for tabs including the FontAwesome icon library. You can customize the tabs icon color, hover color, size, positions, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/post.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Create Tabs from posts, pages, taxonomy</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">You can create WordPress tabs from Posts, Pages, Custom Post Types, and Taxonomy easily with the Pro version. Select a post type, filter, order, order by, and limit.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Customize-Everything-Easily.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Customize Everything Easily.</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">WP Tabs Pro is fully responsive and touch-friendly with a lot of customization options that can be integrated into your site or blog quickly without writing any code. </p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Nested.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Multi-level or Nested Tabs</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Creating multi-level or nested tabs for your website is super easy. You can create unlimited multi-level or nested tabs with different layouts and positions.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Multiple-Tabs-Instances.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Multiple Tabs Instances on the Same Page</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Nested and multiple tabs instances are allowed on the same page with different layouts and options can be set without any conflict. Easy to use and super simple.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/AutoPlay.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">AutoPlay Tabs Supported</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">
								Automatically animate through Tabs when visitors arrive on your site. You can set interval time of autoplay and optional stop on hover/click (smart autoplay).</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Deep-Linking.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Specific Tab Deep-Linking</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">WP Tabs Pro supports deep linking. Makes URL change automatically when you select tabs and you can easily link to a specific tab with a hashtag. Tab ids are adjustable and SEO-Friendly.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Content.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Supported Tabs Content</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Place absolutely any HTML content, images, shortcodes, video, audio, forms, maps, iframe, image slider, galleries) into tabs.  You can also have external links or a link to a specific tab.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/typo.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Advanced Typography (Fonts, Color & Styling)</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Set font family, size, weight, text-transform, & colors to match your brand. The Pro version supports 950+ Google fonts and typography options. You can enable or disable fonts loading.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/Translation-RTL-Ready.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Multisite, Multilingual, RTL, Accessibility Ready</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">The plugin is Multisite, Multilingual, RTL, and Accessibility ready. For Arabic, Hebrew, Persian, etc. languages, you can select the right-to-left option for slider direction, without writing any CSS.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/page-bilder.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Page Builders & Countless Theme Compatibility</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">The plugin works smoothly with the popular themes and page builders plugins, e,g: Gutenberg, WPBakery, Elementor/Pro, Divi builder, BeaverBuilder, Fusion Builder, SiteOrgin, Themify Builder, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/premium/support.svg' ); ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-tabs__font-18 sp-tabs__font-weight-600">Top-notch Support and Frequently Updates</h3>
								<p class="sp-tabs__font-15 sp-tabs__mt-15 sp-tabs__line-height-24">Our dedicated top-notch support team is always ready to offer you world-class support and help when needed. Our engineering team is continuously working to improve the plugin and release new versions!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Features Section End -->

		<!-- Buy Section Start -->
		<section class="sp-tabs__buy">
			<div class="sp-tabs__container">
				<div class="row">
					<div class="sp-tabs__col-xl-12">
						<div class="buy-content text-center">
							<h2 class="sp-tabs__font-28">Join 
							<?php
							$install = 0;
							foreach ( $plugin_names as &$plugin_name ) {
								$install += $plugin_name['installs'];
							}
							echo esc_attr( $install + '15000' ) . '+';
							?>
							Happy Users in 160+ Countries </h2>
							<p class="sp-tabs__font-16 sp-tabs__mt-25 sp-tabs__line-height-22">98% of customers are happy with <b>ShapedPlugin's</b> products and support. <br>
								So it’s a great time to join them.</p>
							<a class="sp-tabs__btn sp-tabs__btn-buy sp-tabs__mt-40" href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank">Get Started for $29 Today!</a>
							<span>14 Days Money-back Guarantee! No Question Asked.</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Buy Section End -->

		<!-- Testimonial section start -->
		<div class="testimonial-wrapper">
		<section class="sp-tabs__premium testimonial">
			<div class="row">
				<div class="col-lg-6">
					<div class="testimonial-area">
						<div class="testimonial-content">
							<p>Very nice plugin, that looks great and is easy to use. The plugin and support are  very high quality. The number of configuration options is impressive. Furthermore, the support is extremely good.</p>
						</div>
						<div class="testimonial-info">
							<div class="img">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/Shaun-Snapp-min.png' ); ?>" alt="">
							</div>
							<div class="info">
								<h3>Shaun Snapp</h3>
								<div class="star">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="testimonial-area">
						<div class="testimonial-content">
							<p>Very good tab tool with flexible configuration, even better Pro. I liked the detailed style customization, unlike other similar plugins. Thanks for the plugin, solved quickly my problem.</p>
						</div>
						<div class="testimonial-info">
							<div class="img">
								<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/Richard-Vencu-min.jpeg' ); ?>" alt="">
							</div>
							<div class="info">
								<h3>Richard Vencu</h3>
								<div class="star">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</div>
		<!-- Testimonial section end -->
	</div>
	<!-- End premium page -->
		<?php
	}
}

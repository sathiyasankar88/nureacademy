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
 * WP_Tabs_Help_Page class.
 *
 * @since    2.0.0
 */
class WP_Tabs_Help_Page {

	/**
	 * Admin help page
	 *
	 * @since    2.0.0
	 */
	public function help_page() {
		add_submenu_page(
			'edit.php?post_type=sp_wp_tabs',
			__( 'Help', 'wp-expand-tabs-free' ),
			__( 'Help', 'wp-expand-tabs-free' ),
			'manage_options',
			'tabs_help',
			array( $this, 'help_page_callback' )
		);
	}

	/**
	 * Help Page Callback
	 */
	public function help_page_callback() {
		wp_enqueue_style( 'wp-tabs-admin-help', WP_TABS_URL . 'admin/css/help-page.min.css', array(), WP_TABS_VERSION );
		$add_new_tabs_link = admin_url( 'post-new.php?post_type=sp_wp_tabs' );
		?>

<div class="sp-tab__help-page">
		<!-- Header section start -->
		<section class="sp-tab__help header">
			<div class="header-area">
				<div class="container">
					<div class="header-logo">
						<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/wp-tabs-main-logo.svg' ); ?>" alt="">
						<span><?php echo esc_html( WP_TABS_VERSION ); ?></span>
					</div>
					<div class="header-content">
						<p>Thank you for installing WP Tabs plugin! This video will help you get started with the plugin.</p>
					</div>
				</div>
			</div>
			<div class="video-area">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLoUb-7uG-5jMEWxEwTyydvI7BcF56qWvm" frameborder="0" allowfullscreen=""></iframe>
			</div>
			<div class="content-area">
				<div class="container">
					<div class="content-button">
						<a href="<?php echo esc_url( $add_new_tabs_link ); ?>">Start Adding Tabs</a>
						<a href="https://docs.shapedplugin.com/docs/wp-tabs/overview/" target="_blank">Read Documentation</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Header section end -->

		<!-- Upgrade section start -->
		<section class="sp-tab__help upgrade">
			<div class="upgrade-area">
				<div class="upgrade-img">
				<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/wp-tabs-icon-1.svg' ); ?>" alt="">
				</div>
				<h2>Upgrade To Unleash the Power of WP Tabs Pro</h2>
				<p>Get the most out of WP Tabs by upgrading to unlock all of its powerful features. With WP Tabs Pro, you can unlock amazing features like:</p>
			</div>
			<div class="upgrade-info">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<ul class="upgrade-list">
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Slick, lightweight, and super fast.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">2 Tabs layouts (Horizontal and Vertical).</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">10+ Flexible tabs positions.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">100+ Styling and layout customization options.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Multiple Tabs Sets on the same page.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Drag & drop tab items for easy sorting.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt=""> Exclude the categories which you don't want to display.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Display set or group-wise tabs.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Create Tabs from posts, pages, taxonomy.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Unique settings for each tab set or group.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Typography options(940+ Google fonts).</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Custom tab icon option including FontAwesome library.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Supports HTML content, images, shortcodes, video, audio, forms, maps, iframe, image slider, galleries, etc.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Customize everything easily.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Deep linking – You can link to a specific tab with a hashtag or URL.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Set a tab number which tab you want to keep open.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Multi-level or unlimited nested tabs.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Responsive video (YouTube, Vimeo, object, iframe).</li>
							</ul>
						</div>
						<div class="col-lg-6">
							<ul class="upgrade-list">
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Load any type of content and iframe via AJAX.</li>	
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">AutoPlay support automatically animates through Tabs when visitors arrive.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Tabs compact or justified view.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Auto & custom height for the tab content.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Disabling or inactive particular tab.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Tabs title padding, border, radius, bg active, & hover color.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Tabs subtitle option.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Top line for the active tab.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">WP classic editor (WYSIWYG) for tabs content.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Set icon position – left, right, top, bottom.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Endless colors and styling options.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Mobile versions–tabs screen size and tabs mode.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">16 Tabs content animations.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Advanced plugin settings.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Multisite, RTL, and Accessibility ready.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Fully Translation ready with WPML, Polylang, Loco Translate, and more.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">Built-in Automatic Updates.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt="">One To One Fast & Friendly Support.</li>
								<li><img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/checkmark.svg' ); ?>" alt=""><span>Not Happy? 100% No Questions Asked <a href="https://shapedplugin.com/refund-policy/" target="_blank">Refund Policy!</a></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="upgrade-pro">
					<div class="pro-content">
						<div class="pro-icon">
							<img src="<?php echo esc_url( WP_TABS_URL . 'admin/img/images/wp-tabs.svg' ); ?>" alt="">
						</div>
						<div class="pro-text">
							<h2>Upgrade To WP Tabs Pro</h2>
							<p>Start creating beautiful Tabs in minutes!</p>
						</div>
					</div>
					<div class="pro-btn">
						<a href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank">Upgrade To Pro Now</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Upgrade section end -->

		<!-- Testimonial section start -->
		<section class="sp-tab__help testimonial">
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
		<!-- Testimonial section end -->

</div>
		<?php
	}

}

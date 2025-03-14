<?php

namespace QodeCore\PostTypes\MasonryGallery\Shortcodes;


use QodeCore\Lib;

/**
 * Class MasonryGallery
 * @package QodeCore\PostTypes\MasonryGallery\Shortcodes
 */
class MasonryGallery implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_masonry_gallery';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}


	/**
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
				'name'                      => esc_html__( 'Masonry Gallery', 'select-core' ),
				'base'                      => $this->base,
				'category'                  => 'by SELECT',
				'icon'                      => 'icon-wpb-masonry-gallery extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Category', 'select-core' ),
						'param_name'  => 'category',
						'value'       => '',
						'description' => esc_html__( 'Category Slug (leave empty for all)', 'select-core' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Number', 'select-core' ),
						'param_name'  => 'number',
						'value'       => '',
						'description' => esc_html__( 'Number of Masonry Gallery Items', 'select-core' )
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Order', 'select-core' ),
						'param_name' => 'order',
						'value'      => array(
							esc_html__( 'DESC', 'select-core' ) => 'DESC',
							esc_html__( 'ASC', 'select-core' )  => 'ASC'
						)
					)
				)
			) );
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$default_args = array(
			'category' => '',
			'number'   => - 1,
			'order'    => 'DESC'
		);
		extract( shortcode_atts( $default_args, $atts ) );


		$html = '';

		/* Query for items */
		$query_args = array(
			'post_type'      => 'masonry-gallery',
			'orderby'        => 'date',
			'order'          => $order,
			'posts_per_page' => $number
		);

		if ( $category != "" ) {
			$query_args['masonry-gallery-category'] = $category;
		}
		$query = new \WP_Query( $query_args );


		$html .= '<div class="qodef-masonry-gallery-holder">';
		$html .= '<div class="qodef-masonry-gallery-grid-sizer"></div>';

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();

				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_type', true ) !== '' ) {
					$type = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_type', true );
				} else {
					$type = 'standard';
				}

				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_title_tag', true ) !== '' ) {
					$params['title_tag'] = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_title_tag', true );
				}
				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_text', true ) !== '' ) {
					$params['item_text'] = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_text', true );
				}
				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link', true ) !== '' ) {
					$params['item_link'] = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link', true );
				}
				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link_target', true ) !== '' ) {
					$params['item_link_target'] = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link_target', true );
				}
				if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_button_label', true ) !== '' ) {
					$params['item_button_label'] = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_button_label', true );
				}

				$params['current_id']           = get_the_ID();
				$params['item_classes']         = $this->getItemClasses();
				$params['item_thumb_size']      = $this->getImageSize();
				$params['background_image_url'] = $this->getBackgroundImage( $params );
				$params['icon_html']            = $this->getItemIconHtml();

				$html .= qode_core_get_shortcode_module_template_part( 'masonry-gallery', 'masonry-gallery-' . $type . '-template', '', $params );

			endwhile;
		else:
			$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'select-core' );
		endif;
		wp_reset_postdata();
		$html .= '</div>';

		return $html;
	}

	private function getItemClasses() {
		$classes = array( 'qodef-masonry-gallery-item' );

		if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_size', true ) !== '' ) {
			$classes[] = 'qodef-mg-' . get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_size', true );
		}

		if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_type', true ) !== '' ) {
			$classes[] = 'qodef-mg-' . get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_type', true );
		}

		return implode( ' ', $classes );
	}

	private function getImageSize() {
		$thumb_size = 'target_qodef_square_alt';

		$masonry_size = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_size', true );

		switch ( $masonry_size ):
			default :
				$thumb_size = 'target_qodef_square_alt';
				break;
			case 'rectangle-landscape' :
				$thumb_size = 'target_qodef_large_width';
				break;
			case 'rectangle-portrait' :
				$thumb_size = 'target_qodef_large_height';
				break;
			case 'square-big' :
				$thumb_size = 'target_qodef_large_width_height';
				break;
		endswitch;


		return $thumb_size;
	}

	public function getBackgroundImage( $params ) {

		$id                = $params['current_id'];
		$masonry_image_url = wp_get_attachment_url( get_post_thumbnail_id( $id ) );

		return $masonry_image_url;

	}

	private function getItemIconHtml() {
		$icon_html = '';
		if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_icon', true ) !== '' ) {
			$icon_pack    = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_icon', true );
			$iconPackName = target_qodef_icon_collections()->getIconCollectionParamNameByKey( $icon_pack );
			if ( get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_icon_' . $iconPackName, true ) !== '' ) {
				$icon      = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_icon_' . $iconPackName, true );
				$icon_html = target_qodef_icon_collections()->renderIcon( $icon, $icon_pack );
			}
		}

		return $icon_html;
	}

}
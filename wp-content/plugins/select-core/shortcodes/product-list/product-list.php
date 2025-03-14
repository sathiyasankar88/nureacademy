<?php
namespace TargetQodef\Modules\Shortcodes\ProductList;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class ProductList that represents product list shortcode
 * @package TargetQodef\Modules\Shortcodes\ProductList
 */
class ProductList implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct()
    {
        $this->base = 'qodef_product_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap()
    {
        vc_map(array(
            'name' => esc_html__('Select Product List', 'select-core'),
            'base' => $this->base,
            'category' => esc_html__('by SELECT','select-core'),
            'icon' => 'icon-wpb-product-list extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Columns', 'select-core'),
                    'param_name' => 'columns',
                    'value' => array(
                        esc_html__('Two', 'select-core') => '2',
                        esc_html__('Three', 'select-core') => '3',
                        esc_html__('Four', 'select-core') => '4',
                    ),
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Number of Items', 'select-core'),
                    'param_name' => 'items_number',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__('Leave empty for all.', 'select-core')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order By', 'select-core'),
                    'param_name' => 'order_by',
                    'value' => array(
                        esc_html__('ID', 'select-core') => 'id',
                        esc_html__('Date', 'select-core') => 'date',
                        esc_html__('Menu Order', 'select-core') => 'menu_order',
                        esc_html__('Title', 'select-core') => 'title'
                    ),
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Sort Order', 'select-core'),
                    'param_name' => 'sort_order',
                    'value' => array(
                        esc_html__('Ascending', 'select-core') => 'ASC',
                        esc_html__('Descending', 'select-core') => 'DESC'
                    ),
                    'save_always' => true,
                    'admin_label' => true
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag', 'select-core'),
					'param_name' => 'title_tag',
					'value' => array(
						'' => '',
						esc_html__('h2', 'select-core') => 'h2',
						esc_html__('h3', 'select-core') => 'h3',
						esc_html__('h4', 'select-core') => 'h4',
						esc_html__('h5', 'select-core') => 'h5',
						esc_html__('h6', 'select-core') => 'h6'
					),
					'description' => ''
				),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Choose Sorting Taxonomy', 'select-core'),
                    'param_name' => 'taxonomy_to_display',
                    'value' => array(
                        esc_html__('Category', 'select-core') => 'category',
                        esc_html__('Tag', 'select-core') => 'tag',
                        esc_html__('Id', 'select-core') => 'id'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display.', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Enter Taxonomy Values', 'select-core'),
                    'param_name' => 'taxonomy_values',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'select-core')
                )
            )
        ));
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null){
        $default_atts = array(
            'columns' => '4',
            'items_number' => '-1',
            'order_by' => 'date',
            'sort_order' => 'desc',
            'taxonomy_to_display' => 'category',
            'taxonomy_values' => '',
            'title_tag' => 'h5',
			'display_categories' => 'yes'
        );

        $params = shortcode_atts($default_atts, $atts);

        $query_args = $this->getQueryArgs($params);

        global $woocommerce_loop;
        $woocommerce_loop['columns'] = $params['columns'];

        $products = new \WP_Query($query_args);

        $html = '';

        $html .= '<div class="qodef-product-list-holder">';
        $html .= '<div class="woocommerce columns-' . $params['columns'] . '">';
		$html .= '<ul class="products qodef-products-standard">';

        if ($products->have_posts()) :

            do_action('target_qodef_before_product_list_standard', $params);

            while ($products->have_posts()) : $products->the_post();

                $post_classes = implode(' ', get_post_class() );

                $html .= '<li class="' . $post_classes . '">';
                $html .= select_core_get_shortcode_template_part('templates/list-standard', 'product-list', '', $params);
                $html .= '</li>';

            endwhile;

        endif;

        woocommerce_reset_loop();
        wp_reset_postdata();


        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }


    /**
     * Creates an array of args for loop
     *
     * @param $params
     * @return array
     */
    private function getQueryArgs($params){

        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby' => $params['order_by'],
            'order' => $params['sort_order'],
            'posts_per_page' => $params['items_number'],
            'meta_query' => WC()->query->get_meta_query()
        );

        if ($params['taxonomy_to_display'] != '' && $params['taxonomy_to_display'] == 'category') {
            $args['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] != '' && $params['taxonomy_to_display'] == 'tag') {
            $args['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] != '' && $params['taxonomy_to_display'] == 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $args['post__in'] = $ids;
        }

        return $args;
    }

}


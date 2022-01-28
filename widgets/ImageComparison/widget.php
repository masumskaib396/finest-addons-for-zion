<?php

namespace Finest\Elements;
use ZionBuilder\Elements\Element;
use ZionBuilder\Utils;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class Text
 *
 */
class Finest_Image_Comparison extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-image-comparison';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Image Comparison', 'finest-zionbuilder' );
	}




    public function get_category() {
		return 'finest-category';
	}

	/**
	 * Get keywords
	 *
	 * Returns the keywords for this element
	 *
	 * @return array<string> The list of element keywords
	 */
	public function get_keywords() {
		return [ 'iamge', 'before', 'after', 'comparison'];
	}

	/**
	 * Get Element Icon
	 *
	 * Returns the icon used in add elements panel for this element
	 *
	 * @return string The element icon
	 */
	public function get_element_icon() {
		return 'element-icon';
	}

	/**
	 * Registers the element options
	 *
	 * @return void
	 */

	public function options( $options ) {

		$options->add_option(
			'before_image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired Before image',
				'title'       => esc_html__( 'Before Image', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

		$options->add_option(
			'after_image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired after image',
				'title'       => esc_html__( 'After Image', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

		// Settins
		$comparison_settings = $options->add_group(
			'finest_image_bf_settings',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Settings', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		$comparison_settings->add_option(
			'handle_bar_type',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Handle Bar Type', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Horizontal', 'finest-zionbuilder' ),
						'id'   => 'horizontal',
					],
					[
						'name' => esc_html__( 'Vertical', 'finest-zionbuilder' ),
						'id'   => 'vertical',
					],
				],
				'default'          => 'horizontal',
			]
		);

		// $comparison_settings->add_option(
		// 	'finest_overlay_enable',
		// 	[
		// 		'type'    => 'checkbox_switch',
		// 		'title'       => esc_html__( 'Enable Overlay On Hover', 'finest-zionbuilder' ),
		// 		'default' => false,
		// 		'layout'  => 'inline',
		// 	]
		// );

		// $comparison_settings->add_option(
		// 	'finest_overlay_color',
		// 	[
		// 		'type'        => 'colorpicker',
		// 		'title'       => __( 'Overlay Colorr', 'finest-zionbuilde' ),
		// 		'default'   => 'rgba(0,0,0,0.5)',
		// 		'css_style'   => [
		// 			[
		// 				'selector' => '{{ELEMENT}} .fzb__comparison--wraper .twentytwenty-overlay:hover',
		// 				'value'    => 'background-color: {{VALUE}}',
		// 			],
		// 		],
		// 		'dependency'   => [
		// 			[
		// 				'option' => 'finest_overlay_enable',
		// 				'value'  => [true],
		// 			],
		// 		],
		// 	]
		// );


		$comparison_settings->add_option(
			'finest_default_offset_pct',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Handle Bar Position', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( '0', 'finest-zionbuilder' ),
						'id'   => '0.0',
					],
					[
						'name' => esc_html__( '1', 'finest-zionbuilder' ),
						'id'   => '0.1',
					],
					[
						'name' => esc_html__( '2', 'finest-zionbuilder' ),
						'id'   => '0.2',
					],
					[
						'name' => esc_html__( '3', 'finest-zionbuilder' ),
						'id'   => '0.3',
					],
					[
						'name' => esc_html__( '4', 'finest-zionbuilder' ),
						'id'   => '0.4',
					],
					[
						'name' => esc_html__( '5', 'finest-zionbuilder' ),
						'id'   => '0.5',
					],
					[
						'name' => esc_html__( '6', 'finest-zionbuilder' ),
						'id'   => '0.6',
					],
					[
						'name' => esc_html__( '7', 'finest-zionbuilder' ),
						'id'   => '0.7',
					],
					[
						'name' => esc_html__( '8', 'finest-zionbuilder' ),
						'id'   => '0.8',
					],
					[
						'name' => esc_html__( '9', 'finest-zionbuilder' ),
						'id'   => '0.9',
					],[
						'name' => esc_html__( '10', 'finest-zionbuilder' ),
						'id'   => '1.0',
					],


				],
				'default'          => '0.5',
			]
		);





	}





    /**
	 * Get style elements
	 *
	 * Returns a list of elements/tags that for which you
	 * want to show style options
	 *
	 * @return void
	 */
	public function on_register_styles() {


	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$before_image = $options->get_value('before_image');
		$after_image = $options->get_value('after_image');
		$handle_bar_type = $options->get_value('handle_bar_type');
		$offset_pct = $options->get_value('finest_default_offset_pct');




		$comparison_extraSetting = [
			'orientation'      => $handle_bar_type,
			'default_offset_pct' => $offset_pct
		];


        $jasondecode = wp_json_encode($comparison_extraSetting);

        ?>
            <div class="fzb__comparison--wraper" data-comparison="<?php echo esc_attr( $jasondecode ) ?>">
				<div id="fzb__comparison--active">
					<!-- The before image is first -->
					<div class="fzb__before-image">
						<img src="<?php echo esc_url( $before_image ); ?>" />
					</div>

					<!-- The after image is last -->
					<div class="fzb__before-image">
						<img src="<?php echo esc_url( $after_image ); ?>" />
					</div>
				</div>
            </div>
        <?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Image_Comparison() );
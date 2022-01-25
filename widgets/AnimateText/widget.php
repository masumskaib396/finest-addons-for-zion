<?php

namespace Finest\Elements;
use ZionBuilder\Elements\Element;
use ZionBuilder\Utils;
use ZionBuilder\RenderAttributes;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class Text
 *
 */
class Finest_AnimateText extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-animate-text';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Animate Text', 'finest-zionbuilder' );
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
		return [ 'finest', 'fancy', 'heading', 'animate', 'animation' ];
	}

	/**
	 * Get Element Icon
	 *
	 * Returns the icon used in add elements panel for this element
	 *
	 * @return string The element icon
	 */
	public function get_element_icon() {
		return 'element-text';
	}

	/**
	 * Registers the element options
	 *
	 * @return void
	 */

	public function options( $options ) {


		$options->add_option(
	        'finest_before_text',
	        [
				'title'   => esc_html__( 'Before Text', 'finest-zionbuilder' ),
				'type'    => 'text',
				'default' => esc_html__( 'This is', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true
				]
	        ]
		);

		$options->add_option(
			'finest_animated_text_animated_heading',
			[
			    'title'           => esc_html__( 'Animated Text', 'finest-zionbuilder' ),
				'type'        => 'text',
				'placeholder' => esc_html__( 'Enter your animated text with comma separated.', 'finest-zionbuilder' ),
				'description' => __( '<b>Write animated heading with comma separated. Example: Finest, Addons, Elementor</b>', 'finest-zionbuilder' ),
				'default'     => esc_html__( 'Finest, Addons, Elementor', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true
				]
			]
		);

		$options->add_option(
	        'finest_after_text',
	        [
				'title'   => esc_html__( 'After Text', 'finest-zionbuilder' ),
				'type'    => 'text',
				'default' => esc_html__( 'For You.', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true
				]
	        ]
		);

		// Settins
		$animate_settings = $options->add_group(
			'finest_type_settings',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Settings', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		// $animate_settings->add_option(
		// 	'finest_animated_type',
		// 	[
		// 		'type'             => 'select',
		// 		'title'            => esc_html__( 'Animation Type', 'finest-zionbuilder' ),
		// 		'options'          => [
		// 			[
		// 				'name' => esc_html__( 'Typed', 'finest-zionbuilder' ),
		// 				'id'   => 'finest-typed-animation',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Animate', 'finest-zionbuilder' ),
		// 				'id'   => 'finest-morphed-animation',
		// 			],

		// 		],
		// 		'default'          => 'finest-typed-animation',
		// 	]

		// );

		// $animate_settings->add_option(
		// 	'finest_animation_style',
		// 	[
		// 		'type'             => 'select',
		// 		'title'            => esc_html__( 'Animation Style', 'finest-zionbuilder' ),
		// 		'options'          => [
		// 			[
		// 				'name' => esc_html__( 'Fade In', 'finest-zionbuilder' ),
		// 				'id'   => 'fadeIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Up', 'finest-zionbuilder' ),
		// 				'id'   => 'fadeInUp',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Down', 'finest-zionbuilder' ),
		// 				'id'   => 'fadeInDown',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Left', 'finest-zionbuilder' ),
		// 				'id'   => 'fadeInLeft',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Right', 'finest-zionbuilder' ),
		// 				'id'   => 'fadeInRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Zoom In', 'finest-zionbuilder' ),
		// 				'id'   => 'zoomIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Zoom InUp ', 'finest-zionbuilder' ),
		// 				'id'   => 'zoomInUp',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'zoom In Down', 'finest-zionbuilder' ),
		// 				'id'   => 'zoomInDown',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Zoom In Left', 'finest-zionbuilder' ),
		// 				'id'   => 'zoomInLeft',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Right', 'finest-zionbuilder' ),
		// 				'id'   => 'zoomInRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Fade In Down', 'finest-zionbuilder' ),
		// 				'id'   => 'slideInDown',
		// 			],

		// 			[
		// 				'name' => esc_html__( 'Slide In Up', 'finest-zionbuilder' ),
		// 				'id'   => 'slideInUp',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Slide In Left', 'finest-zionbuilder' ),
		// 				'id'   => 'slideInLeft',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Slide In Right', 'finest-zionbuilder' ),
		// 				'id'   => 'slideInRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Bounce', 'finest-zionbuilder' ),
		// 				'id'   => 'bounce',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'BounceIn', 'finest-zionbuilder' ),
		// 				'id'   => 'bounceIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Bounce In Up', 'finest-zionbuilder' ),
		// 				'id'   => 'bounceInUp',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Bounce In Down', 'finest-zionbuilder' ),
		// 				'id'   => 'bounceInDown',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Bounce In Left', 'finest-zionbuilder' ),
		// 				'id'   => 'bounceInLeft',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Bounce In Right', 'finest-zionbuilder' ),
		// 				'id'   => 'bounceInRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Flash', 'finest-zionbuilder' ),
		// 				'id'   => 'flash',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Pulse', 'finest-zionbuilder' ),
		// 				'id'   => 'pulse',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'RotateIn', 'finest-zionbuilder' ),
		// 				'id'   => 'rotateIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'rotate In DownLeft', 'finest-zionbuilder' ),
		// 				'id'   => 'rotateInDownLeft',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Rotate In DownRight', 'finest-zionbuilder' ),
		// 				'id'   => 'rotateInDownRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'Rotate In UpRight', 'finest-zionbuilder' ),
		// 				'id'   => 'rotateInUpRight',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'RotateIn', 'finest-zionbuilder' ),
		// 				'id'   => 'rotateIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'RollIn', 'finest-zionbuilder' ),
		// 				'id'   => 'rollIn',
		// 			],
		// 			[
		// 				'name' => esc_html__( 'LightSpeedIn', 'finest-zionbuilder' ),
		// 				'id'   => 'lightSpeedIn',
		// 			],

		// 		],
		// 		'default'          => 'fadeIn',
		// 		'dependency'              => [
		// 			[
		// 				'option' => 'finest_animated_type',
		// 				'value'  => [ 'finest-morphed-animation' ],
		// 			],
		// 		],
		// 	]

		// );

		// $animate_settings->add_option(
		// 	'finest_animated_text_animation_speed',
		// 	[
		// 		'type'        => 'slider',
		// 		'title'       => __( 'Animation Speed.', 'finest-zionbuilder' ),
		// 		'default'     => 60,
		// 		'min'         => 0,
		// 		'max'         => 100,
		// 		'content'     => '',
		// 		'dependency'              => [
		// 			[
		// 				'option' => 'finest_animated_type',
		// 				'value'  => [ 'finest-morphed-animation' ],
		// 			],
		// 		],
		// 	],
		// );

		$animate_settings->add_option(
			'finest_animated_text_start_delay',
			[
				'type'        => 'slider',
				'title'       => __( 'Start Delay', 'finest-zionbuilder' ),
				'default'     => 1000,
				'min'         => 1000,
				'max'         => 10000,
				'content'     => '',
			],
		);

		$animate_settings->add_option(
			'finest_back_type_speed',
			[
				'type'        => 'slider',
				'title'       => __( 'Back Type Speed', 'finest-zionbuilder' ),
				'default'     => 60,
				'min'         => 10,
				'max'         => 200,
				'content'     => '',
			],
		);

		$animate_settings->add_option(
			'finest_text_back_delay',
			[
				'type'        => 'slider',
				'title'       => __( 'Back Delay', 'finest-zionbuilder' ),
				'default'     => 1000,
				'min'         => 1000,
				'max'         => 10000,
				'content'     => '',
			],
		);

		$animate_settings->add_option(
			'finest_animated_text_loop',
			[
				'type'    => 'checkbox_switch',
				'title'       => esc_html__( 'Loop', 'finest-zionbuilder' ),
				'default' => true,
				'layout'  => 'inline',
			]
		);

		$animate_settings->add_option(
			'finest_animated_text_show_cursor',
			[
				'type'    => 'checkbox_switch',
				'title'       => esc_html__( 'Show Cursor', 'finest-zionbuilder' ),
				'default' => true,
				'layout'  => 'inline',
			]
		);

		$animate_settings->add_option(
			'finest_animated_text_fade_out',
			[
				'type'    => 'checkbox_switch',
				'title'       => esc_html__( 'Fade Out', 'finest-zionbuilder' ),
				'default' => false,
				'layout'  => 'inline',
			]
		);

		$animate_settings->add_option(
			'finest_animated_text_smart_backspace',
			[
				'type'    => 'checkbox_switch',
				'title'       => esc_html__( 'Smart Backspace', 'finest-zionbuilder' ),
				'default' => true,
				'layout'  => 'inline',
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

		$this->register_style_options_element(
			'animate_before_text_style',
			[
				'title'      => esc_html__( 'Before Text Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__animate-before-text',
			]
		);

		$this->register_style_options_element(
			'animate_main_text_style',
			[
				'title'      => esc_html__( 'Animate Text Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__animate-text',
			]
		);

		$this->register_style_options_element(
			'animate_after_text_style',
			[
				'title'      => esc_html__( 'After Text Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__animate-after-text',
			]
		);

	}


	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$id      = rand(999, 9999);


		$finest_animated_type  = $options->get_value( 'finest_animated_type');
		$headding_text = $options->get_value('finest_animated_text_animated_heading');
		$type_heading  = explode( ',',  $headding_text);

		$type_speed       = $options->get_value( 'finest_animated_text_animation_speed');
		$back_type_speed  = $options->get_value( 'finest_back_type_speed');
		$text_back_delay  = $options->get_value( 'finest_text_back_delay');
		$text_loop = $options->get_value( 'finest_animated_text_loop');
		$show_cursor = $options->get_value( 'finest_animated_text_show_cursor');
		$fade_out = $options->get_value( 'finest_animated_text_fade_out');
		$smart_backspace = $options->get_value( 'finest_animated_text_smart_backspace');

		 //this code slider option

		//  var_dump($id );

		$animate_extraSetting = [
			'type_heading'    => $type_heading,
			'type_speed'      => !empty($type_speed) ? $type_speed : 60,
			'back_type_speed' => !empty($back_type_speed) ? $back_type_speed : 60,
			'text_back_delay' => !empty($text_back_delay) ? $text_back_delay : 1000,
			'loop'        	   => (!empty($text_loop) && true === $text_loop) ? true : false,
			'show_cursor' 	   => (!empty($show_cursor) && true === $show_cursor) ? true : false,
			'fade_out'    	   => (!empty($fade_out) && true === $fade_out) ? true : false,
			'smart_backspace' => (!empty($smart_backspace) && true === $smart_backspace) ? true : false,
			'id'              => 'fzb-animate-text-'.$id
		];


        $jasondecode = wp_json_encode($animate_extraSetting);


		$finest_before_text = $options->get_value('finest_before_text');
		$finest_after_text  = $options->get_value('finest_after_text');

		$data_settings = esc_attr( $jasondecode );

		// $uniqueid = uniqid();

		?>
		<h6  class="fzb__animate-text-wraper" data-settings="<?php echo esc_attr( $data_settings ) ?>">
			<span class="fzb__animate-before-text">
				<?php echo esc_html( $finest_before_text ); ?>
			</span>
				<span id="fzb-animate-text-id" class="fzb__animate-text"></span>
			<span class="fzb__animate-after-text">
				<?php echo esc_html( $finest_after_text ); ?>
			</span>
		</h6>
		<?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_AnimateText() );
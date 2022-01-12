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


			'finest_animation_style',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Icon Box Style', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Fade In', 'finest-zionbuilder' ),
						'id'   => 'fadeIn',
					],
					[
						'name' => esc_html__( 'Fade In Up', 'finest-zionbuilder' ),
						'id'   => 'fadeInUp',
					],
					[
						'name' => esc_html__( 'Fade In Down', 'finest-zionbuilder' ),
						'id'   => 'fadeInDown',
					],
					[
						'name' => esc_html__( 'Fade In Left', 'finest-zionbuilder' ),
						'id'   => 'fadeInLeft',
					],
					[
						'name' => esc_html__( 'Fade In Right', 'finest-zionbuilder' ),
						'id'   => 'fadeInRight',
					],
					[
						'name' => esc_html__( 'Zoom In', 'finest-zionbuilder' ),
						'id'   => 'zoomIn',
					],
					[
						'name' => esc_html__( 'Zoom InUp ', 'finest-zionbuilder' ),
						'id'   => 'zoomInUp',
					],
					[
						'name' => esc_html__( 'zoom In Down', 'finest-zionbuilder' ),
						'id'   => 'zoomInDown',
					],
					[
						'name' => esc_html__( 'Zoom In Left', 'finest-zionbuilder' ),
						'id'   => 'zoomInLeft',
					],
					[
						'name' => esc_html__( 'Fade In Right', 'finest-zionbuilder' ),
						'id'   => 'zoomInRight',
					],
					[
						'name' => esc_html__( 'Fade In Down', 'finest-zionbuilder' ),
						'id'   => 'slideInDown',
					],

					[
						'name' => esc_html__( 'Slide In Up', 'finest-zionbuilder' ),
						'id'   => 'slideInUp',
					],
					[
						'name' => esc_html__( 'Slide In Left', 'finest-zionbuilder' ),
						'id'   => 'slideInLeft',
					],
					[
						'name' => esc_html__( 'Slide In Right', 'finest-zionbuilder' ),
						'id'   => 'slideInRight',
					],
					[
						'name' => esc_html__( 'Bounce', 'finest-zionbuilder' ),
						'id'   => 'bounce',
					],
					[
						'name' => esc_html__( 'BounceIn', 'finest-zionbuilder' ),
						'id'   => 'bounceIn',
					],
					[
						'name' => esc_html__( 'Bounce In Up', 'finest-zionbuilder' ),
						'id'   => 'bounceInUp',
					],
					[
						'name' => esc_html__( 'Bounce In Down', 'finest-zionbuilder' ),
						'id'   => 'bounceInDown',
					],
					[
						'name' => esc_html__( 'Bounce In Left', 'finest-zionbuilder' ),
						'id'   => 'bounceInLeft',
					],
					[
						'name' => esc_html__( 'Bounce In Right', 'finest-zionbuilder' ),
						'id'   => 'bounceInRight',
					],
					[
						'name' => esc_html__( 'Flash', 'finest-zionbuilder' ),
						'id'   => 'flash',
					],
					[
						'name' => esc_html__( 'Pulse', 'finest-zionbuilder' ),
						'id'   => 'pulse',
					],
					[
						'name' => esc_html__( 'RotateIn', 'finest-zionbuilder' ),
						'id'   => 'rotateIn',
					],
					[
						'name' => esc_html__( 'rotate In DownLeft', 'finest-zionbuilder' ),
						'id'   => 'rotateInDownLeft',
					],
					[
						'name' => esc_html__( 'Rotate In DownRight', 'finest-zionbuilder' ),
						'id'   => 'rotateInDownRight',
					],
					[
						'name' => esc_html__( 'Rotate In UpRight', 'finest-zionbuilder' ),
						'id'   => 'rotateInUpRight',
					],
					[
						'name' => esc_html__( 'RotateIn', 'finest-zionbuilder' ),
						'id'   => 'rotateIn',
					],
					[
						'name' => esc_html__( 'RollIn', 'finest-zionbuilder' ),
						'id'   => 'rollIn',
					],
					[
						'name' => esc_html__( 'LightSpeedIn', 'finest-zionbuilder' ),
						'id'   => 'lightSpeedIn',
					],

				],
				'default'          => 'fadeIn',
			]

		);

		$options->add_option(
	        'finest_animated_text_before_text',
	        [
				'label'   => esc_html__( 'Before Text', 'finest-zionbuilder' ),
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
	        'finest_animated_text_after_text',
	        [
				'label'   => esc_html__( 'After Text', 'finest-zionbuilder' ),
				'type'    => 'text',
				'default' => esc_html__( 'For You.', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true
				]
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
	// public function on_register_styles() {
	// 	$this->register_style_options_element(
	// 		'icon_box_warper',
	// 		[
	// 			'title'      => esc_html__( 'Icon Box Wraper Custom', 'finest-zionbuilder' ),
	// 			'selector'   => '{{ELEMENT}} .finest__icon-box',
	// 		]
	// 	);

	// }

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$animate_text  = $options->get_value( 'finest_animation_style');
		 echo "<pre>";
		 var_dump($animate_text);
		 echo "</pre>";


		?>
			<h2><?php echo "hello world" ?></h2>
		<?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_AnimateText() );
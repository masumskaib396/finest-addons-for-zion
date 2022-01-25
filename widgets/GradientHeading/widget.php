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
class Finest_Gradient_Heading extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-gradient-heading';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Gradient Heading', 'finest-zionbuilder' );
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
		return [ 'heading', 'gradient', 'finest', 'dual'];
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
			'heading_animate_style',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Select Style', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Default', 'finest-zionbuilder' ),
						'id'   => 'default',
					],
					[
						'name' => esc_html__( 'Style 01', 'finest-zionbuilder' ),
						'id'   => 'style-one',
					],
					[
						'name' => esc_html__( 'Style 02', 'finest-zionbuilder' ),
						'id'   => 'style-two',
					]
				],
				'default'          => 'style-one',
			]
		);

        $options->add_option(
			'finest-gradient-heading',
			[
				'type'        => 'text',
				'title'       => __( 'Heading', 'finest-zionbuilder' ),
				'default'     => __( 'Finest Gradient Heading', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

        $options->add_option(
			'heading_tag',
			[
				'type'        => 'select',
				'default'     => 'h2',
				'title'       => __( 'HTML title tag', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired HTML tag for the title.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'name' => __( 'h1', 'finest-zionbuilder' ),
						'id'   => 'h1',
					],
					[
						'name' => __( 'h2', 'finest-zionbuilder' ),
						'id'   => 'h2',
					],
					[
						'name' => __( 'h3', 'finest-zionbuilder' ),
						'id'   => 'h3',
					],
					[
						'name' => __( 'h4', 'finest-zionbuilder' ),
						'id'   => 'h4',
					],
					[
						'name' => __( 'h5', 'finest-zionbuilder' ),
						'id'   => 'h5',
					],
					[
						'name' => __( 'h6', 'finest-zionbuilder' ),
						'id'   => 'h6',
					],
					[
						'name' => __( 'p', 'finest-zionbuilder' ),
						'id'   => 'p',
					],
					[
						'name' => __( 'span', 'finest-zionbuilder' ),
						'id'   => 'span',
					],
					[
						'name' => __( 'div', 'finest-zionbuilder' ),
						'id'   => 'div',
					],
				],
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
			'title_styles',
			[
				'title'      => esc_html__( 'Gradient Heading styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__gradient-heading',
			]
		);



	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$gradient_heading_style = $options->get_value('heading_animate_style');




        $heading_tag   = $options->get_value( 'heading_tag', 'h2' );
        $gradient_heading  = $options->get_value( 'finest-gradient-heading');
        $combined_heading_attr  = $this->render_attributes->get_combined_attributes( 'heading_styles', [ 'class' =>  'fzb__gradient-heading ' . $gradient_heading_style ] );

        if ( ! empty( $gradient_heading ) ) {
			?>
			<div class="fzb__gradient-heading-wraper">
				<?php
					$this->render_tag( $heading_tag, 'finest-gradient-heading', wp_kses_post(  $gradient_heading ), $combined_heading_attr );
				?>
			</div>
			<?php

        }

	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Gradient_Heading() );